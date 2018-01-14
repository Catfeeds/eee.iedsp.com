<?php 

 global $_W,$_GPC;  
 

 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $devuser = pdo_get('users', array('uid' =>$uid)); 
 
$condition = array();
$condition_clo=" 1=1 ";

$needCount=10;
$startCount=0;

$level_num=1;
if(!empty($_GPC['level_num'])){
 	$level_num=intval($_GPC['level_num'])+1;
 }

 $commenduser=$devuser['username'];
	if(!empty($_GPC['comm'])){
 		$commenduser=$_GPC['comm'];
 	} 
 	
  $condition[':commenduser']=$commenduser; 
 
if(!empty($_GPC['loadPage'])){  
	
 	if(isset($_GPC['needPage'])){
		 $startCount=(intval($_GPC['needPage'])-1)*$needCount;  
	} 
	
	
	
	$res = pdo_fetchall("SELECT * FROM ".tablename('users')." WHERE commenduser=:commenduser order by uid desc limit ".$startCount.",".$needCount, $condition);
	$html.='';
	foreach($res as $mode)
	{
	 	//$logo="/app/resource/sui/img/head_default.png";//tomedia($logo)
	 	
		$logo=tomedia('headimg_'.$mode['uniacid'].'.jpg');
		
	 	$userName=$mode['username'];
	 	$commUser=$mode['commenduser'];
	 	$lastTime= date("Y-m-d", $mode['lastvisit']); 
	 	$leiji=$mode['leiji'];
		 
		$html.='<li style="border-bottom:0px solid #e5e5e5;">';
        $html.='               <a class=" item-content" onclick=funLookLevel('.$level_num.',"'.$userName.'")>';
        $html.='                 <div class="item-media user_head"><img src="'.$logo.'" style=" width:3.5rem;height: 3.5rem;"></div>';
        $html.='                <div class="item-inner">';
        $html.='                   <div class="item-title" style="color:#333333; font-size:.85rem;">商户:'.$userName.' <span style="color:red;">&nbsp;&nbsp;(向下查)</span></div>';
        $html.='                  <div class="item-title-row">';
        $html.='                      <div class="item-subtitle"style="color:#999999; font-size:12px; margin-top:5px; "> ';
        $html.=' 推荐人:'.$commUser; 
		$html.=' </div>';
		$html.='		                               <div class="item-after" style="color:#999999; font-size:12px; margin-top:5px; ">';
 
		$html.='最近登录:'.$lastTime;
	 
		$html.='	                               	</div>';
		$html.='		                             </div>';
		$html.='		                             <div class="item-title-row">';
		$html.='		                               <div class="item-subtitle"style="color:#00abea; font-size:12px; margin-top:5px; ">';
		$html.='累计收益:'.$leiji;
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
 
  
include $this->template('userList'); 


