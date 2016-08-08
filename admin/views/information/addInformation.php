<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资讯列表</strong> / <small>新增</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="" action="">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				标题
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				发布人
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				频道
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}">
					<option value="option1">政策</option>
					<option value="option2">科技</option>
					<option value="option3">法律</option>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				简介
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<textarea rows="4" required></textarea>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				缩略图
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
	            <br>
	            <div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
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
				  <script id="myEditor" type="text/plain" style="width:450px;height:500px;" name='postcontent'></script>
				</div>
				<script type="text/javascript">
				var um = UM.getEditor('myEditor'); //实例化编辑器
				</script>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-offset-2 am-u-sm-4 am-u-end">
				<button type="button" class="am-btn am-btn-primary">确定</button>
			</div>
		</div>
	</form>








</div>
  <script type="text/javascript" src="assets/js/imgup.js"></script>