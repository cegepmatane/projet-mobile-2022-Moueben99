<?php 

include_once 'secret/Connexion.php';
include 'MembreSQL.php';

class MembreDAO extends Connexion implements MembreSQL
{
    public static function verifierMembre($pseudo)
    {
        $basededonnees = MembreDAO::initialiser();

        $statement = $basededonnees->prepare(MembreDAO::SQL_TROUVER_MEMBRE);
		$statement->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$statement->execute();
		$membres = $statement->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        $contrat = null;
        foreach($membres as $membre){
            $contrat = new Membre($membre, true);
            $contrats[] = $contrat;
        }

        return $contrat;
    }

    public static function listerMembre($id)
    {
        $basededonnees = MembreDAO::initialiser();

        $statement = $basededonnees->prepare(MembreDAO::SQL_MEMBRE);
		$statement->bindValue(':id', $id, PDO::PARAM_STR);
		$statement->execute();
		$membres = $statement->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        $contrat = null;
        foreach($membres as $membre){
            $contrat = new Membre($membre, true);
            $contrats[] = $contrat;
        }

        return $contrat;
    }

    public static function ajouterMembre($membre)
    {
		$basededonnees = MembreDAO::initialiser();

		$statement = $basededonnees->prepare(MembreDAO::SQL_CREER_MEMBRE);
		$statement->bindValue(':nom', $membre->nom, PDO::PARAM_STR);
		$statement->bindValue(':mdp', $membre->mdp, PDO::PARAM_STR);
		$statement->bindValue(':confirmation_mdp', $membre->confirmation_mdp, PDO::PARAM_STR);
		$statement->bindValue(':pseudo', $membre->pseudo, PDO::PARAM_STR);
		$statement->execute();

        $sujet = 'Bienvenue ' . $membre->pseudo . ' !'; 
        $message = 'Bienvenue à where is the spot ! Créer ta première session : http://services.mayal.systems/connexion.php'; 

        mail($sujet, $message);
    }

    public static function modifierMembre($membre)
    {
		$basededonnees = MembreDAO::initialiser();

		$statement = $basededonnees->prepare(MembreDAO::SQL_MODIFIER_MEMBRE);
		$statement->bindValue(':id', $membre->id, PDO::PARAM_INT);
		$statement->bindValue(':nom', $membre->nom, PDO::PARAM_STR);
		$statement->bindValue(':mdp', $membre->mdp, PDO::PARAM_STR);
		$statement->bindValue(':confirmation_mdp', $membre->confirmation_mdp, PDO::PARAM_STR);
		$statement->bindValue(':pseudo', $membre->pseudo, PDO::PARAM_STR);
		$statement->execute();
    }
	
}