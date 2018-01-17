<?php
/**
 * 移动支付设备模块微站定义
 *
 * @author 锋哥
 * @url http://www.fengzhi360.com/
 */
defined('IN_IA') or exit('Access Denied');
require IA_ROOT.'/addons/fz_wlw/inc/core/function.php';
class Fz_wlwModuleSite extends WeModuleSite {
	

	// public function doWebAdvManager(){
	// 	echo 1;
	// }
	/**
	 * //添加设备
	public function doWebDevAdd(){
	   
	    global $_W,$_GPC; 
	    load()->func('tpl'); 
	    
	   // $cur_user = pdo_get('users', array('uid' => $_W['uid']));
	    
	    $cur_levelstr=$_W['user']['levelstr'];
	    
	    $ssuser = pdo_fetchall("SELECT username,uid FROM ".tablename('users')." WHERE levelstr LIKE :levelstr", array(':levelstr' =>$cur_levelstr.'%' ));
		//
	    //查询我添加的用户
	   //  $user =pdo_getall('users', array('levelstr' => 2)); 
	   //查询公众号 select a.name,a.uniacid from ims_uni_account a,ims_uni_account_users b where a.uniacid=b.uniacid and b.uid=50
	   
	    $uniList = pdo_fetchall("SELECT a.name,a.uniacid FROM ".tablename('uni_account')." a,".tablename('users')." b,ims_uni_account_users c  WHERE a.uniacid=b.uniacid and c.uid=b.uid and c.role='owner' and b.commendid=:uid", array(':uid' =>$_W['uid']));
	    if(empty($uniList)){
	    	//$uniList=array('name'=>$_W['uniaccount']['name'],'uniacid'=>$_W['uniacid']);
	    }
	     
	  // var_dump($_W['uniaccount']['name']); exit;
 
	    
	    if($_GPC['devid']){ 
	    	$dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
	    }  
	    else {
	    	$dev['bustime']='00:00-24:00';
	    	$dev['dsort']=0;
	    	$dev['cycle']=40; 
	    	$dev['interval']=40;
	    	$dev['heartbeat']=80;
	    	$dev['giftnum']=-1;
	    	
	    }
	     
	    
	    if(checksubmit('save')){ 
	    	 //var_dump($_GPC);exit;     
	    	
	    	if($_GPC['username']==''){
	    		message("用户名为空");
	    	}
	    	
	    	$data['uniacid']=$_GPC['uniacid']; 
	    	$data['uid']=$_W['uid']; 
	    	
	    	$data['username']=$_GPC['username']; 
	    	$data['devname']=$_GPC['devname'];
	    	$data['devNum']=$_GPC['devNum'];
	    	$data['devregcode']=$_GPC['devregcode'];
	    	$data['unuser']=$_GPC['hzunuser']; 
	    	$data['devtype']=$_GPC['devtype'];
	    	$data['cycle']=$_GPC['cycle'];
	    	$data['interval']=$_GPC['interval'];
	    	$data['heartbeat']=$_GPC['heartbeat'];
	    	$data['giftnum']=$_GPC['giftnum'];
	    	$data['devlogo']=$_GPC['devlogo'];
	    	if($_GPC['devlogo']=='')
	    	{
	    		$data['devlogo']='../app/resource/sui/img/bann5.jpg';
	    	}
	    	$data['telnum']=$_GPC['telnum'];
	    	$data['bustime']=$_GPC['bustime1'].'-'.$_GPC['bustime2'];
	    	
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
	    	if($live_str==''){
	    		$data['live']='../app/resource/sui/img/bann5.jpg';
	    	}
	    	
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
	    		
		    	$exit = pdo_get('fz_dev_info', array('devNum' =>$_GPC['devNum']));
		    	if(!empty($exit)){
		    		message("设备ID已经存在");
		    	} 
	    		
		    	$result = pdo_insert('fz_dev_info', $data); 
	    	} 
	    	
	    	if (!empty($result)) { 
				   message('保存成功');  
				}else{
				   message('保存失败');   
				} 
	    	
	    } 
	    
	if($_W['username']=='admin'){
		$fz_devuse = pdo_fetchall("SELECT * FROM ".tablename('fz_devuse')." WHERE isuse=1 order by id asc");	 
	 }
	    
        include $this->template('devAdd'); 
	}
	 */
	 
	/*
	public function doWebDevList(){
		
		 global $_W,$_GPC; 
		
		 $condition=array(':uniacid'=>$_W['uniacid']);
		
		 if(checksubmit('submit')=='del'){ 
		 	
		 } 
		 
		 //$condition=$condition+array(':uniacid'=>$_W['uniacid']);
		 
		 $limit = array(1,100);
		 $total=0;
		// $res = pdo_getslice('fz_dev_info', $condition, $limit , $total , array() , '' , array('id'));

		 $res = pdo_fetchall("select a.* from ".tablename('fz_dev_info')." a,".tablename('users')." b where a.username=b.username and a.uniacid=:uniacid and b.levelstr like '".$_W['user']['levelstr']."%'", $condition, 'id');
		 
	//	 var_dump($res);exit; 
		 
		 include $this->template('devList'); 
	}
	*/
  
	
	public function doMobileGnfm() {
		echo '33';
	}
	public function doWebGzlb() {
		//这个操作被定义用来呈现 规则列表
	}
	 
	public function doMobileWznav() {
		//这个操作被定义用来呈现 微站首页导航图标
	}
	public function doMobileGrnav() {
		//这个操作被定义用来呈现 微站个人中心导航
	}
	public function doMobileWzkjnav() {
		//这个操作被定义用来呈现 微站快捷功能导航
	}


}