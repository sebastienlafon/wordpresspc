


<div class="wrap">  
  <div id="icon-options-general" class="icon32"><br>
  </div>
  <h2>Speedy Market <?php _e('Catégories','SpeedyMarket') ?></h2>
  <div class="wpc-left-liquid">
   
      <?php if ( isset( $_GET['settings-updated'] ) ) {
    echo "<div class='updated' style='margin-top:10px;'><p> Speedy Market ". __('Settings updated successfully','SpeedyMarket')."</p></div>";
} ?>
       <?php if ( !empty ($message) ) :
    echo "<div class=\"alert alert-danger\" role=\"alert\">".$message."</p></div>";
endif ?>
       <?php if ( !empty ($succes) ) :
    echo "<div class=\"alert alert-succes\" role=\"alert\">".$succes."</p></div>";
endif ?>
    
<div class="row-fluid">
    <div class="col-md-5">
        <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-plus-square"></i> <?php _e('Ajouter une catégorie','SpeedyMarket') ?>
                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
    
        <form class="form-horizontal" enctype="multipart/form-data"  method="post">

             <div class="form-group">
    <label for="libelle" class="col-sm-2 control-label">Libellé</label>
    <div class="col-sm-10">
        <input type="text" name="c_libelle" class="form-control" id="libelle" placeholder="Nom de la catégorie" required>
    </div>
  </div>
              <div class="form-group">
    <label for="parent" class="col-sm-2 control-label">Parent</label>
    <div class="col-sm-10"><select name="id_categorie_mere">
    <option value="NULL"><?php echo esc_attr(__('Aucun')); ?></option> 
        <?php 
    global $wpdb;
    $cats = $wpdb->get_results("SELECT id_categorie,c_libelle,id_categorie_mere
                                                FROM `tb_categorie`
                                                ");
//$wpdb->get_results($cats);   
// $i = 0;
  foreach ( $cats as $result ) :
         
     
      ?>
            <option value=""><?php echo $result->c_libelle ?></option>
      
<?php      
  endforeach;
  ?>
            
        </select>
    </div></div>
     <div class="form-group">
    <label for="parent" class="col-sm-2 control-label">Image</label>
    <div class="col-sm-10"><input id="input-1" type="file" class="file" name="file"></div>
     </div>
         <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Ajouter une nouvelle catégorie"></p> 
        </form>
      <?php
      if ( isset( $_POST['submit'] ) ) { 
//          $target = "uploads";
//          $target = $target.basename( $_FILES['file']['name']);
          
    //$libelle = $_POST['libelle'];
    //$parent = $_POST['parent'];
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['file']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['file']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . basename($_FILES['file']['name']));
                       $succes = "L'envoi a bien été effectué !";
                       $pic=($_FILES['file']['name']);
                }else {
//Gives and error if its not
$message = "Sorry, there was a problem uploading your file.";
}
        }
}

//$_POST['id_categorie_mere']

global $wpdb;

$wpdb->get_results("SELECT MAX(id_categorie) FROM `tb_categorie`");

var_dump($wpdb->get_results("SELECT MAX(id_categorie) FROM `tb_categorie`"));

$wpdb->INSERT('tb_categorie', array(
'id_categorie'=>NULL,
'c_libelle'=>$_POST['c_libelle'],
'id_categorie_mere'=>NULL,
'url_image'=> NULL
            ),
  array(
    '%d',
    '%s',
    '%d',
     '%s')
        );
$wpdb->insert_id




 }
?>                      
                        </div><!-- /.panel-body -->
                        </div>
   
</div> 
    </div>
    <div class="col-md-7"><div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list"></i> <?php _e('Listes des catégories','SpeedyMarket') ?>
                         <?php  /* global $wpdb;
                                 $cats = $wpdb->get_results("SELECT id_categorie,c_libelle,id_categorie_mere
                                                FROM `tb_categorie`
                                                ");

                            foreach ( $cats as $result ) : 
                                   
                             echo $result->c_libelle;  
                                endforeach;
*/  ?>

                          
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
    <table class="wp-list-table widefat fixed striped users">
            <thead>
            <tr>
              <td id="cb" class="manage-column column-cb check-column">
                <label class="screen-reader-text" for="cb-select-all-1">Tout sélectionner</label>
                <input id="cb-select-all-1" type="checkbox">
              </td>
                <th scope="col" id="username" class="manage-column column-username column-primary sortable desc">
                <a href="#">
                <span>Identifiant</span><span class="sorting-indicator"></span></a>
                </th><th scope="col" id="name" class="manage-column column-name sortable desc">
                <a href="#">
                <span>Libellé</span><span class="sorting-indicator"></span></a>
                </th><th scope="col" id="email" class="manage-column column-email sortable desc">
                <a href="#">
                <span>id_categorie_mere</span><span class="sorting-indicator"></span></a>
                </th>
                <th scope="col" id="email" class="manage-column column-email sortable desc">
                <a href="#">
                <span>url image</span><span class="sorting-indicator"></span></a>
                </th>
                  </tr>
                                </thead>
                                 <?php   global $wpdb;
                                 $cats = $wpdb->get_results("SELECT id_categorie,c_libelle,id_categorie_mere,url_image
                                                FROM `tb_categorie`
                                                ");

                            foreach ( $cats as $result ) :
         
                                ?>

                                 <tbody id="the-list" data-wp-lists="list:user">
                                  
                                <tr id="user-1"><th scope="row" class="check-column">
                                <label class="screen-reader-text" for="user_1">Sélectionner root</label>
                                <input type="checkbox" name="users[]" id="user_1" class="administrator" value="1">
                                </th><td name
                                         class="username column-username has-row-actions column-primary" data-colname="Identifiant">
                                <strong><p><?php echo $result->id_categorie;?></p></strong>
                                <br><div class="row-actions"><span class="edit">
                                </span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
                                </td>
                                <td class="username column-username has-row-actions column-primary" data-colname="Identifiant">
                                <strong><p><?php echo $result->c_libelle;?></p></strong>
                                <br><div class="row-actions"><span class="edit">
                                </span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
                                </td>
                                <td class="username column-username has-row-actions column-primary" data-colname="Identifiant">
                                <strong><p><?php echo $result->id_categorie_mere;?></p></strong>
                                <br><div class="row-actions"><span class="edit">
                                </span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
                                </td>
                                 <td class="username column-username has-row-actions column-primary" data-colname="Identifiant">
                                <strong><p><?php echo $result->url_image;?></p></strong>
                                <br><div class="row-actions"><span class="edit">
                                </span></div><button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
                                </td>
                               
                          </tbody>
      
     <?php 
                                endforeach;
  ?>

                              

                              </table>
                                
                    
       
                        </div>
                        <!-- /.panel-body -->
                    </div>
   
    </div>
</div>
      
      
</div>
      
</div>
</div>
 <br class="clear">
</div>












































