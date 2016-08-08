<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资讯列表</strong> / <small>查看回复</small></div>
    </div>
    <hr>
    <!-- 回复列表 -->
    <form>
      <div class="am-g">
        <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main am-table-centered am-table-bordered">
              <thead>
                <tr>
                  <th><input type="checkbox"></th><th>ID</th><th class="table-title">用户名</th><th class="table-type">回复内容</th><th class="table-date am-hide-sm-only">回复时间</th><th class="table-set">操作</th>
                </tr>
            </thead>
            <tbody id="movies">
            <?php if(!empty($comments)): ?>
            <?php foreach($comments as $val):?>
              <tr>
                <td><input type="checkbox"></td>
                <td><?=$val['commentId'];?></td>
                <td><?=$val['userName']?></td>
                <td><?=$val['comment'];?></td>
                <td class="am-hide-sm-only"><?=$val['commentTime']?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="<?=site_url('interaction/delreoly?id=').$val['commentId'];?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach;?>
          <?php else:?>
            <th colspan="6" >暂时没有回复！</th>
          <?php endif;?>
            </tbody>
          </table>
          
        <div class="am-cf">
            共 <?=count($comments);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
        </div>
      </div>
    </form>








</div>