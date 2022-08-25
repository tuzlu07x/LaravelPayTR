<h3 align="center"> PHP 8.1 LARAVEL PAYTR<br></h3>

<p align="center">PHP 8.1 Laravel PayTR entegrasyonu </p>

## Usage
    composer require ftuzlu/paytr

```php
<?php
$payment = new Payment(
            [
                "merchantId" => config("paytr.merchantId"),
                "merchantKey" => config("paytr.merchantKey"),
                "merchantSalt" => config("paytr.merchantSalt"),
                "apiUrl" => config('paytr.apiUrl'),
                "successUrl" => config('paytr.successUrl'),
                "failUrl" => config('paytr.failUrl'),
            ],

            [
                "email" => "fatihtuzlu07@gmail.com",
                "merchantOid" => "ABS123",
                "userName" => "Fatih",
                "userAddress" => "Antalya",
                "userPhone" => "12345678900",
                "userIp" => "127.1.1.1",
                "currency" => "TL",
                "basket" => [
                    'product' => 'Kalem',
                    'price' => 999,
                    'quantity' => 1,
                ],
                "paymentAmount" => "999",
                "noInstallment" => 0,
                "maxInstallment" => 0,
            ]
        );
        echo $payment->setMake(); //Bu kısımda { "status": "success", "token": "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-XXXXXXXX"  } işlemin başarılı olduğunun testidir.

        //View kısmı için daha sonra örnek kodu paylaşacağım. Paytr biliyorsunuz redirect sonucundaki gelen tokena göre yönlendirme yapıyor yapmanız gereken tek şey;
        //Gelen tokeni aşağıdaki linke göndermek.

        <!-- Ödeme formunun açılması için gereken HTML kodlar / Başlangıç -->
        <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
        <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token; ?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
        <script>iFrameResize({}, '#paytriframe');</script>
        <!-- Ödeme formunun açılması için gereken HTML kodlar / Bitiş -->
?>
```
