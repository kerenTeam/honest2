<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">权限管理</strong><small></small></div>
	</div>

	<div class="am-g am-padding-bottom-lg">
		<div class="am-u-sm-12 am-u-md-6 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
					<a data-am-modal="{target: '#add'}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增权限</a>
				</div>
			</div>
		</div>
	</div>

		<!-- 新增弹出框 -->
    <div class="am-popup" id="add">
      <div class="am-popup-inner">
        <div class="am-popup-hd">
          <h4 class="am-popup-title">新增权限</h4>
          <span data-am-modal-close
          class="am-close">&times;</span>
        </div>
        <div class="am-popup-bd">
          <form class="am-form am-padding-top am-padding-bottom" method="" action="">
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-3 am-text-right">
					权限名
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" required>
				</div>
			</div>
			<hr>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-12">
					<label>
						<input type="checkbox" name="" value=""> 用户管理模块
					</label>
					&nbsp;&nbsp;
					<label>
						<input type="checkbox" name="" value=""> 用户管理模块
					</label>
					&nbsp;&nbsp;
					<label>
						<input type="checkbox" name="" value=""> 用户管理模块
					</label>
					&nbsp;&nbsp;
					<label>
						<input type="checkbox" name="" value=""> 用户管理模块
					</label>
					&nbsp;&nbsp;
					<label>
						<input type="checkbox" name="" value=""> 用户管理模块
					</label>
				</div>
			</div>
			<hr>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-offset-3 am-u-sm-8 am-u-end">
					<button type="button" class="am-btn am-btn-primary">确定</button>
				</div>
			</div>
		</form>
        </div>
      </div>
    </div>

<!-- 列表 -->
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th>序号</th><th class="table-title">权限名</th><th class="table-title">权限描述</th><th class="table-date am-hide-sm-only">创建时间</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>超级管理员</td>
							<td>阿斯蒂芬</td>
							<td>2016-05-21 00:50:54</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

</div>