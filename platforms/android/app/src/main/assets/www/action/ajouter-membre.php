<?php
	include '../config.php';
	include_once (CHEMIN_MODELE . 'Membre.php');
	include_once (CHEMIN_DAO . 'MembreDAO.php');
	
	$membre = new Membre($_POST, false);
	
	if(count($membre->erreurs[])){
		
	}
	
	MembreDAO::ajouterMembre($membre);