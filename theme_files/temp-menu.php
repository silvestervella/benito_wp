<?php
/*
 * Template Name: Menu Page
 */

?>
<?php define( 'WP_USE_THEMES', false ); get_header(); ?>

</section>
<!-- /#top -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section id="menu-page"  class="menu">
    <div class="section-title">
        <h1><?php the_title() ?>
            <span><?php echo get_post_meta($post_id, "menu-title-tagline", true); ?></span>
        </h1>
    </div>

    <div class="section-content">
        <?php the_content(); ?>
    </div>

    <div class="section-custom">
        <div id="download-menu"><i class="large material-icons">restaurant_menu</i>Download</div>
    </div>
</section> 
<!-- /#menu-page -->

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer();?>