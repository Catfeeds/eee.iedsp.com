<?php 

 global $_W,$_GPC; 
 

 if($_GPC['devid']){ 
    $dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
 } 
 else{
 	include $this->template('devList');  
 	exit;
 }

  if($_GPC['packtypeid']){ 
    $packtype = pdo_get('fz_packtype', array('Id' =>$_GPC['packtypeid'])); 
 }

if(checksubmit('save')){ 
	$data['uniacid']=$_W['uniacid'];
    $data['username']=$_W['username'];
    
    $data['typename']=$_GPC['typename'];
    $data['typesort']=$_GPC['typesort'];
    $data['addtime']=time();
    $data['devid']=$_GPC['devid']; 
    
    $packtypeid=$_GPC['packtypeid'];
    
    if($packtypeid!=''){
    	$result = pdo_update('fz_packtype', $data, array('id' => $packtypeid));  
    }
    else{
    	$result = pdo_insert('fz_packtype', $data); 
    } 
    
    if (!empty($result)) { 
	   message('保存成功');  
	}else{
	   message('保存失败');   
	}  
} 

include $this->template('packtypeAdd'); 