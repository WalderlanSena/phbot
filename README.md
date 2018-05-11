<p align="center">
  <img src="https://github.com/WalderlanSena/phbot/blob/master/img/phbot_logo.png" width="450">
</p>

## Connect API Telegram

```php

$app = new ApiConnectTelegram([
    'token' => '<SEU TOKEN>'
]);

```
## Use get update Message

```php

try {
    $request = $app->getUpdates();
} catch (\Exception $exception) {
    echo $exception->getMessage();
}

```

## Use Send Message

```php

$data = [
    'chat_id' => 0,
    'text'    => '<SUA MENSAGEM>'
];

try {
    $request = $app->sendMessage($data);
} catch (\Exception $exception) {
    echo $exception->getMessage();
}

```

# License
A biblioteca <b>Phbot</b> é um software de código aberto licenciado sob a licença MIT license.
