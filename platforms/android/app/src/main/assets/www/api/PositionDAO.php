<?php
include 'secret/connexion.php';

class PositionDAO extends Connexion implements PositionSQL{

    public static function listerPositionEndroit($idEndroit){

        $basededonnees = PositionDAO::initialiser();

        $demandeContrats = $basededonnees->prepare(PositionDAO::SQL_LISTER_POSITION); 
        $demandeContrats->bindParam(':id_endroit', $idEndroit, PDO::PARAM_INT);
        $demandeContrats->execute();
        $positions = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($positions as $position) $contrats[] = new Position($position);

        $json = json_encode($contrats); //déplacer dans le modèle
        return $json;
    }

    public static function ajouterPosition($json){

        $basededonnees = PositionDAO::initialiser();
        json_decode($json, true);

        $demandeContrats = $basededonnees->prepare(PositionDAO::SQL_AJOUTER_POSITION); 
        $demandeContrats->bindParam(':longitude', $json->longitude, PDO::PARAM_STR);
        $demandeContrats->bindParam(':latitude', $json->latitude, PDO::PARAM_STR);
        $demandeContrats->execute();
    }
}