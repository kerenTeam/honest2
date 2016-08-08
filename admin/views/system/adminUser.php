<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户管理</strong><small></small></div>
	</div>

	<div class="am-g am-padding-bottom-lg">
		<div class="am-u-sm-12 am-u-md-6 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
					<a data-am-modal="{target: '#add'}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增用户</a>
				</div>
			</div>
		</div>
	</div>

	<!-- 新增弹出框 -->
    <div class="am-popup" id="add">
      <div class="am-popup-inner">
        <div class="am-popup-hd">
          <h4 class="am-popup-title">新增用户</h4>
          <span data-am-modal-close
          class="am-close">&times;</span>
        </div>
        <div class="am-popup-bd">
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('system/addadminUser');?>" enctype="multipart/form-data">
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-3 am-text-right">
					用户名
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" required name="userName">
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-3 am-text-right">
					头像
				</div>
				<div class="am-u-sm-8 am-u-md-4 am-u-end">
					<input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" required>
		            <br>
		            <div id="preview"> <img class="minImg" src=""> </div>
				</div>
			</div>
			
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-3 am-text-right">
					手机号码
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" required  name="phoneNumber">
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-3 am-text-right">
					电子邮箱
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" required  name="email">
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-3 am-text-right">
					密码
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="password" class="am-input-sm" required  name="passWord">
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-3 am-text-right">
					确认密码
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="password" class="am-input-sm" required  name="pwd">
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-offset-3 am-u-sm-8 am-u-end">
					<button type="submit" class="am-btn am-btn-primary">确定</button>
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
							<th>序号</th><th class="table-title">用户名</th><th class="table-date am-hide-sm-only">手机号码</th><th class="table-type">电子邮箱</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
					<?php foreach($users as $val):?>
						<tr>
							<td><?=$val['userId'];?></td>
							<td><?=$val['userName'];?></td>
							<td><?=$val['phoneNumber'];?></td>
							<td><?=$val['email'];?></td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
	                    				<a data-am-modal="{target: '#password<?=$val['userId']?>'}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 修改密码</a>
	                    				<a href="<?=site_url('system/getweixinuser?id=').$val['userId'];?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-user"></span>转出为微信用户</a>
										<a href="<?=site_url('system/deladminuser?id=').$val['userId'];?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>

	                    				<!-- 修改密码弹出框 -->
					                        <div class="am-popup" id="password<?=$val['userId']?>">
					                          <div class="am-popup-inner">
					                            <div class="am-popup-hd">
					                              <h4 class="am-popup-title">修改密码</h4>
					                              <span data-am-modal-close
					                              class="am-close">&times;</span>
					                            </div>
					                            <div class="am-popup-bd">
					                              <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('system/exitPassword');?>">
					                    			<div class="am-g am-margin-top-sm">
					                    				<div class="am-u-sm-3 am-text-right">
					                    					用户名
					                    				</div>
					                    				<div class="am-u-sm-8 am-u-end">
					                    					<strong><?=$val['userName']?></strong>
					                    				</div>
					                    			</div>
					                    			<div class="am-g am-margin-top-sm">
					                    				<div class="am-u-sm-3 am-text-right">
					                    					原密码
					                    				</div>
					                    				<div class="am-u-sm-8 am-u-end">
					                    					<input type="password" class="am-input-sm" required name="passWord">
					                    				</div>
					                    			</div>
					                    			<div class="am-g am-margin-top-sm">
					                    				<div class="am-u-sm-3 am-text-right">
					                    					密码
					                    				</div>
					                    				<div class="am-u-sm-8 am-u-end">
					                    					<input type="password" class="am-input-sm" required name="newpassword">
					                    				</div>
					                    			</div>
					                    			<div class="am-g am-margin-top-sm">
					                    				<div class="am-u-sm-3 am-text-right">
					                    					确认密码
					                    				</div>
					                    				<div class="am-u-sm-8 am-u-end">
					                    					<input type="password" class="am-input-sm" required name="pwd">
					                    				</div>
					                    			</div>
					                    			<div class="am-g am-margin-top-sm">
					                    				<div class="am-u-sm-offset-3 am-u-sm-8 am-u-end">
					                    					<input type="hidden" name="id" value="<?=$val['userId']?>">
					                    					<button type="submit" class="am-btn am-btn-primary">确定</button>
					                    				</div>
					                    			</div>
					                    		</form>
					                            </div>
					                          </div>
					                        </div>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
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