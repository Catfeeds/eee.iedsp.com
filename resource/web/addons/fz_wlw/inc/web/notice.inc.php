<?php 

 global $_W,$_GPC; 
 load()->func('tpl'); 

 if($_GPC['devid']){ 
    $dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid'])); 
 }

 include $this->template('notice'); 