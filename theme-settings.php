<?php

/**
 * Theme settings.
 * * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function jybluetheme_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $form['instant_vertical_tabs'] = array(
    '#type' => 'vertical_tabs',
    '#prefix' => '<h2><small>' . t('Instant settings') . '</small></h2>',
  );

  $form['social_links'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social Links'),
    '#group' => 'instant_vertical_tabs',
  );

  // List all fields.
  $fields = field_info_fields();

  if (!empty($fields)) {
    foreach ($fields as $name => $field) {
      if (count($field['bundles']) == 1) {
        // Remove from list, fields for comment.
        if (isset($field['bundles']['comment'])) {
          unset($fields[$name]);
          continue;
        }
      }

      $fields[$name] = $name;
    }
  }
  $form['social_links']['social_facebook'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Social Facebook'),
    '#default_value' => theme_get_setting('social_facebook'),
    '#description'   => t('Place this text in the Social Links spot on your site.'),
  );
  $form['social_links']['social_linkedin'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Social Linkedin'),
    '#default_value' => theme_get_setting('social_linkedin'),
    '#description'   => t('Place this text in the Social Links spot on your site.'),
  );
}