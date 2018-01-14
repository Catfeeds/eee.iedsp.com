<?php 
 global $_W,$_GPC; 

 $_W['page']['title']='支付成功';
 
 if(!empty($_W['member']['uid'])){
 	$uid=$_W['member']['uid'];  
 	
	 $condition = array();
	 $condition_clo=" buyuser='".$uid."' ";
	 $needCount=10;  
	 $startCount=1; 
	 
	if(!empty($_GPC['loadPage'])){
		
		if(isset($_GPC['paystate'])){
			$condition[':paystate']=$_GPC['paystate'];
			$condition_clo.=" and paystate=:paystate"; 
		} 
		
		if(isset($_GPC['paysend'])){
			$condition[':paysend']=$_GPC['paysend'];
			$condition_clo.=" and paysend=:paysend";
		} 
		
	 	if(isset($_GPC['needPage'])){
			 $startCount=(intval($_GPC['needPage'])-1)*$needCount;  
		} 
		
		$res = pdo_fetchall("SELECT * FROM ".tablename('fz_order')."  WHERE ".$condition_clo." order by id desc limit ".$startCount.",".$needCount, $condition);
		 
		$wxUser= pdo_fetch("select avatar from ims_mc_members where uid=".$uid); 
		$logo=$wxUser['avatar'];
		
		$html='';
		foreach($res as $mode)
		{ 
			//$logo="/app/resource/sui/img/head_default.png";//tomedia($logo) 
			
			$paymoney=$mode['paymoney'];
			$paystate=$mode['paystate'];
			$paystate_str='';
			if($paystate=='0'){
				$paystate_str='待支付';
			}
			 if($paystate=='1'){
				 $paystate_str='已支付';
			 }
			if($paystate=='2'){
				 $paystate_str='已取消';
			}
			
			$paysend=$mode['paysend'];
			$paysend_str="";
			if($paysend=='0'){
				 $paysend_str='(未触发)';
			}
			if($paysend=='1'){
					 $paysend_str='<span style="color:red;">(已触发)<span>';
				}
			if($paysend=='2'){
					 $paysend_str='<span style="color:green;">(触发成功)<span>';
				}
			if($paysend=='3'){
				 $paysend_str='<span style="color:red;">(触发失败)<span>';
			}
	 	    $devname=$mode['devname'];
	 	    $remark=$mode['remark'];
	 	    $orderNum=$mode['id'];
		    $addtime=$mode['addtime'];
		    $addtime_str=date("Y-m-d H:i:s",$addtime) ; 
			
			$html.='<li style="border-bottom:0px solid #e5e5e5;">';
	        $html.='               <a class=" item-content">';
	        $html.='                 <div class="item-media user_head"><img src="'.$logo.'" style=" width:3.5rem;height: 3.5rem;"></div>';
	        $html.='                <div class="item-inner">';
	        $html.='                   <div class="item-title" style="color:#333333; font-size:.85rem;">订单金额：'.$paymoney.'</div>';
	        $html.='                  <div class="item-title-row">';
	        $html.='                      <div class="item-subtitle"style="color:#999999; font-size:12px; margin-top:5px; "> ';
	        $html.=' 状态:'.$paystate_str.$paysend_str.$remark;  
			$html.=' </div>';
			$html.='		                               <div class="item-after" style="color:#999999; font-size:12px; margin-top:5px; ">';
	 
			$html.='订单号:'.$orderNum; 
		 
			$html.='	                               	</div>';
			$html.='		                             </div>';
			$html.='		                             <div class="item-title-row">';
			$html.='		                               <div class="item-subtitle"style="color:#00abea; font-size:12px; margin-top:5px; ">';
			$html.=$addtime_str.'('.$devname.')';
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
 }
 else{
		if(!empty($_GPC['loadPage'])){
			 $arr['html']='';
			 $arr['count']=0; 
			 echo json_encode($arr);exit;
		}
	}
  
 include $this->template('payResult'); 
 