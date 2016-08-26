<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">信息列表</strong><small></small></div>
    </div>

  <div class="am-g am-padding-bottom-lg">
    <div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
      <form action="<?=site_url('government/Search');?>" method="post">
        
        <div class="am-input-group am-input-group-sm">
          <input type="text" class="am-form-field" name="searname">
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
          <a class="am-btn am-btn-default" href="<?=site_url('government/add');?>"><span class="am-icon-plus"></span> 新增</a>
        </div>
      </div>
    </div>
  </div>

        <!-- 列表 -->
    <div class="am-g">
      <div class="am-u-sm-12" id="movies">
      <!-- <div id="container" class="clearfix">
      <div id="sidebar">
        <div id="content" class="defaults"> -->
        <table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
            <thead>
              <tr>
                <th>ID</th><th class="table-title">缩略图</th><th class="table-type">标题</th><th class="table-type">文号</th><th class="table-type">发布人</th><th class="table-type">所在单位</th><th class="table-date am-hide-sm-only">发布日期</th><th class="table-set">操作</th>
              </tr>
            </thead>
          <tbody class="checkboxs">
         <?php foreach($list as $val):?>
            <tr>
              <td><?=$val['id']?></td>
              <td><img class="imgSquare" src="../<?=$val['picImg']?>"></td>
              <td><?=$val['title']?></td>
              <td><?=$val['grade']?></td>
              <td><?=$val['author']?></td>
              <td><?=$val['company']?></td>
     
              <td class="am-hide-sm-only"><?=$val['publishData']?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <?php if($val['state'] == 0): ?>
                        <a href="javascript:;" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span>待审核</a>
                    <?php elseif($val['state'] == 1):?>
                        <a href="javascript:;" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-check"></span> 已通过</a>
                    <?php else:?>
                        <a href="javascript:;" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-check"></span> 已拒绝</a>
                    <?php endif;?>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach;?>

          </tbody>
        </table>
        <div class="am-cf">
            共<span class="pageIndex"><?=count($list)?></span>条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
        <!-- </div></div></div> -->
      </div>
    </div>




</div>
