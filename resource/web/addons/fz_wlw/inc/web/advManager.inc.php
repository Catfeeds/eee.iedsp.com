<?php 

global $_W,$_GPC;
load()->func('tpl'); 
$op = $_GPC['op'] ? trim($_GPC['op']) : 'display';
if($op == 'display'){

	$pindex = max(1, intval($_GPC['page']));
	$psize = 20;

	$condtion = ' uniacid=:uniacid';
	$params[':uniacid'] = $_W['uniacid'];

	$limit = ' LIMIT '.($pindex-1)*$psize.','.$psize;

	$order = ' order by createtime desc,displayorder desc';

	$list = pdo_fetchall('SELECT * FROM '.tablename('fz_advs').' where '.$condtion.$order.$limit,$params);
	$total = pdo_fetchcolumn('SELECT count(*) FROM '.tablename('fz_advs').' where '.$condtion,$params);
	$pager = pagination($total, $pindex, $psize);

}else if($op == 'add'){
	$id = 0;
	if(!empty($_GPC['id'])){
		$id = intval($_GPC['id']);
		$adv = pdo_get('fz_advs',array('id'=>$id));
		if(empty($adv)){
			message('参数错误','','error');
		}
	}
	if(checksubmit('submit')){
		$data['uniacid']      = $_W['uniacid'];
		$data['title']        = trim($_GPC['title']);
		$data['displayorder'] = intval($_GPC['displayorder']);
		$data['linkurl']      = trim($_GPC['linkurl']);
		$data['thumb']        = trim($_GPC['thumb']);
		$data['status']       = intval($_GPC['status']);
		$data['createtime']   = time();

		if(empty($id)){
			$res = pdo_insert('fz_advs',$data);
		}else{
			$res = pdo_update('fz_advs',$data,array('id'=>$id));
		}

		if($res){
			message('保存成功',url('site/entry/advManager', array('m' => 'fz_wlw')),'success');
		}else{
			message('保存失败','','error');
		}
	}
} else if ($op == 'del'){

	$id = intval($_GPC['id']);
	$adv = pdo_get('fz_advs',array('id'=>$id));
	if(empty($adv)){
		message('参数错误','','error');
	}

	$res = pdo_delete('fz_advs',array('id'=>$id));
	if($res){
		message('删除成功',url('site/entry/advManager', array('m' => 'fz_wlw')),'success');
	}else{
		message('删除失败',url('site/entry/advManager', array('m' => 'fz_wlw')),'error');
	}
} else if($op == 'statistics'){

	
	$startdate = $_GPC['time']['start'] ? $_GPC['time']['start'] : date('Y-m-d');
	$enddate  = $_GPC['time'['end']] ? $_GPC['time'['end']] : date('Y-m-d');

	if($startdate == $enddate){
		//按天查看,一天24小时的数据
		$start = strtotime($startdate);
		$end   = strtotime('+1 day',$start);

		$xAxis = ['0点','1点','2点','3点','4点','5点','6点','7点','8点','9点','10点','11点','12点','13点','14点','15点','16点','17点','18点','19点','20点','21点','22点','23点'];
		$field = 'a.`aid`,b.`title`,FROM_UNIXTIME(a.`createtime`,"%H") as ctime,count(*) as hits';
	}else{
		$start = strtotime($startdate);
		$end = strtotime('+1 day',strtotime($enddate));
		$days = ( $end - $start)/24/3600 + 1;
		for($i=0;$i<$days;$i++){
			$xAxis[] = date('Y-m-d',strtotime('+'.$i.' day',$start));
		}

		$field = 'a.`aid`,b.`title`,FROM_UNIXTIME(a.`createtime`,"%Y-%m-%d") as ctime,count(*) as hits';
	}

	$condtion = ' a.uniacid=:uniacid and a.createtime>=:starttime and a.createtime<=:endtime';
	$params[':uniacid'] = $_W['uniacid'];
	$params[':starttime'] = $start;
	$params[':endtime'] = $end;

	if(!empty($_GPC['aid'])){
		$condtion .= ' and a.aid=:aid';
		$params[':aid'] = intval($_GPC['aid']);
	}

	$sql = 'SELECT '.$field.' FROM '.tablename('fz_adv_hit').' a left join '.tablename('fz_advs').' b on a.aid=b.id where '.$condtion.' group by a.aid,ctime';
	$list = pdo_fetchall($sql,$params);

	$legend = array();
	$series = array();

	foreach($list as $key=>$val){
		$legend[$val['aid']] = $val['title'];
		$series[$val['aid']]['name'] = $val['title'];
		$series[$val['aid']]['type'] = 'line';
		$series[$val['aid']]['stack'] = '点击';
		foreach($xAxis as $k => $v){
			if($val['ctime'] == $k || $val['ctime'] == $v){

				$series[$val['aid']]['data'][$k] = intval($val['hits']);
			}else{
				if($series[$val['aid']]['data'][$k] != 0){
					continue;
				}
				$series[$val['aid']]['data'][$k] = 0;
			}

		}
	}
	$legend = json_encode(array_values($legend));
	$series = json_encode(array_values($series));
	$xAxis = json_encode(array_values($xAxis));
	include $this->template('adv-statistics'); 
	die;
}

include $this->template('adv'); 