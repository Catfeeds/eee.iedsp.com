<?php 

 global $_W,$_GPC; 
 load()->func('tpl'); 

 if($_GPC['devid']){ 
    $dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
 } 
 else{
 	include $this->template('devList');  
 	exit;
 }

 if($_GPC['packageid']){ 
    $mode = pdo_get('fz_package', array('id' =>$_GPC['packageid'])); 
 }
 
$types = pdo_fetchall("SELECT typename,id FROM ".tablename('fz_packtype')." WHERE devid=:devid", array('devid' =>$_GPC['devid'] ));
 
 
if(checksubmit('submit')=='save'){ 
	$data['uniacid']=$_W['uniacid'];
    $data['username']=$_W['username']; 
    $data['devid']=$_GPC['devid']; 
    
    $data['tcname']=$_GPC['tcname'];
    $data['tcprice']=$_GPC['tcprice'];
    $data['signnum']=$_GPC['signnum'];
    $data['stocks']=empty($_GPC['stocks'])?-1:$_GPC['stocks'];
    $data['sellnum']=empty($_GPC['sellnum'])?0:$_GPC['sellnum'];
    $data['quota']=empty($_GPC['quota'])?-1:$_GPC['quota'];
    
    $data['countdown']=empty($_GPC['countdown'])?0:$_GPC['countdown'];
    $data['isyuyue']=empty($_GPC['isyuyue'])?1:$_GPC['isyuyue'];
   
    
    $data['issend']=$_GPC['issend'];
    $data['packimg']=$_GPC['packimg'];
	if($_GPC['packimg']==''){
    	$data['packimg']='../app/resource/sui/img/head_default.png';
    }
    $data['psort']=empty($_GPC['psort'])?0:$_GPC['psort'];
    $data['packdes']=$_GPC['packdes'];
    $data['psort']=$_GPC['psort']; 
  //  $data['typeid']=$_GPC['typeid'];  
    
    $data['isgz']=$_GPC['isgz']; 
    $data['isadvpay']=$_GPC['isadvpay']; 
    $data['advImg']=$_GPC['advImg']; 
    $data['advUrl']=$_GPC['advUrl']; 
    $data['ptype']=$_GPC['ptype']; 
    
    $packageid=$_GPC['packageid'];  
    
    if($packageid!=''){
    	$result = pdo_update('fz_package', $data, array('id' => $packageid));  
    }
    else{
    	 $data['addtime']=time();
    	$result = pdo_insert('fz_package', $data); 
    } 
    
    if (!empty($result)) { 
    	$forward = './index.php?c=entry&do=packageList&m=fz_wlw&devid='.$_GPC["devid"].'&i='.$_W['uniacid'];
	     message('保存成功',$forward);  
	}else{
	   message('保存失败');   
	}  
}else{
	if(empty($mode)){
		$mode['stocks']=-1;
		$mode['sellnum']=-1;
		$mode['quota']=-1;
		$mode['signnum']=1;
	}
}

include $this->template('packageAdd'); 