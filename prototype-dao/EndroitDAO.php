<?php
class EndroitDAO extends Connexion implements EndroitSQL{

    public static function listerEndroit(){

        $basededonnees = EndroitDAO::initialiser();
        $demandeContrats = $basededonnees->prepare('SELECT * FROM endroit');
        $demandeContrats->execute();
        $endroits = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($endroits as $endroit) $contrats[] = new Endroit($endroit);
        $json = json_encode($contrats);
        return $json;
    }


    public static function listerDetailEndroit($id){

        $basededonnees = EndroitDAO::initialiser();
        $demandeContrats = $basededonnees->prepare('SELECT * FROM endroit WHERE id = :id');
        $demandeContrats->bindParam(':id', $id, PDO::PARAM_INT);
        $demandeContrats->execute();
        $endroits = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($endroits as $endroit) $contrats[] = new Endroit($endroit);
        $json = json_encode($contrats);
        return $json;
    }
}