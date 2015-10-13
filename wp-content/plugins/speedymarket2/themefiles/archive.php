<?php get_header(); ?>

<!--Content-->
<!--$posts = $wpdb->get_results("SELECT ID, post_title FROM wp_posts WHERE post_status = 'future' AND post_type='post' ORDER BY post_date ASC LIMIT 0,4");-->
<div id="content" role="main"> 
    <div class="row">
<?php 
$categorie =  $wpdb->get_results("SELECT * FROM tb_categorie WHERE id_categorie_mere = NULL");
foreach($categorie as $result){
    $title = $categorie['c_libelle'] ;
    $image = $categorie['url_image']; ?>       
        <div class="col-md-4">
          <?php echo "<h4>".$title."</h4>" ; ?>    
           <img src="uploads/speedymarket/<?php echo $image; ?>"/>     
                </div>
       
<?php      
} ?>
</div>

?>
<div class="clear"></div>
</div>

<!--/Content-->

<?php get_footer(); ?>