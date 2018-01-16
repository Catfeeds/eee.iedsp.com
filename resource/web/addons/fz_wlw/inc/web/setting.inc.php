<?php 

global $_W,$_GPC; 
 
$op = $_GPC['op'] ? trim($_GPC['op']) : 'display';

if($op == 'display'){

	$setting = pdo_fetch('SELECT * FROM '.tablename('fz_setting').' where uniacid=:uniacid',array(':uniacid'=>$_W['uniacid']));
	if(checksubmit('submit')){
		$id = intval($_GPC['id']);
		$adv_hit = intval($_GPC['adv_hit']);
		if(empty($id)){
			$res = pdo_insert('fz_setting',array('adv_hit'=>$adv_hit,'uniacid'=>$_W['uniacid']));
		}else{
			$res = pdo_update('fz_setting',array('adv_hit'=>$adv_hit),array('id'=>$id));
		}
		if($res){
			message('保存成功','','success');
		}else{
			message('保存失败','','error');
		}
	}

}else if($op == 'getFansList'){
		$key = trim($_GPC['key']);
	$data = pdo_fetchall('select * from ' . tablename('mc_mapping_fans') . ' where uniacid = :uniacid and (openid = :openid or nickname like :key) order by fanid desc limit 50', array(':uniacid' => $_W['uniacid'], ':key' => '%' . $key . '%', ':openid' => $key), 'fanid');

	if (!empty($data)) {
		foreach ($data as &$row) {
			if (is_base64($row['tag'])) {
				$row['tag'] = base64_decode($row['tag']);
			}

			if (is_serialized($row['tag'])) {
				$row['tag'] = @iunserializer($row['tag']);
			}

			if (!empty($row['tag']['headimgurl'])) {
				$row['tag']['avatar'] = tomedia($row['tag']['headimgurl']);
			}

			if ($row['tag']['sex'] == 1) {
				$row['tag']['sex'] = '男生';
			}
			else if ($row['tag']['sex'] == 2) {
				$row['tag']['sex'] = '女生';
			}
			else {
				$row['tag']['sex'] = '未知';
			}
		}

		$fans = array_values($data);
	}

	message(array('errno' => 0, 'message' => $fans, 'data' => $data), '', 'ajax');
}
include $this->template('setting');  