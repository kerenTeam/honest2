(function($) {
  'use strict';

  $(function() {
    var $fullText = $('.admin-fullText');
    $('#admin-fullscreen').on('click', function() {
      $.AMUI.fullscreen.toggle();
    });

    $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function() {
      $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
    });
  });
})(jQuery);

(function($){
  'use strict';


    $(function() {
      var allCheck = $('.allcheck');
      var checkList = $('.checkList');
      allCheck.on('click',function() {
        var all = this;
        checkList.each(function(){
          this.checked = all.checked;
        })
      });
      checkList.on('click',function() {
        if($('.checkList:checked').length == checkList.length){
          allCheck.each(function() {
            this.checked = true;
          })
        }else{
          allCheck.each(function() {
            this.checked = false;
          })
        }
      })


    })

})(jQuery);
(function($){
  'use strict';


  $(function(){
    $("div.holder").jPages({
      containerID : "movies",
      previous : "上一页",
      next : "下一页",
      perPage : 10,
      delay : 10
    });
  });
})(jQuery);





