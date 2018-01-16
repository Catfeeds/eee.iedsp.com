<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
 	 a:link{text-decoration: none;}
 	.mui-slider .mui-slider-group .mui-slider-item{height: auto;}
</style>

<div class="mui-slider" style="text-align: center;">
  <div class="mui-slider-group mui-slider-loop">
    <!--支持循环，需要重复图片节点-->
    	 <div class="mui-slider-item mui-slider-item-duplicate"><a href="#"><img src="<?php  echo tomedia($lives['0']);?>" /></a></div>
 		<?php  if(is_array($lives)) { foreach($lives as $key => $item) { ?>
 		<div class="mui-slider-item"><a href="#"><img src="<?php  echo tomedia($item);?>" /></a></div>
 		<?php  } } ?> 
 		<div class="mui-slider-item mui-slider-item-duplicate"><a href="#"><img src="<?php  echo tomedia($lives['0']);?>" /></a></div>
    <!--支持循环，需要重复图片节点-->
    
  </div>
</div>   
<ul class="mui-table-view"> 
      <li class="mui-table-view-cell mui-collapse">
          <a class="mui-navigate-right" href="#">编号:<?php  echo $dev['Id'];?>(电话:<?php  echo $dev['telnum'];?>)
          	<span style="color: red;">&nbsp;展开详情</span>
          </a>
          <div class="mui-collapse-content">
          	  <div> <img src="<?php  echo tomedia($dev['devlogo']);?>" width="100%" /></div>
               <?php  echo html_entity_decode($dev['feature'])?>
          </div>
           
      </li>
  </ul>

<div style="text-align: center; padding-top: 15px;color: red;">
	<?php  echo $dev['devname'];?>
</div>

<div> 
 
	 <ul class="mui-table-view mui-table-view-radio">
	 
	 <?php  if(is_array($modes)) { foreach($modes as $key => $item) { ?>
	 	
	    <li class="mui-table-view-cell mui-media" tag="<?php  echo $item['id'];?>">
	        <a href="javascript:;" class="mui-navigate-right">
	            <img class="mui-media-object mui-pull-left" style="width: 42px;" src="<?php  echo tomedia($item['packimg']);?>">
	            <div class="mui-media-body">
	            	   <div><?php  echo $item['tcname'];?></div>
	            	   <div style="font-size: 12px;color: red;">价格:<?php  echo $item['tcprice'];?>元  &nbsp;</div>
	                <p class='mui-ellipsis' style="font-size: 10px;"><?php  echo $item['packdes'];?></p>
	            </div>
	        </a>  
	    </li> 
	 <?php  } } ?>    
	 
	 <?php  if(count($modes) ==0 ) { ?>
	   <div style="margin: 10px;text-align: center;color: red;">还没有套餐,联系商家设置</div>
	 <?php  } ?>
	 
</ul> 

</div>

<div style="padding: 20px;text-align: center;"> 
	 
	 	<?php  if($dev['bkTime']>(time()-$dev['heartbeat']) ) { ?>
 			<button type="button" id="wx_pay"  class="mui-btn mui-btn-success mui-btn-outlined" onclick="funSubmit();" data-loading-text="提交中" class="mui-btn">立即支付</button> 
 		<?php  } else { ?>  
 			<button type="button" class="mui-btn mui-btn-success mui-btn-outlined" onclick="location.reload();funShowGZ()" class="mui-btn">设备离线,点击刷新</button> 
 		<?php  } ?> 
	 	
		
	 
	
	<?php  if($is_pay ==0 ) { ?> 
		<span id="show_time">--:--:--</span>
	<?php  } ?>
</div>

   	<div style="margin: 10px;font-size: 16px;color: red;text-align: center;margin-top: -10px;">
                  		<img alt="" src="<?php  echo tomedia('qrcode_'.$_W['uniacid'].'.jpg')?>" style="width: 150px;height: 150px;">
                  		 
                  		<div style="margin-top: -10px;margin-bottom:-10px;font-size: 14px;">长按图片识别图中二维码关注公众号</div>
                  		 
  </div>	
 
<script type="text/javascript">

	//获得slider插件对象
	var gallery = mui('.mui-slider');
	gallery.slider({
	  interval:5000//自动轮播周期，若为0则不自动播放，默认为0；
	});
	var select_id='';
	var list = document.querySelector('.mui-table-view.mui-table-view-radio');
	list.addEventListener('selected',function(e){
		//console.log("当前选中的为："+e.detail.el.innerText);
		//alert($(e.detail.el).attr("tag"));
		select_id=$(e.detail.el).attr("tag");
	});
	
	$(".mui-slider-item").find('img').css('height','180px').css('width','100%');
	
	function funSubmit(){
	 	if(select_id==""){
	 		mui.alert('请选择购买套餐。');
			return;
		}
		 
	   window.location="<?php  echo $this->createMobileUrl('buyList',array('devid'=>$_GPC['devid'],'pay'=>'weixin'));?>&packageid="+select_id+"i=<?php  echo $_W['uniacid'];?>";
		
	}
	function funShowGZ(){
			//var url="https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzUyOTA4ODA5Nw==&scene=124#wechat_redirect";
			//window.open(url);
	}

	 var is_pay='<?php  echo $is_pay;?>';
	 if(is_pay=="0"){
		 $("#wx_pay").hide(); 
	 }
	var serverTime =0;
    var show_time='<?php  echo $show_time;?>';
    if(show_time!=""){
    	serverTime = parseInt(show_time);
    } 
	$(function(){  
	     
	    setInterval(function(){ 
	    	var obj = $("#show_time");  
	        var nMS=serverTime;
	        var myD=Math.floor(nMS/( 60 * 60 * 24)); //天 
	        var myH=Math.floor(nMS/(60*60)) % 24; //小时 
	        var myM=Math.floor(nMS/(60)) % 60; //分钟 
	        var myS=Math.floor(nMS) % 60; //秒 
	    //    var myMS=Math.floor(nMS/100) % 10; //拆分秒 
	        if(myD>= 0){ 
	            var str = myD+"天"+myH+"小时"+myM+"分"+myS+"秒"; 
	        }else{ 
	            //var str = "已结束！";    
	            $("#wx_pay").show(); 
	            $("#show_time").hide();
	        } 
	        obj.html(str); 
	        serverTime--;
	      
	    }, 1000);  
	}); 
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
