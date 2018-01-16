<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/headerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/headerSui', TEMPLATE_INCLUDEPATH));?>
 <style type="text/css">
	 .my_dev_btn{color:#fe4d7b; font-size:.75rem; margin-top:5px; border:1px solid #fe4d7b; border-radius:5px; padding:2px 15px; }
 	 
 </style>

<!-- page 容器  -->
    <div class="page page-current" id="packageList"> 
    	  	  <!-- 标题栏 -->
        <header class="bar bar-nav nav_bg">
            <button class="button button-link button-nav pull-left" onclick="funGoBack('<?php  echo $_GPC['devid'];?>')">
                <span class="icon icon-left font_color_fff"></span>
                <span class="font_color_fff">返回</span>
            </button>
            <h1 class="title font_color_fff">商户管理</h1> 
           
        </header>
        <!-- 标题栏 end-->
        
        <!-- 工具栏 -->
        <?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/nvaSui', TEMPLATE_INCLUDEPATH)) : (include template('common/nvaSui', TEMPLATE_INCLUDEPATH));?>
        <!-- 工具栏 end -->
        
        <!-- 内容区 -->
        <div class="content">
            <!--head -->
             
                 <form class="mui-input-group" method="post" onsubmit="return funSubmit()">
		        	<div class="content-block login_input">
		           	 <p>
		           	 	<input type="text" name="username" value="<?php  echo $user['username'];?>" id="username" placeholder="用户名" />
		           	 	请输入用户名，用户名为 3 到 15 个字符组成，包括汉字，大小写字母（不区分大小写）
		           	 </p>
		           </div>
		           <div class="content-block login_input">
		           	 <p><input type="text" name="password" value="" id="password" placeholder="密码" />
		           	 	请填写密码，最小长度为 8 个字符
		           	 </p>
		           </div>
		           <div class="content-block login_input">
		           	 <p><input type="text"  value="" id="repassword" placeholder="确认密码" />
		           	 	重复输入密码，确认正确输入
		           	 </p>
		           </div>
		            <div class="content-block login_input">
		              <p><input type="text" name="onefree" id="onefree" value="<?php  echo $user['onefree'];?>" placeholder="订单提成" />
		              	例如:提成5%,填写0.05;如果启用了统一订单分销设置，此提成设置会失效。
		              </p>
		           </div>
		           
		           <div class="content-block login_input">
		              <p> 
		              	<select name="isvip" id="isvip">
		              		<option value="">是否授权发展用户</option>
		              		<option value="0">不能发展</option>
		              		<option value="1">能发展</option>
		              	</select>
		              </p>
		           </div>
		           
		           <div class="content-block" style="padding-bottom:0px;">
		           		 <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		           		 <p>
		           			 <button type="submit" name="submit" style="margin: auto;width: 100%;" value="save" class="button button-big login_btn" >保存</button> 
		           		 </p> 
		                
		           </div>
		       </form>
             

            <!--head end-->
        </div>
        <!-- 内容区 end -->
         
    </div>
    <!-- page 容器 end -->
 <script type="text/javascript">
 
 function funGoBack(devid){
	window.location="index.php?c=entry&do=devHome&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";
  }
function funSubmit(){

	if($.trim($('#username').val()) == '') {
		alert('没有输入用户名');
		return false;
	}
	if($('#password').val() == '') {
		alert('没有输入密码.');
		return false;
	}
	if($('#password').val().length < 8) {
		 
		alert('密码长度不能小于8个字符.');
		return false;
	}
	if($('#password').val() != $('#repassword').val()) { 
		alert('两次输入的密码不一致.');
		return false;
	}
	if($("#isvip").val()==""){
		alert('请选择是否能发展会员');
		return false;
   } 
	return true;
}
 selectNav('my_info');
</script>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footerSui', TEMPLATE_INCLUDEPATH)) : (include template('common/footerSui', TEMPLATE_INCLUDEPATH));?>