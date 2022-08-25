<?php

namespace Src\PayTr;

class Config
{
    protected $merchantId;
    protected $merchantKey;
    protected $merchantSalt;
    protected $apiUrl;
    protected $successUrl;
    protected $failUrl;

    public function __construct(?array $config = [])
    {
        if ($config) {
            $this
                ->setMerchantId($config['merchantId'])
                ->setMerchantKey($config['merchantKey'])
                ->setMerchantSalt($config['merchantSalt'])
                ->setApiUrl($config['apiUrl'])
                ->setSuccessUrl($config['successUrl'])
                ->setFailUrl($config['failUrl']);
        }
    }

    /**
     * Merchant_id get Method
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * Merchant_id Set Method
     */
    public function setMerchantId($merchantId): self
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    /**
     * Merchant_key get Method
     */
    public function getMerchantKey(): string
    {
        return $this->merchantKey;
    }

    /**
     * Merchant_key Set Method
     */
    public function setMerchantKey(string $merchantKey): self
    {
        $this->merchantKey = $merchantKey;

        return $this;
    }

    /**
     * Merchant_salt get Method
     */
    public function getMerchantSalt(): string
    {
        return $this->merchantSalt;
    }

    /**
     * Merchant_salt Set Method
     */
    public function setMerchantSalt(string $merchantSalt): self
    {
        $this->merchantSalt = $merchantSalt;

        return $this;
    }

    /**
     * Merchant_salt get Method
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * api_url Set Method
     */
    public function setApiUrl(string $apiUrl): self
    {
        $this->apiUrl = $apiUrl;

        return $this;
    }

    /**
     * success_url get Method
     */
    public function getSuccessUrl(): string
    {
        return $this->successUrl;
    }

    /**
     * apiUrl Set Method
     */
    public function setSuccessUrl(string $successUrl): self
    {
        $this->successUrl = $successUrl;

        return $this;
    }

    /**
     * merchant_ok_url get Method
     */
    public function getFailUrl(): string
    {
        return $this->failUrl;
    }

    /**
     * merchant_fail_url Set Method
     */
    public function setFailUrl(string $failUrl): self
    {
        $this->failUrl = $failUrl;

        return $this;
    }
}
