<?php 

 global $_W,$_GPC; 
 

 if($_GPC['devid']){ 
    $dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
 } 
 else{
 	include $this->template('devList');  
 	exit;
 }

//$types = pdo_fetchall("SELECT typename,id FROM ".tablename('fz_packtype')." WHERE devid=:devid", array('devid' =>$_GPC['devid'] ));
 
 
if(!empty($_GPC['delId'])){ 
	$delId=$_GPC['delId'];
	if($delId!=''){
    	$result = pdo_delete('fz_package', array('id' => $delId)); 
    }	
	
	if (!empty($result)) { 
	   message('删除成功');  
	}else{
	   message('删除失败');   
	}   
}
$condition = array('devid'=>$_GPC['devid']);
$condition_clo=' devid=:devid';
if(checksubmit('query')){ 
	
	if(isset($_GPC['tcname'])){
		$condition_clo.=' and a.tcname LIKE :tcname';
		$condition[':tcname']='%'.$_GPC['tcname'].'%';
	}
	
//	if(!empty($_GPC['typeid'])){
//		$condition_clo.=' and a.typeid=:typeid';
//		$condition=array('typeid' =>$_GPC['typeid']); 
//	} 
}

$res = pdo_fetchall("SELECT a.* FROM ".tablename('fz_package')." as a  WHERE ".$condition_clo." order by a.psort desc", $condition);
//$res = pdo_getall('fz_packtype',$condition,array(),'','typesort DESC');
// var_dump($res); 

include $this->template('packageList'); 


