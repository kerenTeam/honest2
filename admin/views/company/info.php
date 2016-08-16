
<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">公司信息</strong> / <small>详情</small></div>
	</div>
	<hr>


	<div id="container" class="clearfix">
		<div class="am-g am-intro-bd">
			<div class="am-intro-right am-u-sm-12">
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">公司信息</h3>
					</header>
					<div class="am-panel-bd am-cf">
						<div class="am-u-sm-6 am-u-md-4">
							<img class="userimg2" src="../<?=$company['logo'];?>" alt="用户头像">
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<p>公司名称：<?=$company['companyName'];?></p>
							<p>行业：电子</p>
							<p>人员规模：<?=$company['scale'];?></p>
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<p>行政区域：<?=$company['region'];?></p>
							<p>地址：<?=$company['address'];?></p>
							<p>生产规模：<?=$company['production'];?></p>
						</div>
						
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">企业简介</h3>
					</header>
					<div class="am-panel-bd">
						
					<p>
						<span><?=$company['enterpriseInfo'];?></span>
					</p>
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">公司详情</h3>
					</header>
					<div class="am-panel-bd am-cf">
						<div class="am-u-sm-6 am-u-md-4">
							<p>主要装置：<?=$company['technology'];?></p>
							<p>主要工艺：<?=$company['device'];?></p>
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<p>安全风险：<?=$company['safety'];?></p>
							<p>职业卫生风险：<?=$company['health'];?></p>
						</div>
					</div>
				</section>
				
			</div>
		</div>
		
	</div>

</div>