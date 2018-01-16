<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?> 
<ul class="nav nav-tabs">

	<li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw'));?>">广告列表</a></li> 
	<li <?php  if($op=='add') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw','op'=>'add'));?>">添加广告</a></li> 
	<li  <?php  if($op=='statistics') { ?>class="active"<?php  } ?>><a href="<?php  echo url('site/entry/advManager', array('m' => 'fz_wlw','op'=>'statistics'));?>">点击统计</a></li> 
	 
</ul>
<div class="clearfix">
	<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">设备列表</h3>
  </div> 
  <div class="panel-body">
     <form class="form-horizontal" action="" method="post" id="frmSave" onsubmit="return funSubmit()"> 
		  
		  <div class="col-sm-6"> 
		  		<div class="form-group">  
			    <label for="lab" class="col-sm-5 control-label">时间查询</label>
			    <div class="col-sm-7">
			    	<?php echo tpl_form_field_daterange('time', array('startdate'=>($startdate ? date('Y-m-d', $startdate) : false),'enddate'=> ($enddate ? date('Y-m-d', $enddate) : false)));?>
			    </div>
			  </div>
		  </div>

		  
		  <div class="form-group"> 
		    <div class="col-sm-offset-2 col-sm-10">
		      <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
		      <input type="submit" name="query" class="btn btn-success"  id="btn_query" value="查询"> 
		    </div> 
		  </div>
		</form> 
  </div>
</div>


	<div class="panel panel-default"> 
		<div class="panel-body table-responsive">
			<div id="main" style="height: 400px;width: 100%;">
				
			</div>
		</div>
	</div> 
</div>
<script>
require(['echarts'], function(echarts){
	var myChart = echarts.init(document.getElementById('main'));
	option = {
    title: {
        text: '广告点击'
    },
    tooltip: {
        trigger: 'axis'
    },
    legend: {
        data:<?php  echo $legend;?>
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    toolbox: {
        feature: {
            saveAsImage: {}
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: <?php  echo $xAxis;?>
    },
    yAxis: {
        type: 'value'
    },
    series: <?php  echo $series;?>
};

	myChart.setOption(option);
})
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>