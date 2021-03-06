<?php
/**
 * 0. Generic
 * 0.1 Variables
 * 0.2 Front page sections Id incrementor
 * 0.3 Output a single menu item + link
 * 
 * 1. Register and enqueue script and styles
 * 2. Add theme and post type support
 * 3. Add custom logo + check for svg
 * 4. Add top section background selector in customizer
 */


/**
 * 0. Generic
 */

/* 0.1 Variables */



/* 0.2 Front page sections Id incrementor  */
function genId($arg1) {
    static $idInc = 0;
    $idInc++;
    echo "$arg1-fp-sec-$idInc";
}

/* 0.3 Output a single menu item + link  */
function benito_get_page_links($posts) {
    echo '<ul>';
    foreach ($posts as &$value) {
        $post_content = get_post($value);
        $post_perma = get_post_permalink($value);
        if ($post_content) {
            echo '<li><a href="'.$post_perma.'">' . $post_content->post_title . '</a></li>';
        }
    }
    echo '</ul>';
}




/**
 * 1. Register and enqueue script and styles
 */
    // De-register HTML5 Blank styles
    function benito_styles_make_child_active()
    {
    wp_deregister_style('html5blank'); // Enqueue it!
    }
    add_action('wp_enqueue_scripts', 'benito_styles_make_child_active', 100); // Add Theme Child Stylesheet

    // Load HTML5 Blank Child styles
    function benito_styles_child()
    {
    // Register Child Styles
    //wp_register_style('child-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_register_style('benito-child', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    //wp_register_style('child-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    //wp_register_style('owlcarousel-style', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_register_style('child-all', get_stylesheet_directory_uri() . '/css/all.css', array(), '1.0', 'all');

    // Enqueue Child Styles
    //wp_enqueue_style('child-bootstrap'); 
    //wp_enqueue_style('child-fontawesome'); 
    //wp_enqueue_style('owlcarousel-style'); 
    wp_enqueue_style('benito-child'); 
    wp_enqueue_style('child-all');

    //Register Child Scripts
    //wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_register_script( 'theme-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ) );
    //wp_register_script( 'owlcarousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ) );
    
    // Enqueue Child Scripts
    //wp_enqueue_script( 'bootstrap' ); 
    wp_enqueue_script( 'theme-script' );   
    //wp_enqueue_script( 'owlcarousel' );   

}
add_action('wp_enqueue_scripts', 'benito_styles_child', 20); // Add Theme Child Stylesheet



/**
 * 2. Add theme and post type support
 */
function benito_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
    ) );
    add_theme_support( 'custom-background', array(
        'wp-head-callback' => 'benito_set_top_home_back',
        'default-color'    => '000000',
        'default-image'    => '%1$s/images/background.jpg',
    ));

    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'benito_setup' );


/**
 * 3. Add custom logo + check for svg
 */
function benito_get_logo() {
    $upload = wp_upload_dir();
    $logo_file = $upload['basedir'] . '/includes/images/logo.svg';

    if ( file_exists( $logo_file ) ) {
        include($logo_file);
     } else {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        echo "<img src='$image[0]' alt='logo' />";
     }
}


/*
 * 4. Add top section background selector in customizer
*/
function benito_set_top_home_back() {
    ob_start();
    _custom_background_cb(); // Default handler
    $style = ob_get_clean();
    $style = str_replace( 'body.custom-background', '#top', $style );
    echo $style;
}
?>