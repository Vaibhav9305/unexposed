(function ($) {
  "use strict";
  var n = window.UNITED_JS || {};

  n.AdminTabarea = function () {
    var $contentlis = $('.theme-tab-wrapper .theme-tab-content'),
        $tabslis = $('.theme-admin-tablist li');

    $contentlis.hide().first().show();

    $('.theme-admin-tablist').on('click', 'li', function (e) {
      var $current = $(e.currentTarget),
          index = $current.index();

      $tabslis.removeClass('active-tab');
      $current.addClass('active-tab');
      $contentlis.hide().eq(index).show();
    });
  };

  $(document).ready(function () {
    n.AdminTabarea();
  });

})(jQuery);
