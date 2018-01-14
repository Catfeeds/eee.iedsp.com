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
    $packtype = pdo_get('fz_recard', array('id' =>$_GPC['packtypeid'])); 
  }else{
  	$packtype['typesort']=10;
  }

if(checksubmit('save')){ 
	$data['uniacid']=$_W['uniacid'];
    $data['username']=$_W['username'];
    
    $data['amount']=$_GPC['amount'];
     $data['discount']=$_GPC['discount'];
      $data['typename']=$_GPC['typename'];
    $data['typesort']=$_GPC['typesort'];
    $data['addtime']=time();
    $data['devid']=$_GPC['devid']; 
    
    $packtypeid=$_GPC['packtypeid'];
    
    if($packtypeid!=''){
    	$result = pdo_update('fz_recard', $data, array('id' => $packtypeid));  
    }
    else{
    	$result = pdo_insert('fz_recard', $data);  
    } 
    
    if (!empty($result)) { 
	   message('保存成功');  
	}else{
	   message('保存失败');   
	}  
}
else{
	
}

if(!empty($_GPC['delId'])){ 
	$delId=$_GPC['delId'];
	if($delId!=''){
    	$result = pdo_delete('fz_recard', array('id' => $delId)); 
    }	
	
	if (!empty($result)) { 
	   message('删除成功');  
	}else{
	   message('删除失败');   
	}   
} 

$condition = array('devid'=>$_GPC['devid']); 
$condition_clo.=' devid=:devid';   
if(checksubmit('query')){ 
	// var_dump($_GPC);exit; 
	$condition_clo.=' and typename LIKE :typename';  
	$condition['typename']='%'.$_GPC['typename'].'%'; 
	
}
$res = pdo_fetchall("SELECT * FROM ".tablename('fz_recard')." WHERE ".$condition_clo." order by typesort desc", $condition);
//$res = pdo_getall('fz_packtype',$condition,array(),'','typesort DESC');
//var_dump($res); 
 
include $this->template('reCardList'); 


