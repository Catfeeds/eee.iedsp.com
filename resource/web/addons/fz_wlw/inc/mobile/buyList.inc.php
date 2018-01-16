<?php 
 global $_W,$_GPC; 

 $_W['page']['title']='购买套餐';
 $buyUser=$_W['member']['uid']; 
 if(!empty($_GPC['pay'])&&!empty($_GPC['packageid'])){ 
 		 //var_dump($_GPC);exit; 
 		  
    	$package = pdo_get('fz_package', array('id' =>$_GPC['packageid']));
    	
     $isgz=$package['isgz'];
     if(!empty($isgz) && $isgz=='1')
     {
	      if(empty($buyUser)){
		 	message('您还没有关注公众号，请在购买页面识别图中二维码关注公众号后重试.');
		  }
		  
	      $gz_total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('mc_mapping_fans') . " WHERE uniacid = :uniacid AND uid = :uid AND follow = '1'", array(':uniacid' => $_W['uniacid'], ':uid' => $buyUser));
	 	
		  if($gz_total==0)
		  {
		  	 //message('您还没有关注公众号，请在购买页面识别图中二维码关注公众号后重试.');
		  }
     }
    	
 	
 		
    	$dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid']));
    	
    	//判断设备是否在线
    	$nowTime=time();
    	$bkTime=$dev['bkTime'];
    	if(empty($bkTime)){
    		message('设备还没未链接，请重试');exit; 
    	}
    	$heartbeat=intval($dev['heartbeat']); 
    	$ljTime=intval($bkTime); 
    	if($ljTime<=($nowTime-$heartbeat)){  
    		 message('设备还没未链接，稍等一下重试，谢谢');exit;  
    	}
    	
    	//查询设备是否启用
    	$dev_state=$dev['dstate'];
    	if($dev_state=='0')
    	{
    		message('设备未启用，请联系商家:'.$dev['telnum']);exit;  
    	}
    	//检查套餐是否启用
    	
    	$pack_issend=$package['issend'];
    	if($pack_issend=='0')
    	{
    		message('套餐没上架，请联系商家:'.$dev['telnum']);exit;  
    	}


    	$pack_stocks=intval($package['stocks']);

    	$prewarning_value = intval($package['prewarning_value']);
    	if($prewarning_value > 0 && $pack_stocks != -1){
    		if($pack_stocks < $prewarning_value){
    			sendPrewarningNotice($dev,$package);
    		}
    	} 
    	
    	
    	if($pack_stocks<=0 && $pack_stocks!=-1)
    	{
    		sendOfflineNotice($dev,$package);
    		message('请联系商家,此库存为:'.$pack_stocks);exit;
    	}
    	
    	//查看是否限购
    	$quota=intval($package['quota']);
    	if($quota!=-1 && $quota>0 )
    	{
    		$buyUser=$_W['member']['uid'];
    		$starttime = strtotime(date("Y-m-d",time()));
    		$endtime = strtotime(date("Y-m-d",time()));
    		$endtime = !empty($endtime) ? $endtime + 86399 : 0;

    		if(!empty($buyUser)){
			 	 //查询今天是否购买
    			$query_sql="select count(id) as COUNT from ims_fz_order where addtime>=".$starttime." and addtime<=".$endtime." and buyuser=".$buyUser." and packageid=".$package['id'];

    			$order_count=pdo_fetch($query_sql); 
    			if(!empty($order_count['COUNT'])){
    				$q_count=intval($order_count['COUNT']);

    				if($q_count>=$quota)
    				{
    					message('今日限购数量'.$quota.'次');exit;  
    				}
    			} 
    		} 

    	}

    	//查看是否要求点击广告次数
    	$adv_hits = intval($package['adv_hits']);
    	
    	if($adv_hits > 0){
    		$buyUser=$_W['member']['uid'] ? $_W['member']['uid'] : 0;
    		$starttime = strtotime(date("Y-m-d",time()));
    		$endtime = strtotime(date("Y-m-d",time()));
    		$endtime = !empty($endtime) ? $endtime + 86399 : 0;
    		if(!empty($buyUser)){
    			$adv_hit_count = pdo_fetchcolumn('SELECT count(*) FROM '.tablename('fz_adv_hit').' WHERE id in(SELECT id FROM '.tablename('fz_adv_hit').' WHERE createtime>=:starttime and createtime<=:endtime and uniacid=:uniacid and uid=:uid group by aid)',array(':starttime'=>$starttime,':endtime'=>$endtime,':uniacid'=>$_W['uniacid'],':uid'=>$buyUser));
    		
    			if($adv_hit_count < $adv_hits){
    				message('还需要点击广告'.($adv_hits-$adv_hit_count).'次才能购买!');exit;  
    			}
    		}
    	}
    	
    	
 	    $data['uniacid']=$dev['uniacid']; 
	    $data['username']=$dev['username'];  
	    $data['devNum']=$dev['Id']; //改成了编号
	    $data['devname']=$dev['devname'].'-'.$package['tcname'];
	     
	    $data['buyuser']=$_W['member']['uid'];
	    $data['buyopenid']=$_W['openid'];
 	    $data['packageid']=$package['id'];
	    $data['paynum']=$package['signnum']; 
	    $data['paymoney']=$package['tcprice']; 
	    $data['paymode']=0; 
	    $data['paystate']=0;//待支付 
	    $data['paysend']=0;//未触发
	    
	    $data['packname']=$package['tcname'];
	    
	    $data['txstate']=0;//txstate 
	    $data['addtime']=time();  
	    
	    $result = pdo_insert('fz_order', $data);   
	    if (!empty($result)) {  
		   $orderno = pdo_insertid();
		   $fee=$package['tcprice']; 
		   
		   if(floatval($fee)>0)
		   {
		   		//构造支付请求中的参数
			    $params = array(
			        'tid' => $orderno,      //充值模块中的订单号，此号码用于业务模块中区分订单，交易的识别码
			        'ordersn' => $orderno,  //收银台中显示的订单号
			        'title' => $data['devname'],          //收银台中显示的标题
			        'fee' => $fee,      //收银台中显示需要支付的金额,只能大于 0
			        'user' => $_W['member']['uid'],     //付款用户, 付款的用户名(选填项)
			    ); 
			    //调用pay方法
			    $this->pay($params); 
			    //微信通知 payment/wechat/notify.php
			    //支付页面 app/themes/default/common/paycenter.html
			    //余额支付 app/source/mc/cash.ctrl.php 
			   exit;
		   }
		   else{
		   		$fzData['paymode']=1;
		   		$fzData['paystate']=1;  
		   		$fzData['paytime']=time();  
				pdo_update('fz_order', $fzData, array('id' =>$orderno));
				
				message('支付成功');   
				//减库存
				if($pack_stocks>0 && $pack_stocks!=-1)
				{
					$pack['stocks']=$pack_stocks-1;
					pdo_update('fz_package', $pack, array('id' =>$package['id']));
				}
		   }
		   
		}else{
		   message('下单失败');   
		} 
 }
 
 //设备套餐列表
 if(!empty($_GPC['devid'])){ 

 	$dev = pdo_get('fz_dev_info', array('Id' =>$_GPC['devid']));
 	if($dev['live']==''){
 		$lives[0]='../app/resource/sui/img/bann5.jpg';
 	}else{
 		$lives=explode(';',$dev['live']);
 		if(count($lives)<=1){
 			//$lives[1]='../app/resource/sui/img/bann5.jpg';
 		} 
 	}
 	
 	if($dev['devlogo']==''){
 		$dev['devlogo']='../app/resource/sui/img/bann5.jpg';
 	}

 	$advs_type = 1;
 	$advs = pdo_fetchall('SELECT * FROM '.tablename('fz_advs').' WHERE uniacid=:uniacid and status=1 order by displayorder desc limit 0,9',array(':uniacid'=>$_W['uniacid']));
 	
 	//判断是否启用了倒计时 查询
 	  $is_pay=1;
     $startwork= $dev['startwork'];
     //查询最后一个订单 的套餐id
     $last_order=pdo_fetch("select b.countdown from ims_fz_order a,ims_fz_package b where a.packageid=b.id and a.devNum='".$dev['Id']."' order by a.id desc limit 1,1",array());
  
     if(!empty($last_order['countdown']) && !empty($startwork)){
 	 	 
 	 	$cur_time=time();
 	 	$show_time=intval($last_order['countdown'])-($cur_time-intval($startwork));
 	 	if($show_time>0)
 	 	{
 	 		$is_pay=0;//显示倒计时
 	 	}
 	 }
 	 
 	$modes= pdo_fetchall("SELECT * FROM ".tablename('fz_package').' where devid=:devid and issend=1 order by psort desc', array('devid'=>$_GPC['devid']), 'id'); 
 
	include $this->template('buyList'); 
 	
 }
 
 else{
 		 
 	//设备列表 根据用户名查询
 	echo '设备列表';
 }
 ///发送客户端
 function scoketToDev($address,$service_port,$sendStrArray){
 	 
 	 //error_reporting(E_ALL);  
 	    $ret_type='';
		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if ($socket<0) {
			//echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n"; 
			 return $ret_type;
		} else {
			//echo "OK. \n";
		} 
		
		//echo "Attempting to connect to '$address' on port '$service_port'...";
		$result = socket_connect($socket, $address, $service_port);
		if($result<0) {
			//echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
			 return $ret_type;
		} else {
			//echo "OK \n";
		}   
		
		//$sendStr = '10 32 30 34 03 30 33';  // 16进制数据 
        //$sendStrArray = str_split(str_replace(' ', '', $sendStr), 2);  // 将16进制数据转换成两个一组的数组
		//$sendStrArray[0]='10';
		//$sendStrArray[1]='20';
        $str='';
 		foreach($sendStrArray as $ch) {
            $str .= chr($ch);
        }
         
        	//     var_dump($str);
 		//$in = "hello \r\n"; 
		  if(!socket_write($socket, $str, strlen($str))) {
		     // echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
		     return $ret_type;
		  }else {
		     // echo "发送到服务器信息成功！\n";
		    //   echo "发送的内容为:<font color='red'>$in</font> <br>";
		  }
 
		
//		echo "Reading response:\n\n";
		$out='';  
//		while ($out = socket_read($socket, 5,PHP_NORMAL_READ)) {
//			echo $out;
//			
//		}
		$out = socket_read($socket,42,PHP_BINARY_READ);// // 采用2进制方式接收
	    $receiveStrHex = bin2hex($out);  // 将2进制数据转换成16进制
	    //01f0 00ff 000102030405060708090a0b0c0d0e 00 000102030405060708090a0b0c0d 110b040f101e0d0a
	   // var_dump($receiveStrHex);
	   // $devid=substr($receiveStrHex,8,30); 
	      
	    $orderno=''; 
	    $start=40;
	    for($k=0;$k<14;$k++){
	    	 $num=substr($receiveStrHex,$start,2); 
	    	 $orderno.=hexdec($num);
	    	 $start+=2; 
	    } 
	    
		//var_dump($orderno);
		//echo "closeing socket..";
		socket_close($socket);
		//echo "ok .\n\n";
		return $orderno; 
 }
 

