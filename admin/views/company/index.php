  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">公司信息</strong><small></small></div>
    </div>

	<div class="am-g am-padding-bottom-lg">
		<div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
			<form action="<?=site_url('Company/SeacheCompany');?>" method="post">
				
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field" name='search'>
					<span class="am-input-group-btn">
						<button class="am-btn am-btn-default" type="submit"><span class="am-icon-search"></span>搜索</button>
					</span>
				</div>
			</form>
		</div>
		<div class="am-cf"></div>
		<!--<div class="am-u-sm-12 am-u-md-6 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
					<a href="<?=site_url('company/add');?>" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
				</div>
			</div>
		</div>-->
	</div>



    <!-- 问题解答列表 -->
    <form>
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th><input type="checkbox" class="allcheck"></th><th>ID</th><th class="table-type">公司名称</th><th>所属用户</th><th class="table-type">行业</th><th class="table-date am-hide-sm-only">行业区域</th><th class="table-date am-hide-sm-only">人员规模</th><th class="table-date am-hide-sm-only">生产规模</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
						<?php if(!empty($company)):?>
						<?php foreach($company as $val):?>
						<tr>
							<td><input type="checkbox" class="checkList"></td>
							<td><?=$val['companyId']?></td>
							<td><?=$val['companyName']?></td>
							<td><?=get_username($val['userId']);?></td>
							<td><?=$val['companyId']?></td>
							<td><?=$val['region']?></td>
							<td><?=$val['scale']?></td>
							<td><?=$val['production']?></td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<a href="<?=site_url('company/info?id='.$val['companyId']);?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-file"></span> 详情</a>
										<!--<a href="<?=site_url("interaction/edit")?>"class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>-->
										<a href="<?=site_url('company/delcompany?id='.$val['companyId']);?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach;?>
						<?php else:?>
							<th colspan='9' style='text-align:center;'>暂无公司信息</th>
						<?php endif;?>
					</tbody>
				</table>
        <div class="am-cf">
            共 <?=count($company);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
			</div>
		</div>
	</form>








  </div>