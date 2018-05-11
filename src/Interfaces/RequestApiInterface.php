<?php
/**
 * Created by PhpStorm.
 * User: Walderlan Sena <senawalderlan@gmail.com>
 * Date: 11/05/18
 * Time: 10:00
 */

namespace PhBotLib\Interfaces;

interface RequestApiInterface
{
    /**
     * @return array
     *
     *  Captura e retorna as configurações globais do bot
     *
     */
    public function getConfig() : array;

    /**
     * @return mixed
     */
    public function getUpdates();

    /**
     * @param $data
     * @return mixed
     */
    public function sendMessage($data);
}