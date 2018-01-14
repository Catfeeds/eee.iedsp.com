<?php 

 global $_W,$_GPC;  
 

 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $devuser = pdo_get('users', array('uid' =>$uid)); 
 
$condition = array();
$condition_clo=" username='".$devuser['username']."' ";
$needCount=15;
$startCount=1;
 
if(!empty($_GPC['loadPage'])){
	
	if(isset($_GPC['chanceType'])){ 
		$condition_clo.=" and chanceType=:chanceType";
		$condition[':chanceType']=$_GPC['chanceType'];
	} 
	
	//$count_total = pdo_fetchcolumn("SELECT COUNT(*) FROM ".tablename('fz_order'). " where ".$condition_clo." ");
	if(isset($_GPC['needPage'])){
		 $startCount=(intval($_GPC['needPage'])-1)*$needCount;  
	} 
	
	$res = pdo_fetchall("SELECT * FROM ".tablename('fz_ye_detail')."  WHERE  ".$condition_clo." order by id desc limit ".$startCount.",".$needCount, $condition);
	$html.='';
	foreach($res as $mode)
	{
		//$logo="/app/resource/sui/img/head_default.png";//tomedia($logo)
		
		$logo=tomedia('headimg_'.$mode['uniacid'].'.jpg');
		
		$chanceMode=$mode['chanceMode'];
		$chanceMode_str='';
		if($chanceMode=='1'){
			$chanceMode_str='(奖金收益)';
		}
		if($chanceMode=='2'){
			$chanceMode_str='(销售收益)';
		}
		if($chanceMode=='3'){
			$chanceMode_str='(提现)';
		}
		if($chanceMode=='4'){
			$chanceMode_str='(投币收益)';
		}
		$chanceMoney=$mode['chanceMoney'].$chanceMode_str;
		$paystate=$mode['chanceType'];
		$paystate_str='';
		if($paystate=='1'){
			$paystate_str='<span style="color:green;">收入<span>';
		}
		 if($paystate=='2'){
			 $paystate_str='<span style="color:red;">支出<span>';
		 }
		if($paystate=='3'){
			 $paystate_str='<span style="color:blue;">冻结<span>';
		}
		 
	    $addtime=$mode['chanceTime']; 
	    $addtime_str=$addtime;//date("Y-m-d H:i:s",$addtime) ;
	  $chanceReason=$mode['chanceReason'];
		
		$html.='<li style="border-bottom:0px solid #e5e5e5;">';
        $html.='               <a class=" item-content">';
        $html.='                 <div class="item-media user_head"><img src="'.$logo.'" style=" width:3.5rem;height: 3.5rem;"></div>';
        $html.='                <div class="item-inner">';
        $html.='                   <div class="item-title" style="color:#333333; font-size:.85rem;">金额:'.$chanceMoney.'</div>';
        $html.='                  <div class="item-title-row">';
        $html.='                      <div class="item-subtitle"style="color:#999999; font-size:12px; margin-top:5px; "> ';
        $html.=' 类型:'.$paystate_str; 
		$html.=' </div>';
		$html.='		                               <div class="item-after" style="color:#999999; font-size:12px; margin-top:5px; ">';
 
		$html.=$chanceReason;
	 
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
		$condition=array(':devid' =>$_GPC['devid']);  
	} 

//$res = pdo_fetchall("SELECT * FROM ".tablename('fz_order')."  WHERE ".$condition_clo." order by id desc", $condition);
//$res = pdo_getall('fz_packtype',$condition,array(),'','typesort DESC');
// var_dump($res); 
  
  function inject_check($sql_str)
{ 
      return eregi("select|insert|update|delete|'|union|into|load_file|outfile", $sql_str);    // 进行过滤
 }
	
include $this->template('EwalletList'); 


