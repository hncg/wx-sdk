<?php
namespace Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Exception;
use WxSdk\Pay\JsApiPay;
use WxSdk\Pay\Lib\WxPayApi;
use WxSdk\Pay\Lib\WxPayUnifiedOrder;
use WxSdk\Pay\WxPayConfig;

class UnifiedOrderDemo
{
    public function run()
    {
        try {
            $tools = new JsApiPay();
            $openId = '';
            //②、统一下单
            $input = new WxPayUnifiedOrder();
            $input->SetBody("test");
            $input->SetAttach("test");
            $input->SetOut_trade_no("sdkphp".date("YmdHis"));
            $input->SetTotal_fee("1");
            $input->SetTime_start(date("YmdHis"));
            $input->SetTime_expire(date("YmdHis", time() + 600));
            $input->SetGoods_tag("test");
            $input->SetNotify_url("http://paysdk.weixin.qq.com/notify.php");
            $input->SetTrade_type("JSAPI");
            $input->SetOpenid($openId);
            $config = new WxPayConfig();
            $order = WxPayApi::unifiedOrder($config, $input);
            $jsApiParameters = $tools->GetJsApiParameters($order);
            var_dump($jsApiParameters);die;
        } catch(Exception $e) {
            var_dump($e);die;
            // log
        }
    }
}

ini_set('date.timezone','Asia/Shanghai');
error_reporting(1);

$instance = new UnifiedOrderDemo();
$instance->run();