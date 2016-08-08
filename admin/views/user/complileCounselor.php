<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">咨询师</strong> / <small>编辑</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('user/editcompile');?>" enctype="multipart/form-data">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				姓名
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="<?=$users['userName'];?>" name="userName" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				性别
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<label><input type="radio" name="gender" value="男" <?php if($users['gender'] == "男"){echo "checked='checked'";}?>>男</label>
				&nbsp;&nbsp;&nbsp;
				<label><input type="radio" name="gender" value="女 " <?php if($users['gender'] == "女"){echo "checked='checked'";}?> >女</label>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				头像
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" required>
	            <br>
	            <div id="preview"><input type="hidden" name="picImg" value="<?=$users['headPicImg'];?>"> <img class="minImg" src="../<?=$users['headPicImg'];?>"> </div>
			</div>
		</div>
		
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				所在地
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="<?=$users['address'];?>" name="address" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				职业
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="<?=$users['occupation'];?>" name="occupation" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				简介
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="<?=$users['summary'];?>" name="summary" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-offset-2 am-u-sm-4 am-u-end">
					<input type="hidden" name="id" value="<?=$users['userId']?>" /> 
				<button type="submit" class="am-btn am-btn-primary">确定</button>
			</div>
		</div>
	</form>








</div>
  <script type="text/javascript" src="assets/js/imgup.js"></script>