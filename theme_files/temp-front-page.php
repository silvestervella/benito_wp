<?php
/*
 * Template Name: Front Page
 */

?>
<?php define( 'WP_USE_THEMES', false ); get_header(); ?>

<div id="top-our-menu-link">
<?php
$post_about = get_post(14); 
$post_menu = get_post(116); 

benito_get_page_links(array(
   'link-one'      => 116
));
?>
</div>

</section>
<!-- /#top -->

<section id="home-about" class="about section">
    <div class="section-title">
        <h1><a href="<?php get_post_permalink($post_about->ID) ?>"><?php echo $post_about->post_title ?></a></h1>
    </div>

    <div class="section-content">
        <?php echo $post_about->post_content ?>
    </div>

    <div class="section-custom">
        <h3><?php echo get_post_meta($post_about->ID, "about-tagline", true); ?></h3>
        <div class="custom-sec-img"><?php echo get_the_post_thumbnail( $post_about->ID ); ?></div>
    </div>
</section> 
<!-- /#home-about -->

<section id="home-menu"  class="menu section">
    <div class="section-title">
        <h1><a href="<?php get_post_permalink($post_menu->ID) ?>"><?php echo $post_menu->post_title ?></a></h1>
    </div>

    <div class="section-content">
        <?php 
        echo  $post_menu->post_excerpt;
        ?>
    </div>

    <div class="section-custom">
        <?php
        echo do_shortcode('[get_menu_items term="test-cat" orderby="rand"  posts_per_page="1"]');
        //echo do_shortcode('[get_menu_items term="test-cat" orderby="rand"  posts_per_page="1"]');
        ?>
    </div>
</section> 
<!-- /#home-menu -->

<?php get_footer();?>