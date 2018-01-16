<?php 
 global $_W,$_GPC; 

 $buyUser = $_W['member']['uid'];

 $op = $_GPC['op'] ? trim($_GPC['op']) : 'display';

 if($op == 'hit'){
 	$id = intval($_GPC['id']);
 	$adv = pdo_get('fz_advs',array('id'=>$id));

 	if(empty($adv)){
 		message(array('errno' => -1, 'message' => '无效广告'), '', 'ajax');
 	}

 	$data['uniacid'] = $_W['uniacid'];
 	$data['aid'] = $id;
 	$data['uid'] = $buyUser;
 	$data['createtime'] = time();
 	pdo_insert('fz_adv_hit',$data);

 	pdo_update('fz_advs',array('hits'=>$adv['hits'] + 1),array('id'=>$id));
 	message(array('errno' => 1, 'message' => '无效广告'), '', 'ajax');
 } 