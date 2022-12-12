<?php
include '../config.php';
include_once (CHEMIN_MODELE . 'Membre.php');
include_once (CHEMIN_DAO . 'MembreDAO.php');
	
if (isset($_POST['action-membre'])) {
        $_SESSION['erreur'] = null; 

        $membre = new Membre($_POST, true);

        $membreTrouve = MembreDAO::verifierMembre($membre->pseudo);

        include '../service/membre.php';
    } 
?>