<section id="main">
    <div class="container">
        <div class="row">
			<div class="col-9 col-12-medium">
				<div class="content">
                    <article class="box page-content">

                        <h2>Bonjour <?=$_SESSION['nom']?></h2>

                        <a href="liste-factures.php?id=<?=$_SESSION['id']?>" class="button">Voir les factures</a>
                        <a href="action/deconnection.php" class="button">Se déconnecter</a>

                        <h3>Modifier le profil :</h3>
                        <form action="action/modifier-membre.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Pseudo</label>
                                <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?=$_SESSION['pseudo']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?=$_SESSION['nom']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Courriel</label>
                                <input type="text" class="form-control" id="courriel" name="courriel" value="<?=$_SESSION['courriel']?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="md5" name="md5">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmer nouveau mot de passe</label>
                                <input type="password" class="form-control" id="confirmation_md5" name="confirmation_md5">
                            </div>
                            <input type="submit" class="btn btn-success btn-lg" value="Modifier" name="action-modifier" role="button"></input>
                            <input type="hidden" name="id" id="id" value="<?=$_SESSION['id']?>" />
                        </form>
                    </article>
</section>