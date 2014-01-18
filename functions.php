<?php

// registering menus
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu'   => __( 'Header Menu' ),
      'social-links'  => __( 'Social Links' ),
      'footer-menu'   => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

add_filter('show_admin_bar', '__return_false');


// Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
                // wp_register_script('jquery', ("http://localhost:8888/wp-content/themes/starterkit/_/js/jquery-1.9.min.js"), false);
				wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.

    // Stuff I added below //
    if ( function_exists( 'add_theme_support' ) ) { 
      add_theme_support( 'post-thumbnails' ); 
    }
    
    function limit_words($string, $word_limit) {
 
            // creates an array of words from $string (this will be our excerpt)
            // explode divides the excerpt up by using a space character
            
            $words = explode(' ', $string);
            
            // this next bit chops the $words array and sticks it back together
            // starting at the first word '0' and ending at the $word_limit
            // the $word_limit which is passed in the function will be the number
            // of words we want to use
            // implode glues the chopped up array back together using a space character
            
            return implode(' ', array_slice($words, 0, $word_limit));
            
        }   
        
        // featured images size ---
        add_image_size( 'category-thumb', 400, 9999 ); //400 pixels wide (and unlimited height)

        // load css per page
        function css_load() {
           if (is_page('portfolio')) {
                echo "THIS IS IT";
           }
        }  

// Register Custom Post Types 
register_post_type('testimonials', array(   'label' => 'Testimonials','description' => 'Customer testimonials','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => false,'menu_position' => 6,'supports' => array(),'labels' => array (
  'name' => 'Testimonials',
  'singular_name' => 'Testimonial',
  'menu_name' => 'Testimonials',
  'add_new' => 'Add Testimonial',
  'add_new_item' => 'Add New Testimonial',
  'edit' => 'Edit',
  'edit_item' => 'Edit Testimonial',
  'new_item' => 'New Testimonial',
  'view' => 'View Testimonial',
  'view_item' => 'View Testimonial',
  'search_items' => 'Search Testimonials',
  'not_found' => 'No Testimonials Found',
  'not_found_in_trash' => 'No Testimonials Found in Trash',
  'parent' => 'Parent Testimonial',
),) );    

register_post_type('portfolios', array( 'label' => 'Portfolios','description' => 'Portfolio and Customer Photos','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => true,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'menu_position' => 5,'supports' => array('title','editor','custom-fields','comments','revisions','thumbnail','page-attributes',),'labels' => array (
  'name' => 'Portfolios',
  'singular_name' => 'Portfolio',
  'menu_name' => 'Portfolios',
  'add_new' => 'New Portfolio',
  'add_new_item' => 'Add New Portfolio',
  'edit' => 'Edit',
  'edit_item' => 'Edit Portfolio',
  'new_item' => 'New Portfolio',
  'view' => 'View Portfolio',
  'view_item' => 'View Portfolio',
  'search_items' => 'Search Portfolios',
  'not_found' => 'No Portfolios Found',
  'not_found_in_trash' => 'No Portfolios Found in Trash',
  'parent' => 'Parent Portfolio',
),) );

register_post_type('client_proofs', array( 'label' => 'Client Proofs','description' => 'Proofs for Client photo shoots.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => true,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'menu_position' => 5,'supports' => array('title','editor','custom-fields','comments','revisions','thumbnail','page-attributes',),'labels' => array (
  'name' => 'Client Proofs',
  'singular_name' => 'Client Proof',
  'menu_name' => 'Client Proofs',
  'add_new' => 'New Client Proof',
  'add_new_item' => 'Add New Client Proof',
  'edit' => 'Edit',
  'edit_item' => 'Edit Client Proof',
  'new_item' => 'New Client Proof',
  'view' => 'View Client Proof',
  'view_item' => 'View Client Proof',
  'search_items' => 'Search Client Proofs',
  'not_found' => 'No Client Proofs Found',
  'not_found_in_trash' => 'No Client Proofs Found in Trash',
  'parent' => 'Parent Client Proof',
),) );

register_post_type('feature_photos', array( 'label' => 'Featured Photos','description' => 'One photo to feature work. ','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'menu_position' => 5,'supports' => array('page-attributes',),'labels' => array (
  'name' => 'Featured Photos',
  'singular_name' => 'Featured Photo',
  'menu_name' => 'Featured Photos',
  'add_new' => 'Add Featured Photo',
  'add_new_item' => 'Add New Featured Photo',
  'edit' => 'Edit',
  'edit_item' => 'Edit Featured Photo',
  'new_item' => 'New Featured Photo',
  'view' => 'View Featured Photo',
  'view_item' => 'View Featured Photo',
  'search_items' => 'Search Featured Photos',
  'not_found' => 'No Featured Photos Found',
  'not_found_in_trash' => 'No Featured Photos Found in Trash',
  'parent' => 'Parent Featured Photo',
),) );
?>