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
 $cur_user = pdo_get('users', array('uid' =>$uid)); 

// var_dump($_W['openid']);

 if($_GPC['token']){ 
 	
 	if($cur_user['isvip']=='0'){
 		
 		message('没有添加商户的权限，请联系您的推荐人，修改成可以发展用户。');
 	}
 	
 	load()->model('user');
	$user = array();
	$user['username'] = trim($_GPC['username']);
	if(!preg_match(REGULAR_USERNAME, $user['username'])) {
		message('必须输入用户名，格式为 3-15 位字符，可以包括汉字、字母（不区分大小写）、数字、下划线和句点。');
	}
	if(user_check(array('username' => $user['username']))) {
		message('非常抱歉，此用户名已经被注册，你需要更换注册名称！');
	}
	$user['password'] = $_GPC['password'];
	if(istrlen($user['password']) < 8) {
		message('必须输入密码，且密码长度不得低于8位。');
	}
	$user['remark'] ='微信注册';
	$user['groupid'] = $cur_user['groupid'];
	$group = pdo_fetch("SELECT id,timelimit FROM ".tablename('users_group')." WHERE id = :id", array(':id' => $user['groupid']));
	if(empty($group)) {
		message('会员组不存在');
	}
	$timelimit = intval($group['timelimit']);
	$timeadd = 0;
	if($timelimit > 0) {
		$timeadd = strtotime($timelimit . ' days');
	}
	$user['starttime'] = TIMESTAMP;
	$user['endtime'] = $timeadd;
	
	//添加推荐人关系 查询当前账户
	
	$level=1;
	$levelstr=TIMESTAMP;
	if(!empty($cur_user['level'])){
		$level=intval($cur_user['level'])+1;
	}
	
	if(!empty($cur_user['levelstr'])){ 
		$levelstr=$cur_user['levelstr'].'|'.TIMESTAMP;
	}
	$user['level']=$level;
	$user['levelstr']=$levelstr;
	$user['commenduser']=$cur_user['username'];
	$user['commendid']=$cur_user['uid']; 
	$user['uniacid']=$cur_user['uniacid'];
	$user['resultnum']=0;
	
	$user['balance']=0;
	$user['leiji']=0;
	$user['freeze']=0; 
	$user['isnow']=0;
	$user['isbank']=0;
	$user['busno']='';
	
	$user['isvip']=$_GPC['isvip']; 
	
	 
	
	if(doubleval($_GPC['onefree'])<0 || doubleval($_GPC['onefree'])>=1){
		message("订单提成参数有误");
	}
	 
	$user['minmoney']=1; 
	
	$user['onefree']=$_GPC['onefree']; 
	$user['twofree']=0;
	$user['threefree']=0;
	$user['free']=0;
	
	////
	
	$uid = user_register($user);
	if($uid > 0) {
		//设置默认操作人公众号
		//获取本账户公众号
		$uniacid=$cur_user['uniacid'];
		$data['uniacid']=$uniacid;
	    $data['uid']=$uid; 
	    $data['role']='operator';
	    $data['rank']=0;  
	    $result = pdo_insert('uni_account_users', $data); 
		
		unset($user['password']);
		 $forward = './index.php?c=entry&do=userList&m=fz_wlw';
		message('用户增加成功！',$forward);
	}
	message('增加用户失败，请稍候重试或联系网站管理员解决！');
 }else{
 	
 	$user['onefree']=0;
	$user['twofree']=0;
	$user['threefree']=0;
	$user['free']=0;
	$user['minmoney']=0;
	$user['free']=0;
	$user['isvip']=0; 
 }
  
include $this->template('userAdd'); 
?>