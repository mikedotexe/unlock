<?php

namespace Drupal\unlock\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SettingsForm.
 */
class SettingsForm extends ConfigFormBase {
  const SETTINGS = 'unlock.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'unlock_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);
    
    $form['unlock_lock_address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Lock address'),
      '#description' => $this->t('This will be a blockchain address starting with &quot;0x…&quot;'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('address'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->configFactory->getEditable(static::SETTINGS)
      ->set('address', $form_state->getValue('unlock_lock_address'))
      ->save();

    parent::submitForm($form, $form_state);
  }  

}
