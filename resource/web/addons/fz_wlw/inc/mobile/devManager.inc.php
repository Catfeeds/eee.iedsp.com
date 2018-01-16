<?php  
global $_W,$_GPC; 

if(empty($_COOKIE[$_W['config']['cookie']['pre'].'__userid'])){
	$forward = './index.php?c=entry&do=devLogin&m=fz_wlw&i='.$_W['uniacid'];
	message("您还没有登录", $forward);exit; 
}
$uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid']; 
$devuser = pdo_get('users', array('uid' =>$uid)); 

$condition=array(':uniacid'=>$_W['uniacid']);
$where = '';
if($devuser['username'] != 'admin'){
	$where = ' and a.username= "'.$devuser['username'].'"';
}  

$condition_clo="";
$needCount=15; 
$startCount=0;
$needPage=1;
if(isset($_GPC['needPage'])){
	$startCount=(intval($_GPC['needPage'])-1)*$needCount;  
	$needPage=$_GPC['needPage'];
}

$res = pdo_fetchall("select a.* from ".tablename('fz_dev_info')." a,".tablename('users')." b where a.username=b.username  {$where} order by a.id desc limit ".$startCount.",".$needCount, $condition, 'id');

include $this->template('devManager'); 
?>