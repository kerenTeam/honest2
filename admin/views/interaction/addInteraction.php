<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">交流互动</strong> / <small>新增</small></div>
    </div>
    <hr>
	<form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('interaction/add');?>" enctype="multipart/form-data">
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				标题
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="text" class="am-input-sm" name="title" required>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				频道
			</div>
			
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select multiple data-am-selected="{btnSize: 'sm'}" name="tag[]">
				<?php foreach($tags as $val):?>
					<option value="<?=$val['tag']?>" ><?=$val['tagName']?></option>
				<?php endforeach;?>
					
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				分类
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<select data-am-selected="{btnSize: 'sm'}" name="cateId">
				<?php foreach($cates as $val):?>
					<option value="<?=$val['cateId']?>"><?=$val['cateName'];?></option>
				<?php endforeach;?>
					
				</select>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				缩略图
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<input type="file" name="picImg" onchange="preview(this)" class="upload-add">
	            <br>
	            <div id="preview"><img class="minImg" src=""> </div>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				图文
			</div>
			<div class="am-u-sm-8 am-u-md-6 am-u-end">
				
			    <!-- 加载编辑器的容器 -->
			    <script id="container" name="content" type="text/plain">
			 
			    </script>
			    <!-- 配置文件 -->
			    <script type="text/javascript" src="assets/ue/ueditor.config.js"></script>
			    <!-- 编辑器源码文件 -->
			    <script type="text/javascript" src="assets/ue/ueditor.all.js"></script>
			    <!-- 实例化编辑器 -->
			    <script type="text/javascript">
			        var ue = UE.getEditor('container');
			    </script>
			    <style type="text/css">
			    	#edui1_iframeholder{
			    		height: 500px !important;
			    	}
			    </style>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-4 am-u-md-2 am-text-right">
				附件上传
			</div>
			<div class="am-u-sm-8 am-u-md-4 am-u-end">
				<div class="lineInput">
					<div class="upList">
						<div>
							<input style="width: 40%;" type="file" class="am-input-sm update" name="file" onchange="update(this)">
							<input style="width: 50%;" type="text" class="am-input-sm" name="">
							<span class="am-icon-close" onclick="delDate(this)"></span>
						</div>
					</div>
					<button type="button" class="am-btn am-btn-primary am-btn-sm am-margin-top-lg adddate">添加附件</button>
					<button type="button" class="am-btn am-btn-primary am-btn-sm am-margin-top-lg">上传</button>
				</div>
			</div>
		</div>
		<div class="am-g am-margin-top-sm">
			<div class="am-u-sm-offset-2 am-u-sm-4 am-u-end">
				<button type="submit" class="am-btn am-btn-primary">确定</button>
			</div>
		</div>
	</form>







</div>
  <script type="text/javascript" src="assets/js/imgup.js"></script>
  <script type="text/javascript">
  function update(obj){
  	var file = $(obj).val();
  	console.log(file)
	var strFileName=file.replace(/^.+?\\([^\\]+?)(\.[^\.\\]*?)?$/gi,"$1");  //正则表达式获取文件名，不带后缀
	$(obj).next().val(strFileName);
  }
  function delDate(obj){
  	$(obj).parent().remove();
  }
  $('.adddate').on('click',function(){
  	var index = $('.update').length + 1;
  	$('.upList').append('<div><input style="width: 40%;" type="file" class="am-input-sm update" name="file'+index+'" onchange="update(this)"> <input style="width: 50%;" type="text" class="am-input-sm" name=""> <span class="am-icon-close" onclick="delDate(this)"></span></div>')
  });
 //上传图片
function preview(file) {
         var prevDiv = document.getElementById('preview');
         prevDiv.innerHTML = '<i class="am-icon-spinner am-icon-spin"></i>';
         if (file.files && file.files[0]) {
             var reader = new FileReader();
             reader.onload = function (evt) {
                 // prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
             }
             reader.readAsDataURL(file.files[0]);
             var file1 = file.files[0];
             //判断类型是不是图片
             if (!/image\/\w+/.test(file1.type)) {
                 alert("请确保文件为图像类型");
                 return false;
             }
             var reader = new FileReader();
             reader.readAsDataURL(file1);
             reader.onload = function (e) {
                 var resu = "";
                 var resu1 = this.result;//就是base64
                 if (file1.type == "image/png") {
                     resu = resu1.substring(22, resu1.length);//去掉前面前缀
                 }
                 else if (file1.type == "image/jpeg") {
                     resu = resu1.substring(23, resu1.length);//去掉前面前缀
                 }
                 else if (file1.type == "image/gif") {
                     resu = resu1.substring(22, resu1.length);//去掉前面前缀
                 }
                 else {
                     alert("此格式暂时不支持")
                     return false;
                 }
               //  console.log(resu);
				$.ajax({
					 type: "POST",
		             url: "<?=site_url('Other/UploadImg');?>",
		             data: "img="+resu,
		        //     dataType: "json",
		             success: function(data){
		             	if(data == 1){
		             		prevDiv.innerHTML = '上传失败';
		             	}else{
		             		//var data = eval(data);
		             		console.log(data);
		             		prevDiv.innerHTML = '<img class="minImg" src="../' + data + '" />'
		             	}
		             }
				});

				// 'http://www.krfer.com/API/API_User',{
				// 	//修改资料
				// 		data:{"dis":"updateIng","img":resu1,"phone":users[0].account},
				// 		dataType:'json',//服务器返回json格式数据
				// 		type:'post',//HTTP请求类型
				// 		timeout:10000,//超时时间设置为10秒；
				// 		success:function(data){
				// 				if(data == -3) {
				// 					mui.toast("程序出错！");
				// 				}
				// 				if(data == 0) {
				// 					 mui.toast("修改失败！");
				// 				} 
				// 				if(data == -2) {
				// 					mui.toast("验证错误！");
				// 				} else {
				// 					window.location.reload();
				// 				}
							
				// 		},
				// 		error:function(xhr,type,errorThrown){
				// 			//异常处理；
				// 			console.log(type);
				// 		}
				// }


             }
         }
         else {
             prevDiv.innerHTML = '<div class="minImg" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
         }
    }

  </script>