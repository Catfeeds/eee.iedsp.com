<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
	 .help-block img{width: 50px;height: 50px;}
	  .my_title{background-color:#00abea;line-height: 4rem;text-align: center;color: white;position: relative;}
	 .my_title_back{ position: absolute;top: 0px;left: 18px;}
	 .form-control{padding-left: 10px;}
</style>

<div class="my_title"> 
	<div class="my_title_back">
		<a onclick="funUserHome('<?php  echo $_GPC['devid'];?>')" style="color: white;">>返回</a>
	</div> 
		余额提现 
</div> 
<br/><br/>
<form class="mui-input-group" method="post" onsubmit="return funSubmit()">
	<div class="mui-input-row">
        <label>账户余额</label>
    	<input type="text" class="form-control" id="balance" value="<?php  echo $devuser['balance'];?>" readonly="readonly" placeholder="余额为0参数有误">
    </div>
    <div class="mui-input-row" style="height: auto;">
        <label>提现金额</label>
    	<input type="text" class="form-control" id="txAmount" style="border:1px solid #FF8247;" value="" name="txAmount" placeholder="输入提现金额" onblur="funChangeFee()">
   		  <div style="color: red;display: none;" id="fee_tip"></div>
   		  
    </div>
    <div class="mui-input-row" style="height: auto;">
        <label>扣除手续费</label>
    	<input type="text" class="form-control" id="txfee" value="0"  readonly="readonly"   >
   		  <div style="color: red;" id="fee_tip"></div> 
    </div>
    <div class="mui-input-row" style="height: auto;">
        <label>实际到账</label>
    	<input type="text" class="form-control" id="factAmount" value="0" readonly="readonly"  >
   		  <div style="color: red;" id="fee_tip"></div> 
    </div>
        <div class="mui-input-row">
        <label>登录密码</label>
    	<input type="password" class="form-control" id="password" name="password" value="" name="txremark" placeholder="输入登录密码">
    </div>
    <div class="mui-input-row">
        <label>备注</label>
    	<input type="text" class="form-control" id="txremark" value="" name="txremark" placeholder="选填">
    </div>
    
      <div style="color: red;margin-left: 20px;">温馨提示：<br/>
   			1、提现金额需要大于<?php  echo $wx_account['minmoney'];?>元<br/>
   			2、"扣除手续费"金额为"提现金额"的<?php  echo $wx_account['free'];?>;<br/>
   			3、每日最多可提现次数为1次，请勿多次提现，以免造成提现失败同时又扣除了余额.<br/>
   		</div>
    
    <div class="mui-button-row">  
		 <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
        <button type="submit" name="submit" value="save" class="mui-btn mui-btn-primary" > 确认 </button> 
    </div>
</form>


<script type="text/javascript">
function forDight(Dight, How) {
    Dight = Math.round(Dight * Math.pow(10, How)) / Math.pow(10, How);
    return Dight;
}

	function funSubmit(){
		if($("#balance").val()=="" || $("#txAmount").val()==""){
			mui.alert("提现金额不能为空");
			return false;
		}
		var password=$("#password").val();
		if(password==""){
			mui.alert("登录密码不能为空");
			return false;
		}
		var balance=parseFloat($("#balance").val()); 
		
	    var txAmount=parseFloat($("#txAmount").val()); 
	    var minmoney=parseFloat("<?php  echo $wx_account['minmoney'];?>");
	    var free=parseFloat("<?php  echo $wx_account['free'];?>");
	    if(minmoney==0){
	    	minmoney=1;
		}

	    var fact_money=txAmount*(1-free); 
	    
	    if(fact_money<minmoney){ 
			mui.alert("实际到账金额不能小于"+minmoney+"元");
			return false;
	    }
	     
	    if(txAmount>balance){ 
	    	mui.alert("提现余额不足！");
			return false;
	    }
	     
	    
	    if(window.confirm('提现将扣除余额'+txAmount+"元,您确定吗？")){
	    	 return true;
		 }
		return false;
	}

	function funChangeFee(){
		$("#fee_tip").html("");
		$("#txfee").val(0);
		$("#factAmount").val(0);
		if($("#balance").val()=="" || $("#txAmount").val()==""){ 
			return false;
		}
		 var balance=parseFloat($("#balance").val()); 
		 var free=parseFloat("<?php  echo $wx_account['free'];?>"); 
		 var txAmount=parseFloat($("#txAmount").val()); 
		var fact_money=txAmount*(1-free);
		var txfee=txAmount*free;

		$("#fee_tip").html("实际到账金额为:"+forDight(fact_money,2)+"元");
		$("#txfee").val(forDight(txfee,2));
		$("#factAmount").val(forDight(fact_money,2));
		 return true;
		 
	}
	
	function funUserHome(devid){
		window.location="index.php?c=entry&do=devHome&m=fz_wlw&i=<?php  echo $_W['uniacid'];?>";
	}
	
	$(function(){
		 
	});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>