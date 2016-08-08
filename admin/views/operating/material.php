<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">素材管理</strong><small></small></div>
    </div>

	<div class="am-g am-padding-bottom-lg">
		<div class="am-u-sm-12 am-u-md-12 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
					<a class="am-btn am-btn-default" data-am-modal="{target: '#add'}"><span class="am-icon-plus"></span> 新增</a>
				</div>
			</div>
		</div>
	</div>

	<!-- 新增弹出框 -->
	<div class="am-popup" id="add">
		<div class="am-popup-inner">
			<div class="am-popup-hd">
				<h4 class="am-popup-title">新增</h4>
				<span data-am-modal-close
				class="am-close">&times;</span>
			</div>
			<div class="am-popup-bd">
				<form class="am-form am-padding-top am-padding-bottom" method="" action="">
					<div class="am-g am-margin-top-sm">
						<div class="am-u-sm-2 am-text-right">
							标题
						</div>
						<div class="am-u-sm-8 am-u-end">
							<input type="text" class="am-input-sm" required>
						</div>
					</div>
					<div class="am-g am-margin-top-sm">
						<div class="am-u-sm-2 am-text-right">
							简介
						</div>
						<div class="am-u-sm-8 am-u-end">
							<textarea rows="4" required></textarea>
						</div>
					</div>
					<div class="am-g am-margin-top-sm">
						<div class="am-u-sm-2 am-text-right">
							内容
						</div>
						<div class="am-u-sm-8 am-u-end">
							<br>
							<br>
							<br>
						</div>
					</div>
					<div class="am-g am-margin-top-sm">
						<div class="am-u-sm-2 am-text-right">
							图片
						</div>
						<div class="am-u-sm-8 am-u-end">
							<input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
							<br>
							<div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
						</div>
					</div>
					<div class="am-g am-margin-top-sm">
						<div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
							<button type="button" class="am-btn am-btn-primary">确定</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- 素材列表 -->
	<div class="am-g">
		<div class="am-u-sm-3">
			<div class="am-thumbnail">
				<img class="mdImg" src="assets/img/05-16-21-28-59.jpg" alt=""/>
				<div class="am-thumbnail-caption">
					<h3>标题</h3>
					<p>内容内容内容内容内容内容内容内容内容内容内容内容</p>
					<p>
						<button class="am-btn am-btn-primary" data-am-modal="{target: '#compile1'}">修改</button>
						<button class="am-btn am-btn-default">删除</button>
						
						<!-- 弹出框 -->
						<div class="am-popup" id="compile1">
							<div class="am-popup-inner">
								<div class="am-popup-hd">
									<h4 class="am-popup-title">修改</h4>
									<span data-am-modal-close
									class="am-close">&times;</span>
								</div>
								<div class="am-popup-bd">
									<form class="am-form am-padding-top am-padding-bottom" method="" action="">
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												标题
											</div>
											<div class="am-u-sm-8 am-u-end">
												<input type="text" class="am-input-sm" value="标题" required>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												简介
											</div>
											<div class="am-u-sm-8 am-u-end">
												<textarea rows="4" required>内容内容内容内容内容内容内容内容内容内容内容内容</textarea>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												内容
											</div>
											<div class="am-u-sm-8 am-u-end">
												<br>
												<br>
												<br>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												图片
											</div>
											<div class="am-u-sm-8 am-u-end">
												<input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
												<br>
												<div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
												<button type="button" class="am-btn am-btn-primary">确定</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</p>
				</div>
			</div>
		</div>
		<div class="am-u-sm-3">
			<div class="am-thumbnail">
				<img class="mdImg" src="assets/img/05-16-21-28-59.jpg" alt=""/>
				<div class="am-thumbnail-caption">
					<h3>标题</h3>
					<p>内容内容内容内容内容内容内容内容内容内容内容内容</p>
					<p>
						<button class="am-btn am-btn-primary" data-am-modal="{target: '#compile2'}">修改</button>
						<button class="am-btn am-btn-default">删除</button>
						
						<!-- 弹出框 -->
						<div class="am-popup" id="compile2">
							<div class="am-popup-inner">
								<div class="am-popup-hd">
									<h4 class="am-popup-title">修改</h4>
									<span data-am-modal-close
									class="am-close">&times;</span>
								</div>
								<div class="am-popup-bd">
									<form class="am-form am-padding-top am-padding-bottom" method="" action="">
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												标题
											</div>
											<div class="am-u-sm-8 am-u-end">
												<input type="text" class="am-input-sm" value="标题" required>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												简介
											</div>
											<div class="am-u-sm-8 am-u-end">
												<textarea rows="4" required>内容内容内容内容内容内容内容内容内容内容内容内容</textarea>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												内容
											</div>
											<div class="am-u-sm-8 am-u-end">
												<br>
												<br>
												<br>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-2 am-text-right">
												图片
											</div>
											<div class="am-u-sm-8 am-u-end">
												<input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
												<br>
												<div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
											</div>
										</div>
										<div class="am-g am-margin-top-sm">
											<div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
												<button type="button" class="am-btn am-btn-primary">确定</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>