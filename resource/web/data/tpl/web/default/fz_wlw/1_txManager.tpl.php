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
			    <label for="lab" class="col-sm-5 control-label">提现方式</label>
			    <div class="col-sm-7">
			       <select id="txmode" name="txmode" class="form-control"> 	
			       	 	<option value="">所有</option>
			    		<option value="1">微信到账</option>
			    		<option value="2">银行卡到账</option>
			    	</select>
			    </div>
			  </div>
		 </div>
		 
		 <div class="col-sm-6"> 
		 		<div class="form-group">  
				    <label for="lab" class="col-sm-5 control-label">提现状态</label>
				    <div class="col-sm-7"> 
				      <select id="txstate" name="txstate" class="form-control"> 	
				       	 	<option value="">所有</option>
				    		<option value="0">待处理</option>
				    		<option value="1">提现成功</option>
				    		<option value="2">提现失败</option> 
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
			    <label for="lab" class="col-sm-5 control-label">用户名</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php  echo $_GPC['username'];?>" id="username" name="username" placeholder="用户名">
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
	 
	查询金额统计：<?php  echo $total_money['total_money'];?> 元
</div>

<div class="panel panel-default"> 
  <div class="panel-body table-responsive">
    	<table class="table table-bordered table-hover">
    		<thead>
				<tr>
					<th>用户名</th> 
                    <th>提现金额</th> 
                    <th>手续费</th>  
                    <th>提现方式</th>  
                    <th>提现状态</th>  
                    <th style="width: 250px;">交易号</th> 
                    <th>提现时间</th>  
                    <th>提现备注</th> 
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($res)) { foreach($res as $key => $item) { ?>
					<tr>
					 	<td><?php  echo $item['username'];?></td> 
					 	<td><?php  echo $item['txAmount'];?></td> 
					 	<td><?php  echo $item['txfree'];?></td> 
					 	<td>
					 		<?php  if($item['txmode']=='1' ) { ?>
					 			<span style="color:green;">微信到账</span>
					 		<?php  } ?>
					 		<?php  if($item['txmode']=='2' ) { ?>
					 			<span style="color:red;">银行卡到账</span>
					 		<?php  } ?>
					 		 
					 	</td> 
					 	<td>   
					 		<?php  if($item['txstate']=='0' ) { ?>
					 			<span style="color:green;">待处理</span>
					 		<?php  } ?>
					 		<?php  if($item['txstate']=='1' ) { ?>
					 			<span style="color:red;">提现成功</span>
					 		<?php  } ?>
					 		<?php  if($item['txstate']=='2' ) { ?>
					 			<span style="color:blue;">提现失败</span>
					 		<?php  } ?>
					 		 
					 	</td>  
					 	 <td ><?php  echo $item['tradno'];?></td>   
					 	 <td style="white-space:normal;"><?php  echo date("Y-m-d H:i:s",$item['addtime'])?></td>  
					 	 
					 	<td style="white-space:normal;"><?php  echo $item['txremark'];?></td>
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
		var txmode="<?php  echo $_GPC['txmode'];?>";
		$("#txmode").val(txmode);

		var txstate="<?php  echo $_GPC['txstate'];?>";
		$("#txstate").val(txstate);
    	  
    });

    function setPageIndex(page){
		$("#page").val(page); 
		$("#btn_query").click();
    }
      
</script>

  

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>