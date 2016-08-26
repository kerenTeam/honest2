<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">交流互动</strong> / <small>新增</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('interaction/add');?>" enctype="multipart/form-data">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				标题
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" name="title" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				频道
			</div>
			
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select multiple data-am-selected="{btnSize: 'sm'}" name="tag[]">
				<?php foreach($tags as $val):?>
					<option value="<?=$val['tag']?>" ><?=$val['tagName']?></option>
				<?php endforeach;?>
					
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				分类
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" name="cateId">
				<?php foreach($cates as $val):?>
					<option value="<?=$val['cateId']?>"><?=$val['cateName'];?></option>
				<?php endforeach;?>
					
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				缩略图
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add">
	            <br>
	            <div id="preview"><img class="minImg" src=""> </div>
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
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				附件上传
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<div class="lineInput">
					<div class="upList">
						<div>
							<input style="width: 40%;" type="file" class="am-input-sm update" name="file" onchange="update(this)">
							<input style="width: 50%;" type="text" class="am-input-sm" name="">
							<span class="am-icon-close" onclick="delDate(this)"></span>
						</div>
					</div>
					<button type="button" class="am-btn am-btn-primary am-btn-sm am-margin-top-lg adddate">添加附件</button>
					<button type="button" class="am-btn am-btn-primary am-btn-sm am-margin-top-lg">上传</button>
				</div>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-offset-2 am-u-sm-4 am-u-end">
				<button type="submit" class="am-btn am-btn-primary">确定</button>
			</div>
		</div>
	</form>







</div>
  <script type="text/javascript" src="assets/js/imgup.js"></script>
  <script type="text/javascript">
  function update(obj){
  	var file = $(obj).val();
  	console.log(file)
	var strFileName=file.replace(/^.+?\\([^\\]+?)(\.[^\.\\]*?)?$/gi,"$1");  //正则表达式获取文件名，不带后缀
	$(obj).next().val(strFileName);
  }
  function delDate(obj){
  	$(obj).parent().remove();
  }
  $('.adddate').on('click',function(){
  	var index = $('.update').length + 1;
  	$('.upList').append('<div><input style="width: 40%;" type="file" class="am-input-sm update" name="file'+index+'" onchange="update(this)"> <input style="width: 50%;" type="text" class="am-input-sm" name=""> <span class="am-icon-close" onclick="delDate(this)"></span></div>')
  })

  </script>