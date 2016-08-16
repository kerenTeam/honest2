<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">微信用户管理</strong> / <small>资料详情</small></div>
	</div>
	<hr>


	<div id="container" class="clearfix">
		<div class="am-g am-intro-bd">
			<div class="am-intro-right am-u-sm-12">
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">审核资料</h3>
					</header>
					<div class="am-panel-bd am-cf">
					
						<div class="am-u-sm-6 am-u-md-4">
							<p>姓名：<?=$userinfo['userName']?></p>
							<p>性别：<?=$userinfo['gender']?></p>
							<p>年龄：<?=$userinfo['age']?></p>
							<p>座机：<?=$userinfo['tel'];?></p>
							<p>QQ号：<?=$userinfo['QQ']?></p>
							<p>微信号：<?=$userinfo['weiXin']?></p>
							<p>EMAIL：<?=$userinfo['email']?></p>
						</div>
						<div class="am-u-sm-6 am-u-md-4">
						    <p>所在地：<?=$userinfo['address']?></p>
							<p>部门：<?=$userinfo['department']?></p>
							<p>职称：<?=$userinfo['positionalTitle']?></p>
							<p>学历：<?=$userinfo['education']?></p>
							<p>专业：<?=$userinfo['major']?></p>
							<p>个人简介：<?=$userinfo['summary']?></p>
							<p>公司名称：<?=$userinfo['practitioners']?></p>
							<p>公司简介：<?=$userinfo['unitEvaluate']?></p>
						</div>
						
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">咨询师证书</h3>
					</header>
					<div class="am-panel-bd">
					<?php $myCertificate = json_decode($userinfo['myCertificate'],true); ?>
						<?php if(!empty($myCertificate)):?>
							<p class="imgInfo">
							<?php foreach($myCertificate as $v):?>
							<img src='../<?=$v['certificateImg'];?>'/>
							<?php endforeach;?>
							</p>
						<?php endif;?>
						<p>安全工程师：<?=$userinfo['evaluation']?></p>
						<p>安全工程师编号：<?=$userinfo['evaluationNumber']?></p>
						<p>注册安全工程师：<?=$userinfo['regSecurity']?></p>
						<p>注册安全工程师编号：<?=$userinfo['regSecurityNumber']?></p>
					
					</div>
					
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">我的频道</h3>
					</header>
					<div class="am-panel-bd">
				
					<p>
						<span>sdfgh</span>
					</p>
						<p></p>
					</div>
				</section>
				
			</div>
		</div>
		
	</div>

</div>