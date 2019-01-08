<?php
/*
 * Template Name: Gallery Page
 */

?>
<?php get_header(); ?>

</section>
<!-- /#top -->

<section id="gallery-page">
    <div class="section-title">
        <h1><?php echo $post_gallery->post_title ?>
            <span><?php echo get_post_meta($post_gallery->ID, "gallery-title-tagline", true); ?></span>
        </h1>
    </div>

    <div class="section-custom">
        <h3><?php echo get_post_meta($post_gallery->ID, "gallery-tagline", true); ?></h3>
    </div>

    <div class="section-content">
        <?php echo $post_gallery->post_content ?>
    </div>
</section> 
<!-- /#home-about -->

<?php get_footer();?>