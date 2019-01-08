<?php
/*
 * Template Name: Menu Page
 */

?>
<?php get_header(); ?>

</section>
<!-- /#top -->

<section id="menu-page">
    <div class="section-title">
        <h1><?php echo $post_menu->post_title ?>
            <span><?php echo get_post_meta($post_menu->ID, "menu-title-tagline", true); ?></span>
        </h1>
    </div>

    <div class="section-content">
        <?php echo $post_menu->post_content ?>
    </div>

    <div class="section-custom">

    </div>
</section> 
<!-- /#home-about -->

<?php get_footer();?>