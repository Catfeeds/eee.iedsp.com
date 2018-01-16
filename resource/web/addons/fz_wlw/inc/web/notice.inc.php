<?php 

global $_W,$_GPC; 
load()->func('tpl'); 

if($_GPC['devid']){ 
	$dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
}else{
	message('',url('site/entry/devList', array('m' => 'fz_wlw')),'');
}
$notice_setting = array();
if(!empty($dev['notice_setting'])){
	$notice_setting = unserialize($dev['notice_setting']);
}

if(checksubmit('submit')){
	$data['prewarning_notice_tpl_id'] = $_GPC['prewarning_notice_tpl_id'];
	$data['prewarning_notice_openid'] = $_GPC['prewarning_notice_openid'];
	$data['offline_notice_tpl_id'] = $_GPC['offline_notice_tpl_id'];
	$data['offline_notice_openid'] = $_GPC['offline_notice_openid'];

	$notice_setting = serialize($data);
	$res = pdo_update('fz_dev_info',array('notice_setting'=>$notice_setting),array('Id'=>$_GPC['devid']));
	if($res){
		message('保存成功','','success');
	}else{
		message('保存失败','','error');
	}
}
include $this->template('notice');