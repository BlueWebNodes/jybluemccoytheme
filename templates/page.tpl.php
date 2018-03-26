<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<div id="page">

<div id="header" class="container">
  <div class="row">
    <div class="col-lg-4">
    
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong></div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>

      <?php print render($page['header']); ?>

    </div><!-- .col -->
    <div class="col-lg-8">
      <div class="side-mainmenu">
        <div class="menu-button">Menu</div>
        <nav class="flexnav menu-navigation">
          <?php if (!empty($primary_nav)): ?>
          <?php print render($primary_nav); ?>
          <?php endif; ?>
        <p></nav></p>
      </div><!-- .side-mainmenu -->  
    </div><!-- .col -->
  </div><!-- .row -->
</div> <!-- /.section, /#header -->

<?php if ($is_front): ?>
<div class="frontslideshow">
<div class="container">
<!-- Place somewhere in the <body> of your page -->
<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="<?php print theme_get_setting('slideshow_slide1'); ?>">
      <p class="flex-caption"><a class="frmore" href="<?php print theme_get_setting('slideshow_link1'); ?>"><?php print theme_get_setting('slideshow_title1'); ?></a></p>
    </li>
    <li>
      <img src="<?php print theme_get_setting('slideshow_slide2'); ?>">
      <p class="flex-caption"><a class="frmore" href="<?php print theme_get_setting('slideshow_link2'); ?>"><?php print theme_get_setting('slideshow_title2'); ?></a></p>
    </li>
    <li>
      <img src="<?php print theme_get_setting('slideshow_slide3'); ?>">
      <p class="flex-caption"><a class="frmore" href="<?php print theme_get_setting('slideshow_link3'); ?>"><?php print theme_get_setting('slideshow_title3'); ?></a></p>
    </li>
  </ul>
</div><!-- .flexslider -->

</div><!-- .container -->
</div><!-- .frontslideshow -->

<div class="frontpreface">
<div class="container"> 
<div class="row">
  <div class="col-lg-4">
    <?php if ($page['preface_first']): ?><div id="preface_first"><?php print render($page['preface_first']); ?></div><?php endif; ?>
  </div><!-- .col -->
  <div class="col-lg-4">
    <?php if ($page['preface_middle']): ?><div id="preface_middle"><?php print render($page['preface_middle']); ?></div><?php endif; ?>
  </div><!-- .col -->
  <div class="col-lg-4">
    <?php if ($page['preface_last']): ?><div id="preface_last"><?php print render($page['preface_last']); ?></div><?php endif; ?>
  </div><!-- .col -->
</div>
</div>  
</div><!-- .frontpreface -->
<?php endif; ?>

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb" class="jybluebreadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php print $messages; ?>



<div id="main-wrapper">
<div id="main" class="clearfix">
<div class="container"> 
<div class="row">
  <?php if ($page['sidebar_first']): ?>
      <div class="col-lg-3">
        <div id="sidebar-first" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->      
      </div><!-- .col -->
  <?php endif; ?>

  <div class="col-lg-9">
      <div id="content" class="column"><div class="section">
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div></div> <!-- /.section, /#content -->
  </div><!-- .col -->
  <?php if ($page['sidebar_second']): ?>
      <div class="col-lg-4">
        <div id="sidebar-second" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_second']); ?>
        </div></div> <!-- /.section, /#sidebar-second -->
      </div><!-- .col -->
  <?php endif; ?>
</div>
</div> 
</div></div> <!-- /#main, /#main-wrapper -->

<div id="footer"><div class="section">
  <div class="footersocial"> 
      <a href="<?php print theme_get_setting('social_media1'); ?>" target="_blank"><img src="<?php print $GLOBALS['base_url'];?>/<?php print theme_get_setting('social_logo1'); ?>"></a><?php echo str_repeat("&nbsp;", 4); ?>
      <a href="<?php print theme_get_setting('social_media2'); ?>" target="_blank"><img src="<?php print $GLOBALS['base_url'];?>/<?php print theme_get_setting('social_logo2'); ?>"></a>
  </div>
  <div class="footercopyright"> 
    <?php if ($site_name): ?>
      <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a><?php echo str_repeat("&nbsp;", 1); ?><?php print t('by'); ?><?php echo str_repeat("&nbsp;", 1); ?><a href="http://www.jybluedesign.com" target="_blank">JY Blue Design</a>.
    <?php endif; ?>
  </div>
  <div>

  </div>

</div></div> <!-- /.section, /#footer -->

</div> <!-- /#page, /#page-wrapper -->


<script type="text/javascript">
  jQuery(document).ready(function($){
    $(".flexnav").flexNav({

    // Drop down animation speed
    'animationSpeed': 250,

    // opacity animation
    'transitionOpacity':true,

    // menu button class name
    'buttonSelector': '.menu-button',

    // Change to true for use with hoverIntent plugin
    'hoverIntent':false,

    // hoverIntent default timeout
    'hoverIntentTimeout': 150,

    // dynamically calcs top level nav item widths
    'calcItemWidths': false,

    // enables hover support
    'hover':true,
    });
  });

jQuery(document).ready(function($){
  $('.flexslider').flexslider({
    animation: "slide"
  });
});

</script>