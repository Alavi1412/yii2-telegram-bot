<?php
/**
 * Created by PhpStorm.
 * User: alavi
 * Date: 12/15/18
 * Time: 3:12 PM
 */

namespace app\models;

use yii\httpclient\Client;
use yii\httpclient\Response;


class TelegramRequest
{
    // IF you don't what it is, go HOME:
    private static $TOKEN = '718970530:AAFqoi9yqYjrG3OhzDTYT5hpiiZM4Bjg2Nw';

    // Requests structures implementing
    public static function methods($name, $data)
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://api.telegram.org/bot' . TelegramRequest::$TOKEN . '/' . $name)
            ->setData($data)
            ->send();
        return $response->getData();
    }


    public static function answerCallbackQuery($data) {
        return TelegramRequest::methods('answerCallbackQuery', $data);
    }
}