<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">频道管理</strong><small></small></div>
	</div>
	<div class="am-g am-padding-bottom-lg">
		<div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
			<form action="<?=site_url('Information/channelsearch');?>" method="post">
				
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field" name="search">
					<span class="am-input-group-btn">
						<button class="am-btn am-btn-default" type="submit"><span class="am-icon-search"></span>搜索</button>
					</span>
				</div>
			</form>
		</div>
		<div class="am-cf"></div>
		<div class="am-u-sm-3 am-u-md-3 am-margin-top" style="min-width: 300px;">
			<form action="<?=site_url('Information/addchannel');?>" method="post">
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field" name="tagName">
					<span class="am-input-group-btn">
						<button class="am-btn am-btn-default" type="submit"><span class="am-icon-plus"></span>新增</button>
					</span>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		


	</script>

	<!-- 频道列表 -->
	<form>
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th>ID</th><th class="table-title">频道名</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
					<?if(!empty($tags)):?>
					<?php foreach($tags as $val):?>
						<tr>
							<td><?=$val['tag']?></td>
	              			<td><?=$val['tagName']?></td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<a href="<?=site_url('Information/delchannel?id=').$val['tag'];?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
				<?php else:?>
					
					<th colspan="3">没有任何记录!</th>
				<?php endif;?>
					</tbody>
				</table>
        <div class="am-cf">
            共 <?=count($tags);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
			</div>
		</div>
	</form>




</div>