<?php

namespace Drupal\gamification\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class GamificationConfigForm.
 */
class GamificationConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'gamification.gamificationconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'gamification_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('gamification.gamificationconfig');
    $form['numero_de_puntos_inicial'] = [
      '#type' => 'number',
      '#title' => $this->t('Numero de puntos inicial'),
      '#description' => $this->t('Con cual cantidad de puntos inician los usuarios'),
      '#default_value' => $config->get('numero_de_puntos_inicial'),
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
    parent::submitForm($form, $form_state);

    $this->config('gamification.gamificationconfig')
      ->set('numero_de_puntos_inicial', $form_state->getValue('numero_de_puntos_inicial'))
      ->save();
  }

}
