<?php

//Create cat table
function speedymarket_tables(){
    //Get the table name with the WP database prefix
    global $wpdb;
   
    $speedymarket_table_version = "1.0";
    $installed_ver = get_option( "speedymarket_table_version" );
     //Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$wpc_cat_table'") != $wpc_cat_table
            ||  $installed_ver != $speedymarket_table_version ) {
        
  $sql = "CREATE TABLE `tb_article` (
  `id_article` int(11) NOT NULL,
  `a_designation` varchar(100) NOT NULL,
  `a_pht` float(6,2) DEFAULT NULL,
  `a_description` text,
  `a_quantite_stock` int(11) DEFAULT NULL,
  `a_visible` tinyint(1) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `url_image` varchar(200) DEFAULT NULL,
  `id_tva` int(11) DEFAULT NULL
   UNIQUE KEY id_article (id)
            )";
  
   $sql1 = "CREATE TABLE `tb_categorie` (
`id_categorie` int(11) NOT NULL,
  `c_libelle` varchar(100) NOT NULL,
  `id_categorie_mere` int(11) DEFAULT NULL,
  `url_image` varchar(200) DEFAULT NULL
  )";
  
    $sql2 ="CREATE TABLE `tb_client` (
  `id_personne` int(11) NOT NULL,
  UNIQUE KEY id_personne()
)";
$sql3 ="CREATE TABLE `tb_commande` (
`id_commande` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_dateretrait` date DEFAULT NULL,
  `id_statut` int(11) DEFAULT NULL,
  `client_id_pers` int(11) DEFAULT NULL,
  `prepa_id_pers` int(11) DEFAULT NULL
)";
$sql4="CREATE TABLE `tb_image` (
  `url_image` varchar(200) NOT NULL,
  `i_nom` varchar(100) NOT NULL,
  `i_libelle` varchar(100) DEFAULT NULL
)";
$sql5 ="CREATE TABLE IF NOT EXISTS `tb_ligne_commande` (
  `id_article` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `qte_cmde` int(11) NOT NULL
)";

$sql6 = "CREATE TABLE IF NOT EXISTS `tb_personne` (
`id_personne` int(11) NOT NULL,
  `p_nom` varchar(100) NOT NULL,
  `p_prenom` varchar(100) NOT NULL,
  `p_arue` varchar(100) DEFAULT NULL,
  `p_aville` varchar(100) NOT NULL,
  `p_acp` int(11) NOT NULL,
  `p_tel` int(11) DEFAULT NULL,
  `p_mail` varchar(100) NOT NULL,
  `p_mdp` varchar(128) NOT NULL
)";

$sql7 ="CREATE TABLE IF NOT EXISTS `tb_preparateur` (
  `id_personne` int(11) NOT NULL
)";
$sql8 ="CREATE TABLE IF NOT EXISTS `tb_statut` (
`id_statut` int(11) NOT NULL,
  `s_libelle` varchar(50) NOT NULL
)";
$sql9 = "CREATE TABLE IF NOT EXISTS `tb_tva` (
`id_tva` int(11) NOT NULL,
  `t_libelle` varchar(100) NOT NULL,
  `t_taux` float(4,3) NOT NULL
)";

        

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "speedymarket_table_version", $speedymarket_table_version );
}
    //Add database table versions to options
    add_option("wpc_cat_table_version", $speedymarket_table_version);
}

//function wpc_product_table(){
//    //Get the table name with the WP database prefix
//    global $wpdb;
//    $wpc_product_table = $wpdb->prefix . "wpc_products";
//    $wpc_product_table_version = "1.0";
//    $installed_ver = get_option( "wpc_product_table_version" );
//     //Check if the table already exists and if the table is up to date, if not create it
//    if($wpdb->get_var("SHOW TABLES LIKE '$wpc_cat_table'") != $wpc_product_table
//            ||  $installed_ver != $wpc_product_table_version ) {
//        $sql = "CREATE TABLE " . $wpc_product_table . " (
//              `id` INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//			  `list_order` INT( 9 ) NOT NULL,
//              `product_title` TEXT NOT NULL,
//			  `product_desc` TEXT NOT NULL,
//			  `product_summary` TEXT NOT NULL,
//			  `product_featured` TEXT NOT NULL,
//			  `product_cats` TEXT NOT NULL,
//			  `product_img1` TEXT NOT NULL,
//			  `product_img2` TEXT NOT NULL,
//			  `product_img3` TEXT NOT NULL,
//			  `product_price` TEXT NOT NULL,
//			  `product_date` TEXT NOT NULL,
//              UNIQUE KEY id (id)
//            );";
//
//        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
//        dbDelta($sql);
//        update_option( "wpc_product_table_version", $wpc_product_table_version );
//}
//    //Add database table versions to options
//    add_option("wpc_product_table_version", $wpc_product_table_version);
//}