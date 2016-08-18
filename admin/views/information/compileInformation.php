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
			<div class="am-u-sm-8 am-u-md-6 am-u-end">
			    <!-- 加载编辑器的容器 -->
			    <script id="container" name="content" type="text/plain">
			        
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="assets/ue/ueditor.config.js"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="assets/ue/ueditor.all.js"></script>
			    <!-- 实例化编辑器 -->
			    <script type="text/javascript">
			        var ue = UE.getEditor('container');
			    </script>
			    <style type="text/css">
			    	#edui1_iframeholder{
			    		height: 500px !important;
			    	}
			    </style>
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