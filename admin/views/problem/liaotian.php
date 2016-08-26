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



    <!-- 问题解答列表 -->
      <div class="am-g">
        <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover am-main am-table-centered am-table-bordered">

            <tbody id="movies">
            <style type="text/css">
            	#liao img{
            		display: block;
            		width: 50% !important;
            		height: 50% !important;
            	}
            </style>
            <?php foreach($info as $val):?>
            <center class=''><p style="width:40%;" id='liao'><?=$val['content'];?></p></center>	
              
            <?php endforeach;?>

            </tbody>
          </table>
        
        </div>
      </div>





</div>