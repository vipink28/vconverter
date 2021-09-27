<?php

function slides_init(){
    $labels = array(
        'name'                => _x( 'Slides', 'Post Type General Name', 'activedynamics' ),
        'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'activedynamics' ),
        'menu_name'           => __( 'Slides', 'activedynamics' ),
        'parent_item_colon'   => __( 'Parent Slide', 'activedynamics' ),
        'all_items'           => __( 'All Slides', 'activedynamics' ),
        'view_item'           => __( 'View Slide', 'activedynamics' ),
        'add_new_item'        => __( 'Add New Slide', 'activedynamics' ),
        'add_new'             => __( 'Add New', 'activedynamics' ),
        'edit_item'           => __( 'Edit Slide', 'activedynamics' ),
        'update_item'         => __( 'Update Slide', 'activedynamics' ),
        'search_items'        => __( 'Search Slide', 'activedynamics' ),
        'not_found'           => __( 'Not Found', 'activedynamics' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'activedynamics' ),
    );
     
	// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'slides', 'activedynamics' ),
        'description'         => __( 'Slide for Carousel', 'activedynamics' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => [ 'title', 'editor', 'author', 'thumbnail' ],
        
        'taxonomies'          => [ 'category', 'post_tag' ],
        'rewrite'             => array( 'slides'),
       
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
    register_post_type( 'slides', $args);
}