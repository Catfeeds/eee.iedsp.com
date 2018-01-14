<?php
/**
 * 移动支付设备模块订阅器
 *
 * @author 锋哥
 * @url http://www.fengzhi360.com/
 */
defined('IN_IA') or exit('Access Denied');

class Fz_wlwModuleReceiver extends WeModuleReceiver {
	public function receive() {
		$type = $this->message['type'];
		//这里定义此模块进行消息订阅时的, 消息到达以后的具体处理过程, 请查看文档来编写你的代码
	}
}