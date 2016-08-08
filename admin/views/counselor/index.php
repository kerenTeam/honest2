  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">咨询师用户管理</strong><small></small></div>
    </div>

	<div class="am-g am-padding-bottom-lg">
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
	</div>


    <!-- 问题解答列表 -->
    <form>
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover table-main">
					<thead>
						<tr>
							<th>ID</th><th class="table-title">头像</th><th class="table-type">姓名</th><th class="table-type">性别</th><th class="table-type">手机号</th><th class="table-type">所在地</th><th class="table-date am-hide-sm-only">职业</th><th class="table-date am-hide-sm-only">更多</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><img class="imgSquare" src="assets/img/Home_01_02.png"></td>
							<td>Uncle cat</td>
							<td>女</td>
							<td>13540215684</td>
							<td>成都</td>
							<td>法律/咨询/法务</td>
							<td><a href="<?=site_url('counselor/info');?>">查看</a></td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<a href="#" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</form>








  </div>