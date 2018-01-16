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

if($_W['username']=='admin'){
	$condition=array();
	$condition_clo='where 1=1';
	
	if(isset($_GPC['username']) && $_GPC['username']!=''){
		 $condition_clo.=" and username=:username";   
		 $condition[':username']=$_GPC['username'];  
	}
	
	
}else{
	$condition = array();
	$condition_clo=" where username=:username";  
 	$condition[':username']=$_W['username'];
} 


if(checksubmit('query')){  
	
	if(isset($_GPC['chanceMode']) && $_GPC['chanceMode']!=''){
		$condition_clo.=' and chanceMode=:chanceMode'; 
		$condition[':chanceMode']=$_GPC['chanceMode'];
	}
	
	if(isset($_GPC['chanceType']) && $_GPC['chanceType']!=''){
		$condition_clo.=' and chanceType=:chanceType';
		$condition[':chanceType']=$_GPC['chanceType'];
	}
	if(isset($_GPC['serialNumber']) && $_GPC['serialNumber']!=''){
		 $condition_clo.=" and serialNumber=:serialNumber";   
		 $condition[':serialNumber']=$_GPC['serialNumber'];  
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
			$condition[':starttime'] = date("Y-m-d H:i:s",$starttime);
			$condition_clo .= " AND chanceTime >= :starttime ";
		}
		if (!empty($endtime)) { 
			$condition[':endtime'] = date("Y-m-d H:i:s",$endtime.' 23:59:59');
			$condition_clo .= " AND chanceTime <= :endtime";
		} 
		 
	} 
	
}  
$limit=" LIMIT " . ($pindex - 1) * $psize .',' .$psize;
$sql="SELECT * FROM ".tablename('fz_ye_detail').$condition_clo." order by chanceTime desc ".$limit;

//var_dump($sql);

$res = pdo_fetchall($sql,$condition,'');  
 

$sql_total='SELECT COUNT(*) FROM ' . tablename('fz_ye_detail') . $condition_clo;
$total = pdo_fetchcolumn($sql_total, $condition);
$pager = pagination($total, $pindex, $psize);


$sql_money='SELECT SUM(chanceMoney) as total_money FROM ' . tablename('fz_ye_detail') . $condition_clo;
$total_money = pdo_fetch($sql_money, $condition); 
if(empty($total_money['total_money'])){
	$total_money['total_money']=0;
}

$userBalance=$_W['user']['balance'];
$userLeijie=$_W['user']['leiji'];

include $this->template('walletManager'); 


