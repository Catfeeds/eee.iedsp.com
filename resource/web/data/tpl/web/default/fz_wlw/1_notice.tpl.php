<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="alert alert-success" role="alert" style="text-align: center;">当前设备:<?php  echo $dev['province'];?><?php  echo $dev['city'];?><?php  echo $dev['area'];?><?php  echo $dev['address'];?><?php  echo $dev['devname'];?></div>

<ul class="nav nav-tabs">
	<li ><a href="<?php  echo url('site/entry/devList', array('m' => 'fz_wlw'));?>" class="fa fa-reply-all">返回设备列表</a></li>
	<li ><a href="<?php  echo url('site/entry/devAdd', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">设备信息</a></li> 
	<li><a href="<?php  echo url('site/entry/yedetail', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">钱包管理</a></li> 
	<li ><a href="<?php  echo url('site/entry/orderList', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">订单管理</a></li>
	<li ><a href="<?php  echo url('site/entry/packageList', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">套餐管理</a></li>
	<li class="active"><a href="<?php  echo url('site/entry/notice', array('m' => 'fz_wlw','devid'=>$_GPC['devid']));?>">设备通知</a></li>

</ul>

<div class="clearfix">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">通知管理</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funQuerySubmit()"> 
				<input type="hidden" name="devid" value="<?php  echo $_GPC['devid'];?>">
				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">库存预警通知</label>
					<div class="col-sm-10">
						<?php  echo tpl_form_field_fans('prewarning_notice', array('openid' => $setting['prewarning_notice']['openid'], 'nickname' => $setting['prewarning_notice']['nickname'], 'avatar' => $setting['prewarning_notice']['avatar']), true);?>
					</div>
				</div>

				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">离线通知</label>
					<div class="col-sm-10">
						<?php  echo tpl_form_field_fans('offline_notice', array('openid' => $setting['offline_notice']['openid'], 'nickname' => $setting['offline_notice']['nickname'], 'avatar' => $setting['offline_notice']['avatar']), true);?>
					</div>
				</div>

				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10"> 
						<input type="hidden" name="devid" value="<?php  echo $_GPC['devid'];?>">
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
						<input type="submit" name="query" id="btn_query" class="btn" value="提交"> 
						<input type="hidden" name="page" id="page" value="1">
					</div> 
				</div>
			</form> 
		</div>
	</div>

</div>
<script type="text/html" id="select-fans-containter">
	<div class="modal fade" id="select-fans-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">选择粉丝</h4>
				</div>
				<form class="form-horizontal form" id="form-first-order" action="" method="post">
					<div class="modal-body">
						<div class="alert alert-warning">
							如果待添加的店员未关注公众号, 需要先关注公众号<br>
							如果未搜索到粉丝,您可以尝试去<a href="<?php  echo url('mc/fans');?>" target="_blank">"粉丝列表"</a>里 同步全部粉丝信息,然后搜索粉丝
						</div>
						<div class="form-group" style="margin: 0; margin-bottom: 20px">
							<div class="input-group">
								<input class="form-control" name="keyword" id="keyword" type="text" placeholder="输入粉丝昵称或粉丝编号进行搜索"/>
								<div class="input-group-btn">
									<a class="btn btn-primary" href="javascript:;" id="search"><i class="fa fa-search"></i> 搜索</a>
								</div>
							</div>
						</div>
						<table class="table table-hover table-bordered text-center">
							<thead>
							<tr>
								<th class="text-center">头像</th>
								<th class="text-center">昵称</th>
								<th class="text-center">性别</th>
								<th class="text-center">操作</th>
							</tr>
							</thead>
							<tbody class="content">
							<tr>
								<td colspan="4">
									<h4><i class="fa fa-info-circle"></i> <span id="info">输入粉丝昵称或粉丝编号进行搜索</span></h4>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
</script>
<script type="text/html" id="select-fans-data">
	<{# for(var i = 0, len = d.length; i < len; i++){ }>
	<tr>
		<td><img src="<{d[i].tag.avatar}>" width="50" alt=""/></td>
		<td><{d[i].nickname}></td>
		<td><{d[i].tag.sex}></td>
		<td><a href="javascript:;" class="btn btn-primary" data-fanid="<{d[i].fanid}>">选择</a></td>
	</tr>
	<{# } }>
</script>
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