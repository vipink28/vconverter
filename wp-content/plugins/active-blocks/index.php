<?php
/**
 * Plugin Name: Active Dynamics Blocks
 * Plugin URI: https://pacsoft.com
 * Description: Custom Blocks for Active Dynamics Theme
 * Version: 1.0
 * Text Domain: activeblocks
 */

if(!function_exists('add_action')){
    echo "Hi there! I am just a plugin, not much I can do when called directly";
    exit;
}

//setup
define( 'ACTIVE_BLOCKS_URL', __FILE__ );



//includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'process/save-post.php');
include( 'process/filter-content.php');
include( 'customblocks/enqueue.php' );



//hooks
register_activation_hook( __File__, 'ad_activate_plugin' );
add_action( 'init', 'slides_init');
add_action('enqueue_block_editor_assets','ad_enqueue_block_editor_assets');
add_action( 'save_post_slides', 'ad_save_post_admin', 10, 3);
add_filter( 'the_content', 'ad_filter_slides_content' );