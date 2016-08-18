<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资讯列表</strong> / <small>编辑</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('information/editconsulet');?>" enctype="multipart/form-data">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				标题
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" required name="title" value="<?=$cons['title']?>">
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				频道
			</div>
			<?php $tag = json_decode($cons['tag'],true); ?>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select multiple data-am-selected="{btnSize: 'sm'}" name="tag[]">
				<?php foreach($tags as $val):?>
					<option value="<?=$val['tag']?>"<?php foreach($tag as $v):?> <?php if($v['tagid'] == $val['tag']){echo "selected";}?><?php endforeach;?>><?=$val['tagName']?></option>
				<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				分类
			</div>
			<?php $tag = json_decode($cons['tag'],true); ?>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select multiple data-am-selected="{btnSize: 'sm'}" name="tag[]">
				<?php foreach($tags as $val):?>
					<option value="<?=$val['tag']?>"<?php foreach($tag as $v):?> <?php if($v['tagid'] == $val['tag']){echo "selected";}?><?php endforeach;?>><?=$val['tagName']?></option>
				<?php endforeach;?>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				缩略图
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" >
	            <br>
	            <div id="preview"><input type="hidden" name="picImg" value="<?=$cons['picImg']?>" placeholder=""> <img class="minImg" src="../<?=$cons['picImg']?>"> </div>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				图文
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<!-- 编辑器 -->
				<link href="assets/uediter/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
				<script type="text/javascript" src="assets//uediter/third-party/jquery.min.js"></script>
				<script type="text/javascript" charset="utf-8" src="assets/uediter/umeditor.config.js"></script>
				<script type="text/javascript" charset="utf-8" src="assets/uediter/umeditor.js"></script>
				<script type="text/javascript" src="assets/uediter/lang/zh-cn/zh-cn.js"></script>
				<style>.edui-container{margin-left: 0;}</style>
				<div style="width:100%">
				  <script id="myEditor" type="text/plain" style="width:450px;height:500px;" name='content'><?=$cons['content']?></script>
					<!-- <textarea name="content" style="width:450px;height:500px;" ><?=strip_tags($cons['content']);?></textarea> -->
				</div>
				<script type="text/javascript">
				var um = UM.getEditor('myEditor'); //实例化编辑器
				</script>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-offset-2 am-u-sm-4 am-u-end">
			<input type="hidden" value="<?=$cons['publishId']?>" name="publishId">
				<button type="submit" class="am-btn am-btn-primary">确定</button>
			</div>
		</div>
	</form>








</div>
  <script type="text/javascript" src="assets/js/imgup.js"></script>