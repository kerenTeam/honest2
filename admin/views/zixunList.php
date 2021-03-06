<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资讯列表</strong><small></small></div>
    </div>

    <div class="am-g am-padding-bottom-lg">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="am-btn am-btn-default" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 600}"><span class="am-icon-plus"></span> 新增</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 新增弹框 -->
<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">新增Banner
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form" action="" method="" enctype="multipart/form-data"> 

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              图片
            </div>
            <div class="am-u-sm-9 am-u-end am-text-left">
              <input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add">
              <br>
              <div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
            </div>
          </div>


        <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              标题
            </div>
            <div class="am-u-sm-9 am-u-end">
              <input type="text" class="am-input-sm" value="banner">
            </div>
          </div>



          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              banner 描述
            </div>
            <div class="am-u-sm-9 am-u-end">
              <textarea rows="4"></textarea>
            </div>
          </div>
          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-offset-3 am-u-sm-9 am-text-left">
              <button type="submit" class="am-btn am-btn-primary">提交</button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
        <!-- banner列表 -->
    <div class="am-g">
      <div class="am-u-sm-12">
        <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-title">缩略图</th><th class="table-type">标题</th><th class="table-type">简介</th><th class="table-type">作者</th><th class="table-date am-hide-sm-only">修改日期</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td><img class="imgSquare" src="assets/img/Home_01_02.png"></td>
              <td>如何管理好工程安全项目</td>
              <td>如何管理好工程安全项目如何管理好工程安全项目</td>
              <td>asdf</td>
              <td class="am-hide-sm-only">2014年9月4日 7:28:47</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-user"></span> 查看回复</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


</div>