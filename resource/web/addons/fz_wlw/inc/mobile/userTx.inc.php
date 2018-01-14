<?php 
defined('IN_IA') or exit('Access Denied');
 global $_W,$_GPC; 
 
 if(empty($_W['openid'])){
 	//message("在微信中操作");exit; 
 }
 
 if(empty($_COOKIE[$_W['config']['cookie']['pre'].'__userid'])){
 	$forward = './index.php?c=entry&do=devLogin&m=fz_wlw';
 	 message("您还没有登录", $forward);exit;
 }
 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $devuser = pdo_get('users', array('uid' =>$uid));
 
 $wx_account = pdo_get('account_wechats', array('uniacid' => $_W['uniacid']));
 
 if($wx_account['minmoney']=='' || $wx_account['minmoney']=='0'){
 	$wx_account['minmoney']=2;
 }

 if($wx_account['free']==''){
 	$wx_account['free']=0;
 }
 
  $free=floatval($wx_account['free']);
  if($free<0){
  	$free=0;
  }
 
// $addUrl=getcwd().'/cert/apiclient_cert.pem';
// var_dump($addUrl);exit;

 if(checksubmit('submit')=='save'){ 
 	
 	if(empty($_W['openid'])){
 		message('请在微信中浏览'); 
 	}
 	if(empty($_GPC['txAmount'])){
 		message('金额输入有误'); 
 	}
 	$password=$_GPC['password'];
 	$page_password = user_hash($password, $devuser['salt']);
 	if($devuser['password']!=$page_password){
 		message('登录密码输入错误'); 
 	}
 	//判断钱包
 	$balance=doubleval($devuser['balance']);
 	$txAmount=doubleval($_GPC['txAmount']);
 	$fact_money=$txAmount*(1-$free);
 	
 	if($txAmount>$balance){
 		message('余额不足！'); exit;
 	}
 	if($fact_money<1){
 		message('实际到账金额不能小于1！'); exit;
 	}
 	
 	//每日提现限制
 	$starttime = strtotime(date("Y-m-d",time()));
	$endtime = strtotime(date("Y-m-d",time()));
	$endtime = !empty($endtime) ? $endtime + 86399 : 0;
	$query_sql="select count(id) as COUNT from ims_fz_tx where addtime>=".$starttime." and addtime<=".$endtime." and txopenid=".$_W['member']['uid'];
    $order_count=pdo_fetch($query_sql); 
     if(!empty($order_count['COUNT'])){
     	$q_count=intval($order_count['COUNT']); 
     	if($q_count>0)
     	{
     		message('每日最多可提现次数为1次，请勿多次提现，以免造成提现失败同时又扣除了余额.');exit;  
     	}
     } 
 	 
 	$data['uniacid']=$devuser['uniacid'];
 	$data['username']=$devuser['username'];
 	$data['txopenid']=$_W['member']['uid'];  //mc_member id
 	$data['txAmount']=$txAmount;
 	$data['txremark']=$_GPC['txremark'];
 	
 	$data['txmode']=1;
 	$data['txstate']=0; 
 	$data['addtime']=time(); 
    $result = pdo_insert('fz_tx', $data);  
    
    if (!empty($result)) { 
    	 $orderno = pdo_insertid(); 
    	//扣去余额
		 $sellUser['balance']=$balance-$txAmount;//余额减去 
	 	 $res=pdo_update('users', $sellUser, array('uid' => $devuser['uid'])); 
    	 
    	 
    	 $buspay = pdo_get('uni_account', array('uniacid' => $_W['uniacid']));
    	 $is_success=0;
    	 $data['txstate']=2; 
    	 $data['remark']='出错';
    	 $retArr=txPay($orderno,$_W['openid'],$fact_money,$buspay);//传入实际到账金额
    	 if(!empty($retArr)){
    	 
    	 	if($retArr['return_code']=='SUCCESS'){
    	 		
    	 		if($retArr['result_code']=='SUCCESS'){
    	 			$data['txstate']=1;
    	 			$data['tradno']=$retArr['payment_no']; 
    	 			$data['remark']= '提现成功';
    	 			$is_success=1;
    	 		}
    	 		else{
    	 			$data['remark']=$retArr['err_code'].$retArr['err_code_des'];  
    	 		}
    	 		
    	 	}else{ 
    	 		$data['remark']=$retArr['return_msg'];  
    	 	} 
    	 	
    	 }else{ 
    		 $data['remark']='付款失败';
    	 }
    	 
    	 $res = pdo_update('fz_tx', $data, array('id' => $orderno));
    	 
    	 if(!empty($res)){ 
    	 	if($is_success==1){    
			 	 	//记录明细  
		 	 		$dataDetail['uniacid']=$_W['uniacid'];
		 	 		$dataDetail['username']=$devuser['username']; 
		 	 		$dataDetail['chanceMoney']=$txAmount;
		 	 		$dataDetail['chanceMode']='3';
		 	 		$dataDetail['chanceTime']=date("Y-m-d H:i:s",time());
		 	 		$dataDetail['chanceType']='2';
		 	 		$dataDetail['chanceReason']='提现手续费:'.($free*$txAmount)."元";
		 	 		$dataDetail['balance']=$fact_money; 
		 	 		$dataDetail['acceptedAccount']='';//记录订单号
		 	 		$dataDetail['acceptedUsername']='';
		 	 		$dataDetail['isSettlement']=1;   
		 	 		$dataDetail['serialNumber']=$orderno;//记录订单号
		 	 		$dataDetail['fee']=0;  
		 	 		$dataDetail['remark']='提现';
		 	 		$result = pdo_insert('fz_ye_detail', $dataDetail);   
		 	 		if(empty($result)){ 
		 	 			$data['remark']='记录有误';  
		 	 		} 
    	 	}else{
	    	 	//提现失败自动返回
	     		$blanceData['balance']=$balance+$txAmount; 
	     		$res_upblance=pdo_update('users', $blanceData, array('uid' =>$uid));
	     		if(empty($res_upblance)){
	     			message("提现参数有误");
	     		}
    	 	} 
    	 	message($data['remark']);  
    	 }else{
    	 	//扣去钱包 记录明细 
     		$blanceData['balance']=$balance+$txAmount; 
     		$res_upblance=pdo_update('users', $blanceData, array('uid' =>$uid));
     		if(empty($res_upblance)){
     			message("提现参数有误，冻结账户");
     		}
    	    message('提现成功，修改数据失败'.$orderno);
    	 }
    	  
	    
	}else{
	   message('提交失败');   
	}  
} 

function txPay($orderno,$openid,$txAmount,$buspay){
	 
	//var_dump($buspay);exit;
	if(empty($buspay['busappid'])){
		 message('未配置企业付款参数'); 
		 return;
	}
	if(empty($buspay['busappsecret'])){
		 message('未配置企业付款参数'); 
		 return;
	}
	if(empty($buspay['busmch'])){
		 message('未配置企业付款参数'); 
		 return;
	}
	$amount=intval((floatval($txAmount)*100));
	
	$data['mch_appid']=$buspay['busappid'];//'wxd600b674299403fb';//商户的应用appid  wx387915982cad4b2e
	$data['mchid']=$buspay['busmch'];//'1300839701';//商户ID 1459456202
	$data['nonce_str']=unicode();//这个据说是唯一的字符串下面有方法
	$data['partner_trade_no']='fzwx'.$orderno;//.time();//这个是订单号。
	$data['openid']=$openid;//这个是授权用户的openid。。这个必须得是用户授权才能用
	$data['check_name']='NO_CHECK';//这个是设置是否检测用户真实姓名的
	//$data['re_user_name']='######';//用户的真实名字 可选
	$data['amount']=$amount;//提现金额 
	$data['desc']='商户提现';//订单描述
	$data['spbill_create_ip']=$_SERVER['SERVER_ADDR'];//这个最烦了，，还得获取服务器的ip
	$secrect_key=$buspay['busmchkey'];//'c4c2ae16235285a01f8a2208c5499857';///这个就是个API密码。32位的  KTXtzx8F68flzl385LT00llfqE6tl6y3
	$data=array_filter($data); 
	ksort($data);
	$str='';
	foreach($data as $k=>$v) {
	    $str.=$k.'='.$v.'&';
	}
	$str.='key='.$secrect_key;
	$data['sign']=md5($str);
	$xml=arraytoxml($data);
	// echo $xml;
	$url='https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers';
	$res=curl($xml,$url,$buspay);
	$return=xmltoarray($res);
	//var_dump($return);exit;
	
	return $return;
	
	//print_r($return);
	// echo getcwd().'/cert/apiclient_cert.pem';die;
}
function unicode() {
    $str = uniqid(mt_rand(),1);
    $str=sha1($str);
   return md5($str);
}
function arraytoxml($data){
    $str='<xml>';
    foreach($data as $k=>$v) {
        $str.='<'.$k.'>'.$v.'</'.$k.'>';
    }
    $str.='</xml>';
    return $str;
}
function xmltoarray($xml) { 
     //禁止引用外部xml实体 
    libxml_disable_entity_loader(true); 
    $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
    $val = json_decode(json_encode($xmlstring),true); 
    return $val;
} 
function curl($param="",$url,$buspay) {
   
    $postUrl = $url;
    $curlPost = $param;
    $ch = curl_init();                                      //初始化curl
    curl_setopt($ch, CURLOPT_URL,$postUrl);                 //抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0);                    //设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);            //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1);                      //post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);           // 增加 HTTP Header（头）里的字段 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);        // 终止从服务端进行验证
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
//    curl_setopt($ch,CURLOPT_SSLCERT,getcwd().'/cert/apiclient_cert.pem'); //这个是证书的位置
//    curl_setopt($ch,CURLOPT_SSLKEY,getcwd().'/cert/apiclient_key.pem'); //这个也是证书的位置
//    curl_setopt($ch,CURLOPT_CAINFO,'/cert/rootca.pem');
	curl_setopt($ch,CURLOPT_SSLCERT,IA_ROOT.$buspay['buscert']); //这个是证书的位置
    curl_setopt($ch,CURLOPT_SSLKEY,IA_ROOT.$buspay['buskey']); //这个也是证书的位置
    curl_setopt($ch,CURLOPT_CAINFO,IA_ROOT.$buspay['busrootca']);   
    $data = curl_exec($ch);                                 //运行curl
    curl_close($ch);
    return $data;
}
include $this->template('userTx'); 