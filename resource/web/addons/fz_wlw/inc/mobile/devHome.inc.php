<?php  
 global $_W,$_GPC; 
 if(!empty($_GPC['logout'])){
 	 isetcookie('__userid', '', -10000);
 	 $forward = './index.php?c=entry&do=devLogin&m=fz_wlw&i='.$_W['uniacid'];
 	 message("安全退出", $forward); exit;
 }

 if(empty($_COOKIE[$_W['config']['cookie']['pre'].'__userid'])){
 	$forward = './index.php?c=entry&do=devLogin&m=fz_wlw&i='.$_W['uniacid'];
 	 message("您还没有登录", $forward);exit;
 }
  
 
 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $devuser = pdo_get('users', array('uid' =>$uid)); 
 
 //查询我拥有的公众号
 //select count(a.id) from ims_uni_account_users a,ims_account b where a.uniacid=b.uniacid and b.isdeleted!=1 and a.uid=50
 if($uid=='1'){
 	$uni_count=pdo_fetch("select count(uniacid) as COUNT from ims_account where isdeleted!=1");
 }
 else{
 	$uni_count=pdo_fetch("select count(a.id) as COUNT from ims_uni_account_users a,ims_account b  where a.uniacid=b.uniacid and b.isdeleted!=1 and a.uid=".$uid);
 }
 
// var_dump($_W['openid']);
 //$res = pdo_fetchall("select a.* from ".tablename('fz_dev_info')." a,".tablename('users')." b where a.username=b.username and a.uniacid=:uniacid and b.levelstr like '".$devuser['levelstr']."%'", $condition, 'id');
 $devOnline = pdo_fetch("SELECT count(a.id) as COUNT FROM ".tablename('fz_dev_info')." as a,".tablename('users')." b WHERE a.bkTime is not null and a.bkTime>(".time()."-a.heartbeat) and a.username=b.username and b.levelstr like '".$devuser['levelstr']."%' ", array());
 $online=$devOnline['COUNT']; 

 $devUnOnline = pdo_fetch("SELECT count(a.id) as COUNT FROM ".tablename('fz_dev_info')." as a,".tablename('users')." b WHERE (a.bkTime is null or a.bkTime<=(".time()."-a.heartbeat)) and a.username=b.username and b.levelstr like '".$devuser['levelstr']."%' ", array());
 $unOnline=$devUnOnline['COUNT'];
 
 //查询今日销量
//$beginToday = mktime(0,0,0,date('m'),date('d'),date('Y'));
//$endToday = mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1; 

$beginToday = date('Y-m-d 00:00:00');
$endToday = date('Y-m-d H:i:s');

 $sql_day_order="select count(id) as COUNT,sum(chanceMoney) as totalMoney from ims_fz_ye_detail where chanceType=1 and chanceTime>='$beginToday' and chanceTime<='$endToday' and username='".$devuser['username']."'";
 $day_order=pdo_fetch($sql_day_order);  
 if(empty($day_order['totalMoney'])){
 	$day_order['totalMoney']=0;
 }
// var_dump($sql_day_order);exit;
 $userHead='/app/resource/sui/img/head_default.png';
  $nickName='无';
 //头像
 if(!empty($_W['member']['uid'])){
 	$wxUser= pdo_fetch("select avatar,nickname from ims_mc_members where uid=".$_W['member']['uid']); 
 	$userHead=$wxUser['avatar'];
 	$nickName=$wxUser['nickname'];
 }
 
include $this->template('devHome'); 
?>