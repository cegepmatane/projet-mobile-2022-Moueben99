<?php
include 'config.php';
include 'include/header.php';
include_once (CHEMIN_MODELE . 'Membre.php');
include_once (CHEMIN_DAO . 'MembreDAO.php');

if(isset($_POST["inscription"])){
	$membre = new Membre($_POST, false);
	//var_dump($membre);
	if(count($membre->erreurs)){
		afficherFormulaire($membre);
	}else{
		MembreDAO::ajouterMembre($membre);
		
		header('Location: '.'/accueil-membre.php');
		die();
	}
}else{
	afficherFormulaire();
}

function afficherFormulaire($membre = null){
	if($membre)
		foreach ($membre->erreurs as $key => $erreur) {
?>
			<div class="erreurs-formulaire" style="background-color : red;"><?=$erreur?></div>
<?php
		}
?>
	<form method="post" action="inscription.php">
    <div class="mb-3">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" 
			   title="caractères acceptés : a-zA-Z0-9-_." value="<?php if($membre)echo $membre->pseudo?>">
    </div>

    <div class="mb-3">
        <label for="md5">Mot de passe</label>
        <input type="password" id="md5" name="md5" value="<?php if($membre)echo $membre->md5?>">
    </div>
	
    <div class="mb-3">
        <label for="confirmation_md5">Confirmation mot de passe</label>
        <input type="password" id="confirmation_md5" name="confirmation_md5" value="<?php if($membre)echo $membre->confirmation_md5?>">
    </div>

    <div class="mb-3">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="votre nom" value="<?php if($membre)echo $membre->nom?>">
    </div>
  
    <div class="mb-3">
        <label for="courriel">Email</label>
        <input type="text" id="courriel" name="courriel" placeholder="exemple@gmail.com" value="<?php if($membre)echo $membre->courriel?>">
    </div>
    
    <input type="submit" name="inscription" value="S'inscrire">
</form>
<?php
}
?>
<?php include 'include/footer.php'; ?>