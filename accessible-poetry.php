<?php
/**
 * Plugin Name: Accessible Poetry
 * Plugin URI: http://acp.amitmoreno.com/
 * Description: Enriches your WordPress with better accessibility options, such as nicely Skiplinks, Font-Sizer, Constrast changer, Custom Toolbar & and many other options.
 * Version: 1.0.2
 * Author: Amit Moreno
 * Author URI: http://www.amitmoreno.com/
 * Text Domain: acp
 * License: GPL2
 */

// Accessible Poetry Initialization
function acp_init() {
	wp_register_style( 'accessible-poetry', plugins_url('style.css', __FILE__) );
}
add_action( 'admin_init', 'acp_init' );

// Plugin textdomain
function acp_locale() {
  load_plugin_textdomain('acp', FALSE, dirname(plugin_basename(__FILE__)).'/lang/'); 
}
add_action( 'plugins_loaded', 'acp_locale' );

// The option page
include 'inc/acp_pannel.php';


// Toolbar
include 'inc/acp_toolbar.php';
// Font Sizer
include 'inc/acp_fontsizer.php';
// Constrast
include 'inc/acp_contrast.php';
// Add Role to links
include 'inc/acp_rolelinks.php';
// Remove target from links
include 'inc/acp_removetarget.php';
// Add alt to all images
include 'inc/acp_imagealt.php';

// Skiplinks
include 'inc/acp_skiplinks.php';

/* Beautiful friend */