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
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户行为</strong><small></small></div>
	</div>


	<div class="am-g">
		<div class="am-u-sm-12 am-u-md-6">
			<div class="am-panel am-panel-secondary">
				<div class="am-panel-hd">绑定比例</div>
				<div class="am-panel-bd overflow-hidden">
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
                                    'echarts/chart/pie' // 使用柱状图就加载bar模块，按需加载
                                ],
                                function (ec) {
                                    // 基于准备好的dom，初始化echarts图表
                                    var myChart = ec.init(document.getElementById('main'));

                                    option = {
                        title : {
                            text: '',
                            subtext: '',
                            x:'center'
                        },
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
                        calculable : true,
                        series : [
                            {
                                name:'绑定比例',
                                type:'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[
                                    {value:1860, name:'绑定用户'},
                                    {value:2750, name:'非绑定用户'}
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
    </div>
    <div class="am-u-sm-12 am-u-md-6">
            <div class="am-panel am-panel-secondary">
                <div class="am-panel-hd">男女比例</div>
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
                                dataView : {show: true, readOnly: false},
                                saveAsImage : {show: true}
                            }
                        },
                        calculable : false,
                        series : [
                            {
                                name:'男女比例',
                                type:'pie',
                                radius : [80, 120],

                                // for funnel
                                x: '60%',
                                width: '35%',
                                funnelAlign: 'left',
                                max: 1048,

                                data:[
                                    {value:5600, name:'男'},
                                    {value:4335, name:'女'}
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
    </div>
    <div class="am-u-sm-12 am-u-md-6">
            <div class="am-panel am-panel-secondary">
                <div class="am-panel-hd">年龄分布</div>
                <div class="am-panel-bd overflow-hidden">
                    <div id="main4" style="width: 100%;height: 400px;"></div>
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
                                    var myChart = ec.init(document.getElementById('main4'));

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
                        calculable : true,
                        series : [
                            {
                                name:'年龄比例',
                                type:'pie',
                                radius : '55%',
                                center: ['50%', '60%'],
                                data:[
                                    {value:3340, name:'30~40岁'},
                                    {value:3440, name:'40~50岁'},
                                    {value:2233, name:'50~60岁'},
                                    {value:1237, name:'60~70岁'}
                                ]
                            }
                        ]
                    };          // 为echarts对象加载数据
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
