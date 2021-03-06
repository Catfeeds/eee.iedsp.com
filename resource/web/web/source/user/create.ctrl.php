<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');

load()->model('user');

uni_user_permission_check('system_user_post');
$_W['page']['title'] = '添加用户 - 用户管理';
$state = uni_permission($_W['uid']);
if ($state != ACCOUNT_MANAGE_NAME_FOUNDER && $state != ACCOUNT_MANAGE_NAME_VICE_FOUNDER) {
	itoast('没有操作权限！', referer(), 'error');
}

if (checksubmit()) {
	$user_founder = array(
		'username' => trim($_GPC['username']),
		'password' => trim($_GPC['password']),
		'repassword' => trim($_GPC['repassword']),
		'remark' => $_GPC['remark'],
		'groupid' => intval($_GPC['groupid']),
		'starttime' => TIMESTAMP,
		'endtime' => intval($_GPC['timelimit']),
		'vice_founder_name' => trim($_GPC['vice_founder_name'])
	);

	$user_add = user_info_save($user_founder);
	if (is_error($user_add)) {
		itoast($user_add['message'], '', '');
	}
	itoast($user_add['message'], url('user/edit', array('uid' => $user_add['uid'])), 'success');
}

$groups = user_group();

template('user/create');