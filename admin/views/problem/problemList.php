<div class="admin-content">
	<div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">问题解答</strong><small></small></div>
    </div>

   <div class="am-g am-padding-bottom-lg">
    <div class="am-u-sm-3 am-u-md-3" style="min-width: 300px;">
    <form action="<?=site_url('problem/Search');?>" method="post">
    
      <div class="am-input-group am-input-group-sm">
        <input type="text" class="am-form-field" name="sear">
        <span class="am-input-group-btn">
          <button class="am-btn am-btn-default" type="submit"><span class="am-icon-search"></span>搜索</button>
        </span>
      </div>
    </form>
  </div>
  <!--     <div class="am-u-sm-12 am-u-md-12 am-margin-top">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <a class="am-btn am-btn-default" data-am-modal="{target: '#add'}"><span class="am-icon-plus"></span> 新增</a>
          </div>
        </div>
      </div> -->
    </div>

    <!-- 新增弹出框 -->
    <div class="am-popup" id="add">
      <div class="am-popup-inner">
        <div class="am-popup-hd">
          <h4 class="am-popup-title">新增</h4>
          <span data-am-modal-close class="am-close">&times;</span>
        </div>
        <div class="am-popup-bd">
          <form class="am-form am-padding-top am-padding-bottom" method="post" action="<?=site_url('problem/add')?>">
 
            <div class="am-g am-margin-top-sm">
              <div class="am-u-sm-2 am-text-right">
                问题内容
              </div>
              <div class="am-u-sm-8 am-u-end">
                <textarea rows="4" required name="exchangeTitle"></textarea>
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
      <div class="am-g">
        <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">
              <thead>
                <tr>
                  <th><input type="checkbox" class="allcheck"></th><th>ID</th><th class="table-type">问题内容</th><th >发布人</th><th class="table-date am-hide-sm-only">发布日期</th><th class="table-set">操作</th>
                </tr>
            </thead>
            <tbody id="movies">
            <?php if(!empty($problem)): ?>
            <?php foreach($problem as $val):?>
              <tr>
                <td><input type="checkbox" class="checkList"></td>
                <td><?=$val['questionId']?></td>
          
                <td><?=$val['exchangeTitle'];?></td>
                <td><?=get_username($val['fromId'])?></td>
                <td class="am-hide-sm-only"><?=$val['exchangeTime'];?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a data-am-modal="{target: '#compile1'}" class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</a>

                      <!-- 编辑弹出框 -->
                    <div class="am-popup" id="compile1">
                      <div class="am-popup-inner">
                        <div class="am-popup-hd">
                          <h4 class="am-popup-title">编辑</h4>
                          <span data-am-modal-close
                          class="am-close">&times;</span>
                        </div>
                        <div class="am-popup-bd">

                          <form class="am-form am-padding-top am-padding-bottom" method="" action="">
                       
                           
                            <div class="am-g am-margin-top-sm">
                              <div class="am-u-sm-2 am-text-right">
                                问题内容
                              </div>
                              <div class="am-u-sm-8 am-u-end">
                                <textarea rows="4" required><?=$val['exchangeTitle']?></textarea>
                              </div>
                            </div>
                           
                            <div class="am-g am-margin-top-sm">
                              <div class="am-u-sm-offset-2 am-u-sm-8 am-u-end">
                                <button type="button" class="am-btn am-btn-primary">确定</button>
                              </div>
                            </div>
                          </form>


                        </div>
                      </div>
                    </div>
                      <a href="<?=site_url('problem/delProblem?id=').$val['questionId'];?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach;?>
          <?php else:?>
            <th colspan="6" >没有问题！</th>
          <?php endif;?>
            </tbody>
          </table>
        <div class="am-cf">
            共 <?=count($problem);?> 条记录
            <div class="am-fr">
              <div class="holder"><a class="jp-previous jp-disabled">上一页</a><a class="jp-current">1</a><span class="jp-hidden">...</span><a href="#" class="">2</a><a href="#" class="">3</a><a href="#" class="">4</a><a href="#" class="">5</a><a href="#" class="jp-hidden">6</a><span>...</span><a>7</a><a class="jp-next">下一页</a></div>
            </div>
          </div>
        </div>
      </div>





</div>