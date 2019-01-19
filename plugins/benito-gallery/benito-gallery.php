<?php
/*
* Plugin Name: Benito Image Gallery
*/

/**
 * Currently plugin version.
 * Start at version 1.0.0
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'benito_restaurant_menu', '1.0.0' );

defined( 'ABSPATH' ) or die( 'Oops!' );

global $wp_rewrite;

function benito_gallery() {
    register_post_type( 'benito_gallery',
    array(
      'labels' => array(
        'name' => __( 'Gallery' ),
        'singular_name' => __( 'Gallery' )
      ),
      'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
      'publicly_queryable' => true,  // you should be able to query it
      'show_ui' => true,  // you should be able to edit it in wp-admin
      'exclude_from_search' => false,  // you should exclude it from search results
      'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
      'has_archive' => false,  // it shouldn't have archive page
      'rewrite' => false,  // it shouldn't have rewrite rules
      'taxonomies'  => array( 'item_type' ),
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    )
    );

    // Generate posts
    function benito_generate_gallery_posts($atts) {

        $args = array(
            'post_type' => $atts['post_type'],
            'orderby'   => $atts['orderby'],
            'order' => $atts['order'],
            'meta_key' => $atts['meta_key'],
            'posts_per_page' => $atts['posts_per_page']
         );

        $gallery_image;

            $query1 = new WP_query ( $args );
            while($query1->have_posts()) : $query1->the_post();
                $gallery_image .= '<div class="gallery-img-thumb">';
                $gallery_image .= get_the_post_thumbnail( );
                $gallery_image .= '</div>';
                $gallery_image .= '<div class="gallery-img-title">';
                $gallery_image .= get_the_title( );
                $gallery_image .= '</div>';
                $gallery_image .= '<div class="gallery-img-content">';
                $gallery_image .= get_the_content( );
                $gallery_image .= '</div>';
            endwhile;
            wp_reset_postdata(); // reset the query

        return $gallery_image;
    }
    add_shortcode( 'benito_get_gallery' , 'benito_generate_gallery_posts' );
}

add_action('init', 'benito_gallery');

?>