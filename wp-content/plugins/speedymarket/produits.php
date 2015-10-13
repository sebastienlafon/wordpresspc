<div class="wrap">
  <div id="icon-options-general" class="icon32">
    <br> </div>
  <h2>Speedy Market <?php _e('Produits','SpeedyMarket') ?></h2>
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
                <i class="fa fa-plus-square"></i>
                  <?php _e('Ajouter un putain de produit','SpeedyMarket') ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                  <form class="form-horizontal"
                  enctype="multipart/form-data"
                  method="POST">
                    <div class="form-group">
                      <label for="libelle"
                      class="col-sm-3 control-label">Désignation</label>
                      <div class="col-sm-9">
                        <input type="text"
                        class="form-control"
                        name="designation"
                        id="designation"
                        placeholder="Nom du produit"
                        required> </div>
                    </div>
                    <div class="form-group">
                      <label for="libelle"
                      class="col-sm-3 control-label">Prix</label>
                      <div class="col-sm-9">
                        <input type="text"
                        class="form-control"
                        name="prix" id="prix"
                        placeholder="Prix du produit"
                        required> </div>
                    </div>
                    <div class="form-group">
                      <label for="parent" class="col-sm-3 control-label">Catégorie</label>
                      <div
                      class="col-sm-9">
                        <select name="categorie">
                          <option value="NULL">
                            <?php echo esc_attr(__('Aucun')); ?>
                          </option>
                          <?php 
                      global $wpdb;
                      $cats = $wpdb->get_results("SELECT id_categorie,c_libelle,id_categorie_mere
                                                                  FROM `tb_categorie`
                                                                  ");
                  //$wpdb->get_results($cats);   
                  // $i = 0;
                    foreach ( $cats as $result ) :
                           
                       
                        ?>
                            <option value="">
                              <?php echo $result->c_libelle ?>
                            </option>
                            <?php      
                    endforeach;
                    ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="libelle" class="col-sm-3 control-label">Description</label>
                  <div
                  class="col-sm-9">
                    <input type="text" class="form-control"
                    id="description" name="description"
                    placeholder="description du produit"
                    required> </div>
              </div>
              <div class="form-group">
                <label for="libelle" class="col-sm-3 control-label">Quantité</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"
                  name="quantite" id="quantite"
                  placeholder="Quantité en stock"
                  required> </div>
              </div>
              <div class="form-group">
                <label for="libelle" class="col-sm-3 control-label">Visibilité</label>
                <div class="col-sm-9">
                  <select name="visibilite">
                    <option value="0">0</option>
                    <option value="1">1</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="parent" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                  <input id="input-1" type="file"
                  class="file" name="file"> </div>
                  <div class="form-group">
                <label for="libelle" class="col-sm-5 control-label">Description image</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control"
                  name="desc_image" id="desc_image"
                  placeholder="entrez une description d'image"
                  required> </div>
              </div>
              </div>
              <p class="submit">
                <input type="submit" name="submit"
                id="submit" class="button button-primary"
                value="Ajouter un nouvel article"> </p>
              </form>
              <?php
           if ( isset( $_POST['submit'] ) ) { 
      $target = "uploads";
      $target = $target.basename( $_FILES['file']['name']);
                
        //  $libelle = $_POST['libelle'];
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
//                              // On peut valider le fichier et le stocker définitivement
//                              move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . basename($_FILES['file']['name']));
//                             $succes = "L'envoi a bien été effectué !";
//                             $pic=($_FILES['file']['name']);
                      }else {
      //Gives and error if its not
      $message = "Désolé, il y a eu un problème lors du chargement de l'image.";
      }
              }
      }

  $designation=$_POST['designation'];
  $prix=$_POST['prix'];
  $description=$_POST['description'];
  $quantite=$_POST['quantite'];
  $visibiliite=$_POST['visibilite'];
  $upload_image=$_FILES['file']['name'];          
 $desc_image=$_POST['desc_image'];
  


 
global $wpdb;
$wpdb->INSERT('tb_image', array(
  'url_image'=>$upload_image,
  'i_nom'=>$upload_image,
  'i_libelle'=>$desc_image
                                   ),
  array(
    '%s',
    '%s',
    '%s')
        );

global $wpdb;
$wpdb->INSERT('tb_article', array(
  'id_article'=>NULL,
  'a_designation'=>$designation,
  'a_pht'=>$prix,
  'a_description'=>$description,
  'a_quantite_stock'=>$quantite,
  'a_visible'=>$visibiliite,
  'id_categorie'=>15,
  'url_image'=>$upload_image,
  'id_tva'=>6
                                   ),
  array(
    '%d',
    '%s',
    '%d',
    '%s',
    '%d',
    '%d',
    '%d',
    '%s',
    '%d'
    )
  );
 
/*$sql = $wpdb->prepare("INSERT INTO tb_article
       VALUES
        (,".$_POST[designation].", ".$_POST[prix].", ".$_POST[description].", ".$_POST[quantite].", ".$_POST[visibilite].", NULL, NULL,6 )");
$wpdb->query($sql);
*/ }
?>
            </div>
            <!-- /.panel-body -->
          </div>
  </div>
</div>
<div class="col-md-7">
  <div class="panel panel-default">
    <div class="panel-heading"> <i class="fa fa-list"></i>
      <?php _e('Listes des catégories','SpeedyMarket') ?>
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
              <label class="screen-reader-text"
              for="cb-select-all-1">Tout sélectionner</label>
              <input
              id="cb-select-all-1" type="checkbox">
            </td>
            <th scope="col" id="username"
            class="manage-column column-username column-primary sortable desc">
              <a href="#"> <span>Id_Article</span>
                <span
                class="sorting-indicator"></span>
              </a>
            </th>
            <th scope="col" id="name" class="manage-column column-name sortable desc">
              <a href="#"> <span>Désignation</span>
                <span
                class="sorting-indicator"></span>
              </a>
            </th>
            <th scope="col" id="email" class="manage-column column-email sortable desc">
              <a href="#"> <span>Catégorie</span>
                <span
                class="sorting-indicator"></span>
              </a>
            </th>
            <th scope="col" id="email" class="manage-column column-email sortable desc">
              <a href="#"> <span>Prix</span><span class="sorting-indicator"></span></a>
            </th>
            <th scope="col" id="email" class="manage-column column-email sortable desc">
              <a href="#"> <span>Quantité</span>
                <span
                class="sorting-indicator"></span>
              </a>
            </th>
            <th scope="col" id="email" class="manage-column column-email sortable desc">
              <a href="#"> <span>Visibilité</span>
                <span
                class="sorting-indicator"></span>
              </a>
            </th>
          </tr>
        </thead>
        <?php   global $wpdb;
                           $cats = $wpdb->get_results
                           ("SELECT Id_Article, a_designation, c_libelle, a_pht, a_quantite_stock, a_visible
                            FROM tb_article
                            JOIN tb_categorie
                            ON tb_categorie.id_categorie=tb_article.id_categorie

                                                ");
                        

                            foreach ( $cats as $result ) :
         
                                ?>
          <tbody id="the-list" data-wp-lists="list:user">
            <tr id="user-1">
              <th scope="row" class="check-column">
                <label class="screen-reader-text"
                for="user_1">Sélectionner root</label>
                <input type="checkbox" name="users[]"
                id="user_1" class="administrator"
                value="1"> </th>
              <td class="username column-username has-row-actions column-primary"
              data-colname="Identifiant">
              <strong><?php echo $result->Id_Article;?></strong>
                <br>
                <div class="row-actions"><span class="edit">
                                </span></div>
                <button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
              </td>
              <td class="username column-username has-row-actions column-primary"
              data-colname="Identifiant">
              <strong><?php echo $result->a_designation;?></strong>
                <br>
                <div class="row-actions"><span class="edit">
                                </span></div>
                <button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
              </td>
              <td class="username column-username has-row-actions column-primary"
              data-colname="Identifiant">
              <strong><?php echo $result->c_libelle;?></strong>
                <br>
                <div class="row-actions"><span class="edit">
                                </span></div>
                <button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
              </td>
              <td class="username column-username has-row-actions column-primary"
              data-colname="Identifiant">
              <strong><?php echo $result->a_pht;?></strong>
                <br>
                <div class="row-actions"><span class="edit">
                                </span></div>
                <button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
              </td>
              <td class="username column-username has-row-actions column-primary"
              data-colname="Identifiant">
              <strong><?php echo $result->a_quantite_stock;?></strong>
                <br>
                <div class="row-actions"><span class="edit">
                                </span></div>
                <button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
              </td>
              <td class="username column-username has-row-actions column-primary"
              data-colname="Identifiant">
              <strong><?php echo $result->a_visible;?></strong>
                <br>
                <div class="row-actions"><span class="edit">
                                </span></div>
                <button type="button" class="toggle-row"><span class="screen-reader-text">Afficher plus de détails</span></button>
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
<br class="clear"> </div>