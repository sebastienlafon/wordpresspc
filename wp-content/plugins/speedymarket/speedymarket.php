<?php
/*
Plugin Name: Speedy market 2 
Plugin URI: http://www.idweb-agence.com
Description: Catalogue en ligne pour speedy market.
Author: 3 ème promo du titre pro dev
Version: 1.0.0
Author URI: http://www.monsite.com
License: GPL2 license
*/
define( 'SM_URL', plugin_dir_url( __FILE__ ) );
define( 'SM_DIR', plugin_dir_path( __FILE__ ) );
define( 'SM_PRODUCTS', SM_URL.'products'  );
define( 'SM_INCLUDES', SM_URL.'includes'  );
define( 'SM_CSS', SM_INCLUDES.'/css'  );
//define( 'SM_FONTS', SM_FONTS.'/fonts'  );
define( 'SM_JS', SM_INCLUDES.'/js'  );
define( 'SM_VERSION', '1.0' );


// Scripts : pour chaque fichier contenu dans les repertoire JS plus haut, on initie les script
function speedymarket_load_scripts() {
         wp_register_script('bootstrap-colorpicker', SM_JS. '/bootstrap-colorpicker.js' , dirname(__FILE__) );
	 wp_enqueue_script('bootstrap-colorpicker');
          wp_register_script('jquery', 'http://code.jquery.com/jquery-2.1.4.min.js' , dirname(__FILE__) );
	 wp_enqueue_script('jquery');
         // a rajouter
         
}
add_action('admin_enqueue_scripts', 'speedymarket_load_scripts');
function load_admin_scripts( ) {
  wp_enqueue_script('wp-color-picker');
  wp_enqueue_script('script', SM_JS. 'js/script.js', dirname(__FILE__), array('wp-color-picker'), false, true );
}

// Styles CSS : pour chaque fichier contenu dans les repertoire CC plus haut, on initie les styles

function speedymarket_admin_styles() {  
 	// pour importer une feuille css 
    
	 wp_register_style('style', SM_CSS. '/style.css' , dirname(__FILE__) );
	 wp_enqueue_style('style');
         wp_register_style('bootstrap.min', SM_CSS. '/bootstrap.min.css' , dirname(__FILE__) );
	 wp_enqueue_style('bootstrap.min');
         wp_register_style('bootstrap-colorpicker.min', SM_CSS. '/bootstrap-colorpicker.min.css' , dirname(__FILE__) );
	 wp_enqueue_style('bootstrap-colorpicker.min');
         wp_register_style('font-awsome.min', SM_CSS. '/font-awsome.min.css' , dirname(__FILE__) );
	 wp_enqueue_style('font-awsome.min');
 	 wp_register_style('admin', SM_CSS. '/admin.css' , dirname(__FILE__) );
	 wp_enqueue_style('admin');
 }
 add_action('admin_print_styles', 'speedymarket_admin_styles');

// Activation, uninstall
register_activation_hook( __FILE__, 'speedymarket_Install' );
register_deactivation_hook ( __FILE__, 'speedy_Uninstall' );

//function speedymarket_Init() {
//        global $speedymarket;
//        // Load translations
//        load_plugin_textdomain ( 'speedymarket', false, basename(rtrim(dirname(__FILE__), '/')) . '/languages' );
//        // Load client
//        $speedymarket['client'] = new speedymarket_Client();
//        // Admin
//        if ( is_admin() ) {
//            $speedymarket['admin'] = new speedymarket_Admin();
//            $speedymarket['admin_page'] = new speedymarket_Admin_Page();
//        }
//}

function settings_page_display() {
    include 'settings.php';
}
function categories_page_display() {
    include 'categories.php';
}

function produits_page_display() {
    include 'produits.php';
}
function mysite_admin_menu() 
{
  add_menu_page( 'Speedy Market', 'Speedy Market', 'administrator', 'speedy', 'settings_page_display' );
  add_submenu_page( 'speedy', 'Configuration', 'Configuration', 'administrator', 'settings', 'settings_page_display' );
  add_submenu_page( 'speedy', 'Catégories', 'Catégories', 'administrator', 'categories', 'categories_page_display' );
add_submenu_page( 'speedy', 'Produits', 'Produits', 'administrator', 'produits', 'produits_page_display' );
  remove_submenu_page('speedy','speedy');
}
add_action( 'admin_menu', 'mysite_admin_menu' );
//add_action( 'admin_print_scripts-'.'Configuration', array($this, 'load_admin_scripts'));

//add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
//function mw_enqueue_color_picker( $hook_suffix ) {
//    wp_enqueue_style( 'wp-color-picker' );
//    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
//}