  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">咨询师备忘录</strong><small></small></div>
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
							<th><input type="checkbox" class="allcheck"></th><th>ID</th><th class="table-type">咨询师</th><th class="table-type">备忘标签</th><th class="table-date am-hide-sm-only">备忘内容</th><th class="table-date am-hide-sm-only">时间</th><th class="table-date am-hide-sm-only">更多</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="checkbox" class="checkList"></td>
							<td>1</td>
							<td>Uncle cat</td>
							<td>与客户对接项目</td>
							<td>明早10点，项目对接</td>
							<td>2016-05-12</td>
							<td><a href="<?=site_url('counselor/memorandumInfo');?>">查看</a></td>
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