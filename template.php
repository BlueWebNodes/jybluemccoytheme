<?php

/* Initialize theme settings */
if (is_null(theme_get_setting('social_facebook'))) {  // <-- change this line
  global $theme_key;

  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the theme-settings.php file.
   */
  $defaults = array(             // <-- change this array
    'social_facebook' => 1,
    'social_linkedin' => 0,
  );

  // Get default theme settings.
  $settings = theme_get_settings($theme_key);
  // Don’t save the toggle_node_info_ variables.
  if (module_exists('node')) {
    // NOTE: node_get_types() is renamed to node_type_get_types() in Drupal 7
    foreach (node_type_get_types() as $type => $name) {    
      unset($settings['toggle_node_info_' . $type]);
    }
  }
  // Save default theme settings.
  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge($defaults, $settings)
  );
  // Force refresh of Drupal internals.
  theme_get_setting('', TRUE);
}

function jybluetheme_preprocess_page(&$vars, $hook) {
  // Primary nav.
  $vars['primary_nav'] = FALSE;
  if ($vars['main_menu']) {
  // Build links.
  $vars['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
  // Provide default theme wrapper function.
  $vars['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
 }
}

/**
* Theme wrapper function for the primary menu links
*/
function jybluetheme__menu_tree__primary(&$vars) {
  return '<ul class="flexnav" data-breakpoint="769">' . $vars['tree'] . '</ul>';
}