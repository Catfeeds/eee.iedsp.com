<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/headerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/headerSui', TEMPLATE_INCLUDEPATH));?>
 <style type="text/css">
	 .my_dev_btn{color:#fe4d7b; font-size:.75rem; margin-top:5px; border:1px solid #fe4d7b; border-radius:5px; padding:2px 15px; }
 	 
 </style>

<!-- page 容器  -->
    <div class="page page-current" id="packageList"> 
    	  	  <!-- 标题栏 -->
        <header class="bar bar-nav nav_bg">
            <button class="button button-link button-nav pull-left" onclick="funGoBack('<?php  echo $_GPC['devid'];?>')">
                <span class="icon icon-left font_color_fff"></span>
                <span class="font_color_fff">返回</span>
            </button>
            <h1 class="title font_color_fff">订单记录</h1> 
           
        </header>
        <!-- 标题栏 end-->
        
        <!-- 工具栏 -->
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/nvaSui', TEMPLATE_INCLUDEPATH)) : (include template('common/nvaSui', TEMPLATE_INCLUDEPATH));?>
        <!-- 工具栏 end -->
        
        <!-- 内容区 -->
        <div class="content">
      			 <!--标签-->
                  <div class="buttons-tab">
                      <a href="#tab1" class="tab-link active button" onClick="selectItem('1','order_ul1')">已支付</a>
                      <a href="#tab2" class="tab-link button" onClick="selectItem('0','order_ul0')">未支付</a>
                      <a href="#tab3" class="tab-link button" onClick="selectItem('2','order_ul2')">已取消</a> 
                  </div>
                  <!--标签 end-->
                  <!--订单列表-->
                  <div class="content-block" style="margin:0px; padding:0px;">
                      <div class="tabs">
                          <!--已完成-->
                          <div id="tab1" class="tab active">
                              <div class="list-block media-list" style=" padding-top:0px; margin:0px;">
                                  <ul id="order_ul1">
                                      	<!-- 
                                      	<?php  if(is_array($res)) { foreach($res as $key => $item) { ?>
                      <li style="border-bottom:0px solid #e5e5e5;">
                        <a class=" item-content">
                          <div class="item-media user_head"><img src="<?php  echo tomedia($item['packimg']);?>" style=" width:3.5rem;height: 3.5rem;"></div>
                          <div class="item-inner">
                            <div class="item-title" style="color:#333333; font-size:.85rem;">订单金额：<?php  echo $item['paymoney'];?> </div>
                            <div class="item-title-row">
                               <div class="item-subtitle"style="color:#999999; font-size:12px; margin-top:5px; "> 
                               			状态:
                               			<?php  if($item['paystate']=='0' ) { ?>
									 		<span style="color:blue;">待支付</span>	
							 		    <?php  } ?> 
							 		    <?php  if($item['paystate']=='1' ) { ?>
									 		<span style="color: green;">已支付</span>	
							 		    <?php  } ?>
							 		    <?php  if($item['paystate']=='2' ) { ?>
									 		<span style="color:red;">已取消</span>	
							 		    <?php  } ?>
				                               </div>
				                               <div class="item-after" style="color:#999999; font-size:12px; margin-top:5px; ">
				                               	
				                               		<?php  if($item['issend']=='1' ) { ?>
													 		<span style="color: green;">上架</span>	
											 		<?php  } ?>
											 		<?php  if($item['issend']=='0' ) { ?>
											 			<span style="color:red;">下架</span>
											 		<?php  } ?>
				                               	</div>
				                             </div>
				                             <div class="item-title-row">
				                               <div class="item-subtitle"style="color:#00abea; font-size:12px; margin-top:5px; ">
				                               		<?php  echo $item['addtime'];?> &nbsp;套餐:<?php  echo $item['packageid'];?>
				                               </div>
				                              </div>
				                          </div>
				                        </a>
				                      </li> 
				 					<?php  } } ?> 
 -->
                                  </ul>
                              </div>
                          </div>
                          <!--全部 end-->
                          <!--待付款-->
                          <div id="tab2" class="tab">
                              <div class="list-block media-list" style=" padding-top:0px; margin:0px;">
                                  <ul id="order_ul0"></ul>
                              </div>
                          </div>
                          <!--待付款 end-->
                          <!--已取消-->
                          <div id="tab3" class="tab">
                              <div class="list-block media-list" style=" padding-top:0px; margin:0px;">
                                  <ul id="order_ul2"></ul>
                              </div>
                          </div>
                          <!--已取消 end--> 

                      </div>
                  </div>
                  <!--订单列表 end-->
      		 
        </div>
        <!-- 内容区 end -->
    </div>
    <!-- page 容器 end -->
 <script type="text/javascript">
 
 function funGoBack(devid){
	window.location="index.php?c=entry&do=devHome&m=fz_wlw&username=&i=<?php  echo $_W['uniacid'];?>";
  }

 var paystate='1';
 var bus_id='order_ul1'; 
 var needPage=1;
 var isGet=true;
 getNoteList();
 function selectItem(state, bus_div) { 
     paystate=state;
     bus_id=bus_div; 
     needPage=1;
     $('#' + bus_div).html('');
     getNoteList(); 
 }


 function getNoteList() {
	 if(!isGet){
		 return;
    }
	 isGet=false;
	  //alert(needPage);
	 
	 $.showPreloader();
	$.ajax({ 
		type: 'POST', 
		url: "index.php?c=entry&do=orderList&m=fz_wlw&devid=<?php  echo $_GPC['devid'];?>&i=<?php  echo $_W['uniacid'];?>",
		data: {  
			paystate:paystate, 
			needPage:needPage, 
            loadPage:'findByList'
		},
		success: function (data) {  
			isGet=true; 
			 $.hidePreloader();	  
			 
			  var str='('+data+')';
	 	 	 var obj=eval(str);  
			  var html=obj.html; 
			 
			  var count=parseFloat(obj.count);
			  

               if (html != "" && count!=0)
               {
            	   html += '<li style="text-align:center;" class="load_more_btn"><br/><a href="#" onclick="funPageNext()">查询更多</a><br/><br/></li>';
               } 
               
               $('#' + bus_id).append(html); 
		} 
	});

 }

	 function funPageNext(){
	        $(".load_more_btn").hide();
	    	needPage++;
	    	getNoteList();
	 } 
    
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/footerSui', TEMPLATE_INCLUDEPATH));?>