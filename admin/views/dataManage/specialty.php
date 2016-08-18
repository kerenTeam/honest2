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
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('DataManage/Addfaculty')?>" enctype="multipart/form-data">
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-2 am-text-right">
					一级选项
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" name="majorName" required>
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
    	<ul class="am-tabs-nav am-nav am-nav-tabs tabLi">
			<?php foreach($faculty as $val):?>
			<li><a href="#<?=$val['id'];?>"><?=$val['majorName'];?></a></li>
			<?php endforeach;?>
		</ul>
		<div class="am-tabs-bd">
			<?php foreach($faculty as $val):?>
			<div class="am-tab-panel am-fade am-in am-active" id="<?=$val['id'];?>">
				<div class="am-u-sm-12 am-u-md-6 am-margin-top">
					<div class="am-btn-toolbar">
						<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
							<a href="<?=site_url('DataManage/delfaculty?id='.$val['id']);?>" class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除院系</a>
							<br/>
							<br/>
							<span class="am-text-primary">专业</span>
						</div>
					</div>
				</div>
				<div class="am-u-sm-12 am-margin-top am-form">
					<ul>
					<?php foreach($specialy as $v):?>
						<?php if($v['majorId'] == $val['id']):?>
						<li class="inlineDiv" >
							<input type="text" placeholder="" value="<?=$v['majorName'];?>">
							<a onclick="upmajor(this);" id="<?=$v['id'];?>" class="am-btn am-btn-primary">保存修改</a>
							<a href="<?=site_url('DataManage/Delspecialy?id='.$v['id']);?>" class="am-btn am-btn-danger">删除选项</a>
						</li>
						<?php endif;?>
					<?php endforeach;?>
						
					</ul>
					<a onclick="addX(this);" class="am-btn am-btn-success">添加选项</a>
				</div>
			</div>
			<?php endforeach;?>
		</div>
    </div>
 

 
	



<script type="text/javascript">
	 $('.tabLi li:first-child').addClass('am-active'); 
	function addX(obj){
		$(obj).prev('ul').append('<li class="inlineDiv"> <input type="text" placeholder="请输入要添加的选项名" style="" > <a onclick="addOk(this);" class="am-btn am-btn-primary">确认添加</a> <a onclick="#" class="am-btn am-btn-danger">取消添加</a></li>')
	}
	// 添加事件
	function addOk(obj){
		$(obj).parent().find('a').attr('disabled','disabled');
		$(obj).html('<i class="am-icon-spinner am-icon-pulse"></i>');
		// ajax
		var name = $(obj).prev().val();
		var parents = $(obj).parentsUntil('.am-tabs-bd');
		var id = parents.eq(parents.length - 1).attr('id');
		//console.log(id);
		$.ajax({
			url:'<?php echo site_url('Other/Addspecialy');?>',
			type:"POST",
			data: 'name='+name+'&id='+id,
			success: function(result) {
				// 成功后
					$(obj).html('保存修改');
					$(obj).next('a').html('删除选项');
					$(obj).parent().find('a').removeAttr('disabled');
					$(obj).removeAttr('onclick');
				
			}
			
		});
	
		// 成功后
	
	}
	function upmajor(obj){
		
		var name = $(obj).prev().val();
		var id = $(obj).attr('id');
		$.ajax({
			url:'<?php echo site_url('Other/UpSpeecialy');?>',
			type:"POST",
			data: 'name='+name+'&id='+id,
			success: function(result) {
				// 成功后
				if(result == 1){
					alert('成功');
				}else{
					alert('失败');
				}
			}
			
		});
	
		// 成功后
	
	}



</script>
</div>