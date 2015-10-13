<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!--=======footer=================================-->

<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="grid_3 fright">
        <h2>Actualités</h2>
        <ul class="group_list_1">
          <?php // début de la boucle avec la fonction query_post
query_posts('category_name=actualites&showposts=5&orderby=date&order=DESC');  ?>
<?php //the_content(); // affiche du contenu de votre article?>
<?php while (have_posts()) : the_post(); ?>
<?php  //if ( have_posts() ) :  ?>
            <li><a href="<?php echo the_permalink(); ?>" rel="bookmark">
            <?php echo get_the_date( 'd-m-Y' ); ?>
              - <?php  echo the_title(); ?></a></li>
              <?php //endif; ?>
            <?php endwhile; // fermeture de la boucle ?>
        </ul>
      </div>
      <div class="grid_4 fright">
        <h2>Services</h2>
        <ul class="group_list">
               <?php // début de la boucle avec la fonction query_post
query_posts('category_name=services&showposts=5&orderby=date&order=DESC');  ?>
<?php while (have_posts()) : the_post(); ?>
            <li><a href="<?php echo the_permalink(); ?>" rel="bookmark">
             <?php  echo the_title(); ?></a></li>
            <?php endwhile; // fermeture de la boucle ?>
        </ul>
      </div>
      <div class="grid_5 fleft">
        <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a></div>
        <div class="copy"> <span>&copy;&nbsp; 2013 - </span> <span id="copyright-year"></span> <span><?php bloginfo( 'name' ); ?><?php echo $row_site['nom']; ?> &nbsp;|&nbsp;</span> <?php // début de la boucle avec la fonction query_post
query_posts('category_name=mentions-legales');  ?> <a href="<?php echo the_permalink(); ?>" rel="bookmark">Politique de confidentialité</a>  |  <a href="http://idweb-agence.com/">Site conçu par l'agence ID WEB</a>
          <!--{%FOOTER_LINK} --></div>
        <ul class="socials">
<?php DISPLAY_ACURAX_ICONS(); ?> 
        </ul>
      </div>
    </div>
  </div>
</footer>
	</div><!-- #main .wrapper -->
	</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>