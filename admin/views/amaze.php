<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <title>Hello Amaze UI</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/png" href="assets/i/favicon.png">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">

  <link rel="stylesheet" href="assets/css/amazeui.min.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <style type="text/css">
  #btn{
    cursor: pointer;
  }
  </style>
</head>
<body>
  <div id="btn">45646132</div>
  
<p>
  Hello Amaze UI.
</p>


<div class="am-panel am-panel-primary" id="my-scrollspy" data-am-scrollspy="{animation:'scale-up'}">
  <div class="am-panel-hd">ScrollSpy via JS
  </div>
  <div class="am-panel-bd">
    生命是一团欲望，欲望不满足便痛苦，满足便无聊。人生就在痛苦和无聊之间摇摆。——叔本华
  </div>
</div>
<div class="imgContainer">

<!-- 大多浏览器不支持 -->

<!-- <img sizes="(min-width:900px) 900px 100vw"
      srcset="case1.png 480w,
              case2.png 640w,
              case3.png 720w,
              case4.png 900w" 
 src="case1.png" alt="132" style="max-width: 100%" /> -->
<picture>
  <source media="(max-width:480px)" srcset="case1.png">
  <source media="(max-width:640px)" srcset="case2.png">
  <source media="(max-width:720px)" srcset="case3.png">
  <source media="(max-width:900px)" srcset="case4.png">
  <img src="case1.png" alt="132" width="100%">
</picture>



 </div>
<!--在这里编写你的代码-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/picturefill.min.js"></script>
<script type="text/javascript">
var startTime;
  var log = function(msg){
    $('body').append('<div>'+(new Date().getTime()) + ': ' + (new Date().getTime() - startTime) + ': ' + msg+'</div>')
  }
  var click = function (){
    startTime = new Date().getTime();
    log('click')
  }
  function goPAGE(){
    if((navigator.userAgent.match(/(phone|pad|iPhone|Android|Mobile)/i))){
      return 'touch'
    }else{
      return 'click'
    }
  }
  $('#btn').bind(goPAGE(),function(){
    $(this).html(goPAGE());
  });
</script>
</body>
</html>