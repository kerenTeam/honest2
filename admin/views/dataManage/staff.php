  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">人员规模</strong><small></small></div>
    </div>

	<div class="am-g am-padding-bottom-lg">
		<!-- <div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
			<form action="" method="">
				
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field">
					<span class="am-input-group-btn">
						<button class="am-btn am-btn-default" type="button"><span class="am-icon-search"></span>搜索</button>
					</span>
				</div>
			</form>
		</div> -->
		<div class="am-cf"></div>
		<div class="am-u-sm-12 am-u-md-6 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
					<a data-am-modal="{target: '#add'}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
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
        <div class="am-popup-bd modelHei">
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="" enctype="multipart/form-data">
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-2 am-text-right">
					数据选项
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" name="title" required>
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
					<button type="submit" class="am-btn am-btn-primary">确定</button>
				</div>
			</div>
		</form>
        </div>
      </div>
    </div>

    <!-- 问题解答列表 -->
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th><input type="checkbox" class="allcheck"></th><th>ID</th><th class="table-type">数据选项</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
						<tr>
							<td><input type="checkbox" class="checkList"></td>
							<td>1</td>
							<td>100人以下</td>
							<td>
								<div class="">
									<div class="am-btn-group am-btn-group-xs">
										<a data-am-modal="{target: '#dataManage1'}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
										<a href="#" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
									<!-- 编辑弹出框 -->
								    <div class="am-popup" id="dataManage1">
								      <div class="am-popup-inner">
								        <div class="am-popup-hd">
								          <h4 class="am-popup-title">编辑</h4>
								          <span data-am-modal-close
								          class="am-close">&times;</span>
								        </div>
								        <div class="am-popup-bd modelHei">
								          <form class="am-form am-padding-top am-padding-bottom" method="post" action="" enctype="multipart/form-data">
											<div class="am-g am-margin-top-sm">
												<div class="am-u-sm-2 am-text-right">
													数据选项
												</div>
												<div class="am-u-sm-8 am-u-end">
													<input type="text" class="am-input-sm" value="100人以下" name="title" required>
												</div>
											</div>
											<div class="am-g am-margin-top-sm">
												<div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
													<button type="submit" class="am-btn am-btn-primary">确定</button>
												</div>
											</div>
										</form>
								        </div>
								      </div>
								    </div>
								</div>
							</td>
						</tr>
						<tr>
							<td><input type="checkbox" class="checkList"></td>
							<td>1</td>
							<td>100-200</td>
							<td>
								<div class="">
									<div class="am-btn-group am-btn-group-xs">
										<a data-am-modal="{target: '#dataManage2'}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
										<a href="#" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
									<!-- 编辑弹出框 -->
								    <div class="am-popup" id="dataManage2">
								      <div class="am-popup-inner">
								        <div class="am-popup-hd">
								          <h4 class="am-popup-title">编辑</h4>
								          <span data-am-modal-close
								          class="am-close">&times;</span>
								        </div>
								        <div class="am-popup-bd modelHei">
								          <form class="am-form am-padding-top am-padding-bottom" method="post" action="" enctype="multipart/form-data">
											<div class="am-g am-margin-top-sm">
												<div class="am-u-sm-2 am-text-right">
													数据选项
												</div>
												<div class="am-u-sm-8 am-u-end">
													<input type="text" class="am-input-sm" value="100-200" name="title" required>
												</div>
											</div>
											<div class="am-g am-margin-top-sm">
												<div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
													<button type="submit" class="am-btn am-btn-primary">确定</button>
												</div>
											</div>
										</form>
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