<?php 

global $_W,$_GPC;
load()->func('tpl'); 
$op = $_GPC['op'] ? trim($_GPC['op']) : 'display';
if($op == 'display'){

	echo 1;
	$pindex = max(1, intval($_GPC['page']));
	$psize = 20; 

}

include $this->template('adv'); 