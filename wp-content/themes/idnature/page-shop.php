<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

//get_header('home'); ?>

	<!--<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>-->

		<!--</div> #content -->
	<!--</div> #primary -->

<?php //get_sidebar(); ?>
<?php //get_footer(); ?>
get_header(); ?>
<div id="content">
          
          <div class="bg_3">
   <!-- <div class="container">-->
    <div class="row">
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-8">
	<!--<div id="primary" class="site-content">
		<div id="content" role="main">-->

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		<!--</div> #content -->
	<!--</div> #primary -->
    </div>
    </div><!-- .row -->
    <!-- </div>.container -->
    </div><!-- .bg_3 -->
    </div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>