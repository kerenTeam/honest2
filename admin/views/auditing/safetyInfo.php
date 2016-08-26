<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class=" am-cf"><strong class="am-text-primary am-text-lg">信息审核</strong> / <small>信息详情</small></div>
	</div>
	<hr>


	<div id="container" class="clearfix">
		<div class="am-g am-intro-bd">
			<div class="am-intro-right am-u-sm-12">
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">文章详情</h3>
					</header>
					<div class="am-panel-bd am-cf">
						<div class="am-u-sm-6 am-u-md-4">
							<img class="userimg2" src="../<?=$safe['picImg'];?>" alt="列表图片">
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<p>文章标题：<?=$safe['title'];?></p>
							<p>文号：<?=$safe['grade']?></p>
							<p>发布人：<?=get_username($safe['userId']);?></p>
						</div>
						<div class="am-u-sm-6 am-u-md-4">
							<p>文章标签：<?php $tags = explode(',', $safe['tag']); ?><?php foreach($tags as $v):?><?=get_tagName($v);?>&nbsp; <?php endforeach;?></p>
							<p>发文单位：<?=$safe['company']?></p>
							<p>附件：<?=$safe['file']?></p>
						</div>
						
					</div>
				</section>
				<section class="am-panel am-panel-default">
					<header class="am-panel-hd">
						<h3 class="am-panel-title">发布内容</h3>
					</header>
					<div class="am-panel-bd">
						
					<p>
						<?=$safe['content'];?>
					</p>
						<p></p>
					</div>
				</section>
				
			</div>
		</div>
		
	</div>

</div>