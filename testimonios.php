<?php

/**
 * Plugin Name:    Testimonios
 * Plugin URI:     https://github.com/seph1603
 * Description:    Simple slider de testimonios
 * Version:        1.0
 * Author:         WP Lessons 
 * Author URI:     https://www.youtube.com/channel/UC5eNkMd1-3LCh3zlL82eILw
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Agregando estylos CSS y archivos JS
function testimonios_scripts() {

	//Slick Library
	wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
	wp_enqueue_script( 'sllick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ) );

	// Plugin Files
	wp_enqueue_style( 'plugin-css', plugin_dir_url( __FILE__ ) . 'assets/style.css' );
	wp_enqueue_script( 'plugin-js', plugin_dir_url( __FILE__ ) . 'assets/main.js', array( 'jquery' ), '1.0', true );	
}

add_action( 'wp_enqueue_scripts', 'testimonios_scripts' );


// Agregando custom post type - Testimonios

function testimonios_post_type() {

	$labels = array(
		'name'                => __('Testimonios'),
		'singular_name'       => __('Testimonio'),
		'menu_name'           => __('Testimonios'),
		'all_items'           => __('All Testimonios'),
		'view_item'           => __('View Testimonios'),
		'add_new_item'        => __('Add Testimonio'),
		'add_new'             => __('Add Testimonio'),
		'search_items'        => __('Search Testimonios'),
		'not_found'           => __('Not Found'),
		'not_found_in_trash'  => __('Not found in Trash')
	);

	register_post_type(
		'testimonios',
		array(
			'labels'               => $labels,
			'public'               => false,
			'hierarchical'         => false,
			'show_ui'              => true,
			'show_in_nav_menus'    => false,
			'has_archive'          => false,
			'exclude_from_search'  => true,
			'publicly_queryable'   => false,
			'capability_type'      => 'post',
			'show_in_rest'         => false,
			'supports'             => array('title', 'thumbnail','editor')
		)
	);

}

add_action( 'init', 'testimonios_post_type' );

// Agregando Shortcode

function testimonios_render() {

	ob_start();
	include plugin_dir_path( __FILE__ ) . 'shortcodes/slider.php';
	return ob_get_clean();
}

add_shortcode( 'testimonios', 'testimonios_render' );
