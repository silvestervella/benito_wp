<?php
/*
* Plugin Name: Benito Restaurant Menu
*/

/**
 * Currently plugin version.
 * Start at version 1.0.0
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'benito_restaurant_menu', '1.0.0' );

defined( 'ABSPATH' ) or die( 'Oops!' );

global $wp_rewrite;

function benito_restaurant_menu() {
    register_post_type( 'menu',
    array(
      'labels' => array(
        'name' => __( 'Menu' ),
        'singular_name' => __( 'Menu' )
      ),
      'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
      'publicly_queryable' => true,  // you should be able to query it
      'show_ui' => true,  // you should be able to edit it in wp-admin
      'exclude_from_search' => false,  // you should exclude it from search results
      'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
      'has_archive' => false,  // it shouldn't have archive page
      'rewrite' => false,  // it shouldn't have rewrite rules
      'taxonomies'  => array( 'item_type' ),
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields','excerpt' ),
    )
    );
    register_taxonomy(
        'item_type',
        'menu',
        array(
            'label' => __( 'Type' ),
            'rewrite' => array( 'slug' => 'item_type' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy_for_object_type( 
        'item_type',
        'menu' 
    );

    function benito_generate_menu_posts($atts) {
        $args2 = array(
            'taxonomy' => 'item_type',
            'order'   => 'ASC'
        );

        $types = get_categories($args2);
        $menu_section;

        //foreach($types as $type) {
            $args = array(
                'post_type' => 'menu',
                'posts_per_page' => $atts['posts_per_page'],
                'orderby' => $atts['orderby'],
                'tax_query' => array(
                    array(
                        'taxonomy' => 'item_type',
                        'field' => 'slug',
                        'terms' => $atts['term'],
                    )
                )
            );

            $term = get_term_by('slug', $atts['term'], 'item_type'); $name = $term->name;

            $menu_section .= '<div class="menu-type">';
            $menu_section .= '<div class="menu-type-title">';
            $menu_section .= $name;
            $menu_section .= '</div>';

            $query1 = new WP_query ( $args );
            while($query1->have_posts()) : $query1->the_post();
                $menu_section .= '<div class="menu-item">';
                $menu_section .= '<div class="menu-thumb">';
                $menu_section .= '<div class="thumb-wrap">';
                $menu_section .= get_the_post_thumbnail( );
                $menu_section .= '</div>';
                $menu_section .= '</div>';
                $menu_section .= '<div class="item-desc">';
                $menu_section .= '<h4 class="menu-title">';
                $menu_section .= get_the_title( );
                $menu_section .= '</h4>';
                $menu_section .= '<div class="menu-content">';
                $menu_section .= get_the_content( );
                $menu_section .= '</div>';
                $menu_section .= '</div>';
                $menu_section .= '</div>';
            endwhile;

            $menu_section .= '</div>';
            wp_reset_postdata(); // reset the query
        //};
        // end foreach


        return $menu_section;
    }
    add_shortcode( 'get_menu_items' , 'benito_generate_menu_posts' );

    function benito_get_posts_by_term() {
        
    }
}
add_action('init', 'benito_restaurant_menu');

?>