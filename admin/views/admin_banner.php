  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">首页</strong> / <small>Banner</small></div>
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
    <!-- 新增banner -->
<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">新增Banner
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form" action="" method="" enctype="multipart/form-data"> 
        <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              banner
            </div>
            <div class="am-u-sm-9 am-u-end">
              <input type="text" class="am-input-sm" value="banner" required>
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              图片
            </div>
            <div class="am-u-sm-9 am-u-end am-text-left">
              <input type="file" id="imgUpload" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
              <br>
              <div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              banner 描述
            </div>
            <div class="am-u-sm-9 am-u-end">
              <textarea rows="4" required></textarea>
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

<!-- 修改banner -->
<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-2">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">新增Banner
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form" action="" method="" enctype="multipart/form-data"> 
        <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              banner
            </div>
            <div class="am-u-sm-9 am-u-end">
              <input type="text" class="am-input-sm name" value="banner" required>
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              图片
            </div>
            <div class="am-u-sm-9 am-u-end am-text-left">
              <input type="file" id="imgUpload" value="assets/img/Home_01_02.png" name="fileimg" onchange="previewImage(this)" class="upload-add" required>
              <br>
              <div id="preview"> <img class="minImg" src="assets/img/Home_01_02.png"> </div>
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-3 am-text-right">
              banner 描述
            </div>
            <div class="am-u-sm-9 am-u-end">
              <textarea rows="4" required></textarea>
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
                <th class="table-title">banner</th><th class="table-type">图片</th><th class="table-date am-hide-sm-only">修改日期</th><th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td class="name">banner1</td>
              <td class="pic"><img class="imgIcon" src="assets/img/Home_01_02.png"></td>
              <td class="am-hide-sm-only time">2014年9月4日 7:28:47</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary edit" data-am-modal="{target: '#doc-modal-2', closeViaDimmer: 0, width: 600}"><span class="am-icon-pencil-square-o"></span> 编辑</button>
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
  <script type="text/javascript" src="assets/js/imgup.js"></script>
  <script type="text/javascript">
  // $(function(){


  //     $('.edit').click(function(){
  //       var name = $(this).parentsUntil("tbody").find('.name').html();
  //       var pic = $(this).parentsUntil("tbody").find('.pic').children("img").attr('src');
  //       var time = $(this).parentsUntil("tbody").find('.time').html();
  //       $('#doc-modal-2').find('.name').val(name);
  //       $('#doc-modal-2').find('#imgUpload').val(pic);
  //       $('#doc-modal-2').find('.minImg').attr('src',pic);
  //     })
  //   })
  </script>
  <!-- content end -->