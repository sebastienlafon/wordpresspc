<?php
    get_header();
     $id_article = $_GET ['id_article'];
 $article =  $wpdb->get_results("SELECT * FROM tb_article WHERE id_article = '$id_article'");
 $nom = $article['a_designation'];
 ?>   

<div id="content" role="main"> 
    <div class="row">  
     
      
    </div>
        
</div>
<?php
    
    get_footer();
?>