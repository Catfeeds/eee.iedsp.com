<?php  
 global $_W,$_GPC; 
 load()->func('tpl'); 
 
 if(empty($_COOKIE[$_W['config']['cookie']['pre'].'__userid'])){
 	$forward = './index.php?c=entry&do=devLogin&m=fz_wlw&i='.$_W['uniacid'];
 	 message("您还没有登录", $forward);exit;
 }
 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $devuser = pdo_get('users', array('uid' =>$uid)); 

 
 $cur_levelstr=$devuser['levelstr'];
 $ssuser = pdo_fetchall("SELECT username,uid FROM ".tablename('users')." WHERE levelstr LIKE :levelstr", array(':levelstr' =>$cur_levelstr.'%' ));
		 
 $devid=$_GPC['devid']; 
 
 $dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid']));
 $lives=explode(';',$dev['live']);
 
 
  if(checksubmit('submit')=='save'){ 
    // var_dump($_GPC);exit;   
	
   // $data['uniacid']=$_W['uniacid'];
   // $data['uid']=$_W['uid'];
    
    $data['username']=$_GPC['username']; 
    
    $data['devname']=$_GPC['devname'];
   // $data['devNum']=$_GPC['devNum'];
  //  $data['devregcode']=$_GPC['devregcode'];
    $data['unuser']=$_GPC['hzunuser']; 
    $data['devtype']=$_GPC['devtype'];
    $data['cycle']=$_GPC['cycle'];
    $data['interval']=$_GPC['interval'];
    $data['heartbeat']=$_GPC['heartbeat'];
    $data['giftnum']=$_GPC['giftnum'];
    $data['devlogo']=$_GPC['devlogo'];
    $data['telnum']=$_GPC['telnum'];
    $data['bustime']=$_GPC['bustime']; 
    $data['feature']=$_GPC['feature'];
    
    $live_count=count($_GPC['live']);
    $live_str='';
    for($i=0;$i<$live_count;$i++){
    	$live_str.=$_GPC['live'][$i];
    	if($i<$live_count-1){ 
    		$live_str.=';';   
    	}
    }
    
    $data['live']=$live_str;
    
    $data['province']=$_GPC['addrstr']['province']; 
    $data['city']=$_GPC['addrstr']['city']; 
    $data['area']=$_GPC['addrstr']['district'];
    $data['address']=$_GPC['address'];
    
    $data['lng']=$_GPC['mapstr']['lng'];
    $data['lat']=$_GPC['mapstr']['lat'];   
    $data['busemail']=$_GPC['busemail'];
    
    $data['emailonoff']=$_GPC['emailonoff'];
    $data['dsort']=$_GPC['dsort'];
    $data['dstate']=$_GPC['dstate'];  
    $data['addtime']=time();
    
    $devid=$_GPC['id'];
    if($devid!=''){
    	$result = pdo_update('fz_dev_info', $data, array('Id' => $devid));  
    }
    else{
    //	$result = pdo_insert('fz_dev_info', $data); 
    } 
    
    if (!empty($result)) { 
    	$forward = './index.php?c=entry&do=devManager&m=fz_wlw&username=&i='.$_W['uniacid'];
		   message('保存成功',$forward);  
		}else{
		   message('保存失败');   
		} 
    
    } 
 
include $this->template('devSet'); 
?>