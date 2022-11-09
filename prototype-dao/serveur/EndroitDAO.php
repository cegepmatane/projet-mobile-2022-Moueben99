<?php
class EndroitDAO extends Connexion implements EndroitSQL{

    public static function ajouterEndroit($json){

        $basededonnees = EndroitDAO::initialiser();
        json_decode($json, true);

        $demandeContrats = $basededonnees->prepare('INSERT INTO endroit(titre, description, position, image, id_endroit) VALUES(:titre, :description, :position, :image, :id_endroit)');
        $demandeContrats->bindParam(':titre', $json->titre, PDO::PARAM_STR);
        $demandeContrats->bindParam(':description', $json->description, PDO::PARAM_STR);
        $demandeContrats->bindParam(':position', $json->position, PDO::PARAM_STR);
        $demandeContrats->bindParam(':image', $json->image, PDO::PARAM_STR);
        $demandeContrats->bindParam(':id_endroit', $json->id_endroit, PDO::PARAM_INT);
        $demandeContrats->execute();
    }
}