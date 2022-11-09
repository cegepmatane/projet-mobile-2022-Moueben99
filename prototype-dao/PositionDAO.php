<?php
//TODO ajouter connexion
class PositionDAO extends Connexion implements PositionSQL{

    public static function listerPositionParEndroit($idEndroit){

        $basededonnees = PositionDAO::initialiser();

        $demandeContrats = $basededonnees->prepare('SELECT * FROM position WHERE id_endroit = :id_endroit'); //TODO déplacer dans positionSQL
        $demandeContrats->bindParam(':id_endroit', $idEndroit, PDO::PARAM_INT);
        $demandeContrats->execute();
        $positions = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($positions as $position) $contrats[] = new Position($position);

        $json = json_encode($contrats);
        return $json;
    }
}