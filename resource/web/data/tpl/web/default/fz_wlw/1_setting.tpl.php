<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?> 
<ul class="nav nav-tabs">

	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/entry/setting', array('m' => 'fz_wlw'));?>">广告设置</a></li> 
	 
</ul>
<?php  if($op == 'display') { ?>
<div class="clearfix">
	<div class="panel panel-default">

		<div class="panel-body">
			<form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funQuerySubmit()"> 
				<input type="hidden" name="id" value="<?php  echo $setting['id'];?>">
				<div class="form-group">  
					<label for="lab" class="col-sm-2 control-label">广告点击次数</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="adv_hit" value="<?php  echo $setting['adv_hit'];?>" name="adv_hit" placeholder="点击次数">
						
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