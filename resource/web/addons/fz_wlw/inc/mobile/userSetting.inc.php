<?php  
 global $_W,$_GPC; 
  
 if(!empty($_GPC['logout'])){
 	 isetcookie('__userid', '', -10000);
 	 $forward = './index.php?c=entry&do=devLogin&m=fz_wlw';
 	 message("安全退出", $forward); exit;
 }

 if(empty($_COOKIE[$_W['config']['cookie']['pre'].'__userid'])){
 	$forward = './index.php?c=entry&do=devLogin&m=fz_wlw';
 	 message("您还没有登录", $forward);exit;
 }
 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $user = pdo_get('users', array('uid' =>$uid)); 

// var_dump($_W['openid']);

 if(checksubmit('submit')=='save'){ 
 	
 	 $profile['realname']=$_GPC['realname'];
 	 $profile['nickname']=$_GPC['nickname']; 
 	 $profile['qq']=$_GPC['qq'];
 	
 	 pdo_update('users_profile', $profile, array('uid' => $uid));
 }
 
 $profile = pdo_fetch('SELECT * FROM '.tablename('users_profile').' WHERE `uid` = :uid LIMIT 1',array(':uid' =>$uid));
 
include $this->template('userSetting'); 
?>