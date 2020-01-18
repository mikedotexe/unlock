(function ($, Drupal) {
  Drupal.behaviors.unlockMain = {
    attach: function (context) {
      $('.unlock-button-link', context).on('click', function () {
        if (window.hasOwnProperty('unlockProtocol') && window.unlockProtocol.hasOwnProperty('loadCheckoutModal')) {
          $(window.unlockProtocol).trigger('loadCheckoutModal');
        } else {
          console.warn('Unlock Drupal: could not detect Unlock Protocol script here.');
        }
      });
    }
  };
})(jQuery, Drupal);
