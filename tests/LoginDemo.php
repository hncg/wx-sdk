<?php
namespace Tests;

require_once __DIR__ . '/../vendor/autoload.php';
use WxSdk\Login\Login;

class LoginDemo
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function run()
    {
        $code = '';// 小程序调用wx.login返回的code
        $appid = ''; // 小程序的appid，在小程序管理页面可以看到
        $secret = ''; // 小程序的secret,在商户平台可以看到
        //var_dump((new Login($appid, $secret))->code2Session($code));
        var_dump((new Login($appid, $secret))->getAccessToken());
    }
}

$instance = new LoginDemo();
$instance->run();