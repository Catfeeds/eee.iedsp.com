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
$condition = array();
$condition_clo=" where 1=1";   
if(checksubmit('query')){  
	
	if(isset($_GPC['txmode']) && $_GPC['txmode']!=''){
		$condition_clo.=' and txmode=:txmode'; 
		$condition[':txmode']=$_GPC['txmode'];
	}
	
	if(isset($_GPC['txstate']) && $_GPC['txstate']!=''){
		$condition_clo.=' and txstate=:txstate';
		$condition[':txstate']=$_GPC['txstate'];
	}
	if(isset($_GPC['username']) && $_GPC['username']!=''){
		 $condition_clo.=" and username=:username";   
		 $condition[':username']=$_GPC['username'];  
	} 
	
	if (!empty($_GPC['time']['start'])) {
		$starttime = strtotime($_GPC['time']['start']);
		$endtime = strtotime($_GPC['time']['end']);
		$endtime = !empty($endtime) ? $endtime + 86399 : 0; 
		
		if (!empty($starttime)) {
			$condition[':starttime'] = date("Y-m-d H:i:s",$starttime);
			$condition_clo .= " AND addtime >= :starttime ";
		}
		if (!empty($endtime)) { 
			$condition[':endtime'] = date("Y-m-d H:i:s",$endtime.' 23:59:59');
			$condition_clo .= " AND addtime <= :endtime";
		} 
		 
	} 
	
}  
$limit=" LIMIT " . ($pindex - 1) * $psize .',' .$psize;
$sql="SELECT * FROM ".tablename('fz_tx').$condition_clo." order by addtime desc ".$limit;

//var_dump($sql);

$res = pdo_fetchall($sql,$condition,'');  
 

$sql_total='SELECT COUNT(*) FROM ' . tablename('fz_tx') . $condition_clo;
$total = pdo_fetchcolumn($sql_total, $condition);
$pager = pagination($total, $pindex, $psize);


$sql_money='SELECT SUM(txAmount) as total_money FROM ' . tablename('fz_tx') . $condition_clo;
$total_money = pdo_fetch($sql_money, $condition); 
if(empty($total_money['total_money'])){
	$total_money['total_money']=0;
}


include $this->template('txManager'); 


