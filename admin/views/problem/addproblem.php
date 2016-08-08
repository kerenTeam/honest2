<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">问题解答</strong> / <small>新增</small></div>
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
			<div class="am-u-sm-offset-2 am-u-sm-4 am-u-end">
				<button type="button" class="am-btn am-btn-primary">确定</button>
			</div>
		</div>
	</form>

</div>