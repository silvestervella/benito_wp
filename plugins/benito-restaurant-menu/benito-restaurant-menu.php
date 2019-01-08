<?php
/*
* Plugin Name: Benito Restaurant Menu
*/
global $wp_rewrite;

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
  'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
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

function benito_generate_menu_posts($atts) {
    $args = array(
        'post_type' => $atts['post_type'],
        'orderby'   => $atts['orderby'],
        'order' => $atts['order'],
        'meta_key' => $atts['meta_key'],
        'posts_per_page' => $atts['posts_per_page'],
        'nopaging'=>  $atts['nopaging']
    );

    $args2 = array(
        'taxonomy' => 'item_type',
        'orderby' => 'name',
        'order'   => 'ASC'
    );

    $types = get_categories($args2);

    foreach($types as $type) {
        if ( $query1->have_posts() ) :
            while ($query1->have_posts() ) :
            $query1->the_post();
            global $post;
                if (has_term('item_type' , $type)) { ?>

                    <div class="menu-item">
                        <?php the_post_thumbnail( ); ?>
                    </div>
                    <div class="menu-item">
                        <?php the_title( ); ?>
                    </div>
                    <div class="menu-item">
                        <?php the_content( ); ?>
                    </div>

                <?php }
            endwhile;
        endif; 
    }
    $query1 = new WP_query ( $args );
}
add_shortcode( 'get_menu_items' , 'benito_generate_menu_posts' );

?>