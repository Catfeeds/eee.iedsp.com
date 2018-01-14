<?php
/**
 * 移动支付设备模块处理程序
 *
 * @author 锋哥
 * @url http://www.fengzhi360.com/
 */
defined('IN_IA') or exit('Access Denied');

class Fz_wlwModuleProcessor extends WeModuleProcessor {
	public function respond() {
		$content = $this->message['content'];
		//这里定义此模块进行消息处理时的具体过程, 请查看文档来编写你的代码
	}
}