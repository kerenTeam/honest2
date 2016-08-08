<!-- content start -->
<div class="admin-content">
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资讯列表</strong><small></small></div>
	</div>
	<div class="am-g am-padding-bottom-lg">
		<div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
			<form action="<?=site_url('information/search');?>" method="post">
				
				<div class="am-input-group am-input-group-sm">
					<input type="text" class="am-form-field" name="sare">
					<span class="am-input-group-btn">
						<button class="am-btn am-btn-default" type="submit"><span class="am-icon-search"></span>搜索</button>
					</span>
				</div>
			</form>
		</div>
		<div class="am-cf"></div>
		<div class="am-u-sm-12 am-u-md-6 am-margin-top">
			<div class="am-btn-toolbar">
				<div class="am-btn-group am-btn-group-xs am-margin-right-lg">
					<a data-am-modal="{target: '#add'}" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</a>
				</div>
	          <select id="tag" data-am-selected="{btnSize: 'sm'}">
	            <option value="option1">所有类别</option>
	          	<?php foreach($tags as $val):?>
					<option value="<?=$val['tag']?>"><?=$val['tagName']?></option>
				<?php endforeach;?>
	          </select>
			</div>
		</div>
	</div>
<script>
  $('#tag').on('change',function(){
    var option = $(this).val();
    $.ajax({
      type:'POST',
      url: '<?=site_url("Other/tagConsulting");?>',
      data: 'tag='+option,
      success: function (data){
        var obj = eval(data);
        var str = '';
        if(obj.length == 0){
          str += '<tr><td colspan="9">暂无数据</td></tr>'
        }
        else{
          for(var i = 0;i < obj.length;i++){
            var objLi = obj[i];
            str += '<tr>';
            str += '<td><input type="checkbox" class="checkList"></td>';
            str += '<td>'+objLi.publishId+'</td>';
            str += '<td><img class="imgSquare" src="../'+objLi.picImg+'"></td>';
            str += '<td>'+objLi.title+'</td>';
            str += '<td>'+(objLi.content).substr(0,11)+'...</td>';
            str += '<td>'+objLi.userName+'</td>';
            str += '<td class="am-hide-sm-only">'+objLi.publishData+'</td>';
            str += '<td class="am-hide-sm-only">'+objLi.publishData+'</td>';
            str += '<td>';
            str += '<div class="am-btn-toolbar">';
            str += '<div class="am-btn-group am-btn-group-xs">';
            str += '<a href="<?=site_url("interaction/compile?id=")?> '+objLi.publishId+'"class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>';
            str += '<a href="<?=site_url("interaction/delinter?id=");?> '+objLi.publishId+'"class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>';
            str += '</div>';
            str += '</div>';
            str += '</td>';
            str += '</tr>';
              
          }
          
        }

        $('#movies').html(str);
        $('.pageIndex').html(obj.length);
        $("div.holder").jPages({
          containerID : "movies",
          previous : "上一页",
          next : "下一页",
          perPage : 10,
          delay : 10
        });
        // console.log(obj);
      }
    })
  })


</script>

	<!-- 新增弹出框 -->
    <div class="am-popup" id="add">
      <div class="am-popup-inner">
        <div class="am-popup-hd">
          <h4 class="am-popup-title">新增</h4>
          <span data-am-modal-close
          class="am-close">&times;</span>
        </div>
        <div class="am-popup-bd modelHei">
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('information/add');?>" enctype="multipart/form-data">
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-2 am-text-right">
					标题
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="text" class="am-input-sm" name="title" required>
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-2 am-text-right">
					频道
				</div>
				<div class="am-u-sm-8 am-u-end">
					<select multiple data-am-selected="{btnSize: 'sm'}" name="tag[]">
					<?php foreach($tags as $val):?>
						<option value="<?=$val['tag']?>"><?=$val['tagName']?></option>
					<?php endforeach;?>
					</select>
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-2 am-text-right">
					缩略图
				</div>
				<div class="am-u-sm-8 am-u-end">
					<input type="file" id="imgUpload" name="picImg" onchange="previewImage(this)" class="upload-add" >
		            <br>
		            <div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
				</div>
			</div>
			<div class="am-g am-margin-top-sm">
				<div class="am-u-sm-2 am-text-right">
					图文
				</div>
				<div class="am-u-sm-8 am-u-end">
					<!-- 编辑器 -->
					<!-- <link href="assets/uediter/themes/default/css/umeditor.css" type="text/css" rel="stylesheet"> -->
					<!-- <script type="text/javascript" src="assets//uediter/third-party/jquery.min.js"></script> -->
				<!-- 	<script type="text/javascript" charset="utf-8" src="assets/uediter/umeditor.config.js"></script>
					<script type="text/javascript" charset="utf-8" src="assets/uediter/umeditor.js"></script>
					<script type="text/javascript" src="assets/uediter/lang/zh-cn/zh-cn.js"></script>
					<style>.edui-container{margin-left: 0;}.edui-modal{width: 100% !important;}</style> -->
					<div style="width:100%">
					  <!-- <script id="myEditor" type="text/plain" style="width:450px;height:500px;" name='content'></script> -->
					  <textarea name="content" style="width:450px;height:500px;"></textarea>
					</div>
					<!-- <script type="text/javascript">
					var um = UM.getEditor('myEditor'); //实例化编辑器
					</script> -->
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


    <!-- 发布列表 -->

		<div class="am-g">
			<div class="am-u-sm-12">
				<table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
					<thead>
						<tr>
							<th><input type="checkbox" class="allcheck"></th><th>ID</th><th>缩略图</th><th class="table-title">标题</th><th class="table-title">作者</th><th class="table-date am-hide-sm-only">简介</th><th class="table-type">发布时间</th><th>频道</th><th class="table-set">操作</th>
						</tr>
					</thead>
					<tbody id="movies">
					<?php if(!empty($consulting)): ?>
					<?php foreach($consulting as $val):?>
						<tr>
							<td><input type="checkbox" class="checkList"></td>
							<td><?=$val['publishId']?></td>
	              			<td><img class="imgSquare" src="<?='../'.$val['picImg']?>"></td>
							<td><?=$val['title']?></td>
							<td><?=get_username($val['userId']);?></td>
							 <td><?=mb_strcut(strip_tags($val['content']),0,30,'UTF-8');?>...</td>
							<td><?=$val['publishData']?></td>
							<td>科技</td>
							<td>
								<div class="am-btn-toolbar">
									<div class="am-btn-group am-btn-group-xs">
	                    				<a href="<?=site_url('information/compile?id=').$val['publishId'];?>" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>

										<a href="<?=site_url('information/delconsulet?id=').$val['publishId']?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach;?>
				<?php else:?>
					<th colspan="9">暂无内容</th>
				<?php endif;?>
					</tbody>
				</table>
        <div class="am-cf">
            共 <?=count($consulting);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
			</div>
		</div>



</div>