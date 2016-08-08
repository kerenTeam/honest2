<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">微信用户管理</strong> / <small>用户详情</small></div>
	</div>
	<hr>


	<div id="container" class="clearfix">
		<div class="am-g am-intro-bd">
			<div class="am-intro-right am-u-sm-12">
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">个人资料</h3>
					</header>
					<div class="am-panel-bd am-cf">
						<div class="am-u-sm-6 am-u-md-4">
							<img class="userimg2" src="../<?=$userinfo['headPicImg'];?>" alt="用户头像">
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<p>姓名：<?=$userinfo['userName'];?></p>
							<p>性别：<?=$userinfo['gender'];?></p>
							<p>年龄：25</p>
							<p>手机号：<?=$userinfo['phoneNumber'];?></p>
							<p>座机：</p>
							<p>QQ号：123456788</p>
							<p>微信号：adse</p>
							<p>EMAIL：123456788@qq.com</p>
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<!-- <p>所在地：<?=$userinfo['address'];?></p>
							<p>简介：<?=$userinfo['summary'];?></p>
							<p>职业：<?=$userinfo['occupation'];?></p> -->
							<p>职称：中级</p>
							<p>专业：电子</p>
							<p>学历：专科</p>
							<p>安全评价师：三级</p>
							<p>安评师证书号：136456879678</p>
							<p>注册安全工程师：否</p>
							<p>注册师证书号：</p>
							<p>擅长领域：</p>
							<p>从业单位：</p>
						</div>
						
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">单位简介</h3>
					</header>
					<div class="am-panel-bd">
						
						<p>阿斯顿发</p>
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">个人简介</h3>
					</header>
					<div class="am-panel-bd">
						
						<p>阿斯顿发</p>
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">我的频道</h3>
					</header>
					<div class="am-panel-bd">
						<?php $tag = $userinfo['myTag']; $tags = json_decode($tag,true);?>
					<p>
					 <?php foreach($tags as $v):?>
						<span><?=$v['tagName'];?></span>
					<?php endforeach;?></p>
						<p></p>
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">我的备忘录</h3>
					</header>
					<div class="am-panel-bd">
						<p>法律法律法律法律</p>
						<p></p>
					</div>
				</section>
				
			</div>
		</div>
		
	</div>

</div>