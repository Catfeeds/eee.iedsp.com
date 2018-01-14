<?php 

 global $_W,$_GPC;  
 

 $uid=$_COOKIE[$_W['config']['cookie']['pre'].'__userid'];
 $devuser = pdo_get('users', array('uid' =>$uid)); 
 
$condition = array();
$condition_clo="";

$needCount=10;
$startCount=0;
 
if(!empty($_GPC['loadPage'])){  
	
	if($uid!='1')
	{
		$condition_clo.= " and a.uid=".$uid; 
	}
	
 	if(isset($_GPC['needPage'])){
		 $startCount=(intval($_GPC['needPage'])-1)*$needCount;  
	} 
	
	$res = pdo_fetchall("select name,role,a.uniacid from ims_uni_account_users a,ims_account b,ims_uni_account c  where a.uniacid=b.uniacid and a.uniacid=c.uniacid and b.isdeleted!=1 ".$condition_clo." limit ".$startCount.",".$needCount, $condition);
	$html.='';
	foreach($res as $mode)
	{
	 	$logo="/app/resource/sui/img/head_default.png";//tomedia($logo)
	 	
	 	$logo=tomedia('headimg_'.$mode['uniacid'].'.jpg');
	 	
	 	$name=$mode['name'];
	 	$role=$mode['role'];
	 	$role_str='';
	 	if($role=='owner'){
	 		$role_str='主管理员';
	 	}
		if($role=='manager'){
	 		$role_str='管理员';
	 	}
	 	
		if($role=='operator'){
	 		$role_str='操作员'; 
	 	} 
		
		$html.='<li style="border-bottom:0px solid #e5e5e5;">';
        $html.='               <a class=" item-content">';
        $html.='                 <div class="item-media user_head"><img src="'.$logo.'" style=" width:3.5rem;height: 3.5rem;"></div>';
        $html.='                <div class="item-inner">';
        $html.='                   <div class="item-title" style="color:#333333; font-size:.85rem;">'.$name.'</div>';
        $html.='                  <div class="item-title-row">';
        $html.='                      <div class="item-subtitle"style="color:#999999; font-size:12px; margin-top:5px; "> ';
        $html.=$role_str; 
		$html.=' </div>';
		$html.='		                               <div class="item-after" style="color:#999999; font-size:12px; margin-top:5px; ">';
 
		$html.='';
	 
		$html.='	                               	</div>';
		$html.='		                             </div>';
		$html.='		                             <div class="item-title-row">';
		$html.='		                               <div class="item-subtitle"style="color:#00abea; font-size:12px; margin-top:5px; ">';
		$html.=$devuser['username'];
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
  
  
include $this->template('uniList'); 


