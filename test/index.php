<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 11/05/18
 * Time: 00:11
 */

require __DIR__ . '/../vendor/autoload.php';

use PhBotLib\Api\ApiConnectTelegram;

// Iniciando a conexão com a API do Telegram
$app = new ApiConnectTelegram([
    'token' => '<SEU TOKEN>'
]);

// Estrutura padrão de envio de mensagens
$data = [
    'chat_id' => 0,
    'text'    => '<SUA MENSAGEM>'
];

// Capturando informações registradas pelo bot
try {
    $request = $app->getUpdates();
} catch (\Exception $exception) {
    echo $exception->getMessage();
}

/*
    Imprime retorno dos da requisição do bot
*/
var_dump($request);