<?php
//TODO ajouter connexion
class PositionDAO extends Connexion implements PositionSQL{

    public static function ajouterPosition($json){

        $basededonnees = PositionDAO::initialiser();
        json_decode($json, true);

        $demandeContrats = $basededonnees->prepare('INSERT INTO position(longitude, latitude, id_endroit) VALUES(:longitude, :latitude, :id_endroit)'); //TODO déplacer dans positionSQL
        $demandeContrats->bindParam(':longitude', $json->longitude, PDO::PARAM_INT);
        $demandeContrats->bindParam(':latitude', $json->latitude, PDO::PARAM_INT);
        $demandeContrats->bindParam(':id_endroit', $json->id_endroit, PDO::PARAM_INT);
        $demandeContrats->execute();
    }
}