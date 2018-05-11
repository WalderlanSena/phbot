<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 11/05/18
 * Time: 09:39
 */

namespace PhBotLib\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use PhBotLib\Interfaces\RequestApiInterface;

class ApiConnectTelegram implements RequestApiInterface
{
    private $config;
    private $configBot;
    private $client;

    public function __construct(array $configBot)
    {
        $this->config    = $this->getConfig();
        $this->configBot = $configBot;

        $client = new Client();
        $this->client = $client;
    }

    public function getConfig(): array
    {
        return include __DIR__ . '/../config/bot.config.php';
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Exception
     */
    public function getUpdates()
    {
        $request = $this->config['api'].$this->configBot['token'].'/getUpdates';
        try {
            $response = $this->client->get($request);
        } catch (ClientException $exception) {
            throw new \Exception($exception->getMessage());
        }

        $response = json_decode($response->getBody());

        if ($response->{"ok"} == false) {
            throw new \Exception('Não foi possível concluir a requisição. Error: '.$response->{'description'});
        }

        return $response->{'result'};
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function sendMessage($data)
    {
        $request = $this->config['api'].$this->configBot['token'].'/sendMessage?'.http_build_query($data);

        try {
            $response = $this->client->get($request);
        } catch (ClientException $exception) {
            throw new \Exception($exception->getMessage());
        }

        $response = json_decode($response->getBody());

        if ($response->{"ok"} == false) {
            throw new \Exception('Não foi possível concluir a requisição. Error: '.$response->{'description'});
        }

        return $response->{'ok'};
    }
}