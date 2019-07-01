(function ($) { 
  "use strict";
  Drupal.behaviors.toggleMenu = {         
    attach: function (context, settings) {
      var toggleMenu = $('.duk-icon-bars');
      var menuMain   = $('.menu--main');
      $('.duk-icon-bars', context).click(function () {

        if ( (menuMain.css('display') === '') || (menuMain.css('display') === 'none') ) {

          menuMain.css('display', 'block');
          toggleMenu.removeClass('duk-icon-bars');
          toggleMenu.addClass('duk-icon-close');
          
        } else {

          menuMain.css('display', 'none');
          toggleMenu.removeClass('duk-icon-close')
          toggleMenu.addClass('duk-icon-bars');

        }

      });
    }

  };
  
})(jQuery);