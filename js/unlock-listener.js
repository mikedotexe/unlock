(function ($) {
    window.unlockProtocolConfig = {
      "locks": {},
      "icon": "https://unlock-protocol.com/static/images/svg/unlock-word-mark.svg",
      "callToAction": {
        "default": "Become a member today!"
      }
    };
    if (!drupalSettings.unlock.hasOwnProperty('lockAddress') || drupalSettings.unlock.lockAddress === '') {
      console.warn('Unlock Drupal: no lock address set, please visit Configuration » Content Authoring » Unlock Protocol settings');
    } else {
      unlockProtocolConfig.locks[drupalSettings.unlock.lockAddress] = {};
    }
    
    $(window).on('unlockProtocol', function (e) {
        const state = e.detail;
        $('.unlock-protocol__pending').hide();
        if (state === 'locked') {
          console.log('Unlock: visitor is not a member.');
          $('.unlock-protocol__locked').hide();
          $('.unlock-protocol__unlocked').show();
        } else if (state === 'unlocked') {
          console.log('Unlock: visitor is a member.');
          $('.unlock-protocol__locked').show();
          $('.unlock-protocol__unlocked').hide();
        }
    });
    
    // squash MetaMask warning per instructions
    if (typeof window.ethereum !== 'undefined') {
      window.ethereum.autoRefreshOnNetworkChange = false;
    }
})(jQuery);
