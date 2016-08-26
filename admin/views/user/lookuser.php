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
							<p>姓名：<?=$userinfo['userName']?></p>
							<p>性别：<?=$userinfo['gender']?></p>
							<p>年龄：<?=$userinfo['age'];?></p>
							<p>手机号：<?=$userinfo['phoneNumber']?></p>
							<p>座机：<?=$userinfo['tel']?></p>
							<p>QQ号：<?=$userinfo['QQ']?></p>
							<p>微信号：<?=$userinfo['weiXin']?></p>
							<p>EMAIL：<?=$userinfo['email']?></p>
						</div>
						<?php if($userinfo['groupId'] == '5'):?>
						<div class="am-u-sm-6 am-u-md-4">
							<!-- <p>所在地：<?=$userinfo['address']?></p>
							<p>简介：<?=$userinfo['summary']?></p>
							<p>职业：<?=$userinfo['occupation']?></p> -->
							<p>部门：采购</p>
							<p>职称：注册安全工程师</p>
							<p>学历：本科</p>
							<p>专业：电子</p>
							<p>行业：电子</p>
						</div>
					<?php endif;?>
						
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
					<?php $tag = $userinfo['myTag']; $tags = explode(',', $tag); ?>
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