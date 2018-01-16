<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	#allTwoCode td{ padding-bottom: 25px;line-height: 24px;font-weight: bold;}
</style>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
    	扫一扫手机管理
    	<?php  if($_W['username']=='admin') { ?>  
			<a class="label label-info" href="<?php  echo url('site/entry/devAdd', array('m' => 'fz_wlw'));?>" >添加设备</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="label label-info" href="<?php  echo url('site/entry/txManager', array('m' => 'fz_wlw'));?>" >提现记录</a>
		 <?php  } ?>
    </h3>
  </div> 
  <div class="panel-body">
  		<div id="phone_manager"> 
  		</div>
  		<?php  if($_W['role']=='manager') { ?>
  		<span style="color: red;">点击链接复制到自定义菜单</span>
  		<span onclick="funCopyUrl(this)"><?php  echo $_W['siteroot']?>app/index.php?c=entry&do=devHome&m=fz_wlw&i=<?php  echo $_W['uniacid'];?></span>
 		<a href="index.php?c=platform&a=menu&" target="_blank">点击去自定义菜单添加[例如:设备管理]</a>
 		<br/>
 		 <!-- 
 		 <span style="color: red;">点击链接复制到自定义菜单</span>
  		<span onclick="funCopyUrl(this)"><?php  echo $_W['siteroot']?>app/index.php?c=mc&do=home&i=<?php  echo $_W['uniacid'];?></span>
 		<a href="index.php?c=platform&a=menu&" target="_blank">点击去自定义菜单添加[例如:会员中心]</a>
 		 <br/>
 		  -->
 		 
  		<span onclick="funCopyUrl(this)"><?php  echo $_W['siteroot']?>app/index.php?c=entry&do=memberBuyOrder&m=fz_wlw&i=<?php  echo $_W['uniacid'];?></span>
 		<a href="index.php?c=platform&a=menu&" target="_blank">点击去自定义菜单添加[例如:历史订单]</a> 
 		
 		<?php  } ?>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">设备列表</h3>
  </div> 
  <div class="panel-body">
     <form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funSubmit()"> 
		  
		  <div class="col-sm-6"> 
		  		 <div class="form-group">  
				    <label for="lab" class="col-sm-5 control-label">设备名称</label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="devName" value="<?php  echo $_GPC['devName'];?>" name="devName" placeholder="设备名称">
				    </div>
				  </div>
		  </div>
		   
		   <div class="col-sm-6"> 
		  		 <div class="form-group">  
				    <label for="lab" class="col-sm-5 control-label">设备编号</label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="devNo" value="<?php  echo $_GPC['devNo'];?>" name="devNo" placeholder="输入编号">
				    </div>
				  </div>
		  </div>
		 
		  
		   <div class="col-sm-6"> 
		   		 <div class="form-group">  
				    <label for="lab" class="col-sm-5 control-label">所属用户</label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="username" value="<?php  echo $_GPC['username'];?>" name="username" placeholder="所属用户">
				    </div>
				  </div>
		   </div>
		  
		  <div class="col-sm-6"> 
		  		 <div class="form-group" style="display: none;">  
				    <label for="lab" class="col-sm-5 control-label">状态</label>
				    <div class="col-sm-7">
				    		
				    	 <label>
						    <input type="radio" name="state" id="state1" value="1">
							  开启
						  </label>
				    	
				     	 <label>
						    <input type="radio" name="state" id="state0" value="0">
							  关闭
						  </label>
				    </div>
				  </div> 
		  </div>
		    
		 
		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		      <input type="submit" name="query" class="btn btn-success"  id="btn_query" value="查询"> 
		      <input type="button" class="btn btn-info" value="设备转移" onclick="funChangeDev()"> 
		      
		      <?php  if($_W['username']=='admin') { ?> 
		      <input type="button" class="btn btn-success" value="地图分布" onclick="funShowMap('0','0')"> 
		      
		      <input type="button" class="btn btn-success" value="打印二维码" onclick="funShowAllTwoCode()"> 
		      
		      <?php  } ?>
		      <input type="hidden" name="page" id="page" value="1">
		    </div> 
		  </div>
		</form> 
  </div>
</div>

<ul class="nav nav-tabs">

	<li <?php  if(!isset($_GPC['status'])) { ?> class="active" <?php  } ?>>
		<a href="<?php  echo url('site/entry/devList', array('m' => 'fz_wlw'));?>">在线设备</a>
	</li> 
	<li <?php  if(isset($_GPC['status'])) { ?> class="active" <?php  } ?> >
		<a href="<?php  echo url('site/entry/devList', array('m' => 'fz_wlw','status'=>0));?>">离线设备</a>
	</li> 
</ul>
<div class="alert alert-success" role="alert" style="text-align: left;">
	设备数量:<?php  echo $total;?>个
</div>

<div class="panel panel-default"> 
  <div class="panel-body table-responsive"> 
  		
    	<table class="table table-bordered table-hover">
    		<thead>
				<tr>
					<th style="width: 50px;"><input type="checkbox" onclick="funSelectAll(this)"></th> 
                    <th >设备名</th>
                    <th width="160px">设备ID</th>
                    <th >设备地址</th>
                    <th width="50px">状态</th>
                    <th>在线状态</th>
                    <th style="display: none;">类型</th> 
                    <th>所属用户</th>
                    <th>二维码</th>
                    <th width="160px">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($res)) { foreach($res as $key => $item) { ?>
					<tr>
						<td>
							<input type="checkbox" name="chk_dev" dev_id="<?php  echo $item['Id'];?>" dev_user="<?php  echo $item['username'];?>" id="chk_<?php  echo $item['Id'];?>"/>
						</td>
					  
					 	<td>
					 		<?php  echo $item['devname'];?>
					 		<br/> 
					 		 编号:<?php  echo $item['Id'];?>
					 	</td>
					 	<td>
					 		<?php  echo $item['devNum'];?>  
					 		<br/>
					 		<?php  if($item['simNo']!='') { ?>
					 			卡号:<?php  echo substr($item['simNo'],15,5)?>
					 		<?php  } ?>
					 	</td>
					 	<td style="font-size: 12px;"> 
					 		 <?php  if($item['gpsAddr']!='' && $item['gpsAddr']!='0') { ?>
					 			<?php  echo $item['gpsAddr'];?> 
					 			 <a onclick='funShowMap("<?php  echo $item['lat'];?>","<?php  echo $item['lng'];?>")'>地图</a>
					 		 <?php  } ?>
					 		 <?php  if($item['gpsAddr']=='' || $item['gpsAddr']=='0') { ?>
					 			<?php  echo $item['province'];?>
						 		<?php  echo $item['city'];?><br/>
						 		<?php  echo $item['area'];?>
					 		 <?php  } ?>
					 		
					 		</td>
					 	<td>
					 	 
					 		<?php  if($item['dstate']=='1' ) { ?>
					 			<span style="color: green;">启用</span>
					 		<?php  } ?>
					 		<?php  if($item['dstate']=='0' ) { ?>
					 			<span style="color:red;">停用</span>
					 		<?php  } ?>
					 	</td>
					 	<td>
					 	 
					 		<?php  if($item['bkTime']>(time()-$item['heartbeat']) ) { ?>
					 			<span style="color: green;">在线</span>
					 			<br/>信号:<?php  echo $item['rssi'];?>(0到31)
					 		<?php  } else { ?> 
					 			<span style="color:red;">离线</span> 
					 		<?php  } ?>
					 	</td>
					 	<td style="display: none;"><?php  echo $item['devtype'];?></td>
					 	<td><?php  echo $item['username'];?></td>
					 	<td>
					 		<a class="btn btn-default" onclick="funCreateTwoCode('<?php  echo $item['Id'];?>','<?php  echo $item['username'];?>')" role="button">
					 			二维码下载
					 		</a> 
					 		 
					 		<br/>
					 		<a class="btn btn-default" target="_blank" href="<?php  echo $_W['siteroot']?>app/index.php?c=entry&do=buyList&m=fz_wlw&devid=<?php  echo $item['Id'];?>&i=<?php  echo $_W['uniacid'];?>" role="button">
					 			 预览 
					 		</a>
					 	</td>
					 	<td>
					 		<a class="btn btn-default" href="<?php  echo url('site/entry/devAdd', array('m' => 'fz_wlw','devid'=>$item['Id']));?>" role="button">
					 			设备编辑
					 		</a>
					 		<br/>
					 		<a class="btn btn-default" href="<?php  echo url('site/entry/packageList', array('m' => 'fz_wlw','devid'=>$item['Id']));?>" role="button">
					 			套餐编辑
					 		</a>
					 		<?php  if($_W['username']=='admin') { ?>  
					 		<br/>
					 		<a class="btn btn-default" href="javascript:void(0)" onclick="funCopyDev('<?php  echo $item['devname'];?>','<?php  echo $item['Id'];?>')"  role="button">
					 			复制
					 		</a>
					 		<a class="btn btn-default" href="javascript:void(0)" onclick="funDelete('<?php  echo $item['devname'];?>','<?php  echo $item['Id'];?>')"  role="button">
					 			删除
					 		</a>
					 		<?php  } ?>
					   </td>
					   <td class="latlng" style="display: none;"><?php  echo $item['lat'];?>-<?php  echo $item['lng'];?></td>
					</tr> 
			    <?php  } } ?>
				 
			</tbody>
						
	 </table> 
	 
	  <!-- 分页 -->
	 <div style="text-align: center;margin-top: 10px;">
	 <?php  echo $pager;?>
     </div>	
	 <!-- 分页end -->
	 		
  </div>
</div>
<form class="form-horizontal" action="" method="post" id="frmdel"> 
	 <input type="hidden" name="delId" id="delId" value=""> 
     <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
</form>


<script type="text/javascript">
    function funSubmit(){
        
         
		 return true;
    }

    function funCopyUrl(obj){
      
    	util.clip(obj, $(obj).text());
    }
    
    var uniacid="<?php  echo $_W['uniacid'];?>";
  $(function(){ 
	  require(['jquery.qrcode'], function(){
  		var url ="<?php  echo $_W['siteroot']?>app/index.php?c=entry&do=devHome&m=fz_wlw&i="+uniacid;
  		$('#phone_manager').html('').qrcode({
  			render: 'canvas',
  			width: 200,
  			height: 200, 
  			text: url
  		});
  	});
		
 });

  function funDownLoadCode(){
	  	var devid=$("#dev_id").val();
		 //var url="<?php  echo url('site/entry/downLoadCode', array('m' => 'fz_wlw','devid'=>"+devid+",'i'=>$_W['uniacid']));?>";
		 var url ="<?php  echo $_W['siteroot']?>app/index.php?c=entry&do=downLoadCode&m=fz_wlw&devid="+devid+"&i="+uniacid;
	 
		 window.open(url);
		//window.location=url;
 }
  
    function funCreateTwoCode(devid,username){
     
    	require(['jquery.qrcode'], function(){
    		var url ="<?php  echo $_W['siteroot']?>app/index.php?c=entry&do=buyList&m=fz_wlw&devid="+devid+"&i="+uniacid;
		 //	$("#dev_qrcode").attr('href',url);
		 	$("#dev_id").val(devid);
		 	$("#tip_devid").html(devid);
		 	$("#tip_username").html(username);
    		$('#dev_qrcode').html('').qrcode({
    			render: 'canvas',
    			width: 250,
    			height: 250, 
    			text: url
    		}); 
    		
    	});

    	$('#myModal_addMode').modal('toggle'); 
    }

	function funCopyDev(devname,id){
		$("#devname").val(devname);
		$("#devid").val(id);
		$('#myModal_copyDev').modal('show'); 
	}
	function funCopySubmit(){
		var devname=$("#devname").val();
		var devNum=$("#devNum").val();
		if(devname=="" || devNum==""){
			alert("设备名称和设备id不能为空");
			return false;
		}
		 return true;
   }

	function funDelete(name,id){
		if(id==""){
			return;
		}
		var agr="温馨提示：您确定要删除"+name+"吗？";
		if(window.confirm(agr)){
			$("#delId").val(id);
			$("#frmdel").submit();
		}
     }

	 function funSetDevNum(obj){
		$("#devNum").val($(obj).val());
	}

	 function funChangeDev(){
		 var ids="";
		$("input[name='chk_dev']").each(function(){
			 if($(this).prop("checked")){
				var dev_id=$(this).attr("dev_id");
				if(ids!=""){ 
					ids+="#"; 
				}
				ids+=dev_id;
			}
		});
		//alert(ids);
		if(ids==""){
			alert("请选择设备");
			return;
		} 
		$("#changeDevs").val(ids);
		$('#myModal_changeDev').modal('show'); 
     }
	function funChangeSubmit(){
		var changeDevs=$("#changeDevs").val();
		var newUsername=$("#newUsername").val();
		if(changeDevs=="" || newUsername==""){
			alert("请选择转移的用户");
			return false;
		}
		 return true;
	}

	 function setPageIndex(page){
			$("#page").val(page); 
			$("#btn_query").click();
	    }

	  function funShowAllTwoCode(){
		  var ids=""; 
		  var line_count=1;

		  $("#allTwoCode").find("td").each(function(){
				$(this).html("");
			  });
		  
			$("input[name='chk_dev']").each(function(){
				 if($(this).prop("checked")){
					var dev_id=$(this).attr("dev_id");
					var dev_user=$(this).attr("dev_user");
					if(ids!=""){ 
						ids+="#";  
					}
					ids+=dev_id;
 
					var url ="<?php  echo $_W['siteroot']?>app/index.php?c=entry&do=buyList&m=fz_wlw&devid="+dev_id+"&i="+uniacid;
					$("#code"+line_count).html('').qrcode({
		    			render: 'canvas',
		    			width: 200,
		    			height:200, 
		    			text: url
		    		});  
		    		
					$("#code"+line_count).append("<div >编号:"+dev_id+"</div>");
					$("#code"+line_count).append("<div>所属用户:"+dev_user+"</div>");
					line_count++;
				}
			});
			//alert(ids);
			if(ids==""){
				alert("请选择设备");
				return;
			} 
 
		  $('#myModal_allTwoCode').modal('show'); 
		}

		function funSelectAll(obj){
			if($(obj).prop("checked")){
				$("input[name='chk_dev']").each(function(){
					$(this).prop("checked",true);
				});
			}else{
				$("input[name='chk_dev']").each(function(){
					$(this).prop("checked",false);
				});
			}
		}
</script>
<!-- Modal 弹出二维码 -->
<div class="modal fade" id="myModal_addMode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">二维码</h4>
      </div>
      <div class="modal-body" style="text-align: center;"> 
      	  <a id="dev_qrcode" style="display: block;"></a>
      	  <input type="hidden" id="dev_id" value="">
      	  <div style="color: red;">
      	  	编号:<span id="tip_devid"></span><br/>
      	  	所属用户:<span id="tip_username"></span>
      	  	</div>
      	 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> 
        <button type="button" class="btn btn-success" onclick="funDownLoadCode()">下载</button>    
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal_allTwoCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">截图二维码</h4>
      </div>
      <div class="modal-body" style="text-align: center;">  
      	   <table width="100%" id="allTwoCode" border="0">
      			 <tr >
      			 	<td id="code1"></td>
      			 	<td id="code2"></td>
      			 	<td id="code3"></td>
      			 </tr>
      			 <tr>
      			 	<td id="code4"></td>
      			 	<td id="code5"></td>
      			 	<td id="code6"></td>
      			 </tr>
      			 <tr>
      			 	<td id="code7"></td>
      			 	<td id="code8"></td>
      			 	<td id="code9"></td>
      			 </tr>
      			 <tr>
      			 	<td id="code10"></td>
      			 	<td id="code11"></td>
      			 	<td id="code12"></td>
      			 </tr>
      			 
      		</table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>   
      </div>
    </div>
  </div>
</div>
<!-- Modal 弹出二维码  end--> 
<!-- Modal 复制设备 -->
<div class="modal fade" id="myModal_copyDev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">复制设备</h4>
      </div>
      <div class="modal-body" style="text-align: center;"> 
      	  <form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funCopySubmit()"> 
			  <div class="form-group">  
			    <label for="lab" class="col-sm-2 control-label">设备名称</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="devname" value="" name="devname" placeholder="设备名称">
			    </div>
			  </div>
			  <div class="form-group">  
			    <label for="lab" class="col-sm-2 control-label">设备ID</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="devNum" value="" name="devNum" placeholder="设备ID">
			      <select class="form-control" onchange="funSetDevNum(this)">
			      		<option value="" >可选择</option>
			      		<?php  if(is_array($fz_devuse)) { foreach($fz_devuse as $key => $item) { ?>
			      			<option value="<?php  echo $item['devnum'];?>"><?php  echo $item['devnum'];?></option>
			      		<?php  } } ?> 
			      </select>
			    </div> 
			  </div>
		   
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10"> 
		      <input type="hidden" name="devid" value="" id="devid">
		      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		      <input type="submit" name="copy" class="btn btn-success" value="复制"> 
		    </div> 
		  </div>
		</form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> 
      </div>
    </div>
  </div>
</div>
<!-- Modal 复制设备  end--> 
<!-- Modal 转移设备 -->
<div class="modal fade" id="myModal_changeDev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">转移设备</h4>
      </div>
      <div class="modal-body" style="text-align: center;"> 
      	  <form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funChangeSubmit()"> 
			   
			  <div class="form-group">  
			    <label for="lab" class="col-sm-2 control-label">转移到</label>
			    <div class="col-sm-10">
			      <select id="newUsername" name="newUsername" class="form-control">  
		    		<option value="">请选择</option>
		    		<?php  if(is_array($ssuser)) { foreach($ssuser as $key => $item) { ?> 
		       		 <option value="<?php  echo $item['username'];?>"><?php  echo $item['username'];?></option>
		        	<?php  } } ?>  
		    	</select> 
			    </div> 
			  </div>
		   <?php  if($_W['role']=='manager') { ?>
		    <div class="form-group">  
			    <label for="lab" class="col-sm-2 control-label">重置设备名称</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="newDevname" value="" name="newDevname" placeholder="不填默认为原来的">
			    </div>
			</div>
			<?php  } ?>
		   
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10"> 
		      <input type="hidden" name="changeDevs" value="" id="changeDevs">
		      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		      <input type="submit" name="changeDevUser" class="btn btn-success" value="转移"> 
		    </div> 
		  </div>
		</form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> 
      </div>
    </div>
  </div>
</div>
<!-- Modal 转移设备  end--> 
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=r30FeHO0qF7gX6HrsxG8WPyS"></script>

<!-- Modal 设备分布 -->
<div class="modal fade" id="myModal_map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">设备分布</h4>
      </div>
      <div class="modal-body" style="text-align: center;"> 
      	   <div id="allmap" style="width: 700px;height: 400px;margin: auto;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> 
      </div>
    </div>
  </div>
</div>
<!-- Modal 设备分布  end-->
<script type="text/javascript">

function funShowMap(lat_s,lng_s){ 

	 $("#allmap").html("");
	 $('#myModal_map').modal('show');
	 var lat=31.376746;
	 var lng=120.943083;
	 if(lat_s!="0" && lat_s!=""){
		 lat=parseFloat(lat_s);
		 lng=parseFloat(lng_s);  
      } 
	// 百度地图API功能
	var map = new BMap.Map("allmap");
    map.enableScrollWheelZoom(true);
	
	var point = new BMap.Point(lng,lat);
	map.centerAndZoom(point, 12);

	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);               // 将标注添加到地图中
	marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
	
	// 编写自定义函数,创建标注
	function addMarker(point){
	  var marker = new BMap.Marker(point);
	  map.addOverlay(marker);
	}

	/*
    $(".latlng").each(function(){
        	var ll_s=$.trim($(this).html());
        	if(ll_s=="" || ll_s=="-" || ll_s=="0-0"){
				 
            }else{
            	lat=parseFloat(ll_s.split('-')[0]);
       		 	lng=parseFloat(ll_s.split('-')[1]); 
       		 	 
            	 point = new BMap.Point(lng,lat);
            	addMarker(point); 
           } 
    });  

    */
    	
	 
	
 }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>