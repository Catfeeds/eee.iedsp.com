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
 	
 	$password_old = user_hash($_GPC['oldpwd'], $user['salt']);
	 if ($user['password'] != $password_old) {
			message('原密码错误，请重新填写！');
	 } 
 	
 	$members = array( 
			'password' => user_hash($_GPC['newpwd'], $user['salt'])
	 );
	 $result = pdo_update('users', $members, array('uid' => $uid)); 
	 message('修改成功！', '', 'success');
 }
 
  
include $this->template('updatePwd');
?>