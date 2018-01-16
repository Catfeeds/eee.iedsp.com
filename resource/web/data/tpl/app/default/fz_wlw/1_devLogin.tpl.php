<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>


<div style="text-align: center;padding: 30px;color: blue;font-size: 16px;">微信支付模块管理平台</div>

<form class="mui-input-group" method="post" onsubmit="return funSubmit();">
    <div class="mui-input-row">
        <label>用户名</label>
    <input type="text" name="username" id="username" class="mui-input-clear" placeholder="请输入用户名">
    </div>
    <div class="mui-input-row">
        <label>密码</label>
        <input type="password" name="password" id="password2" class="mui-input-password" placeholder="请输入密码">
    </div> 
    <div class="mui-button-row">
    	 <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
        <button type="submit" name="submit" value="login" class="mui-btn mui-btn-primary" >登录</button> 
    </div>
</form>

<script type="text/javascript">
	$(function(){
		mui('.mui-input-row input').input(); 

		
	});

	function funSubmit(){
		var username=$("#username").val();

		if(username==''){
			 mui.alert('用户名不能为空')
			return false;
		}
		
		var password2=$("#password2").val();
		if(password2==''){
			 mui.alert('密码不能为空')
			return false;
		}
		return true;
	}
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>