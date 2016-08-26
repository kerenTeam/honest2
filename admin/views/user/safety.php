  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户管理</strong> / <small>安监局</small></div>
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
		<div class="am-cf"></div>
		<div class="am-u-sm-12 am-u-md-6 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs">
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
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('user/addsafety')?>" enctype="multipart/form-data">
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-2 am-text-right">
                昵称
              </div>
              <div class="am-u-sm-8 am-u-end">
                <input type="text" class="am-input-sm" name="userName" required>
              </div>
            </div>
           <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              性别
            </div>
            <div class="am-u-sm-8 am-u-end">
              <label><input type="radio" name="gender" value="男">男</label>
              &nbsp;&nbsp;&nbsp;
              <label><input type="radio" name="gender" value="女">女</label>
            </div>
           </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-2 am-text-right">
                头像
              </div>
              <div class="am-u-sm-8 am-u-end">
                <input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" required>
                <br>
                <div id="preview"><img class="minImg" src="assets/img/Home_01_02.png"> </div>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-2 am-text-right">
                手机号
              </div>
              <div class="am-u-sm-8 am-u-end">
                <input type="text" class="am-input-sm" name="phoneNumber" required>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-2 am-text-right">
                所在地
              </div>
              <div class="am-u-sm-8 am-u-end">
                <input type="text" class="am-input-sm" name="address" required>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-2 am-text-right">
                职业
              </div>
              <div class="am-u-sm-8 am-u-end">
                <input type="text" class="am-input-sm" name="occupation" required>
              </div>
            </div>
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-2 am-text-right">
                简介
              </div>
              <div class="am-u-sm-8 am-u-end">
                <textarea name="summary" ></textarea>
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
    <form>
		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th>ID</th><th class="table-title">头像</th><th class="table-type">姓名</th><th class="table-type">性别</th><th class="table-type">手机号</th><th class="table-type">所在地</th><th class="table-date am-hide-sm-only">职业</th><th class="table-date am-hide-sm-only">更多</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
          <?php if(!empty($users)):?>
          <?php foreach($users as $val):?>
						<tr>
							<td><?=$val['userId'];?></td>
							<td><img class="imgSquare" src="../<?=$val['headPicImg'];?>"></td>
							<td><?=$val['userName'];?></td>
							<td><?=$val['gender'];?></td>
							<td><?=$val['phoneNumber'];?></td>
							<td><?=$val['address'];?></td>
							<td><?=$val['summary'];?></td>
							<td>
								<a href="<?=site_url('user/safetyInfo?id=').$val['userId'];?>">查看个人信息</a>
							</td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<a href="<?=site_url('user/cSafety?id=').$val['userId'];?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
										<a href="<?=site_url('user/deluser?id=').$val['userId'];?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
								</div>
							</td>
						</tr>
          <?php endforeach;?>
          <?php else:?>
          暂时没有任何用户！
          <?php endif;?>
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