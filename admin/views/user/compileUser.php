<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">微信用户</strong> / <small>编辑</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('user/editcompile');?>" enctype="multipart/form-data">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>姓名
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="<?=$users['userName'];?>" name="userName" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>性别
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<label><input type="radio" name="gender" value="男" <?php if($users['gender'] == "男"){echo "checked='checked'";}?>>男</label>
				&nbsp;&nbsp;&nbsp;
				<label><input type="radio" name="gender" value="女 " <?php if($users['gender'] == "女"){echo "checked='checked'";}?> >女</label>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>头像
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" required>
	            <br>
	            <div id="preview"><input type="hidden" name="picImg" value="<?=$users['headPicImg'];?>"> <img class="minImg" src="../<?=$users['headPicImg'];?>"> </div>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>年龄
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" required>
					<option value="option1">30以下</option>
					<option value="option2">30-40</option>
					<option value="option3">40-50</option>
					<option value="option3">50-60</option>
					<option value="option3">60以上</option>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>部门
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" required>
					<option value="option1">董事长</option>
					<option value="option2">总经理</option>
					<option value="option3">安全(环保、生产)部长</option>
					<option value="option3">安全管理人员</option>
					<option value="option3">办公室(财务、采购等)</option>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				职称
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}">
					<option value="option1">注册安全工程师</option>
					<option value="option2">安全评价师</option>
					<option value="option3">安全中级评价师</option>
					<option value="option3">安全高级评价师</option>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>学历
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" required>
					<option value="option1">专科</option>
					<option value="option2">本科</option>
					<option value="option3">硕士</option>
					<option value="option3">博士</option>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>专业
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select id="oneSub" required style="float: left;width: 33%;">
					<option value="option0">请选择分类</option>
					<option value="option1">管理类</option>
					<option value="option2">理工类</option>
				</select>
				<select id="twoSub" required style="float: left;width: 33%;margin: 0 .5%;">
					
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>行业
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" required>
					<option value="option1">化工</option>
					<option value="option2">机械</option>
					<option value="option3">自控</option>
					<option value="option3">电子</option>
					<option value="option3">矿山</option>
					<option value="option3">煤矿</option>
					<option value="option3">建筑</option>
					<option value="option3">运输</option>
					<option value="option3">地质</option>
					<option value="option3">冶金</option>
					<option value="option3">医学</option>
					<option value="option3">医药</option>
					<option value="option3">核工业</option>
					<option value="option3">环保</option>
					<option value="option3">安全</option>
					<option value="option3">检测检查</option>
					<option value="option3">轻工纺织食品</option>
					<option value="option3">安全管理</option>
					<option value="option3">培训教育</option>
				</select>
			</div>
		</div>
		
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>手机
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="" name="" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				座机
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="" name="">
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>QQ号
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="" name="" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>微信号
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="" name="" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>EMAIL
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" value="" name="" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				个人简介
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<textarea rows="4" required=""></textarea>
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
  <script type="text/javascript">
  	$(function(){
  		var twosub = [['请选择专业'],['工商','文秘','财会','其它'],['化工','机械','电子','矿山','冶金','医药','环保','安全','轻工纺织食品','其它']];
  		console.log($('#oneSub').val());
  		$('#oneSub').on('change',function(){
  			var thisVal = $('#oneSub').val();
  			$('#oneSub option').each(function(){
  				if(thisVal == $(this).val()){
  					var arr = twosub[$(this).index()];
  					var html = '';
  					for(var i = 0;i < arr.length;i++){
  						html += '<option>'+arr[i]+'</option>'
  					}
  					$('#twoSub').html(html);
  				}
  			})
  		})
  		$('#oneSub option').each(function(){
  				if($('#oneSub').val() == $(this).val()){
  					var arr = twosub[$(this).index()];
  					var html = '';
  					for(var i = 0;i < arr.length;i++){
  						html += '<option>'+arr[i]+'</option>'
  					}
  					$('#twoSub').html(html);
  				}
  			})
  	})
  </script>