<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/headerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/headerSui', TEMPLATE_INCLUDEPATH));?>
 <style type="text/css">
		.my_head_div{padding:10px 0px; padding-top:20px;background-color:#5198e9; color:#FFF;}
		.col_user_info{ color:#FFF;  }
		.head_account_info{ font-size:12px;}
		
		.my_card{ background-color:#efefef; padding:15px 0px;}
		.my_card_title{ font-size:14px; border-bottom:1px solid #e5e5e5; padding:10px 15px; background-color:#FFF;}
		.my_card_nav{ padding:10px 10px; background-color:#FFF;}
		.row{text-align:center;}
		
		.my_dd_bg{background-image:url(img/my_dd_bg.png); background-position:0 0; width:30px; height:30px; content:' '; background-size: 180px 30px;margin:auto;  }
		.my_card_img{width:2rem; height:2rem;}
		.my_dd_nav_txt{ font-size:14px; color:#5198e9;}
		.my_dd_nav_title{ font-size: 14px;padding: 5px;color:#3d4145;}
	 	.font_14{font-size: 14px;}
	 	.font_16{font-size: 16px;}
	</style>

<!-- page 容器  -->
    <div class="page page-current" id="index">
        
        <!-- 工具栏 -->
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/nvaSui', TEMPLATE_INCLUDEPATH)) : (include template('common/nvaSui', TEMPLATE_INCLUDEPATH));?>
        <!-- 工具栏 end -->
        <!-- 内容区 -->
        <div class="content">
            <!--head -->
            <div class="list-block media-list" style="margin-top:0px; margin-bottom:0px; ">
                <ul>
                    <li>
                        <a href="#" class="item-link item-content my_head_div" >
                            <div class="item-media user_head" style=" margin-top:-10px;">
                                <img src="<?php  echo $userHead;?>" id="HeadImg" style='width: 3.5rem; height: 3.5rem;'>
                            </div>
                            <div class="item-inner"> 
                                <div class="item-subtitle" style="font-size:.65rem;color:#FFF;"><?php  echo $devuser['username'];?></div>
                                <div class="item-text" style="  ">
                               		<span class="col_user_info" style="border:0px;">昵称:<?php  echo $nickName;?></span><br/>
                                    <span class="col_user_info" style="border:0px;">公众号:<?php  echo $_W['uniaccount']['name'];?></span>
                                                                       
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="head_account_info" style="padding-top:5px; padding-bottom:5px;">
                <div class="row">
                    <div class="col-33" >
                        <div class="font_14"><?php  echo $devuser['balance'];?></div>
                        <div class="head_font_999999">账户余额</div>
                    </div>
                    <div class="col-33">
                        <div class="font_14"><?php  echo $devuser['leiji'];?></div>
                        <div class="head_font_999999">
                        		  累计收益
                        </div>
                        
                    </div>
                    <div class="col-33" style="border:0px;">
                        <div class="font_14" onclick="funToUni(<?php  echo $uni_count['COUNT'];?>)"><?php  echo $uni_count['COUNT'];?></div>
                        <div class="head_font_999999">公众号</div>
                    </div>
                </div>
            </div>
            <!--head end-->
             
            <!--导航-->
            	<div class="my_card" style="padding-top:15px;">
                	<div style="background-color:#FFF; padding:10px;">
                        <div class="row">
                            <div class="col-25" style="text-align:center; ">
                                <a href="index.php?c=entry&do=devManager&m=fz_wlw&username=<?php  echo $devuser['username'];?>&i=<?php  echo $_W['uniacid'];?>" class="user_head">
                                    <img src="/app/resource/sui/img/s_wdzl.png" class="my_card_img" /> 
                                    <div class="my_dd_nav_txt">设备中心</div>
                                </a>
                            </div>
                            <div class="col-25" style="text-align:center;">
                                <a href="index.php?c=entry&do=userTx&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>" class="user_head">
                                    <img src="/app/resource/sui/img/s_txjl.png"  class="my_card_img"/> 
                                    <div class="my_dd_nav_txt">我要提现</div>
                                </a>
                            </div>
                            <div class="col-25" style="text-align:center;">
                                <a href="index.php?c=entry&do=userList&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>" class="user_head">
                                    <img src="/app/resource/sui/img/s_wdtd.png" class="my_card_img"/> 
                                     <div class="my_dd_nav_txt">商户管理</div>
                                </a>
                            </div>
                            <div class="col-25" style="text-align:center;">
                                <a href="#" onclick="funGoEwallet()" class="user_head">
                                    <img src="/app/resource/sui/img/s_wdqb.png" class="my_card_img" /> 
                                     <div class="my_dd_nav_txt">我的钱包</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <!--导航 end-->
            
            <!-- 运营情况 -->
            <div class="my_card" style="padding-top:0px;">
                	<div style="background-color:#FFF; padding:5px;">
                        <div class="row">
                            <div class="col-50" style="text-align:center; ">
                                <a>
                                    <div class="my_dd_nav_title">今日销售额</div>
                                    <div class="my_dd_nav_txt"><?php  echo $day_order['totalMoney'];?></div>
                                </a>
                            </div>
                            <div class="col-50" style="text-align:center;">
                                <a>
                                    <div class="my_dd_nav_title">今日销售量</div>
                                    <div class="my_dd_nav_txt"><?php  echo $day_order['COUNT'];?></div>
                                </a>
                            </div> 
                        </div> 
                        <div class="row" style="border-top: 1px solid #eee;">
                            <div class="col-50" style="text-align:center; ">
                                <a>
                                    <div class="my_dd_nav_title">正常设备</div>
                                    <div class="my_dd_nav_txt"><?php  echo $online;?>台</div>
                                </a>
                            </div>
                            <div class="col-50" style="text-align:center;">
                                <a>
                                    <div class="my_dd_nav_title">设备报警</div>
                                    <div class="my_dd_nav_txt"><?php  echo $unOnline;?>台离线</div>
                                </a>
                            </div> 
                        </div> 
                    </div>
                </div>
            <!-- 运营情况end -->
            <!--业务链接-->
            <div style="background-color:#efefef;">
                <div class="list-block" style="margin-top:0rem; margin-bottom:0px;">
                    <ul>
                       
                        <li class="item-content item-link" onClick="funGoEwallet()">
                            <div class="item-media"><i class="icon icon-wddd"></i></div>
                            <div class="item-inner">
                                <div class="item-title">钱包明细</div>
                                <div class="item-after"></div>
                            </div>
                        </li>
                        
                        <li class="item-content item-link" onClick="funGoOrder()">
                            <div class="item-media"><i class="icon icon-wdtz"></i></div>
                            <div class="item-inner">
                                <div class="item-title">订单明细</div>
                                <div class="item-after"></div>
                            </div>
                        </li>
                        
                         <li class="item-content item-link" onClick="funTxList()" >
	                        <div class="item-media"><i class="icon icon-wdyhj"></i></div>
	                        <div class="item-inner">
	                            <div class="item-title">提现记录</div>
	                            <div class="item-after"></div>
	                        </div>
	                    </li>
                       
                        <li class="item-content item-link" onClick="funUpdatePwd()">
                            <div class="item-media"><i class="icon icon-zjll"></i></div>
                            <div class="item-inner">
                                <div class="item-title">修改密码</div>
                                <div class="item-after"></div>
                            </div>
                        </li> 
                        
                    </ul>
                </div>
     
                 
                <div class="list-block" style="margin-top:.8rem;">
                    <ul>
                         <li class="item-content item-link" onClick="logout();">
                            <div class="item-media"><i class="icon icon-wdhy"></i></div>
                            <div class="item-inner">
                                <div class="item-title">退出账户</div>
                                <div class="item-after"></div>
                            </div>
                        </li>
                    </ul>
                </div>
             </div>
            <!--业务链接 end-->
            
            
        </div>
        <!-- 内容区 end -->
    </div>
    <!-- page 容器 end -->
<script type="text/javascript">
 function logout(){
	window.location=window.location+"&logout=1"; 
 }
 function funGoOrder(){ 
		window.location="index.php?c=entry&do=orderList&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";
 }
 function funGoEwallet(){
	 window.location="index.php?c=entry&do=EwalletList&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";
 }

 function funUserSet(){
	 window.location="index.php?c=entry&do=userSetting&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";
 }

 function funUpdatePwd(){
	 window.location="index.php?c=entry&do=updatePwd&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";
 }

 function funTxList(){
	 window.location="index.php?c=entry&do=txList&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";
 }
 function funToUni(count){
	 if(count=='0'){
			return;
	 }
	 window.location="index.php?c=entry&do=uniList&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";	
 }
 selectNav('yyjk_nav');
 
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/footerSui', TEMPLATE_INCLUDEPATH));?>