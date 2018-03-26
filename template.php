<?php

/**
 * Implements hook_preprocess_page().
 */

function jybluemccoytheme_preprocess_page(&$vars, $hook) {
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
function jybluemccoytheme__menu_tree__primary(&$vars) {
  return '<ul class="flexnav" data-breakpoint="769">' . $vars['tree'] . '</ul>';
}