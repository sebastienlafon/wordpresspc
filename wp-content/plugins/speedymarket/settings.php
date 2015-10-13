<div class="wrap">  
  <div id="icon-options-general" class="icon32"><br>
  </div>
  <h2>Speedy Market<?php _e(' Configuration','SpeedyMarket') ?></h2>
  <div class="wpc-left-liquid">
    <?php if ( isset( $_GET['settings-updated'] ) ) {
    echo "<div class='updated' style='margin-top:10px;'><p> Speedy Market ". __('Settings updated successfully','SpeedyMarket')."</p></div>";
} 

?>
<div class="row-fluid">
    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-dashboard fa-fw"></i><?php _e('Configuration','SpeedyMarket') ?>
                       
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <p class="description"><?php _e('Adjust the basic presentation of your product catalogue here. It is important to set this up before you start uploading products so the plugin knows what size to generate thumbnails and product images','wpc') ?> </p>
        <p class="description"><?php _e('You can further customise the design of your product catalogue in your theme css.','wpc') ?> </p>

        <form class="form-horizontal">
            <div class="form-group">
                <label for="grille" class="col-sm-2 control-label"><?php _e('Produits par ligne') ?></label>
    <div class="col-sm-5">
      <select class="form-control" name="grille" id="grille">
            <option value="2" <?php if(get_option('grille')==2){echo 'selected="selected"';} ?> >2</option>
            <option value="3" <?php if(get_option('grille')==3){echo 'selected="selected"';} ?>>3</option>
            <option value="4" <?php if(get_option('grille')==4){echo 'selected="selected"';} ?>>4</option>
</select>
    </div>
                
            </div>
            <div class="form-group">
           <label for="colopicker" class="col-sm-2 control-label"><?php _e('Couleur d\'arrière plan') ?></label>

<div class="bgcolor input-group colorpicker-component colorpicker-element col-sm-5">
            <input type="text" value="#00AABB" class="form-control">
            
            <span class="input-group-addon"><i style="background-color: rgb(0, 170, 187);"></i></span>
            <script>
    (function($){
        $('.bgcolor').colorpicker();
    });
</script>

          </div>       <div class="form-group">
                <label for="tva" class="col-sm-2 control-label"><?php _e('Taux de TVA') ?></label>
    <div class="col-sm-5">
      <select class="form-control" name="tva" id="tva">
       
 <option value="1" <?php if(get_option('tva')==2){echo 'selected="selected"';} ?> >TVA 5.5</option>

          
</select>
    </div>
                
            </div>
            
            </div>
        </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
   
</div>
      
      
</div>
</div>