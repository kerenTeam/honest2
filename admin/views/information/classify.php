<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">分类管理</strong><small></small></div>
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
		<div class="am-u-sm-12 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
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
	    <div class="am-popup-bd modelHei">
	      <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('information/addCate');?>" enctype="multipart/form-data">
	        <div class="am-g am-margin-top-sm">
	          <div class="am-u-sm-2 am-text-right">
	            分类名
	          </div>
	          <div class="am-u-sm-8 am-u-end">
	            <input type="text" class="am-input-sm" name="cateName"  required>
	          </div>
	        </div>
	        <div class="am-g am-margin-top-sm">
	          <div class="am-u-sm-2 am-text-right">
	            排序
	          </div>
	          <div class="am-u-sm-8 am-u-end">
	            <input type="number" class="am-input-sm" name="sole" value="30" required>
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
	
<?php foreach($cates as $cate):?>
	<!-- 编辑弹出框 -->
	<div class="am-popup" id="edit<?=$cate['cateId']?>">
	  <div class="am-popup-inner">
	    <div class="am-popup-hd">
	      <h4 class="am-popup-title">编辑</h4>
	      <span data-am-modal-close
	      class="am-close">&times;</span>
	    </div>
	    <div class="am-popup-bd modelHei">

	      <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('information/editCate');?>" enctype="multipart/form-data">
	        <div class="am-g am-margin-top-sm">
	          <div class="am-u-sm-2 am-text-right">
	            分类名
	          </div>
	          <div class="am-u-sm-8 am-u-end">
	            <input type="text" class="am-input-sm" name="cateName" value="<?=$cate['cateName']?>" required>
	          </div>
	        </div>
	        <div class="am-g am-margin-top-sm">
	          <div class="am-u-sm-2 am-text-right">
	            排序
	          </div>
	          <div class="am-u-sm-8 am-u-end">
	            <input type="number" class="am-input-sm" name="sole" value="<?=$cate['sole']?>" required>
	          </div>
	        </div>
	        <div class="am-g am-margin-top-sm">
	          <div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
	          	<input type="hidden" name="cateId" value="<?=$cate['cateId']?>">
	            <button type="submit" class="am-btn am-btn-primary">确定</button>
	          </div>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	<?php endforeach;?>
	<!-- 频道列表 -->
	<form>
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th>ID</th><th class="table-title">分类名</th><th>排序</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
						<?php foreach($cates as $cate):?>
							<tr>
								<td><?=$cate['cateId'];?></td>
		              			<td><?=$cate['cateName'];?></td>
		              			<td><?=$cate['sole'];?></td>
								<td>
									<div class="am-btn-toolbar">
										<div class="am-btn-group am-btn-group-xs">
	                    					<a  data-am-modal="{target: '#edit<?=$cate['cateId']?>'}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
											<a href='<?=site_url('information/delCate?id='.$cate['cateId']);?>' onclick="return confirm('删除会把该分类下所有文章删除,你是否确定删除?');" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach;?>
					<!-- <th colspan="3">没有任何记录!</th> -->
					</tbody>
				</table>
        <div class="am-cf">
            共 <?=count($cates);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
			</div>
		</div>
	</form>

</div>