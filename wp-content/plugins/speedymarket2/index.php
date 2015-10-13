<?php
/*
Plugin Name: Speedy market
Plugin URI: http://www.monsite.com
Description: Catalogue en ligne pour speedy market.
Author: 3 ème promo du titre pro dev
Version: 1.0.0
Author URI: http://www.monsite.com
*/
//creating db tables

// style for listing
add_action('wp_head','smc_list_style');
function smc_list_style(){
?>
<!--    <style>
        .smc-product img, .product-img-view img, .smc-product-img img{
            margin-left:0;
        }

    </style>-->
<?php
}

//function customtaxorder_init() {
//    global $wpdb;
//    $init_query = $wpdb->query("SHOW COLUMNS FROM $wpdb->terms LIKE 'term_order'");
//    
//    if($init_query == 0) {
//        $wpdb->query("ALTER TABLE $wpdb->terms ADD `term_order` INT( 4 ) NULL DEFAULT '0'");
//    }
//}
//register_activation_hook(__FILE__, 'customtaxorder_init');
//
//register_uninstall_hook('uninstall.php', 'callback');
function callback(){
}

require 'speedymarket2.php';
require 'products/smc-product.php';

define( 'SM_CATALOGUE', plugin_dir_url( __FILE__ ) );
define( 'SM_CATALOGUE_PRODUCTS', SM_CATALOGUE.'products'  );
define( 'SM_CATALOGUE_INCLUDES', SM_CATALOGUE.'includes'  );
define( 'SM_CATALOGUE_CSS', SM_CATALOGUE_INCLUDES.'/css'  );
define( 'SM_CATALOGUE_JS', SM_CATALOGUE_INCLUDES.'/js'  );

// adding scripts and styles to amdin
add_action('admin_enqueue_scripts', 'sm_catalogue_scripts_method');
function sm_catalogue_scripts_method(){
    global $current_screen;
    
    wp_deregister_script('smc-js');
    wp_register_script('smc-js',SM_CATALOGUE_JS.'/smc.js');
    
//    if($current_screen->post_type=='wpcproduct'){
//        wp_enqueue_script('smc-js');
//    }
    
    wp_register_style('admin-css', SM_CATALOGUE_CSS.'/admin-styles.css' );
    wp_enqueue_style( 'admin-css' );
}
function smc_admin_init(){
    $style_url = SM_CATALOGUE_CSS.'/sorting.css';
    wp_register_style('SMC_STYLE', $style_url);
    
    $script_url = SM_CATALOGUE_JS.'/sorting.js';
    wp_register_script('SMC_SCRIPT', $script_url, array('jquery', 'jquery-ui-sortable'));	
}
add_action('admin_init', 'smc_admin_init');
add_action('wp_enqueue_scripts', 'front_scripts');

//function front_scripts(){
//    global $bg_color;
//    $bg_color = get_option('templateColorforProducts');
//    
//    wp_enqueue_script('jquery');
//    wp_deregister_script('wpcf-js');
//    wp_register_script('wpcf-js',SM_CATALOGUE_JS.'/smc-front.js');
//    wp_enqueue_script('wpcf-js');
//    wp_register_style('catalogue-css', SM_CATALOGUE_CSS.'/catalogue-styles.css' );
//    wp_enqueue_style( 'catalogue-css' );	
//}

// creating wp catalogue menus
//add_action( 'admin_menu', 'smc_plugin_menu' );
//function smc_plugin_menu() {
//    add_submenu_page( 'edit.php?post_type=wpcproduct', 'Order', 'Order', 'manage_options', 'customtaxorder', 'customtaxorder', 2 ); 
//    add_submenu_page('edit.php?post_type=wpcproduct','Settings','Settings', 'manage_options','catalogue_settings', 'sm_catalogue_settings');
//}
add_action( 'admin_menu', 'speedymarket_menu' );
function speedymarket_menu_page(){
   add_submenu_page( 'Speedy Market', 'Speedy Market', '', '', 'speedymarket_menu_page', '', '30' );
//$page_title - The title used on the settings page.
//$menu_title - The title used on the menu.
//$capability - Only displays the menu if the user matches this capability.
//$menu_slug - The unique name of the menu slug.
//$function - This is the callback function to run to display the page.
//$icon_url - Display a icon just for the menu.
//$position - This allows you to choose when the menu item appears in the list.
}
add_action('admin_print_styles', 'smc_admin_styles');
add_action('admin_print_scripts', 'smc_admin_scripts');
 //add required styles
function smc_admin_styles(){
    wp_enqueue_style('SMC_STYLE');
}
// add required scripts
function smc_admin_scripts(){
    wp_enqueue_script('SMC_SCRIPT');
}

add_action( 'admin_init', 'register_catalogue_settings' );
$plugin_dir_path = dirname(__FILE__);

//function register_catalogue_settings() {
//    register_setting( 'baw-settings-group', 'grid_rows' );
//    register_setting( 'baw-settings-group', 'templateColorforProducts' );  // new added color picker
//    register_setting( 'baw-settings-group', 'pagination' );
//    register_setting( 'baw-settings-group', 'image_height' );
//    register_setting( 'baw-settings-group', 'image_width' );
//    register_setting( 'baw-settings-group', 'thumb_height' );
//    register_setting( 'baw-settings-group', 'thumb_width' );
//    register_setting( 'baw-settings-group', 'image_scale_crop' );
//    register_setting( 'baw-settings-group', 'thumb_scale_crop' );
//    register_setting( 'baw-settings-group', 'next_prev' );
//    register_setting( 'baw-settings-group', 'inn_temp_head' );
//    register_setting( 'baw-settings-group', 'inn_temp_foot' );
//    
//    add_option('image_height',358, '', 'yes');
//    add_option('image_width',500, '', 'yes');
//    add_option('thumb_height',151, '', 'yes');
//    add_option('thumb_width',212, '', 'yes');
//}

function sm_catalogue_settings(){
    require 'settings.php';
}
require 'products/order.php';

// Redirect file templates
function smc_template_chooser($smc_template){
    global $wp_query;
    $smc_plugindir = dirname(__FILE__);
	
    $post_type = get_query_var('post_type');
    
    if( $post_type == 'wpcproduct' ){
        return $smc_plugindir . '/themefiles/single-wpcproduct.php';
    }
	
    if (is_tax()) {
        return $smc_plugindir . '/themefiles/taxonomy-wpccategories.php';
    }
    return $smc_template;   
}
add_filter('template_include', 'smc_template_chooser');

function do_theme_redirect($url) {
    global $post, $wp_query;
    if (have_posts()) {
        include($url);
        die();
    } else {
        $wp_query->is_404 = true;
    }
}
add_action( 'admin_notices', 'dev_check_current_screen' );

/* ========================  pick color through Iris =========================== */

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}
/* ========================  Text Domain =========================== */
load_plugin_textdomain( 'wpc', 'WPCACHEHOME' . 'languages', basename( dirname( __FILE__ ) ) . '/languages' );