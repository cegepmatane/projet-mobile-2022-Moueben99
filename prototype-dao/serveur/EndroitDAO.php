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