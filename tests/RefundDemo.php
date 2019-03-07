<?php
namespace Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use Exception;
use WxSdk\Pay\Lib\WxPayApi;
use WxSdk\Pay\Lib\WxPayRefund;
use WxSdk\Pay\WxPayConfig;

class RefundDemo
{
    public function run()
    {
        try {
            if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
                try{
                    $transaction_id = $_REQUEST["transaction_id"];
                    $total_fee = $_REQUEST["total_fee"];
                    $refund_fee = $_REQUEST["refund_fee"];
                    $input = new WxPayRefund();
                    $input->SetTransaction_id($transaction_id);
                    $input->SetTotal_fee($total_fee);
                    $input->SetRefund_fee($refund_fee);

                    $config = new WxPayConfig();
                    $input->SetOut_refund_no("sdkphp".date("YmdHis"));
                    $input->SetOp_user_id($config->GetMerchantId());
                    var_dump(WxPayApi::refund($config, $input));
                } catch(Exception $e) {
                    var_dump($e);
                    //Log::ERROR(json_encode($e));
                }
                exit();
            }
            //$_REQUEST["out_trade_no"]= "122531270220150304194108";
            ///$_REQUEST["total_fee"]= "1";
            //$_REQUEST["refund_fee"] = "1";
            if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
                try{
                    $out_trade_no = $_REQUEST["out_trade_no"];
                    $total_fee = $_REQUEST["total_fee"];
                    $refund_fee = $_REQUEST["refund_fee"];
                    $input = new WxPayRefund();
                    $input->SetOut_trade_no($out_trade_no);
                    $input->SetTotal_fee($total_fee);
                    $input->SetRefund_fee($refund_fee);

                    $config = new WxPayConfig();
                    $input->SetOut_refund_no("sdkphp".date("YmdHis"));
                    $input->SetOp_user_id($config->GetMerchantId());
                    var_dump(WxPayApi::refund($config, $input));
                } catch(Exception $e) {
                    var_dump($e);
                    //Log::ERROR(json_encode($e));
                }
                exit();
            }

        } catch(Exception $e) {
            var_dump($e);die;
            // log
        }
    }
}

ini_set('date.timezone','Asia/Shanghai');
error_reporting(1);

$instance = new RefundDemo();
$instance->run();