<?php
function tpl_form_field_fans($name, $value = array('openid' => '', 'nickname' => '', 'avatar' => ''), $required = false)
{
	global $_W;

	if (empty($default)) {
		$default = './resource/images/nopic.jpg';
	}

	$s = '';

	if (!defined('TPL_INIT_TINY_FANS')) {
		$s = "\r\n\t\t<script type=\"text/javascript\">\r\n\t\t\tfunction showFansDialog(elm) {\r\n\t\t\t\tvar btn = \$(elm);\r\n\t\t\t\tvar openid = btn.parent().prev();\r\n\t\t\t\tvar avatar = btn.parent().prev().prev();\r\n\t\t\t\tvar nickname = btn.parent().prev().prev().prev();\r\n\t\t\t\tvar img = btn.parent().parent().next().find(\"img\");\r\n\t\t\t\trequire([\"tiny\"], function(tiny){\r\n\t\t\t\t\ttiny.selectfan(function(fans){\r\n\t\t\t\t\t\tif(fans.tag.avatar){\r\n\t\t\t\t\t\t\tif(img.length > 0){\r\n\t\t\t\t\t\t\t\timg.get(0).src = fans.tag.avatar;\r\n\t\t\t\t\t\t\t}\r\n\t\t\t\t\t\t\topenid.val(fans.openid);\r\n\t\t\t\t\t\t\tavatar.val(fans.tag.avatar);\r\n\t\t\t\t\t\t\tnickname.val(fans.nickname);\r\n\t\t\t\t\t\t}\r\n\t\t\t\t\t});\r\n\t\t\t\t});\r\n\t\t\t}\r\n\t\t</script>";
		define('TPL_INIT_TINY_FANS', true);
	}

	$s .= "\r\n\t\t<div class=\"input-group\">\r\n\t\t\t<input type=\"text\" name=\"" . $name . '[nickname]" value="' . $value['nickname'] . '" class="form-control" readonly ' . ($required ? 'required' : '') . ">\r\n\t\t\t<input type=\"hidden\" name=\"" . $name . '[avatar]" value="' . $value['avatar'] . "\">\r\n\t\t\t<input type=\"hidden\" name=\"" . $name . '[openid]" value="' . $value['openid'] . "\">\r\n\t\t\t<span class=\"input-group-btn\">\r\n\t\t\t\t<button class=\"btn btn-default\" type=\"button\" onclick=\"showFansDialog(this);\">选择粉丝</button>\r\n\t\t\t</span>\r\n\t\t</div>\r\n\t\t<div class=\"input-group\" style=\"margin-top:.5em;\">\r\n\t\t\t<img src=\"" . $value['avatar'] . '" onerror="this.src=\'' . $default . "'; this.title='头像未找到.'\" class=\"img-responsive img-thumbnail\" width=\"150\" />\r\n\t\t</div>";
	return $s;
}

/**
 * 库存警告通知
 * @param  [type] $dev [description]
 * @return [type]      [description]
 */
function sendPrewarningNotice($dev,$package)
{
	global $_W;
	load()->model('account');
	$acc = WeAccount::create($_W['acid']);
	$notice_setting = unserialize($dev['notice_setting']);
	$prewarning_notice_tpl_id = $notice_setting['prewarning_notice_tpl_id'];
	$prewarning_notice_openid = $notice_setting['prewarning_notice_openid'];

	$postdata = array(
		'first' => array(
			'value' => "库存警告",
			'color' => '#ff510'
		),
		'keyword1' => array(
			'value' => '设备Id：'.$dev['Id'],
			'color' => '#ff510'
		),
		'keyword2' => array(
			'value' => '设备名：'.$dev['devname'],
			'color' => '#ff510'
		),
		'keyword3' => array(
			'value' => '套餐：'.$package['tcname'].'的库存已经不足',
			'color' => '#ff510'
		),
		'remark' => array(
			'value' => '' ,
			'color' => '#ff510'
		),
	);

	$url = '';

	$s_mess = $acc->sendTplNotice($prewarning_notice_openid,$prewarning_notice_tpl_id,$postdata,$url);

}

/**
 * 设备离线通知
 * @return [type] [description]
 */
function sendOfflineNotice($dev)
{
	global $_W;
	load()->model('account');
	$acc = WeAccount::create($_W['acid']);
	$notice_setting = unserialize($dev['notice_setting']);
	$offline_notice_tpl_id = $notice_setting['offline_notice_tpl_id'];
	$offline_notice_openid = $notice_setting['offline_notice_openid'];

	$postdata = array(
		'first' => array(
			'value' => "设备离线通知",
			'color' => '#ff510'
		),
		'keyword1' => array(
			'value' => '设备Id：'.$dev['Id'],
			'color' => '#ff510'
		),
		'keyword2' => array(
			'value' => '设备名：'.$dev['devname'],
			'color' => '#ff510'
		),
		'keyword3' => array(
			'value' => '设备已经离线',
			'color' => '#ff510'
		),
		'remark' => array(
			'value' => '' ,
			'color' => '#ff510'
		),
	);

	$url = '';

	$s_mess = $acc->sendTplNotice($offline_notice_openid,$offline_notice_tpl_id,$postdata,$url);

}