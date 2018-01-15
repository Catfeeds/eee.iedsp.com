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

				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">库存预警通知</label>
					<div class="col-sm-10">
						<?php  echo tpl_form_field_fans('manager', array('openid' => $config['manager']['openid'], 'nickname' => $config['manager']['nickname'], 'avatar' => $config['manager']['avatar']), true);?>
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