<style type="text/css">
	.inlineDiv{
		margin-bottom: 15px;
	}
	.inlineDiv input[type=text]{
		width: 300px;
		display: inline-block;
	}
</style>
<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">专业</strong><small></small></div>
	</div>

	<div class="am-g am-padding-bottom-lg">
		<!-- <div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
			<form action="" method="">
				
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field">
					<span class="am-input-group-btn">
						<button class="am-btn am-btn-default" type="button"><span class="am-icon-search"></span>搜索</button>
					</span>
				</div>
			</form>
		</div> -->
		<div class="am-cf"></div>
		<div class="am-u-sm-12 am-u-md-6 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
					<a data-am-modal="{target: '#add'}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
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
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="" enctype="multipart/form-data">
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-2 am-text-right">
					一级选项
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" name="title" required>
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
    <div class="am-tabs am-padding" data-am-tabs>
    	<ul class="am-tabs-nav am-nav am-nav-tabs">
			<li class="am-active"><a href="#tab1">理工类</a></li>
			<li><a href="#tab2">管理类</a></li>
		</ul>
		<div class="am-tabs-bd">
			<div class="am-tab-panel am-fade am-in am-active" id="tab1">
				<div class="am-u-sm-12 am-u-md-6 am-margin-top">
					<div class="am-btn-toolbar">
						<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
							<span class="am-text-primary">二级选项</span>
						</div>
					</div>
				</div>
				<div class="am-u-sm-12 am-margin-top am-form">
					<ul>
						<li class="inlineDiv">
							<input type="text" placeholder="" value="化工">
							<a onclick="" class="am-btn am-btn-primary">保存修改</a>
							<a onclick="" class="am-btn am-btn-danger">删除选项</a>
						</li>
						<li class="inlineDiv">
							<input type="text" placeholder="" value="机械">
							<a onclick="" class="am-btn am-btn-primary">保存修改</a>
							<a onclick="" class="am-btn am-btn-danger">删除选项</a>
						</li>
					</ul>
					<a onclick="addX(this);" class="am-btn am-btn-success">添加选项</a>
				</div>
			</div>
			<div class="am-tab-panel am-fade" id="tab2">
				<div class="am-u-sm-12 am-margin-top">
					<div class="am-btn-toolbar">
						<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
							<span class="am-text-primary">二级选项</span>
						</div>
					</div>
				</div>
				<div class="am-u-sm-12 am-margin-top am-form">
					<ul>
						<li class="inlineDiv">
							<input type="text" placeholder="" value="文秘">
							<a onclick="" class="am-btn am-btn-primary">保存修改</a>
							<a onclick="" class="am-btn am-btn-danger">删除选项</a>
						</li>
						<li class="inlineDiv"
							<input type="text" placeholder="" value="财会">
							<a onclick="" class="am-btn am-btn-primary">保存修改</a>
							<a onclick="" class="am-btn am-btn-danger">删除选项</a>
						</li>
					</ul>
					<a onclick="addX(this);" class="am-btn am-btn-success">添加选项</a>
				</div>
			</div>
		</div>
    </div>







<script type="text/javascript">
	function addX(obj){
		$(obj).prev('ul').append('<li class="inlineDiv"> <input type="text" placeholder="请输入要添加的选项名" style=""> <a onclick="addOk(this);" class="am-btn am-btn-primary">确认添加</a> <a onclick="#" class="am-btn am-btn-danger">取消添加</a></li>')
	}
	// 添加事件
	function addOk(obj){
		$(obj).parent().find('a').attr('disabled','disabled');
		$(obj).html('<i class="am-icon-spinner am-icon-pulse"></i>');
		// ajax

		console.log(132)
		// 成功后
		$(obj).html('保存修改');
		$(obj).next('a').html('删除选项');
		$(obj).parent().find('a').removeAttr('disabled');
		$(obj).removeAttr('onclick');
	}
</script>
</div>