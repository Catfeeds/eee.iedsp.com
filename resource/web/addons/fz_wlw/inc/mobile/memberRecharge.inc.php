<?php  
 global $_W,$_GPC;   
 $_W['page']['title']='购买套餐';
  
 //设备套餐列表
 if(!empty($_GPC['devid'])){ 

 	$dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid']));
 	$lives=explode(';',$dev['live']);
 	 
 	$modes= pdo_fetchall("SELECT * FROM ".tablename('fz_package').' where devid=:devid order by psort desc', array(':devid'=>$_GPC['devid']), 'id'); 
 
	include $this->template('memberRecharge'); 
 	
 }
 
 else{ 
 	//设备列表 根据用户名查询
 	echo '设备列表';
 }
  

?>