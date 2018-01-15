<?php 

 global $_W,$_GPC; 
 

 if($_GPC['devid']){ 
    $dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
 } 
 else{
 	include $this->template('devList');  
 	exit;
 } 
 
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

$condition = array(':uniacid'=>$_W['uniacid']);
	$condition_clo='where uniacid=:uniacid and devNum=:devNum';
	$condition[':devNum']=$dev['Id']; 


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

//var_dump($pager);exit; 
 
include $this->template('orderList'); 


