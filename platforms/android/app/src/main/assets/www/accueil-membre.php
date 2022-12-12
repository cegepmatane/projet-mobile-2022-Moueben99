<?php
include_once 'config.php';
include_once 'include/header.php';
?>

<section>
	<?php
		if (empty($_SESSION['pseudo'])) {
			//include_once "membre/TODO"; -> possiblement mettre dans un autre fichier pour optimiser style connexion.php
	?>
	    <h1>Page membre</h1>
		<b>Connexion à l'espace membre :</b>
		<form action="action/authentification-membre.php" method="post">
			
			<div class="mb-3">
				<label for="pseudo">Pseudo</label>
				<input type="text" class="form-control" id="pseudo" name="pseudo">
			</div>
			
			<div class="mb-3">
				<label for="md5">Mot de passe</label>
				 <input type="password" class="form-control" id="md5" name="md5">
			</div>
			
			<input type="submit" class="" value="Connexion" name="action-membre" role="button">
			<a href="inscription.php" class="button">Vous inscrire</a>
		</form>
		<?php
		}
		?>
</section>
	
<section class="mx-2 text-light mb-5">
    <div id="bienvenue-membre">
<?php
	if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) { //à mettre dans toutes les pages qui nécéssite la connexion du membre
?>
<?php
	include 'membre-connecte.php';
	}
?>
    </div>
</section>

<?php include 'include/footer.php'; ?>