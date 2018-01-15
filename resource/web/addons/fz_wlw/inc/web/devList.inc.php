<?php 

global $_W,$_GPC; 

if($_W['username']=='admin'){
	$fz_devuse = pdo_fetchall("SELECT * FROM ".tablename('fz_devuse')." WHERE isuse=1 order by id asc");	 
}

$cur_levelstr=$_W['user']['levelstr']; 
$ssuser = pdo_fetchall("SELECT username,uid FROM ".tablename('users')." WHERE levelstr LIKE :levelstr", array(':levelstr' =>$cur_levelstr.'%' ));

$pindex = max(1, intval($_GPC['page']));
$psize = 12; 

if(!empty($_GPC['delId'])){ 
	if($_W['username']!='admin'){
		echo '出错';exit;
	}
	$delId=$_GPC['delId'];
	if($delId!=''){
		$result = pdo_delete('fz_dev_info', array('id' => $delId)); 
		if($result){
			pdo_delete('fz_package', array('devid' => $delId)); 
		}
	}	
	
	if (!empty($result)) { 
		message('删除成功');  
	}else{
		message('删除失败');    
	}   
}

if(checksubmit('copy') && !empty($_GPC['devid'])){ 
	if($_W['username']!='admin'){
		echo '出错';exit;
	}
	
	$exit = pdo_get('fz_dev_info', array('devNum' =>$_GPC['devNum']));
	if(!empty($exit)){
		message("设备ID已经存在");
	}
	
	$devid=$_GPC['devid'];
	$dev = pdo_get('fz_dev_info', array('Id' =>$devid)); 
	$dev['Id']='';
	$dev['devNum']=$_GPC['devNum'];
	$dev['devname']=$_GPC['devname'];
	$dev['addtime']=time();  
	$dev['bkTime']='';
	$dev['devip']=''; 
	$result = pdo_insert('fz_dev_info', $dev);
	
	if($result){
		$newDevid = pdo_insertid();
		$package_list = pdo_fetchall("SELECT * FROM ".tablename('fz_package')." WHERE devid=:devid", array('devid' =>$devid));
		foreach($package_list as $mode){
			$mode['id']='';
			$mode['addtime']=time(); 
			$mode['devid']=$newDevid;  
			$result = pdo_insert('fz_package', $mode); 
		}
	}
	$data['isuse']=2;
	pdo_update('fz_devuse', $data, array('devnum' => $_GPC['devNum']));    
	
	
	if($result){
		message('复制成功');   
	} 
	else{
		message('复制失败');   
	}
}

if(checksubmit('changeDevUser') && !empty($_GPC['changeDevs'])){ 
	$changeDevs=$_GPC['changeDevs']; 
	$newUsername=$_GPC['newUsername']; 
	$newDevname=$_GPC['newDevname']; 
	if(empty($newUsername)){
		message('没有用户'); exit;
	}
	$ids_arr = explode('#',$changeDevs); 
	
	foreach($ids_arr as $id){
		$data['username']=$newUsername;
		
		if(!empty($newDevname)){
			$data['devname']=$newDevname; 
		}
		
		$result = pdo_update('fz_dev_info', $data, array('Id' => $id));  
	}
	
	if($result){
		message('转移成功,请刷新');   
	} 
	else{
		message('转移失败,请刷新');   
	}
}

$condition = array('uniacid'=>$_W['uniacid']);
// $condition_clo="where a.uniacid=:uniacid and a.username=b.username and b.levelstr LIKE '".$cur_levelstr."%'";
$condition_clo="where a.uniacid=:uniacid and a.username=b.username";

if(checksubmit('query')){ 
	
	if(isset($_GPC['dstate']) && $_GPC['dstate']!=''){
		$condition_clo.=' and a.dstate=:dstate'; 
		$condition[':dstate']=$_GPC['dstate'];
	}
	
	if(isset($_GPC['devname']) && $_GPC['devname']!=''){
		$condition_clo.=' and a.devname=:devname'; 
		$condition[':devname']=$_GPC['devname'];
	}
	
	if($_W['role'] != 'founder' && isset($_GPC['username']) && $_GPC['username']!=''){
		$condition_clo.=' and a.username=:username'; 
		$condition[':username']=$_GPC['username']; 
	}
	if(isset($_GPC['devNo']) && $_GPC['devNo']!=''){
		$condition_clo.=' and a.Id=:devNo'; 
		$condition[':devNo']=$_GPC['devNo']; 
	}

}  
if(!isset($_GPC['status'])){
	$condition_clo .= ' and (a.bkTime > unix_timestamp(now()) - a.heartbeat)';
}else{
	$condition_clo .= ' and (a.bkTime < unix_timestamp(now()) - a.heartbeat)';
}

$limit=" LIMIT " . ($pindex - 1) * $psize .',' .$psize;
$sql="SELECT a.* FROM ims_fz_dev_info a,ims_users b ".$condition_clo." order by a.Id desc ".$limit;
$res = pdo_fetchall($sql, $condition); 


$sql_total='SELECT COUNT(*) FROM ims_fz_dev_info a,ims_users b '. $condition_clo;
$total = pdo_fetchcolumn($sql_total, $condition);
$pager = pagination($total, $pindex, $psize);

//$res = pdo_fetchall("select a.* from ".tablename('fz_dev_info')." a,".tablename('users')." b where a.username=b.username and a.uniacid=:uniacid and b.levelstr like '".$_W['user']['levelstr']."%'", $condition, 'id');
//var_dump($pager);exit;  

include $this->template('devList'); 


