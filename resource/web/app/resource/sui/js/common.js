 function funUserInfo(i){
	
	 if(i==""){
		 alert("缺少公众号参数");
		  return;
	 }
	 $.showPreloader();
	 window.location="index.php?c=entry&do=userSetting&m=fz_wlw&i="+i; 
 }
 function selectNav(navid){  
	 $('.tab-item').removeClass('active');
	 $('#'+navid).addClass('active');
 }
 function funGoHome(i){
	
	 if(i==""){
		 alert("缺少公众号参数");
		  return;
	 }
	 $.showPreloader();
		window.location="index.php?c=entry&do=devHome&m=fz_wlw&i="+i; 
 } 
 
 function funGoUrl(url){
	  $.showPreloader();
	  window.location=url;
}
 
function setCookie(name, value) {
   var date = new Date();
   date.setTime(date.getTime() + (86400 * 1000 * 2));
   document.cookie = name + "=" + escape(value) + "; expires=" + date.toGMTString() + "; path=/"
};

function getCookie(name) {
   var search;
   search = name + "=";
   offset = document.cookie.indexOf(search);
   if (offset != -1) {
       offset += search.length;
       end = document.cookie.indexOf(";", offset);
       if (end == -1) end = document.cookie.length;
       return unescape(document.cookie.substring(offset, end))
   } else return ""
};

 
function validateICard(val) {
   var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
   return regx.test(val);
}
//validate email
function validateEmail(val) {
   var regx = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
   return regx.test(val);
}
//validate phone
function validatePhone(val) {
   var phoneRegx = /^1[0-9]{10}$/;
   if (!phoneRegx.test(val)) {
       return false;
   }
   return true;
}
//验证是否是数字
function validateNum(val) {
   if ($.trim(val) == "") {
       return false;
   }
   var regx = /^[0-9]*$/;
   if (!regx.test(val)) {
       return false;
   }
   return true;
}

//验证是否是数字
function validateMoney(val) {
   if ($.trim(val) == "") {
       return false;
   }
   var regx = /^[0-9]{1,}\.?[0-9]{0,3}?$/;
   if (!regx.test(val)) {
       return false;
   }
   return true;
}
//js四舍五入  
function forDight(Dight, How) {
   Dight = Math.round(Dight * Math.pow(10, How)) / Math.pow(10, How);
   return Dight;
}

function replaceOfXml(xmlstr) {
   return xmlstr.replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&#39;/g, "'");
}

function JsGuid() {
   return (G() + G() + G() + G() + G() + G() + G() + G()).toUpperCase();
}
//正整数
function validateNum2(val) {
   if ($.trim(val) == "")
   {
       return false;
   }
   var regx = /^[0-9]+$/;
   if (!regx.test(val)) {
       return false;
   }
   return true;
}
//查看图片
function funShowPic(obj){ 
	var img="<img src='"+obj.src+"'/>";
	 $.alert(img);
}


Date.prototype.pattern = function (fmt) {
   var o = {
       "M+": this.getMonth() + 1, //月份
       "d+": this.getDate(), //日  
       "h+": this.getHours() % 12 == 0 ? 12 : this.getHours() % 12, //小时
       "H+": this.getHours(), //小时   
       "m+": this.getMinutes(), //分   
       "s+": this.getSeconds(), //秒   
       "q+": Math.floor((this.getMonth() + 3) / 3), //季度
       "S": this.getMilliseconds() //毫秒 
   };
   var week = { "0": "/u65e5", "1": "/u4e00", "2": "/u4e8c", "3": "/u4e09", "4": "/u56db", "5": "/u4e94", "6": "/u516d" };
   if (/(y+)/.test(fmt)) {
       fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
   }
   if (/(E+)/.test(fmt)) {
       fmt = fmt.replace(RegExp.$1, ((RegExp.$1.length > 1) ? (RegExp.$1.length > 2 ? "/u661f/u671f" : "/u5468") : "") + week[this.getDay() + ""]);
   }
   for (var k in o) {
       if (new RegExp("(" + k + ")").test(fmt)) {
           fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
       }
   }
   return fmt;
}

//验证开始时间与结束时间
function validateDateSpacing(beginDateID, endDateID,bustype) {
   //if($("#"+beginDateID).val()==""){
   //	alert("开始时间不能为空！");
   //	return false;
   //}
   //if($("#"+endDateID).val()==""){
   //	alert("结束时间不能为空！");
   //	return false;
   //}

   //当前时间的秒数和输入框秒数    
   var beginTime = new Date(Date.parse($("#" + beginDateID).val().replace(/-/g, "/")));
   var endTime = new Date(Date.parse($("#" + endDateID).val().replace(/-/g, "/")));
   var thisTime = new Date(Date.parse(new Date().pattern("yyyy-MM-dd").replace(/-/g, "/")));
   //2年的秒数   
   //var towyear=2*12*30*24*60*60*1000; 
   //1个月的秒数    
   var threemonthe = 31 * 24 * 60 * 60 * 1000;
   var b = true;
   //开始日期不能小于结束日期    
   if (beginTime > endTime) {
       alert("起始日期不能晚于结束日期。");
       return false;
   }
   //月份跨度1月以内    
   //if ((endTime - beginTime) > threemonthe) {
  //    alert("请注意，只能查询最近7天记录。");
  //     return false;
  // }
   //结束日期不得晚于当天    
   if (endTime > thisTime) {
       alert("结束日期不得晚于当天。")
       return false;
   }
   return true;
}

String.prototype.IsICard = function () {
   var regx = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
   return regx.test(this);
}
String.prototype.IsEmail = function () {
   var regx = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
   return regx.test(this);
}
String.prototype.IsPhone = function () {
   var regx = /^13[0-9]{9}|15[0-9][0-9]{8}|18[0-9][0-9]{8}|147[0-9]{8}$/;
   return regx.test(this);
}

Array.prototype.idxOf = function (obj) {
   for (var i = 0; i < this.length; i++) {
       if (this[i] === obj) {
           return i
       }
   }
   return -1
};

Array.prototype.contain = function (obj) {
   return this.idxOf(obj) !== -1
};

function StringBuilder() {
   this._array = new Array();
}

StringBuilder.prototype.append = function (str) {
   this._array.push(str);
}

StringBuilder.prototype.toString = function (joinGap) {
   return this._array.join(joinGap);
}

String.prototype.trim = function () {
   return this.replace(/(^\s*)|(\s*$)/g, "")
};

String.prototype.trimAll = function () {
   return this.replace(/(^\s*)|(\s*)|(\s*$)/g, "")
};


/** 
* 时间对象的格式化 
*/
Date.prototype.format = function (format) {
   /* 
   * format="yyyy-MM-dd hh:mm:ss"; 
   */
   var o = {
       "M+": this.getMonth() + 1,
       "d+": this.getDate(),
       "h+": this.getHours(),
       "m+": this.getMinutes(),
       "s+": this.getSeconds(),
       "q+": Math.floor((this.getMonth() + 3) / 3),
       "S": this.getMilliseconds()
   }

   if (/(y+)/.test(format)) {
       format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4
   - RegExp.$1.length));
   }

   for (var k in o) {
       if (new RegExp("(" + k + ")").test(format)) {
           format = format.replace(RegExp.$1, RegExp.$1.length == 1
   ? o[k]
   : ("00" + o[k]).substr(("" + o[k]).length));
       }
   }
   return format;
}


function stringToDate(fDate) {
   var fullDate = fDate.split(" ")[0].split("-");
   var fullTime = fDate.split(" ")[1].split(":");

   return new Date(fullDate[0], fullDate[1] - 1, fullDate[2],
       (fullTime[0] != null ? fullTime[0] : 0),
       (fullTime[1] != null ? fullTime[1] : 0),
       (fullTime[2] != null ? fullTime[2] : 0));
}
 
function timer(intDiff) {
    var handel = window.setInterval(function () {
         var day = 0,
             hour = 0,
             minute = 0,
             second = 0;//时间默认值        
         if (intDiff > 0) {
             second = Math.floor(intDiff);
         }
         if (second <= 9) second = '0' + second;
         $("#btn_TelePhoneCode2").html(second + "秒后重新获取");
         if (intDiff <= 0) {
             $("#btn_TelePhoneCode2").css("display", "none");
             $("#btn_TelePhoneCode").css("display", "inline");
             clearInterval(handel);
         } else {
             intDiff--;
         }
     }, 1000);
}	
//获取url中的参数
function getUrlParam(name) {
   var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
   var r = decodeURI(window.location.search).substr(1).match(reg);  //匹配目标参数
   if (r != null) return unescape(r[2]); return null; //返回参数值
}
function valSelectFile(fnUpload) { 
	 
	var isVal=true;
	var filename = fnUpload.value;  
	var mime = filename.toLowerCase().substr(filename.lastIndexOf(".")); 
	if(mime!=".jpg" && mime!=".png" && mime!=".jpeg" && mime!=".bmp") 
	{ 
		isVal=false;
		alert("请选择jpg,png,bmp格式的上传"); 
		fnUpload.outerHTML=fnUpload.outerHTML; 
	} 
	if(isVal){
		var file_size=fnUpload.files[0].size;
		var maxsize = 2*1024*1024;//2M  
		//alert(file_size+"--"+maxsize);
		if(file_size>maxsize){
			alert("上传图片不能超过2"); 
			fnUpload.outerHTML=fnUpload.outerHTML; 
		} 
	} 
	return isVal;
}
//js字符过滤html标签互转函数
function htmlencode(str) {
str = str.replace(/&/g, '&amp;');
str = str.replace(/</g, '&lt;');
str = str.replace(/>/g, '&gt;');
str = str.replace(/(?:t| |v|r)*n/g, '<br />');
str = str.replace(/  /g, '&nbsp; ');
str = str.replace(/t/g, '&nbsp; &nbsp; ');
str = str.replace(/x22/g, '&quot;');
str = str.replace(/x27/g, '&#39;');
return str;
}

function htmldecode(str) {
str = str.replace(/&amp;/gi, '&');
str = str.replace(/&nbsp;/gi, ' ');
str = str.replace(/&quot;/gi, '"');
str = str.replace(/&#39;/g, "'");
str = str.replace(/&lt;/gi, '<');
str = str.replace(/&gt;/gi, '>');
str = str.replace(/<br[^>]*>(?:(rn)|r|n)?/gi, '');
return str;
} 
 