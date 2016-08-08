<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">自动回复</strong><small></small></div>
    </div>

	<ul class="am-nav am-nav-tabs am-margin-left am-margin-right">
		<li><a  href="<?=site_url('operating/autoReply');?>">关注后自动回复</a></li>
		<li class="am-active"><a href="<?=site_url('operating/autoReply1');?>">关键词自动回复</a></li>
		<li><a href="<?=site_url('operating/autoReply2');?>">智能自动回复</a></li>
	</ul>

	<div class="am-g am-padding-top-lg am-padding-bottom-lg">
		<div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
			<form action="" method="">
				
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field">
					<span class="am-input-group-btn">
						<button class="am-btn am-btn-default" type="button"><span class="am-icon-search"></span>搜索</button>
					</span>
				</div>
			</form>
		</div>

		<div class="am-u-sm-12 am-u-md-12 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
					<a class="am-btn am-btn-default" data-am-modal="{target: '#add'}"><span class="am-icon-plus"></span> 新增规则</a>
				</div>
			</div>
		</div>
	</div>


    <!-- 新增弹出框 -->
	<div class="am-popup" id="add">
		<div class="am-popup-inner">
			<div class="am-popup-hd">
				<h4 class="am-popup-title">新增规则</h4>
				<span data-am-modal-close
				class="am-close">&times;</span>
			</div>
			<div class="am-popup-bd">
				<div class="am-tabs" data-am-tabs="{noSwipe: 1}">
					<ul class="am-tabs-nav am-nav am-nav-tabs">
						<li class="am-active"><a href="#tab1">文本</a></li>
						<li><a href="#tab2">图文</a></li>
					</ul>
					<div class="am-tabs-bd">
					<div class="am-tab-panel am-fade am-in am-active" id="tab1">
						<form class="am-form am-padding-top am-padding-bottom" method="" action="">
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									规则名称
								</div>
								<div class="am-u-sm-8 am-u-end">
									<input type="text" class="am-input-sm" required>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									规则关键字
								</div>
								<div class="am-u-sm-8 am-u-end">
									<input type="text" class="am-input-sm" required>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									规则代码
								</div>
								<div class="am-u-sm-8 am-u-end">
									<textarea rows="4" placeholder="请填写要使用的规则代码" required></textarea>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-offset-3 am-u-sm-8 am-u-end">
									<button type="button" class="am-btn am-btn-primary">确定</button>
								</div>
							</div>
						</form>
						</div>
					<div class="am-tab-panel am-fade am-in am-active" id="tab2">
						<form class="am-form am-padding-top am-padding-bottom" method="" action="">
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									规则名称
								</div>
								<div class="am-u-sm-8 am-u-end">
									<input type="text" class="am-input-sm" required>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									规则关键字
								</div>
								<div class="am-u-sm-8 am-u-end">
									<input type="text" class="am-input-sm" required>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									URL地址
								</div>
								<div class="am-u-sm-8 am-u-end">
									<input type="url" class="am-input-sm" required>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									规则代码
								</div>
								<div class="am-u-sm-8 am-u-end">
									<textarea rows="4" placeholder="请填写要使用的规则代码" required></textarea>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-3 am-text-right">
									图片
								</div>
								<div class="am-u-sm-8 am-u-end">
									<input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
									<br>
									<div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
								</div>
							</div>
							<div class="am-g am-margin-top-sm">
								<div class="am-u-sm-offset-3 am-u-sm-8 am-u-end">
									<button type="button" class="am-btn am-btn-primary">确定</button>
								</div>
							</div>
						</form>
					</div>
					</div>

				</div>
				
			</div>
		</div>
	</div>


	<!-- 问题解答列表 -->
	<div class="am-cf"></div>
	<div class="am-g">
		<div class="am-u-sm-12">
			<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
				<thead>
					<tr>
						<th>序号</th><th class="table-title">规则名称</th><th class="table-type">触发关键字</th><th class="table-set">操作</th>
					</tr>
				</thead>
				<tbody id="movies">
					<tr>
						<td>1</td>
						<td>你好</td>
						<td>2</td>
						<td>
							<div class="am-btn-toolbar">
								<div class="am-btn-group am-btn-group-xs">
									<a data-am-modal="{target: '#compile1'}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
									<!-- 启用的class样式 am-btn-default -->
									<a href="#" class="am-btn am-btn-success am-btn-xs am-hide-sm-only"> 启用</a>
									<a href="#" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									<!-- 编辑弹出框 -->
									<div class="am-popup" id="compile1">
										<div class="am-popup-inner">
											<div class="am-popup-hd">
												<h4 class="am-popup-title">编辑规则</h4>
												<span data-am-modal-close
												class="am-close">&times;</span>
											</div>
											<div class="am-popup-bd">
											<p class="am-text-danger am-margin-top">*请选择文本</p>
												<div class="am-tabs" data-am-tabs="{noSwipe: 1}">
																	<ul class="am-tabs-nav am-nav am-nav-tabs">
																		<li class="am-active"><a href="#tab1">文本</a></li>
																		<li><a href="#tab2">图文</a></li>
																	</ul>
																	<div class="am-tabs-bd">
																	<div class="am-tab-panel am-fade am-in am-active" id="tab1">
																		<form class="am-form am-padding-top am-padding-bottom" method="" action="">
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					规则名称
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<input type="text" class="am-input-sm" value="123" required>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					规则关键字
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<input type="text" class="am-input-sm" value="123" required>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					规则代码
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<textarea rows="4" placeholder="请填写要使用的规则代码" required>123</textarea>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-offset-3 am-u-sm-8 am-u-end">
																					<button type="button" class="am-btn am-btn-primary">确定</button>
																				</div>
																			</div>
																		</form>
																		</div>
																	<div class="am-tab-panel am-fade am-in am-active" id="tab2">
																		<form class="am-form am-padding-top am-padding-bottom" method="" action="">
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					规则名称
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<input type="text" class="am-input-sm" value="123" required>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					规则关键字
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<input type="text" class="am-input-sm" value="123" required>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					URL地址
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<input type="url" class="am-input-sm" value="123" required>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					规则代码
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<textarea rows="4" placeholder="请填写要使用的规则代码" required>13</textarea>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-3 am-text-right">
																					图片
																				</div>
																				<div class="am-u-sm-8 am-u-end">
																					<input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
																					<br>
																					<div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
																				</div>
																			</div>
																			<div class="am-g am-margin-top-sm">
																				<div class="am-u-sm-offset-3 am-u-sm-8 am-u-end">

																					<p class="am-text-danger am-margin-top">确认修改成图文？</p>
																					<button type="button" class="am-btn am-btn-primary">确定</button>
																				</div>
																			</div>
																		</form>
																	</div>
																	</div>

																</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
        <div class="am-cf">
            共 3 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
		</div>
	</div>





</div>