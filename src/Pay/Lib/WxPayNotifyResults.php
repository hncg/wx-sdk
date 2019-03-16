<?php
/**
 * Created by PhpStorm.
 * User: hncg
 * Date: 2019-03-16
 * Time: 19:28
 */

namespace WxSdk\Pay\Lib;


/**
 *
 * 回调回包数据基类
 *
 **/
class WxPayNotifyResults extends WxPayResults
{
	/**
	 * 将xml转为array
	 * @param WxPayConfigInterface $config
	 * @param string $xml
	 * @return WxPayNotifyResults
	 * @throws WxPayException
	 */
	public static function Init($config, $xml)
	{
		$obj = new self();
		$obj->FromXml($xml);
		//失败则直接返回失败
		$obj->CheckSign($config);
		return $obj;
	}
}
