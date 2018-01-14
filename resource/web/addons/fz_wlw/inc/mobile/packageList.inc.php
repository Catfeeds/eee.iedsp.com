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
$condition = array(':devid'=>$_GPC['devid']);
$condition_clo=' devid=:devid '; 
  
if(!empty($_GPC['packageid'])){
	$condition_clo.=' and packageid=:packageid';
	$condition[':packageid']=$_GPC['packageid'];  
} 

$res = pdo_fetchall("SELECT * FROM ".tablename('fz_package')."  WHERE ".$condition_clo." order by psort desc", $condition);
  

include $this->template('packageList'); 


