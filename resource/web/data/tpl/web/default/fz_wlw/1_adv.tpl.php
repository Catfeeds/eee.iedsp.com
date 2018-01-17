<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?> 
<ul class="nav nav-tabs">

	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw'));?>">广告列表</a></li> 
	<li <?php  if($op=='add') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw','op'=>'add'));?>">添加广告</a></li> 
	<li  <?php  if($op=='statistics') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw','op'=>'statistics'));?>">点击统计</a></li> 
	 
</ul>

<?php  if($op == 'display') { ?>
<div class="clearfix">
<!-- 	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">查询</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funQuerySubmit()"> 

				
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
	</div> -->

<div class="panel panel-default"> 
  <div class="panel-body table-responsive">
    	<table class="table table-bordered table-hover">
    		<thead>
				<tr>
					<th style="width: 5%;">ID</th>
                    <th style="width: 5%;">排序</th> 
                    <th style="width: 80px;">图片</th> 
                    <th style="width: 5%;">标题</th>  
                    <th style="width: 5%;">链接</th>  
                    <th style="width: 5%;">状态</th> 
                    <th style="width: 5%;">累计点击次数</th> 
                    <th style="width: 5%;">创建时间</th> 
                    <th style="width: 15%;">操作</th> 
                    
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $key => $item) { ?>
					<tr>
					 	<td><?php  echo $item['id'];?></td>
					 	<td><?php  echo $item['displayorder'];?></td> 
					 	<td><img src="<?php  echo tomedia($item['thumb'])?>" style="width: 100px;" alt=""></td> 
					 	<td><?php  echo $item['title'];?></td>
					 	<td><a href="<?php  echo $item['linkurl'];?>"><?php  echo $item['linkurl'];?></a> </td>  
					 	<td>  
					 		<?php  if($item['status']=='0' ) { ?>
					 			<span style="color: black;">隐藏</span>
					 		<?php  } ?>
					 		<?php  if($item['status']=='1' ) { ?>
					 			<span style="color:green;">显示</span>
					 		<?php  } ?>

					 	</td>  
					 	<td><?php  echo $item['hits'];?></td>
					 	
					 	<td style="white-space:normal;"><?php  echo date("Y-m-d H:i:s",$item['createtime'])?></td>   
					 	<td>
					 		<a class="btn btn-default" href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw','id'=>$item['id'],'op'=>'add'));?>" data-toggle="tooltip" data-placement="top" title="编辑" role="button">
					 			编辑
					 		</a>
					 		<a class="btn btn-default" href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw','aid'=>$item['id'],'op'=>'statistics'));?>" data-toggle="tooltip" data-placement="top" title="统计" role="button">
					 			统计
					 		</a>
					 		<a class="btn btn-default" href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw','id'=>$item['id'],'op'=>'del'));?>" data-toggle="tooltip" data-placement="top" title="删除" onclick="return confirm('确认删除？');return false;"  role="button">
					 			删除
					 		</a>
					 	</td>
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

<?php  } else if($op == 'add') { ?>
<div class="clearfix">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">添加</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funQuerySubmit()"> 
				<input type="hidden" name="id" value="<?php  echo $id;?>">
				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">排序</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="displayorder" value="<?php  echo $adv['displayorder'];?>" name="displayorder" placeholder="排序">
						排序从大到小
					</div>
				</div>

				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">标题</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="title" value="<?php  echo $adv['title'];?>" name="title" placeholder="标题">
					</div>
				</div>

				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">链接</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="linkurl" value="<?php  echo $adv['linkurl'];?>" name="linkurl" placeholder="链接">
					</div>
				</div>

				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">状态</label>
					<div class="col-sm-10">

						<label>
							<input type="radio" name="status" <?php  if($adv['status'] == 1) { ?>checked<?php  } ?> id="dstate1" value="1">
							显示
						</label>

						<label>
							<input type="radio" name="status" <?php  if($adv['status'] == 0) { ?>checked<?php  } ?> id="dstate0" value="0">
							隐藏
						</label>
					</div>
				</div>

				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">广告图片</label>
					<div class="col-sm-10"> 
						<?php  echo tpl_form_field_image('thumb',$adv['thumb']);?>  
						广告图片将以九宫格的形式展示。
					</div>
				</div>

				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10"> 
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
						<input type="submit" name="submit" id="btn_query" class="btn" value="提交"> 
					</div> 
				</div>
			</form> 
		</div>
	</div>


<?php  } ?>
  

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>