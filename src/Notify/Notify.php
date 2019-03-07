<?php

/**
 * Created by PhpStorm.
 * User: hncg
 * Date: 2019-03-06
 * Time: 20:24
 */

namespace WxSdk\Notify;
use GuzzleHttp\Client;

class Notify
{
    const url = 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/uniform_send?access_token=%s';

    private $access_token = '';

    /**
     * Login constructor.
     * @param $access_token
     */
    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     *
     * @param $code
     * @return string {"session_key":"","openid":""}
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function send($data)
    {
        $client = new Client();
        $response = $client->request('POST', sprintf(self::url, $this->access_token), [
            'json' => $data
        ]);
        return $response->getBody()->getContents();
    }
}