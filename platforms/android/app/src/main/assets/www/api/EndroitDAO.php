<?php

include_once 'secret/connexion.php';

class EndroitDAO extends Connexion implements EndroitSQL{

    public static function listerEndroit(){

        $basededonnees = EndroitDAO::initialiser();
        $demandeContrats = $basededonnees->prepare(EndroitDAO::SQL_LISTER_ENDROIT);
        $demandeContrats->execute();
        $endroits = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($endroits as $endroit) $contrats[] = new Endroit($endroit);

        return $contrats;
    }

    public static function listerDetailEndroit($id){

        $basededonnees = EndroitDAO::initialiser();
        $demandeContrats = $basededonnees->prepare(EndroitDAO::SQL_DETAIL_ENDROIT);
        $demandeContrats->bindParam(':id', $id, PDO::PARAM_INT);
        $demandeContrats->execute();
        $endroits = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($endroits as $endroit) $contrats[] = new Endroit($endroit);

        return $contrats;
    }

    public static function ajouterEndroit($endroit){

        $basededonnees = EndroitDAO::initialiser();

        $demandeContrats = $basededonnees->prepare(EndroitDAO::SQL_AJOUTER_ENDROIT);
        $demandeContrats->bindParam(':titre', $endroit->titre, PDO::PARAM_STR);
        $demandeContrats->bindParam(':description', $endroit->description, PDO::PARAM_STR);
        $demandeContrats->execute();
    }
}