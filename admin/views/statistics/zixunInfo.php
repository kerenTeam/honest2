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
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资讯数据</strong><small></small></div>
	</div>


	<div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
        <div class="am-panel am-panel-secondary">
                <div class="am-panel-hd">地域分布</div>
                <div class="am-panel-bd overflow-hidden">
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
                            'echarts/chart/pie' // 使用柱状图就加载bar模块，按需加载
                        ],
                        function (ec) {
                            // 基于准备好的dom，初始化echarts图表
                            var myChart = ec.init(document.getElementById('main2'));

                            option = {
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                toolbox: {
                    show : true,
                    feature : {
                        dataView : {show: true, readOnly: false},
                        saveAsImage : {show: true}
                    }
                },
                calculable : false,
                series : [
                    {
                        name:'地域分布',
                        type:'pie',
                        radius : [80, 120],

                        // for funnel
                        x: '60%',
                        width: '35%',
                        funnelAlign: 'left',
                        max: 1048,

                        data:[
                            {value:3435, name:'西南'},
                            {value:4315, name:'华东'},
                            {value:6324, name:'华北'},
                            {value:2546, name:'东南'}
                        ]
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
        <div class="am-u-sm-12 am-u-md-6">
        <div class="am-panel am-panel-secondary">
                <div class="am-panel-hd">频道热度</div>
                <div class="am-panel-bd overflow-hidden">
            <div id="main3" style="width: 100%;height: 400px;"></div>
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
                            'echarts/chart/pie' // 使用柱状图就加载bar模块，按需加载
                        ],
                        function (ec) {
                            // 基于准备好的dom，初始化echarts图表
                            var myChart = ec.init(document.getElementById('main3'));

                            option = {
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                toolbox: {
                    show : true,
                    feature : {
                        saveAsImage : {show: true}
                    }
                },
                calculable : false,
                series : [
                    {
                        name:'服务类型分布',
                        type:'pie',
                        radius : [80, 120],

                        // for funnel
                        x: '60%',
                        width: '35%',
                        funnelAlign: 'left',
                        max: 1048,

                        data:[
                            {value:3435, name:'法律'},
                            {value:4315, name:'政治'},
                            {value:6324, name:'科技'},
                            {value:2546, name:'其他'},
                            {value:3026, name:'军事'},
                            {value:2578, name:'体育'}
                        ]
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
                            data : ['6-1','6-2','6-3','6-4','6-5','6-6','6-7']
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

		</div>
	</div>


</div>
	
</body>
</html>