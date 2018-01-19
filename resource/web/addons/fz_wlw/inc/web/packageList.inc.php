<?php 

global $_W,$_GPC; 


if($_GPC['devid']){ 
	$dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
} 
else{
	include $this->template('devList');  
	exit;
}


$op = $_GPC['op'] ? $_GPC['op'] : 'display';

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


}

$res = pdo_fetchall("SELECT a.* FROM ".tablename('fz_package')." as a  WHERE ".$condition_clo." order by a.psort desc", $condition);
if($op == 'statistics'){
	$xAxis = array();
	$series = array();

	foreach($res as $key => $val){
		$xAxis[] = $val['tcname'];
		$series[] = $val['sellnum'];
	}
	$xAxis = json_encode($xAxis);
	$series = json_encode($series);
}

if($op == 'all_statistics'){

	$ids = array();
	foreach($res as $val){
		$ids[] = $val['id'];
	}
	$ids_str = implode(',', $ids);

	$startdate = $_GPC['time']['start'] ? $_GPC['time']['start'] : date('Y-m-d');
	$enddate  = $_GPC['time']['end'] ? $_GPC['time']['end'] : date('Y-m-d');

	if($startdate == $enddate){
		//按天查看,一天24小时的数据
		$start = strtotime($startdate);
		$end   = strtotime('+1 day',$start);

		$xAxis = ['0点','1点','2点','3点','4点','5点','6点','7点','8点','9点','10点','11点','12点','13点','14点','15点','16点','17点','18点','19点','20点','21点','22点','23点'];

		$field = '`packname`,`packageid`,FROM_UNIXTIME(`paytime`,"%H") as ctime,SUM(`paynum`) as total';
	}else{
		$start = strtotime($startdate);
		$end = strtotime('+1 day',strtotime($enddate));
		$days = ( $end - $start)/24/3600 + 1;
		for($i=0;$i<$days;$i++){
			$xAxis[] = date('Y-m-d',strtotime('+'.$i.' day',$start));
		}

		$field = '`packname`,`packageid`,FROM_UNIXTIME(`paytime`,"%Y-%m-%d") as ctime,SUM(`paynum`) as total';
	}

	$condtion = ' where paystate=1 and paytime>=:starttime and paytime<=:endtime and packageid in('.$ids_str.')';
	$params[':starttime'] = $start;
	$params[':endtime'] = $end;


	$sql = 'SELECT '.$field.' FROM '.tablename('fz_order').$condtion.' group by packageid,ctime';
	$list = pdo_fetchall($sql,$params);

	$legend = array();
	$series = array();

	foreach($list as $key=>$val){
		$legend[$val['packageid']] = $val['packname'];
		$series[$val['packageid']]['name'] = $val['packname'];
		$series[$val['packageid']]['type'] = 'line';
		$series[$val['packageid']]['stack'] = '总额';
		foreach($xAxis as $k => $v){
			if($val['ctime'] == $k || $val['ctime'] == $v){

				$series[$val['packageid']]['data'][$k] = $val['total'];
			}else{
				if($series[$val['packageid']]['data'][$k] != 0){
					continue;
				}
				$series[$val['packageid']]['data'][$k] = 0;
			}

		}
	}
	$legend = json_encode(array_values($legend));
	$series = json_encode(array_values($series));
	$xAxis = json_encode(array_values($xAxis));
}

include $this->template('packageList'); 


