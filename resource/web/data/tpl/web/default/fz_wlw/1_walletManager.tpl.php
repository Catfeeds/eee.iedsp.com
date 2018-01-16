<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="clearfix">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">查询</h3>
  </div>
  <div class="panel-body">
     <form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funQuerySubmit()"> 
		 
		 <div class="col-sm-6"> 
	 		<div class="form-group">  
			    <label for="lab" class="col-sm-5 control-label">产生方式</label>
			    <div class="col-sm-7">
			       <select id="chanceMode" name="chanceMode" class="form-control"> 	
			       	 	<option value="">所有</option>
			    		<option value="1">奖金收益</option>
			    		<option value="2">销售收益</option>
			    		<option value="3">账户现金</option>
			    		<option value="4">投币收益</option>
			    	</select>
			    </div>
			  </div>
		 </div>
		 
		 <div class="col-sm-6"> 
		 		<div class="form-group">  
				    <label for="lab" class="col-sm-5 control-label">产生类型</label>
				    <div class="col-sm-7"> 
				      <select id="chanceType" name="chanceType" class="form-control"> 	
				       	 	<option value="">所有</option>
				    		<option value="1">收入</option>
				    		<option value="2">支出</option>
				    		<option value="3">冻结</option>
				    		<option value="4">解冻</option>
				    		<option value="5">预计收入</option>
				    	</select> 
				    </div>
				  </div>
		 </div> 
		 
		  <div class="col-sm-6"> 
		  		<div class="form-group">  
			    <label for="lab" class="col-sm-5 control-label">时间查询</label>
			    <div class="col-sm-7">
			    	<?php echo tpl_form_field_daterange('time', array('starttime'=>($starttime ? date('Y-m-d', $starttime) : false),'endtime'=> ($endtime ? date('Y-m-d', $endtime) : false)));?>
			    </div>
			  </div>
		  </div>
		  
		   <div class="col-sm-6"> 
		  		<div class="form-group">  
			    <label for="lab" class="col-sm-5 control-label">流水号</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php  echo $_GPC['serialNumber'];?>" id="serialNumber" name="serialNumber" placeholder="订单号">
			    </div>
			  </div>
		  </div>
		
		<?php  if($_W['username']=='admin') { ?>  
		  	<div class="col-sm-6"> 
		  		<div class="form-group">  
			    <label for="lab" class="col-sm-5 control-label">用户名</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php  echo $_GPC['username'];?>" id="username" name="username" placeholder="用户名">
			    </div>
			  </div>
		 	 </div>
		  <?php  } ?>
		  
		   <div class="col-sm-6"> 
		  		<div class="form-group">  
			    <label for="lab" class="col-sm-5 control-label">设备号</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php  echo $_GPC['devNum'];?>" id="devNum" name="devNum" placeholder="设备号">
			    </div>
			  </div>
		 	 </div>
		  
		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10"> 
		      <input type="hidden" name="devid" value="<?php  echo $_GPC['devid'];?>">
		      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		      <input type="submit" name="query" id="btn_query" class="btn" value="查询"> 
		      <input type="hidden" name="page" id="page" value="1">
		    </div> 
		  </div>
		</form> 
  </div>
</div>

<div class="alert alert-success" role="alert" style="text-align: left;">
	<span style="color: red;">账户余额:<?php  echo $userBalance;?> &nbsp;&nbsp;  累计收益:<?php  echo $userLeijie;?></span>
	<br/>
	查询金额统计：<?php  echo $total_money['total_money'];?> 元
</div>

<div class="panel panel-default"> 
  <div class="panel-body table-responsive">
    	<table class="table table-bordered table-hover">
    		<thead>
				<tr>
					<th>用户名</th>
					<th width="150px">设备id</th>
                    <th>产生金额</th> 
                    <th>产生方式</th>  
                    <th>产生类型</th>  
                    <th>产生原因</th>  
                    <th>流水号</th> 
                    <th>产生时间</th>  
                    <th>备注</th> 
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($res)) { foreach($res as $key => $item) { ?>
					<tr>
					 	<td><?php  echo $item['username'];?></td>
					 	<td style="white-space:normal;"><?php  echo $item['devNum'];?></td> 
					 	<td><?php  echo $item['chanceMoney'];?></td> 
					 	<td>
					 		<?php  if($item['chanceMode']=='1' ) { ?>
					 			<span style="color:green;">奖金收益</span>
					 		<?php  } ?>
					 		<?php  if($item['chanceMode']=='2' ) { ?>
					 			<span style="color:red;">销售收益</span>
					 		<?php  } ?>
					 		<?php  if($item['chanceMode']=='3' ) { ?>
					 			账户现金
					 		<?php  } ?>
					 		<?php  if($item['chanceMode']=='4' ) { ?>
					 			<span style="color:blue;">投币收益</span>
					 		<?php  } ?>
					 	</td> 
					 	<td>   
					 		<?php  if($item['chanceType']=='1' ) { ?>
					 			<span style="color:green;">收入</span>
					 		<?php  } ?>
					 		<?php  if($item['chanceType']=='2' ) { ?>
					 			<span style="color:red;">支出</span>
					 		<?php  } ?>
					 		<?php  if($item['chanceType']=='3' ) { ?>
					 			<span style="color:blue;">冻结</span>
					 		<?php  } ?>
					 		<?php  if($item['chanceType']=='4' ) { ?>
					 			<span style="color:green;">解冻</span>
					 		<?php  } ?>
					 		<?php  if($item['chanceType']=='5' ) { ?>
					 			<span style="color:green;">预计收入</span>
					 		<?php  } ?>
					 	</td>  
					 	 <td style="white-space:normal;"><?php  echo $item['chanceReason'];?></td>  
					 	 <td><?php  echo $item['serialNumber'];?></td>  
					 	 <td style="white-space:normal;"><?php  echo $item['chanceTime'];?></td>  
					 	 
					 	<td style="white-space:normal;"><?php  echo $item['remark'];?></td>
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
</div>
<form class="form-horizontal" action="" method="post" id="frmdel">  
     <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
</form>
<script type="text/javascript">
	function funQuerySubmit(){
		 
		 return true; 
	}
    
	function funDelete(id){
		if(id==""){
			return;
		}
		var agr="温馨提示：您确定要删除吗？";
		if(window.confirm(agr)){
			$("#delId").val(id);
			$("#frmdel").submit();
		}
     }

    $(function(){
		var chanceMode="<?php  echo $_GPC['chanceMode'];?>";
		$("#chanceMode").val(chanceMode);

		var chanceType="<?php  echo $_GPC['chanceType'];?>";
		$("#chanceType").val(chanceType);
    	  
    });

    function setPageIndex(page){
		$("#page").val(page); 
		$("#btn_query").click();
    }
      
</script>

  

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>