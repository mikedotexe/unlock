# Unlock Protocol Drupal 8 Module

This is a Drupal 8 (should work on 9, too) module that can be placed in the `/modules/contrib` folder and installed like other modules.

Unlock Protocol provides the ability to show/hide content based on whether the content has been "unlocked" by a payment with digital currency. This payment uses a browser-based extension wallet, and hence a "subscription" can be determined.

The premium content is simply hidden and shown in the DOM in this module, illustrating the capabilities.

Visit the [Unlock Website](https://unlock-protocol.com/) for more details.

### Instructions

Use the Unlock Protocol's website to create a lock. Look for the dashboard link. Once created, copy the address to the lock, it will start with 0x… and look like a random hash.

Have an admin enter the lock address in the Unlock settings page

Add premium content blocks using the provided custom block type.
Structure » Block layout » Add custom block. Choose Unlock Premium Content.

Add the button to subscribe, usually below or above the premium content. This is a custom block. Unlike the provided custom block type, this block is added by:
Structure » Block layout. Find the appropriate region and click Place block. It's called "Unlock button block"

Premium blocks will hide/show based on the user's subscription status.

Check the console if there seems to be trouble.

These instructions are also available in the module's help page.