<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  if(empty($user['founder_groupid'])) { ?>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo url('user/display');?>"><i class="wi wi-back-circle"></i> </a>
	<li><a href="<?php  echo url('user/display');?>">用户管理</a></li>
	<li>编辑用户详情</li>
</ol>
<?php  } else { ?>
<ol class="breadcrumb we7-breadcrumb">
	<a href="<?php  echo url('founder/display');?>"><i class="wi wi-back-circle"></i> </a>
	<li><a href="<?php  echo url('founder/display');?>">副创始人管理</a></li>
	<li>编辑创始人详情</li>
</ol>
<?php  } ?>
<div id="js-user-edit-base" ng-controller="UserProfileDisplay" ng-cloak>
	<div class="user-head-info clearfix" >
		<span class="icon pull-left"><i class="wi wi-user"></i></span>
		<img ng-src="{{profile.avatar}}" class="img-circle user-avatar pull-left">
		<h3 class="pull-left" ng-bind="user.username"></h3>
		<div class="user-edit pull-right">
			<?php  if($user['founder_groupid'] != ACCOUNT_MANAGE_GROUP_VICE_FOUNDER) { ?>
			<a href="<?php  echo url('user/display/recycle', array('uid' => $_GPC['uid']))?>" class="btn btn-primary">禁用</a>
			<?php  } ?>
		</div>
	</div>
	<div class="btn-group we7-btn-group we7-padding-bottom">
		<a href="<?php  echo url('user/edit/edit_base', array('uid' => $_GPC['uid']))?>" class="btn btn-default active">基础信息</a>
		<?php  if(empty($user['founder_groupid'])) { ?>
		<a href="<?php  echo url('user/edit/edit_modules_tpl', array('uid' => $_GPC['uid']))?>" class="btn btn-default">应用模板权限</a>
		<?php  } else { ?>
		<a href="<?php  echo url('founder/edit/edit_modules_tpl', array('uid' => $_GPC['uid']))?>" class="btn btn-default">应用模板权限</a>
		<?php  } ?>
		<a href="<?php  echo url('user/edit/edit_account', array('uid' => $_GPC['uid']))?>" class="btn btn-default">使用账号列表</a>
	</div>
	<table class="table we7-table table-hover table-form">
		<col width="140px " />
		<col />
		<col width="120px" />
		<tr>
			<th class="text-left" colspan="3">账户设置设置</th>
		</tr>
		<tr>
			<td class="table-label">头像</td>
			<td><img ng-src="{{profile.avatar}}" class="img-circle" width="65px" height="65px" /></td>
			<td><div class="link-group"><a href="javascript:;" ng-click="changeAvatar()">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">用户名</td>
			<td ng-bind="user.username"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#name" ng-click="editInfo('username', user.username)">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">密码</td>
			<td>******</td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#pass">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">到期时间</td>
			<td ng-bind="user.end"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#endtime">修改</a></div></td>
		</tr>
		<?php  if(!empty($_W['isfounder']) && $user['founder_groupid'] != ACCOUNT_MANAGE_GROUP_VICE_FOUNDER) { ?>
		<tr>
			<td class="table-label">副创始人姓名</td>
			<td ng-bind="user.vice_founder_name"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#vice_founder_name" ng-click="editInfo('vice_founder_name', user.vice_founder_name)">修改</a></div></td>
		</tr>
		<?php  } ?>
		<?php  if(!empty($user['founder_groupid'])) { ?>
		<tr>
			<td class="table-label">注册链接</td>
			<td><?php  echo $user['url'];?></td>
			<td><div class="link-group"><a href="javascript:;" data-url="<?php  echo $user['url'];?>" class="js-clip">复制链接</a></div></td>
		</tr>
		<?php  } ?>
	</table>
	<div class="modal fade" id="name" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改用户名</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="userOriginal.username" class="form-control" placeholder="用户名" />
						<span class="help-block"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('username')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="pass" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改密码</div>
				</div>
				<div class="modal-body text-center">
					<div class="we7-form" style="width: 450px; margin: 0 auto;">
						<div class="form-group">
							<label for="" class="control-label col-sm-2">新密码</label>
							<div class="form-controls col-sm-10">
								<input type="password" value="" class="form-control new-password">
								
							</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">确认新密码</label>
							<div class="form-controls col-sm-10">
								<input type="password" value="" class="form-control renew-password">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('password')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="endtime" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">设置到期时间</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="radio" id="endtype-1" name="endtype" value="2" ng-model="user.endtype" ng-checked="user.endtime != 0"><label class="radio-inline" for="endtype-1">设置期限</label>
						<input type="radio" id="endtype-2" name="endtype" value="1" ng-model="user.endtype" ng-checked="user.endtime == 0"><label class="radio-inline" for="endtype-2">永久</label>
					</div>
					<div class="form-group" ng-show="user.endtype == 2">
						<?php  echo tpl_form_field_date('endtime', $user['endtime']);?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('endtime')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<table class="table we7-table table-hover table-form">
		<col width="140px " />
		<col />
		<col width="100px" />
		<tr>
			<th class="text-left" colspan="3">基础信息</th>
		</tr>      
		<tr>     
			<td class="table-label">真实姓名</td>
			<td ng-bind="profile.realname"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#realname" ng-click="editInfo('realname', profile.realname)">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">出生年月日</td>
			<td ng-bind="profile.births"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#birth">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">QQ</td>
			<td ng-bind="profile.qq"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#qq" ng-click="editInfo('qq', profile.qq)">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">手机号</td>
			<td ng-bind="profile.mobile"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#mobile" ng-click="editInfo('mobile', profile.mobile)">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">邮寄地址</td>
			<td ng-bind="profile.address"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#address" ng-click="editInfo('address', profile.address)">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">居住地址</td>
			<td ng-bind="profile.resides"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#reside">修改</a></div></td>
		</tr>
		<tr>
			<td class="table-label">上次登录时间</td>
			<td ng-bind="user.last_visit"></td>
			<td></td>
		</tr>
		<tr>
			<td class="table-label">上次登录IP</td>
			<td ng-bind="user.lastip"></td>
			<td></td>
		</tr>
		<tr>
			<td class="table-label">注册时间</td>
			<td ng-bind="user.joindate"></td>
			<td></td>
		</tr>
		<tr>
			<td class="table-label">备注</td>
			<td ng-bind="user.remark"></td>
			<td><div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#remark" ng-click="editInfo('remark', user.remark)">修改</a></div></td>
		</tr>
	</table>
	<div class="modal fade" id="realname" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改真实姓名</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" ng-model="userOriginal.realname">
						<span class="help-block">请填写真实姓名</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('realname')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="birth" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改出生年月日</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<?php  echo tpl_fans_form('birth',$profile['birth']);?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('birth')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="address" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改邮寄地址</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input class="form-control" type="text" ng-model="userOriginal.address">
						<span class="help-block">请填写详细地址</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('address')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="reside" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改用户名</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<?php  echo tpl_fans_form('reside',$profile['reside']);?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('reside')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="qq" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改QQ</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="userOriginal.qq" class="form-control" placeholder="qq" />
						<span class="help-block"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('qq')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="remark" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改备注</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="userOriginal.remark" class="form-control" placeholder="备注" />
						<span class="help-block"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('remark')"  ng-click="editInfo('remark', user.remark)">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="mobile" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改手机号</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="userOriginal.mobile" class="form-control" placeholder="mobile" />
						<span class="help-block"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('mobile')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="vice_founder_name" role="dialog">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改副创始人姓名</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="userOriginal.vice_founder_name" class="form-control" placeholder="副创始人姓名" />
						<span class="help-block"></span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('vice_founder_name')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
require(['underscore'], function(){
	angular.module('userProfile').value('config', {
		user: <?php echo !empty($user) ? json_encode($user) : 'null'?>,
		profile: <?php echo !empty($profile) ? json_encode($profile) : 'null'?>,
		links: {
			userPost: "<?php  echo url('user/profile/post')?>",
		},
	});
	angular.bootstrap($('#js-user-edit-base'), ['userProfile']);
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>