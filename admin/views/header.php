<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <base href="<?php echo base_url();?>admin/" />
  <title>诚实安全</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
  <link rel="stylesheet" href="assets/css/jPages.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="assets/css/app.css">
  <script src="assets/js/jquery.min.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
<header class="am-topbar admin-header">
  <div class="am-topbar-brand amlogo">
  &nbsp;<img src="assets/img/LOGO.png" style="width: 50%;">
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="<?=site_url('login/loginOut');?>"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
	<?php if($_SESSION['groupId'] == '6'):?>
		<ul class="am-list admin-sidebar-list">
			<li><a href="<?=site_url('government/index');?>"><span class="am-icon-commenting-o"></span> 信息管理</a></li>
     <li><a href="<?=site_url('login/loginOut');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
		</ul>
	<?php else:?>
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?=site_url('admin/index');?>"><span class="am-icon-home"></span> 管理中心</a></li>
        <li><a href="<?=site_url('interaction/iList');?>"><span class="am-icon-commenting-o"></span> 交流互动</a></li>
        <li><a href="<?=site_url('problem/problem');?>"><span class="am-icon-info-circle"></span> 问题解答</a></li>
        <li><a href="<?=site_url('information/lists');?>"><span class="am-icon-newspaper-o"></span> 资讯列表</a></li>
        <li><a href="<?=site_url('information/channel');?>"><span class="am-icon-navicon"></span> 频道管理</a></li>
        <li><a href="<?=site_url('information/classify');?>"><span class="am-icon-list"></span> 分类管理</a></li>
        <li><a href="<?=site_url('company/index');?>"><span class="am-icon-institution"></span> 公司信息</a></li>
  
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-edit"></span> 信息审核 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav">
          
            <li><a href="<?=site_url('auditing/weixin');?>"><span class="am-icon-weixin"></span> 微信申请</a></li>
            <li><a href="<?=site_url('user/Auditing');?>"><span class="am-icon-weixin"></span> 用户资料审核</a></li>
            <li><a href="<?=site_url('auditing/safety');?>"><span class="am-icon-gavel"></span> 安监局发布信息</a></li>
		        <li><a href="<?=site_url('auditing/conulting');?>"><span class="am-icon-tablet"></span> 咨询师发布信息</a></li>
          </ul>
          
        </li>
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#dataM'}"><span class="am-icon-industry"></span> 数据管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="dataM">
           <!-- <li><a href="<?=site_url('dataManage/staff');?>"><span class="am-icon-users"></span> 人员规模</a></li>
            <li><a href="<?=site_url('dataManage/produce');?>"><span class="am-icon-cubes"></span> 生产规模</a></li>
            <li><a href="<?=site_url('dataManage/branch');?>"><span class="am-icon-sitemap"></span> 部门</a></li>
            <li><a href="<?=site_url('dataManage/workname');?>"><span class="am-icon-tags"></span> 职称</a></li>-->
            <li><a href="<?=site_url('dataManage/specialty');?>"><span class="am-icon-columns"></span> 专业</a></li>
           <!-- <li><a href="<?=site_url('dataManage/appraise');?>"><span class="am-icon-slideshare"></span> 安全评价师</a></li>
            <li><a href="<?=site_url('dataManage/register');?>"><span class="am-icon-clipboard"></span> 注册安全工程师</a></li>-->
          </ul>
        </li>
        <li class="admin-parent">
            <a class="am-cf" data-am-collapse="{target: '#user'}"><span class="am-icon-user"></span> 用户管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
           <ul class="am-list am-collapse admin-sidebar-sub" id="user">
       
            <li><a href="<?=site_url('user/userInfo');?>"><span class="am-icon-weixin"></span> 微信用户</a></li>
        
            <li><a href="<?=site_url('user/counselor');?>"><span class="am-icon-tablet"></span> 咨询师</a></li>
            <li><a href="<?=site_url('user/safety');?>"><span class="am-icon-gavel"></span> 安监局</a></li>
          </ul>
        </li>

        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#system'}"><span class="am-icon-cog"></span> 系统管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub" id="system">
            <li><a href="<?=site_url('system/user');?>"><span class="am-icon-users"></span> 后台管理用户</a></li>
              <li><a href="<?=site_url('system/banners');?>"><span class="am-icon-calendar"></span> banner管理</a></li>
         <!--    <li><a href="<?=site_url('system/role');?>"><span class="am-icon-male"></span> 角色管理</a></li>
            <li><a href="<?=site_url('system/authority');?>"><span class="am-icon-eraser"></span> 权限管理</a></li>
            <li><a href="<?=site_url('system/log');?>"><span class="am-icon-calendar"></span> 系统日志</a></li> -->
          </ul>
        </li>
      
        <li><a href="<?=site_url('login/loginOut');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
      </ul>
	  <?php endif;?>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。—— Honest, safe</p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end -->