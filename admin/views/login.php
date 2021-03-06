<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page | Amaze UI Example</title>
  <base href="<?php echo base_url();?>admin/" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>诚实安全</h1>
    <p>后台服务系统登录</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <br>

    <form method="post" action="<?=site_url('login/adminlogin');?>" class="am-form">
      <label for="email">登录账号:</label>
      <input type="text" name="phoneNumber" id="usernmae" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="passWord" id="password" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" name="check" type="checkbox">
        记住密码
      </label>
      <br />
      <br />
      <div class="am-cf">
        <input type="submit" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
      </div>
    </form>
    <hr>
    <p>© 2014 - 2016 Honest, safe.</p>
  </div>
</div>
</body>\
<script type="text/javascript">
    


</script>
</html>
