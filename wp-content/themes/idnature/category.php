<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div id="content">
          
          <div class="bg_3">
    <div class="container">
    <div class="row">
	<!--<section id="primary" class="site-content">
		<div id="content" role="main">-->

  <?php // début de la boucle avec la fonction query_post
//if ( in_category( '7' ) ) {  
 if ( in_category(7) ) { ?>
<div class="grid_12">
  <?php while (have_posts()) : the_post(); ?>
    <div class="block1">
                      <div class="circle">
                      <time datetime="2014-02-28"><?php echo get_the_date( 'd' ); ?><span><span class="col1"><?php echo get_the_date( 'm' ); ?></span></span></time>
                      </div>
                      
                      <div class="extra_wrapper">
                        <h6><a href="#"><?php  echo the_title(); ?></a></h6>
                        <ul class="links">
                          <li><a href="#">posted by : <?php  echo the_author(); ?></a><span>|</span></li>
                          
                        </ul>
                        <p><?php  echo the_content(); ?></p>
                      </div>
                      </div>
   
<?php endwhile; ?>
</div><!--grid_12-->
<?php } 
else { ?>
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'idnature' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); 

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */?>
				   <div class="grid_4"><div class="thumbnail"> 
				<?php get_template_part( 'content', get_post_format() ); ?>
</div></div><!-- .grid_4-->
			<?php endwhile;

			//idnature_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
<?php } ?>
		<!--</div> #content -->
	<!--</section> #primary -->
    
  </div><!-- .row -->
    </div><!-- .container -->
    </div><!-- .bg_3 -->
    </div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>