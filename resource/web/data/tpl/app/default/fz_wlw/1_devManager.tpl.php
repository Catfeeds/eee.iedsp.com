<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/headerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/headerSui', TEMPLATE_INCLUDEPATH));?>
 <style type="text/css">
	 .my_dev_btn{color:#fe4d7b; font-size:.75rem; margin-top:5px; border:1px solid #fe4d7b; border-radius:5px; padding:2px 15px; }
 	.cart_pro_img{width:4rem; height:4rem;}
 </style>

<!-- page 容器  -->
    <div class="page page-current" id="devManager"> 
      <!-- 标题栏 -->
        <header class="bar bar-nav nav_bg">
            <button class="button button-link button-nav pull-left" onclick="funGoHome('<?php  echo $_W['uniacid'];?>')">
                <span class="icon icon-left font_color_fff"></span>
                <span class="font_color_fff">返回</span>
            </button>
            <h1 class="title font_color_fff">设备管理</h1> 
           
        </header>
        <!-- 标题栏 end-->
        <!-- 工具栏 -->
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/nvaSui', TEMPLATE_INCLUDEPATH)) : (include template('common/nvaSui', TEMPLATE_INCLUDEPATH));?>
        <!-- 工具栏 end -->
        <!-- 内容区 -->
        <div class="content">
        
        <div class="list-block cards-list" style="margin:0px;">
                  <ul id="list_html"> 
                  	<?php  if(count($res)==0) { ?>
				  	 <div style="text-align: center;color: red;padding: 40px;font-size: 14px;font-weight: bold;">您还没有设备，请联系管理员</div>
				  	 <?php  } ?>
                  	<?php  if(is_array($res)) { foreach($res as $key => $item) { ?>
                        <li class="card">
                              <div class="card-header" style="font-size: 14px;font-weight: bold;"> 
                                <span>名称：<?php  echo $item['devname'];?></span>
                              </div>
                              <div class="card-content">
                                <div class="card-content-inner">                                   		
                                	  <div class="list-block media-list" onclick="funGoUrl('<?php  echo $item['Id'];?>')">
                                        <ul style="padding-left:0px;">
                                          <li>                                            
                                            <span  class="item-link item-content">
                                              <div class="item-media"> 
                                              	<img src="<?php  echo tomedia($item['devlogo']);?>" class="cart_pro_img">
                                              </div>
                                              <div class="item-inner">
                                                <div class="item-title-row">
                                                  <div class="item-title" style="font-size: 12px;">设备ID:<?php  echo $item['Id'];?></div>
                                                </div>
                                                <div class="item-subtitle" style="font-size: 12px;">状态:
                                                	<?php  if($item['bkTime']>(time()-$item['heartbeat']) ) { ?>
											 			<span style="color: green;">在线 </span> 
											 			信号:<span style="color: green;"><?php  echo $item['rssi'];?> (0到31)</span> 
											 		<?php  } else { ?> 
											 			<span style="color:red;">离线</span> 
											 		<?php  } ?> 
											 		<br/>
											 		 <span>所属用户：<?php  echo $item['username'];?></span>
											 		 
                                                </div>
                                                 
                                                <div class="item-text" style="padding-top:0.3rem;font-size: 10px;">
                                                	<?php  if($item['gpsAddr']!='') { ?>
                                                			<?php  echo $item['gpsAddr'];?>
                                                	<?php  } ?>
                                                	<?php  if($item['gpsAddr']=='') { ?>
                                                		<?php  echo $item['province'];?><?php  echo $item['city'];?><?php  echo $item['area'];?>
                                                	<?php  } ?>
                                                	
                                                </div>
                                              </div>
                                            </span>
                                          </li> 
                                          
                                        </ul>
                                      </div>
                                </div>
                              </div>
                              <div class="card-footer">
                              	<div class="my_dev_btn" onclick="funGoPackage('<?php  echo $item['Id'];?>')">套餐</div> 
                              	<div class="my_dev_btn" onclick="funGoOrder('<?php  echo $item['Id'];?>')">订单</div>
                              	<div class="my_dev_btn" onclick="funGoTwoCode('<?php  echo $item['Id'];?>')">二维码</div>
                              	<div class="my_dev_btn" onclick="funGoBuy('<?php  echo $item['Id'];?>')">预览</div>
                              </div>
                        </li>   
                       <?php  } } ?> 
                       <?php  if(count($res)==15) { ?>
                         <li style="text-align:center;" class="load_more_btn"><br/><a href="#" onclick="funPageNext()">查询更多</a><br/><br/></li>
                        <?php  } ?>
                  </ul>
                </div>       
                          
        </div>
        <!-- 内容区 end -->
    </div>
    <!-- page 容器 end -->
 <script type="text/javascript">
function funGoUrl(devid){
 	window.location="index.php?c=entry&do=devSet&m=fz_wlw&devid="+devid+"&i=<?php  echo $_W['uniacid'];?>";
}
function funGoBuyList(devid){
	window.location="index.php?c=entry&do=buyList&m=fz_wlw&devid="+devid+"&i=<?php  echo $_W['uniacid'];?>";
}
function funGoPackage(devid){
	window.location="index.php?c=entry&do=packageList&m=fz_wlw&devid="+devid+"&i=<?php  echo $_W['uniacid'];?>";
}
function funGoOrder(devid){ 
	window.location="index.php?c=entry&do=orderList&m=fz_wlw&devid="+devid+"&i=<?php  echo $_W['uniacid'];?>";
}
function funGoBuy(devid){ 
	window.location="index.php?c=entry&do=buyList&m=fz_wlw&devid="+devid+"&i=<?php  echo $_W['uniacid'];?>";
}
function funGoTwoCode(devid){  
	
	var url="index.php?c=entry&do=downLoadCode&m=fz_wlw&devid="+devid+"&i=<?php  echo $_W['uniacid'];?>&op=1";
	window.location=url;
	//alert(url);   
	//window.open(url);
}

function funPageNext(){ 
	var needPage=parseInt('<?php  echo $needPage;?>');
	needPage++;
	window.location=window.location+"&needPage="+needPage;
} 
 
selectNav('my_dev');
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/footerSui', TEMPLATE_INCLUDEPATH));?>