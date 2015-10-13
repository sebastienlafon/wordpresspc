<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress

 */
if ( is_home() ) :
	get_header( 'home' );
else :
	get_header();
endif;
 ?>

<div id="content">
  <?php // début de la boucle avec la fonction query_post
query_posts('cat=15&showposts=3&orderby=date&order=DESC');  ?>
  <?php the_content(); // affiche du contenu de votre article?>
  <div class="bg_1">
    <div class="container">
      <div class="row">
        <div class="holder">
          <?php while (have_posts()) : the_post(); ?>
          <div class="grid_4">
            <figure class="image_box">
              <div class="for_ie"></div>
              <div class="image">
                <?php if(has_post_thumbnail())
echo get_the_post_thumbnail( get_the_ID(), array(295,194) );
 else {
$imgthumb = catch_that_image();
echo "<img src='".$imgthumb."' alt='".get_the_title()."' width='194'>";
 }
 ?>
              </div>
            </figure>
            <div class="thumb">
              <h2>
                <?php  echo the_title(); ?>
              </h2>
              <p><?php echo the_excerpt(); 
	
?></p>
              <!--<a class="link_1" href="<?php echo the_permalink(); ?>" rel="bookmark"><?php echo the_title(); ?></a>--> 
            </div>
          </div>
          <?php endwhile; // fermeture de la boucle ?>
        </div>
      </div>
    </div>
    <!-- fin de container --> 
    
  </div>
  <!-- fin de bg1 --> 
  <div class="bg_2">
    <div class="container">
      <div class="row">
        <div class="grid_3">
          <div class="thumb_2">
            <h3>Quis autem vel eum</h3>
            <div class="divider"></div>
            <div class="text">Ut enim ad minim veniam <br>
              occaecat cupidatat non proide</div>
            <a href="#" class="link_2"></a> </div>
        </div>
        <div class="grid_3">
          <div class="thumb_2">
            <h3>Excepteur sint occaecat</h3>
            <div class="divider"></div>
            <div class="text">Excepteur sint occaecat <br>
              Excepteur sint occaecat cupidatat</div>
            <a href="#" class="link_2"></a> </div>
        </div>
        <div class="grid_3">
          <div class="thumb_2">
            <h3>Et harum quidem rerum</h3>
            <div class="divider"></div>
            <div class="text">Temporibus autem quibusdam <br>
              harum quidem rerum facilis mode</div>
            <a href="#" class="link_2"></a> </div>
        </div>
        <div class="grid_3">
          <div class="thumb_2">
            <h3>Temporibus quibusdam</h3>
            <div class="divider"></div>
            <div class="text">Et harum quidem rerum <br>
              harum quidem rerum facilis</div>
            <a href="#" class="link_2"></a> </div>
        </div>
      </div>
    </div><!-- fin de container --> 
  </div>
  <!-- fin de bg2 -->
  <div class="bg_4">
    <div class="container">
      <?php $my_query = new WP_Query( 'category_name=bienvenue&posts_per_page=1' ); ?>
      <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
      <?php get_template_part( 'content', get_post_format() ); ?>
      <?php endwhile; ?>
    </div><!-- fin de container -->
    
    <div class="container">
      <?php // début de la boucle avec la fonction query_post
query_posts('cat=1&showposts=4&orderby=date&order=DESC');  ?>
      <?php //the_content(); // affiche du contenu de votre article?>
      <div class="row">
        <div class="grid_12">
          <h4>Actualités</h4>
        </div>
        <div class="clear"></div>
        <?php while (have_posts()) : the_post(); ?>
        <div class="grid_3">
          <div class="thumb_1">
            <figure class="number">
              <h6>
                <?php //echo get_the_date( 'd-m-Y' ); ?>
                <?php
				$date=get_the_date;
				$da=date("d/m/Y", strtotime($date));
				$J=get_the_date( 'd' );
				$M=get_the_date( 'm' );
				$Y=get_the_date( 'Y' );
				echo "$J<br />";
				echo "$M<br />";
				echo "$Y";
				?>
              </h6>
            </figure>
            <div class="img1"><a class="link_3" href="<?php echo the_permalink(); ?>">
              <?php  echo the_title(); ?>
              </a></div>
            <p class="auteur">Publié par
              <?php  echo the_author(); ?>
            </p>
            <?php echo the_content(); ?> </div>
        </div>
        <?php endwhile; // fermeture de la boucle ?>
      </div>
    </div>
  </div>
  <!-- fin de bg4 -->
  
  <?php //get_sidebar(); ?>
</div>
<!-- content -->
<?php get_footer(); ?>