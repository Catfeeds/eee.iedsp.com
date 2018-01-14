<?php 

 global $_W,$_GPC;  
 

 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $devuser = pdo_get('users', array('uid' =>$uid)); 
 
$condition = array();
$condition_clo=" username='".$devuser['username']."' ";
$needCount=15;
$startCount=1;
 
if(!empty($_GPC['loadPage'])){
	 
	if(isset($_GPC['txstate'])){ 
		$condition_clo.=" and txstate=:txstate ";  
		$condition[":txstate"]=$_GPC['txstate'];
	}
	
 	if(isset($_GPC['needPage'])){
		  $startCount=(intval($_GPC['needPage'])-1)*$needCount;  
	} 
	
	$res = pdo_fetchall("SELECT * FROM ".tablename('fz_tx')." WHERE  ".$condition_clo." order by id desc limit ".$startCount.",".$needCount, $condition);
	$html.='';
	foreach($res as $mode)
	{
		$logo="/app/resource/sui/img/head_default.png";//tomedia($logo)
		
	   if(!empty($mode['txopenid'])){
			$wxUser= pdo_fetch("select avatar from ims_mc_members where uid=".$mode['txopenid']); 
			$logo=$wxUser['avatar']; 
		}
		
		$txAmount=$mode['txAmount'];
		$txstate=$mode['txstate'];
		$paystate_str='';
		if($txstate=='0'){
			$paystate_str='待处理';
		}
		 if($txstate=='1'){
			 $paystate_str='成功';
		 }
		if($txstate=='2'){
			 $paystate_str='失败';
		}
		$txmode=$mode['txmode'];
		$txmode_str='';
		if($txmode=='1'){
			$txmode_str="微信到账";
		}
		if($txmode=='2'){
			$txmode_str="银行卡到账";
		}
		
	    $addtime=$mode['addtime'];
	    $addtime_str=date("Y-m-d H:i:s",$addtime) ;
	    $paystate_str.='(单号:'.$mode['id'].')';
	    
		
		$html.='<li style="border-bottom:0px solid #e5e5e5;">';
        $html.='               <a class=" item-content">';
        $html.='                 <div class="item-media user_head"><img src="'.$logo.'" style=" width:3.5rem;height: 3.5rem;"></div>';
        $html.='                <div class="item-inner">';
        $html.='                   <div class="item-title" style="color:#333333; font-size:.85rem;">提现金额：'.$txAmount.'</div>';
        $html.='                  <div class="item-title-row">';
        $html.='                      <div class="item-subtitle"style="color:#999999; font-size:12px; margin-top:5px; "> ';
        $html.=' 状态:'.$paystate_str; 
		$html.=' </div>';
		$html.='		                               <div class="item-after" style="color:#999999; font-size:12px; margin-top:5px; ">';
 
		$html.=$txmode_str;
	 
		$html.='	                               	</div>';
		$html.='		                             </div>';
		$html.='		                             <div class="item-title-row">';
		$html.='		                               <div class="item-subtitle"style="color:#00abea; font-size:12px; margin-top:5px; ">';
		$html.=$addtime_str.'&nbsp;';
		$html.='		                               </div>';
		$html.='	                              </div>';
		$html.='	                          </div>';
		$html.='		                        </a>';
		$html.='		                      </li> ';
	}
	
	if(count($res)==0)
	{
		 $html.="<li class='item-content' style='text-align:center;'>暂无记录</li>";
	} 
	  
	 $arr['html']=$html;
	 $arr['count']=count($res); 
	 echo json_encode($arr);exit;
}

if(!empty($_GPC['devid'])){
		$condition_clo.=' and devNum=:devid';
		$condition=array('devid' =>$_GPC['devid']); 
	} 

//$res = pdo_fetchall("SELECT * FROM ".tablename('fz_order')."  WHERE ".$condition_clo." order by id desc", $condition);
//$res = pdo_getall('fz_packtype',$condition,array(),'','typesort DESC');
// var_dump($res); 
 
include $this->template('txList'); 


