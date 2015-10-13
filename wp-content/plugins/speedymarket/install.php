<?php

class speedymarket {
    
    function __construct($mode = 'install'){
        global $wpdb;
        $wpdb -> tb_article = $wpdb -> prefix.'article';
        $wpdb -> tb_categorie = $wpdb -> prefix.'categorie';         
        $wpdb -> tb_client = $wpdb -> prefix.'client';
        $wpdb -> tb_commande = $wpdb -> prefix.'commande';
        $wpdb -> tb_image = $wpdb -> prefix.'image';
        $wpdb -> tb_ligne_commande = $wpdb -> prefix.'ligne_commande';
        $wpdb -> tb_personne = $wpdb -> prefix.'personne';
        $wpdb -> tb_preparateur = $wpdb -> prefix.'preparateur';
        $wpdb -> tb_statut = $wpdb -> prefix.'statut';
        $wpdb -> tb_tva = $wpdb -> prefix.'tva';    


        if($mode == "install")
                add_action('admin_menu',array(&$this,'speedymarket_menu'));
    }    
    
     function my_admin_menu() {
         ## Ajoute un lien vers le plugin dans le menu "extension" de l'administration
          add_submenu_page('plugins.php',"speedymarket","Speedy Market"  ,8, __FILE__,array(&$this,'homepage'));		
         }


    function install(){           
        ## Initialisation du plugin
        global $wpdb;
        
        // Creation des tables du plugin
        $result = $wpdb -> query("  
            CREATE TABLE  `$wpdb -> tb_article` (    
                `id_article` int(11) NOT NULL,
                `a_designation` varchar(100) NOT NULL,
                `a_pht` float(6,2) DEFAULT NULL,
                `a_description` text,
                `a_quantite_stock` int(11) DEFAULT NULL,
                `a_visible` tinyint(1) NOT NULL,
                `id_categorie` int(11) DEFAULT NULL,
                `url_image` varchar(200) DEFAULT NULL,
                `id_tva` int(11) DEFAULT NULL
            );
            CREATE TABLE  `$wpdb -> tb_categorie` (
                `id_categorie` int(11) NOT NULL,
                `c_libelle` varchar(100) NOT NULL,
                `id_categorie_mere` int(11) DEFAULT NULL,
                `url_image` varchar(200) DEFAULT NULL
                );
            CREATE TABLE  `$wpdb -> tb_client`(
                `id_personne` int(11) NOT NULL,
                UNIQUE KEY id_personne()
            );
            CREATE TABLE  `$wpdb -> tb_commande`(
                `id_commande` int(11) NOT NULL,
                `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `c_dateretrait` date DEFAULT NULL,
                `id_statut` int(11) DEFAULT NULL,
                `client_id_pers` int(11) DEFAULT NULL,
                `prepa_id_pers` int(11) DEFAULT NULL
            );
            CREATE TABLE  `$wpdb -> tb_image`(
                `url_image` varchar(200) NOT NULL,
                `i_nom` varchar(100) NOT NULL,
                `i_libelle` varchar(100) DEFAULT NULL
            );
            CREATE TABLE  `$wpdb -> tb_ligne_commande`(
                `id_article` int(11) NOT NULL,
                `id_commande` int(11) NOT NULL,
                `qte_cmde` int(11) NOT NULL
            );
            CREATE TABLE  `$wpdb -> tb_personne`(
                `id_personne` int(11) NOT NULL,
                `p_nom` varchar(100) NOT NULL,
                `p_prenom` varchar(100) NOT NULL,
                `p_arue` varchar(100) DEFAULT NULL,
                `p_aville` varchar(100) NOT NULL,
                `p_acp` int(11) NOT NULL,
                `p_tel` int(11) DEFAULT NULL,
                `p_mail` varchar(100) NOT NULL,
                `p_mdp` varchar(128) NOT NULL
            );
            CREATE TABLE  `$wpdb -> tb_preparateur`(
                `id_personne` int(11) NOT NULL
            );
            CREATE TABLE  `$wpdb -> tb_statut`(
                `id_statut` int(11) NOT NULL,
                `s_libelle` varchar(50) NOT NULL
            );
            CREATE TABLE  `$wpdb -> tb_tva`(
                `id_tva` int(11) NOT NULL,
                `t_libelle` varchar(100) NOT NULL,
                `t_taux` float(4,3) NOT NULL
            );
            INSERT INTO `tb_tva` (`id_tva`, `t_libelle`, `t_taux`) VALUES
                (5, 'normal', 9.999),
                (6, 'intermediaire', 9.999),
                (7, 'reduit', 5.500),
                (8, 'super reduit', 2.100);
                
            ALTER TABLE `$wpdb -> tb_article`
                ADD PRIMARY KEY (`id_article`), ADD KEY `FK_article_id_categorie` (`id_categorie`), ADD KEY `FK_article_url_image` (`url_image`), ADD KEY `FK_article_id_tva` (`id_tva`);
                ADD CONSTRAINT `FK_article_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `tb_categorie` (`id_categorie`),
                ADD CONSTRAINT `FK_article_id_tva` FOREIGN KEY (`id_tva`) REFERENCES `tb_tva` (`id_tva`),
                ADD CONSTRAINT `FK_article_url_image` FOREIGN KEY (`url_image`) REFERENCES `tb_image` (`url_image`);

            ALTER TABLE `$wpdb -> tb_categorie`
                ADD PRIMARY KEY (`id_categorie`), ADD KEY `FK_categorie_id_categorie_mere` (`id_categorie_mere`), ADD KEY `FK_categorie_url_image` (`url_image`);
                ADD CONSTRAINT `FK_categorie_id_categorie_mere` FOREIGN KEY (`id_categorie_mere`) REFERENCES `tb_categorie` (`id_categorie`),
                ADD CONSTRAINT `FK_categorie_url_image` FOREIGN KEY (`url_image`) REFERENCES `tb_image` (`url_image`);

            ALTER TABLE `$wpdb -> tb_client`
                ADD PRIMARY KEY (`id_personne`);
                ADD CONSTRAINT `FK_client_id_personne` FOREIGN KEY (`id_personne`) REFERENCES `tb_personne` (`id_personne`);

            ALTER TABLE `$wpdb -> tb_commande`
                ADD PRIMARY KEY (`id_commande`), ADD KEY `FK_commande_id_statut` (`id_statut`), ADD KEY `FK_commande_client_id_pers` (`client_id_pers`), ADD KEY `FK_commande_prepa_id_pers` (`prepa_id_pers`);
                ADD CONSTRAINT `FK_commande_client_id_pers` FOREIGN KEY (`client_id_pers`) REFERENCES `tb_personne` (`id_personne`),
                ADD CONSTRAINT `FK_commande_id_statut` FOREIGN KEY (`id_statut`) REFERENCES `tb_statut` (`id_statut`),
                ADD CONSTRAINT `FK_commande_prepa_id_pers` FOREIGN KEY (`prepa_id_pers`) REFERENCES `tb_personne` (`id_personne`);

            ALTER TABLE `$wpdb -> tb_image`
                ADD PRIMARY KEY (`url_image`);

            ALTER TABLE `$wpdb -> tb_ligne_commande`
                ADD PRIMARY KEY (`id_article`,`id_commande`), ADD KEY `FK_ligne_commande_id_commande` (`id_commande`);
                ADD CONSTRAINT `FK_ligne_commande_id_article` FOREIGN KEY (`id_article`) REFERENCES `tb_article` (`id_article`),
                ADD CONSTRAINT `FK_ligne_commande_id_commande` FOREIGN KEY (`id_commande`) REFERENCES `tb_commande` (`id_commande`);

            ALTER TABLE `$wpdb -> tb_personne`
                ADD PRIMARY KEY (`id_personne`), ADD UNIQUE KEY `p_mail` (`p_mail`);

            ALTER TABLE `$wpdb -> tb_preparateur`
                ADD PRIMARY KEY (`id_personne`);
                ADD CONSTRAINT `FK_preparateur_id_personne` FOREIGN KEY (`id_personne`) REFERENCES `tb_personne` (`id_personne`);

            ALTER TABLE `$wpdb -> tb_statut`
                ADD PRIMARY KEY (`id_statut`);

            ALTER TABLE `$wpdb -> tb_tva`
                ADD PRIMARY KEY (`id_tva`);
        ");
        $this -> mem_option('speedymarket_init',true);
   
   }
   }
   