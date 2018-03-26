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
function jybluemccoytheme_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
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

  $form['slideshow_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Slideshow Settings'),
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
  $form['social_links']['social_media1'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Social Media 1'),
    '#default_value' => theme_get_setting('social_media1'),
    '#description'   => t('Place this text in the Social Links spot on your site.'),
  );
  $form['social_links']['social_logo1'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Social Media 1 Logo'),
    '#default_value' => theme_get_setting('social_logo1'),
    '#description'   => t('Place this text in the Social Links spot on your site.'),
  );

  $form['social_links']['social_media2'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Social Media 2'),
    '#default_value' => theme_get_setting('social_media2'),
    '#description'   => t('Place this text in the Social Links spot on your site.'),
  );
  $form['social_links']['social_logo2'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Social Media 2 Logo'),
    '#default_value' => theme_get_setting('social_logo2'),
    '#description'   => t('Place this text in the Social Links spot on your site.'),
  );

  $form['slideshow_settings']['slideshow_slide1'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 1'),
    '#default_value' => theme_get_setting('slideshow_slide1'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );
  $form['slideshow_settings']['slideshow_title1'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 1 Title'),
    '#default_value' => theme_get_setting('slideshow_title1'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );
  $form['slideshow_settings']['slideshow_link1'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 1 Link'),
    '#default_value' => theme_get_setting('slideshow_link1'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );


  $form['slideshow_settings']['slideshow_slide2'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 2'),
    '#default_value' => theme_get_setting('slideshow_slide2'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );
  $form['slideshow_settings']['slideshow_title2'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 2 Title'),
    '#default_value' => theme_get_setting('slideshow_title2'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );

  $form['slideshow_settings']['slideshow_link2'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 2 Link'),
    '#default_value' => theme_get_setting('slideshow_link2'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );


  $form['slideshow_settings']['slideshow_slide3'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 3'),
    '#default_value' => theme_get_setting('slideshow_slide3'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );
  $form['slideshow_settings']['slideshow_title3'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 3 Title'),
    '#default_value' => theme_get_setting('slideshow_title3'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );
  $form['slideshow_settings']['slideshow_link3'] = array(
    '#type'          => 'textfield',
    '#title'         => t('slideshow Slide 3 Link'),
    '#default_value' => theme_get_setting('slideshow_link3'),
    '#description'   => t('Place this text in the Slideshow Settings spot on your site.'),
  );
}