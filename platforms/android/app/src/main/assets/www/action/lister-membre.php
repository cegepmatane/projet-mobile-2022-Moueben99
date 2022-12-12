<?php
	include '../config.php';
	include_once (CHEMIN_MODELE . 'Membre.php');
	include_once (CHEMIN_DAO . 'MembreDAO.php');

	$membre = new Membre($_POST);
	
	if(count($membre->contenus[])){
		
	}
	
	MembreDAO::listerMembre($membre);