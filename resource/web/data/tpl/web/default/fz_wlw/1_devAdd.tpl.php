<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	 <li ><a href="<?php  echo url('site/entry/devList', array('m' => 'fz_wlw'));?>" class="fa fa-reply-all">返回设备列表</a></li>
	<li class="active"><a href="<?php  echo url('site/entry/devAdd', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">设备信息</a></li> 
	<li  ><a href="<?php  echo url('site/entry/yedetail', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">钱包管理</a></li> 
	 <li ><a href="<?php  echo url('site/entry/orderList', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">订单管理</a></li>
 	<li ><a href="<?php  echo url('site/entry/packageList', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">套餐管理</a></li>

 	<li ><a href="<?php  echo url('site/entry/notice', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">设备通知</a></li>

</ul>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">设备编辑</h3>
  </div>
  <div class="panel-body">
     <form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funSubmit()"> 
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备名称</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="devname" value="<?php  echo $dev['devname'];?>" name="devname" placeholder="设备名称">
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备ID</label>
		    <div class="col-sm-10">
		     <?php  if($_W['username']=='admin') { ?>  
		    	<input type="text" class="form-control" id="devNum" value="<?php  echo $dev['devNum'];?>" name="devNum" placeholder="设备ID">
 		   		<select class="form-control" onchange="funSetDevNum(this)">
			      		<option value="" >可选择</option>
			      		<?php  if(is_array($fz_devuse)) { foreach($fz_devuse as $key => $item) { ?>
			      			<option value="<?php  echo $item['devnum'];?>"><?php  echo $item['devnum'];?></option>
			      		<?php  } } ?> 
			      </select>
 		     <?php  } else { ?>  
		     	<input type="text" class="form-control" id="devNum" value="<?php  echo $dev['devNum'];?>" name="devNum" readonly="readonly" placeholder="设备ID">
		     <?php  } ?>
		      
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备注册码</label>
		    <div class="col-sm-10">
		    	
		    	<?php  if($_W['username']=='admin') { ?>  
 <input type="text" class="form-control" id="devregcode" value="<?php  echo $dev['devregcode'];?>" name="devregcode" placeholder="">
  
 		     <?php  } else { ?>  
 <input type="text" class="form-control" id="devregcode" value="<?php  echo $dev['devregcode'];?>" readonly="readonly" name="devregcode" placeholder="">		     <?php  } ?>
		    	
		     
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">所属用户</label>
		    <div class="col-sm-10">
		    	<select id="username" name="username" class="form-control"> 
		    		
		    		<?php  if(is_array($ssuser)) { foreach($ssuser as $key => $item) { ?> 
		       		 <option <?php  if($item['username'] == $dev['username']) { ?>selected<?php  } ?> value="<?php  echo $item['username'];?>"><?php  echo $item['username'];?></option>
		        	<?php  } } ?>  
		    	</select> 
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">所属公众号</label>
		    <div class="col-sm-10">
		    	<select id="uniacid" name="uniacid" class="form-control"> 
		    		<option value="<?php  echo $_W['uniacid'];?>"><?php  echo $_W['uniaccount']['name'];?></option>
		    		 <?php  if(is_array($uniList)) { foreach($uniList as $key => $item) { ?> 
		       		 <option <?php  if($item['uniacid'] == $dev['uniacid']) { ?>selected<?php  } ?> value="<?php  echo $item['uniacid'];?>"><?php  echo $item['name'];?></option>
		        	<?php  } } ?> 
		    	</select> 
		    </div>
		  </div>
		  
		  <div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">合作用户</label>
		    <div class="col-sm-10"> 
		      
		      <select id="unuser" name="hzunuser" class="form-control"> 
		      		<option value="">无</option>
		    		<?php  if(is_array($ssuser)) { foreach($ssuser as $key => $item) { ?> 
		       		 <option value="<?php  echo $item['username'];?>"><?php  echo $item['username'];?></option>
		        	<?php  } } ?>  
		    	</select> 
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备类型</label>
		    <div class="col-sm-10">
		      	<div class="radio">
				  <label>
				    <input type="radio" name="devtype" checked="true" id="devtype1" value="1">
				   	GPRS版本
				  </label>
				</div>
		    </div>
		  </div>
		  
		   
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">脉冲宽度</label>
		    <div class="col-sm-10">
		      
		      <div class="input-group"> 
				  <input type="text" class="form-control" value="<?php  echo $dev['cycle'];?>" id="cycle" name="cycle" placeholder="">
				  <span class="input-group-addon">ms</span>
				</div> 
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">脉冲间隔</label>
		    <div class="col-sm-10">
		      
		      <div class="input-group"> 
				  <input type="text" class="form-control" value="<?php  echo $dev['interval'];?>" id="interval" name="interval" placeholder="">
				  <span class="input-group-addon">ms</span>
				</div> 
		    </div>
		  </div>
		  
		  <?php  if($_W['username']!='admin') { ?>  
		  <span style="display: none">
		  <?php  } ?>
		    
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">网络版参数填写</label>
		    <div class="col-sm-10">
		      <div class="alert alert-info" role="alert">网络版参数填写</div>
		       
				  
				  <div class="form-group">  
				    <label for="lab" class="col-sm-2 control-label">心跳周期</label>
				    <div class="col-sm-10">
				      
				      <div class="input-group"> 
						  <input type="text" class="form-control" value="<?php  echo $dev['heartbeat'];?>" id="heartbeat" name="heartbeat" placeholder="仅用于第六代">
						  <span class="input-group-addon">秒</span>
						</div> 
				    </div>
				  </div>
				   
				  <div class="form-group">  
				    <label for="lab" class="col-sm-2 control-label">礼品库存</label>
				    <div class="col-sm-10">
				      
				      <div class="input-group"> 
						  <input type="text" class="form-control" id="giftnum" value="<?php  echo $dev['giftnum'];?>" name="giftnum" placeholder="">
						  <span class="input-group-addon">个</span>
						</div> 
						库存为-1不启用
				    </div>
				  </div>
		      
		    </div>
		  </div>
		  <?php  if($_W['username']!='admin') { ?>
		  </span> 
		  <?php  } ?>
		  
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备LOGO</label>
		    <div class="col-sm-10"> 
		      <?php  echo tpl_form_field_image('devlogo',$dev['devlogo']);?>
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">报障电话</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="telnum" value="<?php  echo $dev['telnum'];?>" name="telnum" placeholder="">
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备营业时间</label>
		    <div class="col-sm-10">
		    
		    	<div class="row">
				  <div class="col-xs-4"><?php  echo tpl_form_field_clock('bustime1',explode('-',$dev['bustime'])['0'])?></div>
				  <div class="col-xs-4" style="text-align: center;">到</div>
				  <div class="col-xs-4"><?php  echo tpl_form_field_clock('bustime2',explode('-',$dev['bustime'])['1'])?></div>
				</div>
		    
		      
		    </div>
		  </div>
		  
		  
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备特色</label>
		    <div class="col-sm-10"> 
		    	 <?php  echo tpl_ueditor('feature',$dev['feature'])?>
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备广告图片</label>
		    <div class="col-sm-10"> 
		      <?php  echo tpl_form_field_multi_image('live',explode(';',$dev['live']));?>  
		      设备广告图片将已幻灯片的形式展示。建议图片大小：720*400
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">设备所在地区</label>
		    <div class="col-sm-10"> 
		      <?php  echo tpl_form_field_district('addrstr',array('province'=>$dev['province'],'city'=>$dev['city'],'district'=>$dev['area']));?>
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">详细地址</label>
		    <div class="col-sm-10"> 
		        <input type="text" class="form-control" value="<?php  echo $dev['address'];?>" id="address" name="address" placeholder="">
		    </div>
		  </div>
		  
		   <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">地图标识</label>
		    <div class="col-sm-10"> 
		        <?php  echo tpl_form_field_coordinate('mapstr',array('lng'=>$dev['lng'],'lat'=>$dev['lat']));?>
		    </div>
		  </div>
		  
		   <div class="form-group" style="display: none;">  
		    <label for="lab" class="col-sm-2 control-label">商家通知设置</label>
		    <div class="col-sm-10"> 
		       <div class="input-group">
				  <span class="input-group-addon">邮箱</span>
				  <input type="email" class="form-control" value="<?php  echo $dev['busemail'];?>" name="busemail" id="busemail" aria-label="">
				  <span class="input-group-addon"><input type="checkbox" name="emailonoff" value="0" id="emailonoff" onclick="funCheckOnOff(this)">开启</span>
				</div>
		    </div>
		  </div>
		  
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">排序</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" value="<?php  echo $dev['dsort'];?>" id="dsort" name="dsort" placeholder="数字越大，越靠前">
		    </div>
		  </div>
		  
		  <div class="form-group">  
		    <label for="lab" class="col-sm-2 control-label">状态</label>
		    <div class="col-sm-10">
		    		
		    	 <label>
				    <input type="radio" name="dstate" <?php  if($dev['dstate'] == 1) { ?>checked<?php  } ?> id="dstate1" value="1">
					  开启
				  </label>
		    	
		     	 <label>
				    <input type="radio" name="dstate" <?php  if($dev['dstate'] == 0) { ?>checked<?php  } ?> id="dstate0" value="0">
					  关闭
				  </label>
		    </div>
		  </div>
		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		    	<input type="hidden" name="id" value="<?php  echo $_GPC['devid'];?>">
		      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		      <input type="submit" name="save" class="btn btn-success" value="保存"> 
		    </div> 
		  </div>
		</form> 
  </div>
</div>
<script type="text/javascript">
    function funSubmit(){
         var devName=$("#devName").val();
         if(devName==""){
             	alert("设备名称不能为空");
				return false;
         } 

         var devNum=$("#devNum").val();
         if(devNum==""){
             	alert("设备ID不能为空");
				return false;
         } 

         var uniacid=$("#uniacid").val();
         if(uniacid==""){
             	alert("公众号不能为空");
				return false;
         } 

         var username=$("#username").val();
         if(username==""){
             	alert("所属用户不能为空");
				return false;
         } 
         
         
		 return true; 
    }

    function funCheckOnOff(obj){
    	 
		if($(obj).prop("checked")){
			 $(obj).val("1");
			
		}else{
			$(obj).val("0"); 
		 }
	 
     }
	function funSetDevNum(obj){
		$("#devNum").val($(obj).val());
	}

    $(function(){

    	 var editor = UE.getEditor('devRemark', ueditoroption);
 	    editor.addListener('contentChange', function() {
 	        //此处增加了侦听编辑器内容变化的事件
 	        //do something 
 	    });

 	    editor.addListener('ready', function(){
 	        //此处增加了侦听编辑器初始化的事件
 	        //do something 
 	    });

 	    var state="<?php  echo $dev['dstate'];?>";  
 	    var username="<?php  echo $dev['username'];?>";  
 	    var unuser="<?php  echo $dev['unuser'];?>";
 	   var devtype="<?php  echo $dev['devtype'];?>";
 	    if(devtype=='1'){ 
			 $("#devtype1").attr("checked","true");
		 }
	     
 	    $("#username").val(username);
 	   $("#unuser").val(unuser);
	  	 if(state=='0'){ 
			 $("#dstate0").attr("checked","true");
		 }
	  	 else{
	  		$("#dstate1").attr("checked","true");
		 } 
	  	 var emailonoff="<?php  echo $dev['emailonoff'];?>"; 
	  	 if(emailonoff=='0'){ 
	  		 $("#emailonoff").val(0);
			 $("#emailonoff").prop("checked",false);
		 }
	  	 else if(emailonoff=='1'){
	  		$("#emailonoff").val(1);
	  		$("#emailonoff").prop("checked",true); 
		 }  
	  	  
    });
     
	
</script>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>