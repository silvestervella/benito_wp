<?php
/*
 * Template Name: About Page
 */

?>
<?php get_header(); ?>

</section>
<!-- /#top -->

<section id="about-page">
    <div class="section-title">
        <h1><?php echo $post_about->post_title ?>
            <span><?php echo get_post_meta($post_about->ID, "about-title-tagline", true); ?></span>
        </h1>
    </div>

    <div class="section-content">
        <?php echo $post_about->post_content ?>
    </div>

    <div class="section-custom">
        <h3><?php echo get_post_meta($post_about->ID, "about-tagline", true); ?></h3>
    </div>
</section> 
<!-- /#about-page -->


<?php get_footer();?>