<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">公司信息</strong> / <small>新增</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="" action="">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>公司名称
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				LOGO
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add">
	            <br>
	            <div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>行业
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select multiple data-am-selected="{btnSize: 'sm'}" required>
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
				<span class="red">*</span>行政区域
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select id="Province" name="Province" style="float: left;width: 33%;" required>
					
				</select>
				<select id="City" name="City" style="float: left;width: 33%;margin: 0 .5%;" required>
					
				</select>
				<select id="Area" name="Area" style="float: left;width: 33%;" required>
					
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				详细地址
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<textarea rows="4" required></textarea>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				主要装置
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm">
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				主要工艺
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm">
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				安全风险
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm">
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				职业卫生风险
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm">
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>人员规模
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" required>
					<option value="option1">100人以下</option>
					<option value="option2">100-200人</option>
					<option value="option3">200-500人</option>
					<option value="option3">500-1000人</option>
					<option value="option3">1000人以上</option>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				<span class="red">*</span>生产规模
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" required>
					<option value="option1">500人以下</option>
					<option value="option2">500万-1000万</option>
					<option value="option3">1000万-2000万</option>
					<option value="option3">2000万-5000万</option>
					<option value="option3">5000万-1亿</option>
					<option value="option3">1亿-2亿</option>
					<option value="option3">2亿-5亿</option>
					<option value="option3">5亿以上</option>
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				企业简介
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<textarea rows="4" required></textarea>
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
  <script type="text/javascript" src="assets/js/address.js"></script>
  <script type="text/javascript">
  	new PCAS("Province","City","Area")
  </script>