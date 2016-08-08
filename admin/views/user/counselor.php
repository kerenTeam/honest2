  <!-- content start -->
  <div class="admin-content">
  	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">用户管理</strong> / <small>咨询师</small></div>
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
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('user/addCounselor')?>" enctype="multipart/form-data">
            <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>姓名
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="userName" required>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        头像
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" required>
              <br>
              <div id="preview"><input type="hidden" name="picImg" value=""> <img class="minImg" src=""> </div>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>性别
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <label><input type="radio" name="gender" value="男" >男</label>
        &nbsp;&nbsp;&nbsp;
        <label><input type="radio" name="gender" value="女" >女</label>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>年龄
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <select data-am-selected="{btnSize: 'sm'}" required>
          <option value="option1">30以下</option>
          <option value="option2">30-40</option>
          <option value="option3">40-50</option>
          <option value="option3">50-60</option>
          <option value="option3">60以上</option>
        </select>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>职称
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <select data-am-selected="{btnSize: 'sm'}" required>
          <option value="option1">中级</option>
          <option value="option2">高级</option>
          <option value="option3">其它</option>
        </select>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>专业
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <select id="oneSub" required style="float: left;width: 33%;">
          <option value="option0">请选择分类</option>
          <option value="option1">管理类</option>
          <option value="option2">理工类</option>
        </select>
        <select id="twoSub" required style="float: left;width: 33%;margin: 0 .5%;">
          
        </select>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>学历
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <select data-am-selected="{btnSize: 'sm'}" required>
          <option value="option1">专科</option>
          <option value="option2">本科</option>
          <option value="option3">硕士</option>
          <option value="option3">博士</option>
        </select>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>安全评价师
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <select data-am-selected="{btnSize: 'sm'}" required>
          <option value="option1">三级</option>
          <option value="option2">二级</option>
          <option value="option3">一级</option>
          <option value="option3">否</option>
        </select>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        安评师证书号
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="" >
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>注册安全工程师
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <select data-am-selected="{btnSize: 'sm'}" required>
          <option value="option1">煤矿</option>
          <option value="option2">金属与非金属矿山</option>
          <option value="option3">危险物品</option>
          <option value="option3">建筑施工</option>
          <option value="option3">金属冶炼</option>
          <option value="option3">道路运输</option>
          <option value="option3">其它</option>
          <option value="option3">否</option>
        </select>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        注册师证书号
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="" >
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>擅长领域
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <select data-am-selected="{btnSize: 'sm'}" required>
          <option value="option1">化工</option>
          <option value="option2">机械</option>
          <option value="option3">自控</option>
          <option value="option3">电子</option>
          <option value="option3">矿山</option>
          <option value="option3">煤矿</option>
          <option value="option3">建筑</option>
          <option value="option3">运输</option>
          <option value="option3">地质</option>
          <option value="option3">冶金</option>
          <option value="option3">医学</option>
          <option value="option3">医药</option>
          <option value="option3">核工业</option>
          <option value="option3">环保</option>
          <option value="option3">安全</option>
          <option value="option3">检测检查</option>
          <option value="option3">轻工纺织食品</option>
          <option value="option3">安全管理</option>
          <option value="option3">培训教育</option>
        </select>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        从业单位
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="" >
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        单位简介
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <textarea rows="4" required=""></textarea>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>手机
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="" required>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        座机
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="">
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>QQ号
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="" required>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>微信号
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="" required>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        <span class="red">*</span>EMAIL
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <input type="text" class="am-input-sm" value="" name="" required>
      </div>
    </div>
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-4 am-u-md-3 am-text-right">
        个人简介
      </div>
      <div class="am-u-sm-8 am-u-md-8 am-u-end">
        <textarea rows="4" required=""></textarea>
      </div>
    </div>
    
    <div class="am-g am-margin-top-sm">
      <div class="am-u-sm-offset-3 am-u-sm-4 am-u-end">
          <input type="hidden" name="id" value="" /> 
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
							<th>ID</th><th class="table-title">头像</th><th class="table-type">姓名</th><th class="table-type">性别</th><th class="table-type">年龄</th><th class="table-type">职称</th><th class="table-date am-hide-sm-only">专业</th><th class="table-date am-hide-sm-only">学历</th><th class="table-date am-hide-sm-only">更多</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
					<?php foreach($users as $val):?>
						<tr>
							<td><?=$val['userId']?></td>
							<td><img class="imgSquare" src="../<?=$val['headPicImg'];?>"></td>
							<td><?=$val['userName'];?></td>
							<td><?=$val['gender'];?></td>
							<td><!-- <?=$val['phoneNumber'];?> -->25</td>
							<td><?=$val['address']?></td>
							<td><?=$val['summary']?></td>
							<td><?=$val['occupation'];?></td>
				
							<td><a href="<?=site_url('user/counselorinfo?id=').$val['userId'];?>">查看资料</a></td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
										<a href="<?=site_url('consult/index');?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-file-text-o"></span> 咨询管理</a>
										<a href="<?=site_url('user/complileCounselor?id=').$val['userId'];?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>
										<a href="<?=site_url('user/deluser?id=').$val['userId'];?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
        <div class="am-cf">
            共 <?=count($users);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
			</div>
		</div>
	</form>








  </div>