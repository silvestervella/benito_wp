<?php
/*
 * Template Name: About Page
 */

?>
<?php define( 'WP_USE_THEMES', false ); get_header(); ?>

</section>
<!-- /#top -->

<section id="about-page"  class="about">
    <div class="section-title">
        <h1><?php echo $post_about->post_title ?>
            <span><?php echo get_post_meta($post_about->ID, "about-title-tagline", true); ?></span>
        </h1>
    </div>

    <div class="section-content">
        <?php echo apply_filters( 'the_content', get_post_field('post_content', $postid) ); ?>
    </div>

    <div class="section-custom">
        <h3><?php echo get_post_meta($post_about->ID, "about-tagline", true); ?></h3>
        <div class="custom-sec-img"><?php the_post_thumbnail( 'large' ); ?></div>
    </div>
</section> 
<!-- /#about-page -->

<?php get_footer();?>