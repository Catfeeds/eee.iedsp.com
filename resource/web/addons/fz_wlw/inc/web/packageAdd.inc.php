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
 }else{
 	$mode['tcprice']=0;
 	$mode['signnum']=1;
    $mode['stocks']=-1;
 	$mode['prewarning_value']=0;
 	$mode['sellnum']=-1;
 	$mode['quota']=-1;
 	$mode['psort']=-1;
 	$mode['countdown']=0;
    $mode['isyuyue']=1;
 	$mode['adv_hits']=1;
 }
 
$types = pdo_fetchall("SELECT typename,id FROM ".tablename('fz_packtype')." WHERE devid=:devid", array('devid' =>$_GPC['devid'] ));
 
if(checksubmit('save')){ 
    $data['uniacid']          =$_W['uniacid'];
    $data['username']         =$_W['username']; 
    $data['devid']            =$_GPC['devid']; 
    
    $data['tcname']           =$_GPC['tcname'];
    $data['tcprice']          =$_GPC['tcprice'];
    $data['signnum']          =$_GPC['signnum'];
    $data['stocks']           =empty($_GPC['stocks'])?-1:$_GPC['stocks'];
    $data['prewarning_value'] =empty($_GPC['prewarning_value'])?0:$_GPC['prewarning_value'];
    $data['adv_hits'] =empty($_GPC['adv_hits'])?0:$_GPC['adv_hits'];
    $data['sellnum']          =empty($_GPC['sellnum'])?0:$_GPC['sellnum'];
    $data['quota']            =empty($_GPC['quota'])?-1:$_GPC['quota'];
    $data['issend']           =$_GPC['issend'];
    $data['packimg']          =$_GPC['packimg'];
    if($_GPC['packimg']==''){
    	$data['packimg']='../app/resource/sui/img/head_default.png';
    }
    $data['psort']     =empty($_GPC['psort'])?0:$_GPC['psort'];
    $data['packdes']   =$_GPC['packdes'];
    $data['psort']     =$_GPC['psort']; 
    $data['countdown'] =$_GPC['countdown']; 
    $data['isyuyue']   =$_GPC['isyuyue']; 
    // $data['typeid'] =$_GPC['typeid'];  
    
    $data['isgz']      =$_GPC['isgz']; 
    $data['isadvpay']  =$_GPC['isadvpay']; 
    $data['advImg']    =$_GPC['advImg']; 
    $data['advUrl']    =$_GPC['advUrl']; 
    $data['ptype']     =$_GPC['ptype']; 
    
    $packageid         =$_GPC['packageid'];
    
    if($packageid!=''){
    	$result = pdo_update('fz_package', $data, array('id' => $packageid));  
    }
    else{
    	$data['addtime']=time();
    	$result = pdo_insert('fz_package', $data); 
    } 
    
    if (!empty($result)) { 
	   message('保存成功');  
	}else{
	   message('保存失败');   
	}  
} 

include $this->template('packageAdd'); 