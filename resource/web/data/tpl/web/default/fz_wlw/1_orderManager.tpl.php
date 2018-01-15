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
			    <label for="lab" class="col-sm-5 control-label">订单状态</label>
			    <div class="col-sm-7">
			       <select id="paystate" name="paystate" class="form-control"> 	
			       	 	<option value="">所有</option>
			    		<option value="0">未支付</option>
			    		<option value="1">已支付</option>
			    		<option value="3">已退款</option>
			    	</select>
			    </div>
			  </div>
		 </div>
		 
		 <div class="col-sm-6"> 
		 		<div class="form-group">  
				    <label for="lab" class="col-sm-5 control-label">订单状态</label>
				    <div class="col-sm-7"> 
				      <select id="paysend" name="paysend" class="form-control"> 	
				       	 	<option value="">所有</option>
				    		<option value="0">未触发</option>
				    		<option value="1">已触发</option>
				    		<option value="2">触发成功</option>
				    		<option value="3">触发失败</option>
				    		<option value="4">申请退款</option>
				    		<option value="5">已退款</option>
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
			    <label for="lab" class="col-sm-5 control-label">订单号</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php  echo $_GPC['query_id'];?>" id="query_id" name="query_id" placeholder="订单号">
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
	记录数:<?php  echo $total_money['total_count'];?>条 &nbsp;查询金额统计：<?php  echo $total_money['total_money'];?> 元
</div>

<div class="panel panel-default"> 
  <div class="panel-body table-responsive">
    	<table class="table table-bordered table-hover">
    		<thead>
				<tr>
					<th>订单号</th>
					<th width="160px;">收款用户/设备号</th>
                    <th>购买用户</th> 
                    <th>金额(元)</th>  
                    <th>信号数</th>  
                    <th>订单状态</th>  
                    <th>触发状态</th> 
                    <th>下单时间</th> 
                    <th>支付信息</th> 
                    <th>设备描述</th>
                    
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($res)) { foreach($res as $key => $item) { ?>
					<tr>
					 	<td><?php  echo $item['id'];?></td>
					 	<td>
					 	<?php  echo $item['username'];?><br/>
					 	<?php  echo $item['devNum'];?>
					 	</td> 
					 	<td><?php  echo $item['buyuser'];?></td> 
					 	<td><?php  echo $item['paymoney'];?></td>
					 	<td><?php  echo $item['paynum'];?></td>  
					 	<td>  
					 		<?php  if($item['paystate']=='0' ) { ?>
					 			<span style="color: black;">未支付</span>
					 		<?php  } ?>
					 		<?php  if($item['paystate']=='1' ) { ?>
					 			<span style="color:green;">已支付</span> 
					 		<?php  } ?>
					 		<?php  if($item['paystate']=='2' ) { ?>
					 			<span style="color:red;">已退款</span>
					 		<?php  } ?>
					 	</td>  
					 	<td>  
					 		<?php  if($item['paysend']=='0' ) { ?>
					 			<span style="color: black;">未触发</span>
					 		<?php  } ?>
					 		<?php  if($item['paysend']=='1' ) { ?>
					 			<span style="color:blue;">已触发</span> 
					 		<?php  } ?>
					 		<?php  if($item['paysend']=='2' ) { ?>
					 			<span style="color:green;">触发成功</span>
					 		<?php  } ?>
					 		<?php  if($item['paysend']=='3' ) { ?>
					 			<span style="color:red;">触发失败</span>
					 		<?php  } ?>
					 		<?php  if($item['paysend']=='4' ) { ?>
					 			<span style="color:red;">已申请退款</span>
					 		<?php  } ?>
					 		<?php  if($item['paysend']=='5' ) { ?>
					 			<span style="color:red;">退款成功</span>
					 		<?php  } ?>
					 		 
					 		<?php  if($item['paystate']=='1' ) { ?> 
					 			<?php  if($_W['username']=='admin') { ?> 
					 				<?php  if($item['paysend']!='2' ) { ?>
					 				<br/>
					 				<a style="color: red;" href="<?php  echo url('site/entry/orderManager', array('m' => 'fz_wlw','setPayStateId'=>$item['id']));?>">退款审核</a>
					 				<?php  } ?>
					 			<?php  } ?>
					 		<?php  } ?>
					 		<br/>
					 		<span><?php  echo $item['remark'];?></span>
					 	</td>  
					 	<td style="white-space:normal;"><?php  echo date("Y-m-d H:i:s",$item['addtime'])?></td>   
					 	<td style="white-space:normal;width: 120px;">
					 		 <?php  if($item['paytime']!='') { ?> 
					 			<?php  echo date("Y-m-d H:i:s",$item['paytime'])?><br/>
					 		<?php  } ?>
					 		<?php  echo $item['payordernum'];?> 
					 	</td>   
					 	<td style="white-space:normal;"><?php  echo $item['devname'];?></td>
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
		var paystate="<?php  echo $_GPC['paystate'];?>";
		$("#paystate").val(paystate);

		var paysend="<?php  echo $_GPC['paysend'];?>";
		$("#paysend").val(paysend);
    	  
    });

    function setPageIndex(page){
		$("#page").val(page); 
		$("#btn_query").click();
    }
      
</script>

  

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>