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
            <h1 class="title font_color_fff">钱包明细</h1> 
           
        </header>
        <!-- 标题栏 end-->
        
        <!-- 工具栏 -->
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/nvaSui', TEMPLATE_INCLUDEPATH)) : (include template('common/nvaSui', TEMPLATE_INCLUDEPATH));?>
        <!-- 工具栏 end -->
        
        <!-- 内容区 -->
        <div class="content">
      			 <!--标签-->
                  <div class="buttons-tab">
                      <a href="#tab1" class="tab-link active button" onClick="selectItem('1','order_ul1')">收入</a>
                      <a href="#tab2" class="tab-link button" onClick="selectItem('2','order_ul0')">支出</a>
                      <a href="#tab3" class="tab-link button" onClick="selectItem('3','order_ul2')">冻结</a> 
                  </div>
                  <!--标签 end-->
                  <!--订单列表-->
                  <div class="content-block" style="margin:0px; padding:0px;">
                      <div class="tabs">
                          <!--已完成-->
                          <div id="tab1" class="tab active">
                              <div class="list-block media-list" style=" padding-top:0px; margin:0px;">
                                  <ul id="order_ul1">
                                      
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
		url: "index.php?c=entry&do=EwalletList&m=fz_wlw&devid=<?php  echo $_GPC['devid'];?>&i=<?php  echo $_W['uniacid'];?>",
		data: {  
			chanceType:paystate, 
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
	        $(".load_more_btn").remove();
	    	needPage++;
	    	getNoteList();
	 } 
    
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/footerSui', TEMPLATE_INCLUDEPATH));?>