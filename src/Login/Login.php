<?php

/**
 * Created by PhpStorm.
 * User: hncg
 * Date: 2019-03-06
 * Time: 20:24
 */

namespace WxSdk\Login;
use GuzzleHttp\Client;

class Login
{
    const CODE_URL = 'https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code';

    const ACCESS_TOKEN_URL = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s';

    private $appid = '';

    private $secret = '';

    /**
     * Login constructor.
     * @param $appid string 小程序的appid
     * @param $secret string 小程序的appSecret
     */
    public function __construct($appid, $secret)
    {
        $this->appid = $appid;
        $this->secret = $secret;
    }

    /**
     * 根据wx.login返回的code获取openid
     * @param $code
     * @return string {"session_key":"","openid":""}
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function code2Session($code)
    {
        $client = new Client();
        $response = $client->request('GET', sprintf(self::CODE_URL, $this->appid, $this->secret, $code));
        return $response->getBody()->getContents();
    }

    /**
     * 获取access_token
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAccessToken()
    {
        $client = new Client();
        $response = $client->request('GET', sprintf(self::ACCESS_TOKEN_URL, $this->appid, $this->secret, $code));
        return $response->getBody()->getContents();
    }

}