<?php
/*
 * Template Name: Gallery Page
 */

?>
<?php get_header(); ?>

</section>
<!-- /#top -->

<section id="gallery-page" class="gallery">
    <div class="section-title">
        <h1><?php echo $post_gallery->post_title ?>
            <span><?php echo get_post_meta($post_gallery->ID, "gallery-title-tagline", true); ?></span>
        </h1>
    </div>

    <div class="section-custom">
        <h3><?php echo get_post_meta($post_gallery->ID, "gallery-tagline", true); ?></h3>
    </div>

    <div class="section-content">
        <?php echo apply_filters( 'the_content', get_post_field('post_content', $postid) ); ?>
    </div>
</section> 
<!-- /#gallery-page -->

<?php get_footer();?>