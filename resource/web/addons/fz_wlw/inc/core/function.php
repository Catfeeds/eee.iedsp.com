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