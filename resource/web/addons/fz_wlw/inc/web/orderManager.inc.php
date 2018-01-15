<?php 

global $_W,$_GPC; 
$pindex = max(1, intval($_GPC['page']));
$psize = 20; 
 
if(!empty($_GPC['delId'])){ 
	$delId=$_GPC['delId'];
	if($delId!=''){
    	//$result = pdo_delete('fz_package', array('id' => $delId)); 
    }	
	
	if (!empty($result)) { 
	   message('删除成功');  
	}else{
	   message('删除失败');   
	}   
}

if(!empty($_GPC['setPayStateId'])){ 
	$orderId=$_GPC['setPayStateId'];
	if($orderId!=''){
		 $order = pdo_get('fz_order', array('id' =>$orderId));
		 
		 if($order['paystate']=='1' && $order['paysend']!='2'){ 
		 	
		 	$data['paysend']='5';
		 	$data['paystate']=3;
		 	$result = pdo_update('fz_order', $data, array('id' => $orderId));  
		 	
		 }
		 
    	 
    }	
	
	if (!empty($result)) { 
	   message('提交成功');  
	}else{
	   message('提交失败');   
	}   
}

if($_W['username']=='admin'){
	$condition=array();
	$condition_clo='where 1=1';
	
	if(isset($_GPC['username']) && $_GPC['username']!=''){
		 $condition_clo.=" and username=:username";   
		 $condition[':username']=$_GPC['username'];  
	}
	
	
}else{
	$condition = array(':uniacid'=>$_W['uniacid']);
	$condition_clo='where uniacid=:uniacid and username=:username';
	$condition[':username']=$_W["username"]; 
} 


if(checksubmit('query')){  
	
	if(isset($_GPC['paystate']) && $_GPC['paystate']!=''){
		$condition_clo.=' and paystate=:paystate'; 
		$condition[':paystate']=$_GPC['paystate'];
	}
	
	if(isset($_GPC['paysend']) && $_GPC['paysend']!=''){
		$condition_clo.=' and paysend=:paysend';
		$condition[':paysend']=$_GPC['paysend'];
	}
	if(isset($_GPC['query_id']) && $_GPC['query_id']!=''){
		 $condition_clo.=" and id=:query_id";   
		 $condition[':query_id']=$_GPC['query_id'];  
	}
	
	if(isset($_GPC['devNum']) && $_GPC['devNum']!=''){
		 $condition_clo.=" and devNum=:devNum";   
		 $condition[':devNum']=$_GPC['devNum'];  
	}
	
	if (!empty($_GPC['time']['start'])) {
		$starttime = strtotime($_GPC['time']['start']);
		$endtime = strtotime($_GPC['time']['end']);
		$endtime = !empty($endtime) ? $endtime + 86399 : 0;
		if (!empty($starttime)) {
			$condition[':starttime'] = $starttime;
			$condition_clo .= " AND addtime >= :starttime ";
		}
		if (!empty($endtime)) { 
			$condition[':endtime'] = $endtime;
			$condition_clo .= " AND addtime <= :endtime";
		}
		 
	}
}  
$limit=" LIMIT " . ($pindex - 1) * $psize .',' .$psize;
$sql="SELECT * FROM ".tablename('fz_order').$condition_clo." order by addtime desc ".$limit;
$res = pdo_fetchall($sql, $condition); 

$sql_total='SELECT COUNT(*) FROM ' . tablename('fz_order') . $condition_clo;
$total = pdo_fetchcolumn($sql_total, $condition);
$pager = pagination($total, $pindex, $psize);

$sql_money='SELECT SUM(paymoney) as total_money,count(*) as total_count FROM ' . tablename('fz_order') . $condition_clo;
$total_money = pdo_fetch($sql_money, $condition); 
if(empty($total_money['total_money'])){
	$total_money['total_money']=0;
}
if(empty($total_money['total_count'])){
	$total_money['total_count']=0;
}

//var_dump($pager);exit; 
 
include $this->template('orderManager'); 


