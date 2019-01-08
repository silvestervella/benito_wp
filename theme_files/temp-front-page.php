<?php
/*
 * Template Name: Front Page
 */

?>
<?php get_header(); ?>

<div id="top-our-menu-link">
<?php
benito_get_page_links(array(
   'link-one'      => 2
));
?>
</div>

</section>
<!-- /#top -->

<section id="home-about">
    <div class="section-title">
        <h1><a href="<?php get_post_permalink($post_about->ID) ?>"><?php echo $post_about->post_title ?></a></h1>
    </div>

    <div class="section-content">
        <?php echo $post_about->post_content ?>
    </div>

    <div class="section-custom">
        <h3><?php echo get_post_meta($post_about->ID, "about-tagline", true); ?></h3>
    </div>
</section> 
<!-- /#home-about -->

<section id="home-menu">
    <div class="section-title">
        <h1><?php echo $post_menu->post_title ?></h1>
    </div>

    <div class="section-content">
        <?php echo $post_menu->post_content ?>
    </div>

    <div class="section-custom">
        
    </div>
</section> 
<!-- /#home-menu -->

<?php get_footer();?>