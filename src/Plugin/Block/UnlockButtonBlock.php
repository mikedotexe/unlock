<?php

namespace Drupal\unlock\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'UnlockButtonBlock' block.
 *
 * @Block(
 *  id = "unlock_button_block",
 *  admin_label = @Translation("Unlock button block"),
 * )
 */
class UnlockButtonBlock extends BlockBase {

  const SETTINGS = 'unlock.settings';
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['unlock_button_label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => isset($this->configuration['unlock_button_label']) ? $this->configuration['unlock_button_label'] : 'Sign up',
      '#size' => 60,
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['unlock_button_label'] = $form_state->getValue('unlock_button_label');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->configuration;
    $label = $config['unlock_button_label'];

    return [
      '#theme' => 'unlock_button_block',
      '#label' => $label
    ];
  }

}
