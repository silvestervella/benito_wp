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
    register_taxonomy_for_object_type( 
        'item_type',
        'menu' 
    );

    function benito_generate_menu_posts() {
        $args2 = array(
            'taxonomy' => 'item_type',
            'orderby' => 'name',
            'order'   => 'ASC'
        );

        $types = get_categories($args2);
        $menu_section;

        foreach($types as $type) {
            $args = array(
                'post_type' => 'menu',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'item_type',
                        'field' => 'term_id',
                        'terms' => $type,
                    )
                )
            );

            $menu_section .= $type->name;
            $menu_section .= $type->name;
            $menu_section .= $type->name;

            $query1 = new WP_query ( $args );
            while($query1->have_posts()) : $query1->the_post();
                $menu_section .= '<div class="menu-thumb">';
                $menu_section .= get_the_post_thumbnail( );
                $menu_section .= '</div>';
                $menu_section .= '<div class="menu-title">';
                $menu_section .= get_the_title( );
                $menu_section .= '</div>';
                $menu_section .= '<div class="menu-content">';
                $menu_section .= get_the_content( );
                $menu_section .= '</div>';
            endwhile;
            wp_reset_postdata(); // reset the query
        };
        // end foreach

        return $menu_section;
    }




    /////
// A callback function to add a custom field to our "presenters" taxonomy  
function presenters_taxonomy_custom_fields($tag) {  
    // Check for existing taxonomy meta for the term you're editing  
     $t_id = $tag->term_id; // Get the ID of the term you're editing  
     $term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check  
 ?>  
   
<tr class="form-field">  
    <th scope="row" valign="top">  
        <label for="cat_position"><?php _e('WordPress User ID'); ?></label>  
    </th>  
    <td> 
        <select name="cat_position"  id="cat_position">
        <?php
            $args2 = array(
                'taxonomy' => 'item_type',
                'orderby' => 'name',
                'order'   => 'ASC'
            );

            $types = get_categories($args2);
            $number = 0;
            foreach($types as $type) { 
                $number++;
                $cat_pos_and_no = 'cat_position'.$number;

                $ehe = strval($cat_pos_and_no);

                update_term_meta($t_id,  $ehe , $number);

                $mela = get_term_meta($t_id,  $ehe, true);
                echo $mela;

                $current_selections = 
                ?>
                <option value="<?php echo $number ?>" <?php echo ( !empty( $current_selections ) && in_array( $number , $current_selections ) ? ' selected="selected"' : '' ) ?>>First Choice</option>
                <!--<option size="25" style="width:60%;" value="<?php // echo $number ? $mela : ''; ?>"><?php  //echo $number ?></option>-->
            <?php } ?>
        </select>
        <span class="description"><?php _e('Placement on the main menu page.'); ?></span>  
    </td>  
</tr>  
   
 <?php  
 } 


 // A callback function to save our extra taxonomy field(s)  
 function save_taxonomy_custom_fields( $term_id ) {  
    if ( isset( $_POST['term_meta'] ) ) {  
        $t_id = $term_id;
        $term_meta = get_option( "taxonomy_term_$t_id" );  
        $cat_keys = array_keys( $_POST['term_meta'] );  
            foreach ( $cat_keys as $key ){  
            if ( isset( $_POST['term_meta'][$key] ) ){  
                $term_meta[$key] = $_POST['term_meta'][$key];  
            }  
        }  
        //save the option array  
        update_option( "taxonomy_term_$t_id", $term_meta );  
    }  
}  


// Add the fields to the "presenters" taxonomy, using our callback function  
add_action( 'item_type_edit_form_fields', 'presenters_taxonomy_custom_fields', 10, 2 );  
  
// Save the changes made on the "presenters" taxonomy, using our callback function  
add_action( 'edited_item_type', 'save_taxonomy_custom_fields', 10, 2 );  



    add_filter('pre_get_posts', 'pre_get_posts_hook' );

    function pre_get_posts_hook($wp_query) {
        if (taxonomy_exists('item_type') )
        {
            $wp_query->set( 'orderby', 'menu_order' );
            return $wp_query;
        }
    }



    add_shortcode( 'get_menu_items' , 'benito_generate_menu_posts' );
}
add_action('init', 'benito_restaurant_menu');

?>