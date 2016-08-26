  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-cf"><strong class="am-text-primary am-text-lg">信息管理</strong> / <small>咨询师发布</small></div>
    </div>

	<div class="am-g am-padding-bottom-lg">
		<div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
			<form action="<?=site_url('auditing/safeSearch');?>" method="post">
				
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field" name="search">
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
				   <table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
            <thead>
              <tr>
                <th>ID</th><th class="table-title">缩略图</th><th class="table-type">标题</th><th class="table-type">简介</th><th class="table-type">发布人</th><th class="table-date am-hide-sm-only">发布日期</th><th	class='table-set'>详细内容</th><th class="table-set">操作</th>
              </tr>
         	 </thead>
					<tbody id="movies">
					<?php if(!empty($conul)): ?>
					<?php foreach($conul as $val):?>
						<tr>
							<td><?=$val['publishId']?></td>
							<td><img class="imgSquare" src="../<?=$val['picImg'];?>"></td>
							<td><?=$val['title'];?></td>
							<td><?=mb_substr($val['content'],0,20);?>...</td>
							<td><?=get_username($val['userId']);?></td>
							<td><?=$val['publishData']?></td>
							<td>
								<a href="<?=site_url('auditing/consultInfo?id='.$val['publishId']);?>">查看详情</a>
							</td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<?php if($val['state'] == 0):?>
										<a href="<?=site_url('auditing/consultOk?id='.$val['publishId'].'&state=2');?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-check"></span> 通过</a>
										<a href="<?=site_url('auditing/consultOk?id='.$val['publishId'].'&state=3');?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-close"></span> 不通过</a>
										<?php elseif($val['state'] == 2):?>
											<a href="javascript:;" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-check"></span> 已通过</a>
										<?php elseif($val['state'] == 3):?>
											<a href="javascript:;" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-check"></span> 已拒绝</a>
										<?php endif;?>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
				<?php else:?>
					<th colspan="8" >暂无内容！</th>
				<?php endif;?>
					</tbody>
				</table>
        <div class="am-cf">
            共 <?=count($conul);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
			</div>
		</div>
	</form>








  </div>