<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">咨询师管理</strong> / <small>用户详情</small></div>
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
							<p>年龄：<?=$userinfo['age'];?></p>
							<p>手机号：<?=$userinfo['phoneNumber']?></p>
							<p>座机：<?=$userinfo['tel']?></p>
							<p>QQ号：<?=$userinfo['QQ']?></p>
							<p>微信号：<?=$userinfo['weiXin']?></p>
							<p>EMAIL：<?=$userinfo['email']?></p>
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<p>职称：<?=$userinfo['positionalTitle']?></p>
							<p>专业：<?=$userinfo['major']?></p>
							<p>学历：<?=$userinfo['education'];?></p>
							<p>安全评价师：<?=$userinfo['education'];?></p>
							<p>安评师证书号：<?=$userinfo['evaluationNumber'];?></p>
							<p>注册安全工程师：<?=$userinfo['regSecurity'];?></p>
							<p>注册师证书号：<?=$userinfo['regSecurityNumber'];?></p>
							<p>从业单位：<?=$userinfo['practitioners'];?></p>
						</div>
						
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">单位简介</h3>
					</header>
					<div class="am-panel-bd">
						<p><?=$userinfo['unitEvaluate']?></p>
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">个人简介</h3>
					</header>
					<div class="am-panel-bd">
						<p><?=$userinfo['summary']?></p>
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">我的频道</h3>
					</header>
					<div class="am-panel-bd">
						<?php $tag = $userinfo['myTag']; $tags = explode(',', $tag);?>
					<p>
					 <?php foreach($tags as $v):?>
						<span><?=get_tagName($v);?></span>
					<?php endforeach;?></p>
						<p></p>
					</div>
				</section>
				
			</div>
		</div>
		
	</div>

</div>