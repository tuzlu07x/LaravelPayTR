<?php

namespace Src\PayTr;

use GuzzleHttp\Client;

class Payment
{
    protected Config $config;
    protected Order $order;
    protected Response $response;

    protected int $timeoutLimit = 30;

    protected $debugOn = 1;

    protected string $hashStr;


    protected $client = null;
    protected $testMode = 1;

    public function __construct(?array $config = [], ?array $order = [])
    {
        if ($config) {
            $this->setConfig(new Config($config));
        }

        if ($order) {
            $this->setOrder(new Order($order));
        }
    }

    public function client($post_vals)
    {
        if (!$this->client) {
            $client = new Client();
            $response = $client->post($this->config->getApiUrl(), $post_vals);
            return $response;
        }
    }

    public function getConfig(): Config
    {
        return $this->config;
    }

    public function setConfig(Config $config): self
    {
        $this->config = $config;

        return $this;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }

    public function setResponse(Response $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getTimeoutLimit(): int
    {
        return $this->timeoutLimit;
    }

    public function setTimeoutLimit($timeoutLimit): self
    {
        $this->timeoutLimit = $timeoutLimit;

        return $this;
    }

    public function getDebugOn(): bool
    {
        return $this->debugOn;
    }

    public function setDebugOn($debugOn): self
    {
        $this->debugOn = $debugOn;

        return $this;
    }

    public function testMode(): bool
    {
        return $this->testMode;
    }

    public function getHashStrGenerate()
    {
        $basket = json_encode($this->order->getBasket());

        $hash_str = $this->config->getMerchantId() . $this->order->getUserIp() . $this->order->getMerchantOid() . $this->order->getEmail() . $this->order->getPaymentAmount() . $basket . $this->order->getNoInstallment() . $this->order->getMaxInstallment() . $this->order->getCurrency() . $this->testMode();

        return $hash_str;
    }

    public function getHashStr(): string
    {
        return $this->hashStr;
    }

    public function setHashStr($hashStr): self
    {
        $this->hashStr = $hashStr;

        return $this;
    }

    public function payTrToken()
    {
        $paytr_token = base64_encode(hash_hmac('sha256', $this->getHashStrGenerate() . $this->config->getMerchantSalt(), $this->config->getMerchantKey(), true));

        return $paytr_token;
    }

    public function prepare()
    {
        $data = [
            'merchant_id' => $this->config->getMerchantId(),
            'user_ip' => $this->order->getUserIp(),
            'merchant_oid' => $this->order->getMerchantOid(),
            'email' => $this->order->getEmail(),
            'payment_amount' => $this->order->getPaymentAmount(),
            'paytr_token' => $this->payTrToken(),
            'user_basket' => json_encode($this->order->getBasket()),
            'debug_on' => $this->getDebugOn(),
            'no_installment' => $this->order->getNoInstallment(),
            'max_installment' => $this->order->getMaxInstallment(),
            'user_name' => $this->order->getUserName(),
            'user_address' => $this->order->getUserAdderss(),
            'user_phone' => $this->order->getUserPhone(),
            'merchant_ok_url' => $this->config->getSuccessUrl(),
            'merchant_fail_url' => $this->config->getFailUrl(),
            'timeout_limit' => $this->getTimeoutLimit(),
            'currency' => $this->order->getCurrency(),
            'test_mode' => $this->testMode(),
        ];
        return $data;
    }

    public function setMake()
    {
        $post_vals = $this->prepare();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->config->getApiUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        $result = @curl_exec($ch);

        if (curl_errno($ch))
            die("PAYTR IFRAME connection error. err:" . curl_error($ch));

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success') {
            $token = $result['token'];
        } else {
            die("PAYTR IFRAME failed. reason:" . $result['reason']);
        }

        return $token;
    }
}
