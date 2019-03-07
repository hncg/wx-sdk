<?php
namespace Tests;

require_once __DIR__ . '/../vendor/autoload.php';
use WxSdk\Notify\Notify;

class NotifyDemo
{
    public function run()
    {
        $accessToken = '';
        $data = [

        ];
        $data = [
            "touser" => "",
            "weapp_template_msg" => [
                "template_id" => "",
                "page" => "page/page/index",
                "form_id" => "",
                "data" => [
                    "keyword1" => [
                        "value" => "339208499"
                    ],
                    "keyword2" => [
                        "value" => "2015年01月05日 12 =>30"
                    ],
                    "keyword3" => [
                        "value" => "腾讯微信总部"
                    ],
                    "keyword4" => [
                        "value" => "广州市海珠区新港中路397号"
                    ],
                    "keyword5" => [
                        "value" => "欢迎再次购买！",
                        "color" => "#173177"
                    ]
                ],
                "emphasis_keyword" => "我是关键词"
            ],
            "mp_template_msg" => []
        ];
        var_dump((new Notify($accessToken))->send($data));
    }
}

$instance = new NotifyDemo();
$instance->run();