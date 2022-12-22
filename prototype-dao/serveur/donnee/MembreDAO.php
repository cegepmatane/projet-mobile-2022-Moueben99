<?php 
include_once 'Secret/Connexion.php';
include 'MembreSQL.php';

class MembreDAO extends Connexion implements MembreSQL
{
    public static function verifierMembre($membre)
    {
        $basededonnees = MembreDAO::initialiser();

        $statement = $basededonnees->prepare(MembreDAO::SQL_VERIFIER_MEMBRE);
		$statement->bindValue(':pseudo', $membre->pseudo, PDO::PARAM_STR);
        $statement->bindValue(':mdp', $membre->mdp, PDO::PARAM_STR);
		$statement->execute();
		$membre = $statement->fetch(PDO::FETCH_ASSOC);

        if(isset($membre['id']))
            return true;
        else 
            return false;
    }

    public static function ajouterMembre($membre)
    {
		$basededonnees = MembreDAO::initialiser();

		$statement = $basededonnees->prepare(MembreDAO::SQL_CREER_MEMBRE);
		$statement->bindValue(':nom', $membre->nom, PDO::PARAM_STR);
		$statement->bindValue(':mdp', $membre->mdp, PDO::PARAM_STR);
		$statement->bindValue(':courriel', $membre->courriel, PDO::PARAM_STR);
		$statement->bindValue(':pseudo', $membre->pseudo, PDO::PARAM_STR);
		$statement->execute();
    }
	
}