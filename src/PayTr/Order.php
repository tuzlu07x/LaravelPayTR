<?php

namespace Src\PayTr;

class Order
{
    protected string $email;
    protected string $merchantOid;
    protected string $userName;
    protected string $userAddress;
    protected string $userPhone;
    protected string $userIp;
    protected string $currency = 'TL';

    protected array $basket;

    protected float $paymentAmount;

    protected int $noInstallment = 0;
    protected int $maxInstallment = 0;

    public function __construct(array $order = [])
    {
        if ($order) {
            $this
                ->setEmail($order['email'])
                ->setMerchantOid($order['merchantOid'])
                ->setUserName($order['userName'])
                ->setUserAddress($order['userAddress'])
                ->setUserPhone($order['userPhone'])
                ->setUserIp($order['userIp'])
                ->setCurrency($order['currency'])

                ->setBasket($order['basket'])

                ->setPaymentAmount($order['paymentAmount']);

            if (isset($order['noInstallment'])) {
                $this->setNoInstallment($order['noInstallment']);
            }
            if (isset($order['maxInstallment'])) {
                $this->setMaxInstallment($order['maxInstallment']);
            }
        }
    }

    /**
     * get $email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * set $email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * get $merchantOid
     */
    public function getMerchantOid(): string
    {
        return $this->merchantOid;
    }

    /**
     * set $merchantOid
     */
    public function setMerchantOid(string $merchantOid): self
    {
        $this->merchantOid = $merchantOid;

        return $this;
    }

    /**
     * get $userName
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * set $userName
     */
    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * get $userAddress
     */
    public function getUserAdderss(): string
    {
        return $this->userAddress;
    }

    /**
     * set $userAddress
     */
    public function setUserAddress(string $userAddress): self
    {
        $this->userAddress = $userAddress;

        return $this;
    }

    /**
     * get $userPhone
     */
    public function getUserPhone(): string
    {
        return $this->userPhone;
    }

    /**
     * set $userPhone
     */
    public function setUserPhone(string $userPhone): self
    {
        $this->userPhone = $userPhone;

        return $this;
    }

    /**
     * get $userIp
     */
    public function getUserIp(): string
    {
        return $this->userIp;
    }

    /**
     * set $userIp
     */
    public function setUserIp(string $userIp): self
    {
        $this->userIp = $userIp;

        return $this;
    }

    /**
     * get $currency
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * set $currency
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * get $basket
     */
    public function getBasket(): array
    {
        return $this->basket;
    }

    /**
     * set $basket
     */
    public function setBasket(array $basket): self
    {
        $this->basket = $basket;

        return $this;
    }


    /**
     * get $paymentAmount
     */
    public function getPaymentAmount(): float
    {
        return $this->paymentAmount;
    }

    /**
     * set $paymentAmount
     */
    public function setPaymentAmount(float $paymentAmount): self
    {
        $this->paymentAmount = $paymentAmount;

        return $this;
    }

    /**
     * get $noInstallment
     */
    public function getNoInstallment(): int
    {
        return $this->noInstallment;
    }

    /**
     * set $paymentAmount
     */
    public function setNoInstallment(int $noInstallment): self
    {
        $this->noInstallment = $noInstallment;

        return $this;
    }

    /**
     * get $maxInstallment
     */
    public function getMaxInstallment(): int
    {
        return $this->maxInstallment;
    }

    /**
     * set $maxInstallment
     */
    public function setMaxInstallment(int $maxInstallment): self
    {
        $this->maxInstallment = $maxInstallment;

        return $this;
    }
}
