<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<base href="<?php echo base_url();?>admin/" />
	<title></title>

    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
	<script type="text/javascript" src="assets/js/echarts.js"></script>
</head>
<body>





<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">访问数据</strong><small></small></div>
	</div>


	<div class="am-g">
		<div class="am-u-sm-12">
			<div class="am-panel am-panel-secondary">
				<div class="am-panel-hd">时段排名</div>
				<div class="am-panel-bd overflow-hidden">
					<p>纵轴：人数（单位人）</p>
					<div id="main" style="height: 400px;width: 100%;"></div>
					<script type="text/javascript">
                    // 路径配置
                    require.config({
                        paths: {
                            echarts: 'http://echarts.baidu.com/build/dist'
                        }
                    });

                    // 使用
                    require(
                        [
                            'echarts',
                            'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
                        ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main'));

                option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['微信用户','咨询师']
                    },
                    toolbox: {
                        show : true,
                        feature : {
                            saveAsImage : {show: true}
                        }
                    },
                    calculable : true,
                    xAxis : [
                        {
                            type : 'category',
                            boundaryGap : false,
                            data : ['星期一','星期二','星期三','星期四','星期五','星期六','星期天']
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value'
                        }
                    ],
                    series : [
                        {
                            name:'微信用户',
                            type:'line',
                            stack: '总量',
                            data:[120, 132, 101, 134, 90, 230, 210]
                        },
                        {
                            name:'咨询师',
                            type:'line',
                            stack: '总量',
                            data:[220, 182, 191, 234, 290, 330, 310]
                        }
                    ]
                };


                // 为echarts对象加载数据
                myChart.setOption(option);
            }
        );
    </script>
				</div>
			</div>
			<div class="am-panel am-panel-secondary">
				<div class="am-panel-hd">访问排名</div>
				<div class="am-panel-bd overflow-hidden">
					<p>横轴：人数（单位人）</p>
					<div id="main2" style="width: 100%;height: 400px;"></div>
					<script type="text/javascript">
                    // 路径配置
                    require.config({
                        paths: {
                            echarts: 'http://echarts.baidu.com/build/dist'
                        }
                    });

                    // 使用
                    require(
                        [
                            'echarts',
                            'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
                        ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main2'));

                option = {
    tooltip : {
        trigger: 'axis'
    },
    toolbox: {
        show : true,
        feature : {
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'value',
            boundaryGap : [0, 0.01]
        }
    ],
    yAxis : [
        {
            type : 'category',
            data : ['安全咨询','资讯信息','安全查询','技术交流','问题解答','交流互动']
        }
    ],
    series : [
        {
            name:'总体排名',
            type:'bar',
            data:[18203, 23489, 29034, 104970, 31744, 30230]
        }
    ]
};


                // 为echarts对象加载数据
                myChart.setOption(option);
            }
        );
    </script>
				</div>
			</div>

		</div>
	</div>


</div>
	
</body>
</html>