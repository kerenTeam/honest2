  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">信息审核</strong> / <small>咨询师发布信息审核</small></div>
    </div>

<!-- 	<div class="am-g am-padding-bottom-lg">
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
 -->
    <!-- 问题解答列表 -->
    <form>
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th>ID</th><th class="table-title">用户名</th><th class="table-title">标题</th><th class="table-date am-hide-sm-only">内容</th><th class="table-title">审核</th>
						</tr>
					</thead>
					<tbody id="movies">
					<?php foreach($userpost as $val):?>
						<tr>
							<td>123213</td>
							<td>123123213</td>
							<td>
								12312321321321312312321321
							</td><td>
								12312321321321312312321321
							</td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<a href="" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-check"></span> 通过</a>
										<a href="" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-close"></span> 不通过</a>

										<a href="javascript:;" ><span class="am-icon-check"></span> 已通过</a>
								
										<a href="javascript:;" class="am-text-danger"><span class="am-icon-close"></span> 已拒绝</a>
									
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
        <div class="am-cf">
            共 1 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
			</div>
		</div>
	</form>








  </div>