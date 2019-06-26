(function ($) { 
  // "use strict";
  Drupal.behaviors.toggleMenu = {         
    attach: function (context, settings) {
      $('.duk-icon-bars', context).click(function () {

        var toggleMenu = $('.duk-icon-bars', context);
        var menuMain   = $('.menu--main', context);

        if ( (menuMain.css('display') === '') || (menuMain.css('display') === 'none') ) {

          menuMain.css('display', 'block');

          toggleMenu.removeClass('duk-icon-bars');
          toggleMenu.addClass('duk-icon-close');
          console.log();

        } else {

          menuMain.css('display', 'none');

          toggleMenu.removeClass('duk-icon-close')
          toggleMenu.addClass('duk-icon-bars');
        }
      });
    }

  };
  
})(jQuery);