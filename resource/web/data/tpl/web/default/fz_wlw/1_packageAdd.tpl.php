<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
 
 <div class="alert alert-success" role="alert" style="text-align: center;">当前设备:<?php  echo $dev['province'];?><?php  echo $dev['city'];?><?php  echo $dev['area'];?><?php  echo $dev['address'];?><?php  echo $dev['devname'];?></div>
 
<ul class="nav nav-tabs">
	<li ><a href="<?php  echo url('site/entry/devList', array('m' => 'fz_wlw'));?>" class="fa fa-reply-all">返回设备列表</a></li>
	<li ><a href="<?php  echo url('site/entry/devAdd', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">设备信息</a></li> 
	<li  ><a href="<?php  echo url('site/entry/yedetail', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">钱包管理</a></li> 
	 <li ><a href="<?php  echo url('site/entry/orderList', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">订单管理</a></li>
 	<li class="active"><a href="<?php  echo url('site/entry/packageList', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">套餐管理</a></li>
	
</ul>


<div class="clearfix">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">添加套餐 &nbsp;
   	 <a class="label label-info" href="<?php  echo url('site/entry/packageList', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>" >返回套餐管理</a>
 	</h3>
  </div>
  <div class="panel-body">
     <form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funSubmit()"> 
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">套餐名称</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="tcname" value="<?php  echo $mode['tcname'];?>" name="tcname" placeholder="套餐名称">
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">套餐价格</label>
		    <div class="col-sm-10">
		      
		       <div class="input-group"> 
						  <input type="text" class="form-control" value="<?php  echo $mode['tcprice'];?>" id="tcprice" name="tcprice" placeholder="不能为空">
						  <span class="input-group-addon">元</span>
						</div> 
		      
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">信号数</label>
		    <div class="col-sm-10">

 					<div class="input-group"> 
						  <input type="number" class="form-control" value="<?php  echo $mode['signnum'];?>" id="signnum" name="signnum" placeholder="填写整数">
						  <span class="input-group-addon">次</span>
						</div> 
						发送的信号数，如：投币器，投一个币为一个信号
				
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">触发类型</label>
		    <div class="col-sm-10">
		     	 <label>
				    <input type="radio" name="ptype" id="ptype1" value="1">
					 脉冲
				  </label>
		    	
		     	 <label style="display: none;">
				    <input type="radio" name="ptype" id="ptype2" value="2">
					 定时器
				  </label>
		     
		    </div>
		  </div>
		  
		  <div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">倒计时</label>
		    <div class="col-sm-10"> 
		       <div class="input-group"> 
				  <input type="text" class="form-control" value="<?php  echo $mode['countdown'];?>" id="countdown" name="countdown" placeholder="单位:秒">
				  <span class="input-group-addon">单位:秒</span>
				</div>  
				为0表示不启用,设置了秒数,设备触发后，这段时间处于工作状态，不能再触发支付
		    </div>
		  </div>
		  
		<div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">是否预约</label>
		    <div class="col-sm-10">
		     	 <label>
				    <input type="radio" name="isyuyue" id="isyuyue1" value="1">
					不开启预约
				  </label>
		    	
		     	 <label>
				    <input type="radio" name="isyuyue" id="isyuyue2" value="2">
					 开启预约
				  </label>
		     
		    </div>
		  </div>
		  
		
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">总库存</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="stocks" value="<?php  echo $mode['stocks'];?>" name="stocks" placeholder="">
		    	-1为不限制被预订的套餐数
		    </div>
		    
		  </div>

		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">库存预警值</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="prewarning_value" value="<?php  echo $mode['prewarning_value'];?>" name="prewarning_value" placeholder="">
		    	当库存到该值时，系统将会通知管理指定管理员，0为不限制
		    </div>
		    
		  </div>

		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">要求广告点击次数</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="adv_hits" value="<?php  echo $mode['adv_hits'];?>" name="adv_hits" placeholder="要求广告点击次数">
		    	当点击广告次数达到该值时才允许购买,0为不限制
		    </div>
		    
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">已卖出</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="sellnum" value="<?php  echo $mode['sellnum'];?>" name="sellnum" placeholder="">
		    	已卖出的份数默认会根据订单自动更新。您也可以手动设置
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">每人限购</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="quota" value="<?php  echo $mode['quota'];?>" name="quota" placeholder="">
		   	-1为不限制客户购买此套餐数量
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">是否上架</label>
		    <div class="col-sm-10">
		     	 <label>
				    <input type="radio" name="issend" id="issend1" value="1">
					 上架
				  </label>
		    	
		     	 <label>
				    <input type="radio" name="issend" id="issend0" value="0">
					  下架
				  </label>
		     
		    </div>
		  </div>
		  <!-- 
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">套餐分类</label>
		    <div class="col-sm-10">
		      <select id="typeid" name="typeid" class="form-control"> 
		    		<?php  if(is_array($types)) { foreach($types as $key => $item) { ?> 
		       		 <option value="<?php  echo $item['id'];?>"><?php  echo $item['typename'];?></option>
		        	<?php  } } ?>  
		    	</select> 
				
		    </div>
		  </div>
		   -->
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">套餐图片</label>
		    <div class="col-sm-10">
		    	<?php  echo tpl_form_field_image('packimg',$mode['packimg']);?>
		    </div>
		  </div> 
		   
		  
		  <div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">分类排序</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="psort" value="<?php  echo $mode['psort'];?>" name="psort" placeholder="分类排序">
		    </div>
		  </div>
		  
		 <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">支付是否关注公众号</label>
		    <div class="col-sm-10">
		     	 <label>
				    <input type="radio" name="isgz" id="isgz0" value="0">
					 不关注
				  </label>
		    	
		     	  <label>
				    <input type="radio" name="isgz" id="isgz1" value="1">
					 关注
				  </label>
		    </div>
		  </div>
		  
		   <div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">是否点广告支付</label>
		    <div class="col-sm-10">
		     	 <label>
				    <input type="radio" name="isadvpay" id="isadvpay0" value="0">
					 不是
				  </label>
		    	
		     	  <label>
				    <input type="radio" name="isadvpay" id="isadvpay1" value="1">
					 是
				  </label>
		    </div>
		  </div>
		  
		  <div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">广告图片</label>
		    <div class="col-sm-10">
		    	<?php  echo tpl_form_field_image('advImg',$mode['advImg']);?>
		    </div>
		  </div> 
		  
		  <div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">广告链接</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="advUrl" value="<?php  echo $mode['advUrl'];?>" name="advUrl" placeholder="广告链接">
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">文字广告</label>
		    <div class="col-sm-10">
		    	<textarea rows="5" class="form-control" cols="10" id="packdes" name="packdes" placeholder="200字数以内"><?php  echo $mode['packdes'];?></textarea> 
		    </div>
		  </div>
		  
		   
		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type="hidden" name="packageid" value="<?php  echo $_GPC['packageid'];?>">
		      <input type="hidden" name="devid" value="<?php  echo $_GPC['devid'];?>">
		      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		      <input type="submit" name="save" class="btn btn-success" value="保存"> 
		    </div> 
		  </div>
		</form> 
  </div>
</div>

</div>
<script type="text/javascript">
    function funSubmit(){
         var tcname=$("#tcname").val();
         if(tcname==""){
             	alert("套餐名称不能为空");
				return false;
         } 
         var tcprice=$("#tcprice").val();
         if(tcprice==""){
             	alert("套餐价格不能为空");
				return false;
         } 
         
         var signnum=$("#signnum").val();
         if(signnum==""){
             	alert("信号数不能为空");
				return false;
         } 
         var typeid=$("#typeid").val();
         if(typeid==""){
             	alert("选择套餐");
				return false;
         } 
         var packimg=$("#packimg").val();
         if(packimg==""){
             	alert("上传套餐图片");
				return false;
         } 
		 return true; 
    }

    

    $(function(){
    	 var typeid="<?php  echo $mode['typeid'];?>";   
 	      $("#typeid").val(typeid);  
 	     var issend="<?php  echo $mode['issend'];?>";   
	  	 if(issend=='0'){ 
			 $("#issend0").attr("checked","true");
		 }
	  	 else{
	  		$("#issend1").attr("checked","true");
		 } 

	  	var ptype="<?php  echo $mode['ptype'];?>";   
	  	 if(ptype=='2'){ 
			 $("#ptype2").attr("checked","true");
		 }
	  	 else{
	  		$("#ptype1").attr("checked","true");
		 } 

	  	var isyuyue="<?php  echo $mode['isyuyue'];?>";   
	   
	  	 if(isyuyue=='1'){ 
			 $("#isyuyue1").attr("checked","true");
		 }
	  	 else{
	  		$("#isyuyue2").attr("checked","true");
		 } 

	  	var isgz="<?php  echo $mode['isgz'];?>";   
	  	 if(isgz=='1'){ 
			 $("#isgz1").attr("checked","true");
		 }
	  	 else{
	  		$("#isgz0").attr("checked","true");
		 } 

	  	var isadvpay="<?php  echo $mode['isadvpay'];?>";   
	  	 if(isadvpay=='1'){ 
			 $("#isadvpay1").attr("checked","true");
		 }
	  	 else{
	  		$("#isadvpay0").attr("checked","true");
		 } 
    	  
    });
     
	
</script>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>