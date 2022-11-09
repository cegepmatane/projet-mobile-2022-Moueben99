<?php
class EndroitDAO extends Connexion implements EndroitSQL{

    public static function listerEndroit($idEndroit){

        $basededonnees = EndroitDAO::initialiser();
        $demandeContrats = $basededonnees->prepare('SELECT * FROM endroit WHERE id = :id');
        $demandeContrats->bindParam(':id', $idEndroit, PDO::PARAM_INT);
        $demandeContrats->execute();
        $endroits = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($endroits as $endroit) $contrats[] = new Endroit($endroit);
        $json = json_encode($contrats);
        return $json;
    }


    public static function listerDetailEndroit($detailEndroit){

        $basededonnees = EndroitDAO::initialiser();
        $demandeContrats = $basededonnees->prepare('SELECT * FROM endroit WHERE detail_endroit = :detail_endroit');
        $demandeContrats->bindParam(':detail_endroit', $detailEndroit, PDO::PARAM_INT);
        $demandeContrats->execute();
        $endroits = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($endroits as $endroit) $contrats[] = new Endroit($endroit);
        $json = json_encode($contrats);
        return $json;
    }
}