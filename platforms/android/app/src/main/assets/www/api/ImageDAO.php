<?php
include_once 'secret/connexion.php';

class ImageDAO extends Connexion implements ImageSQL{

    public static function listerImage($idEndroit){

        $basededonnees = ImageDAO::initialiser();
        $demandeContrats = $basededonnees->prepare();
        $demandeContrats->bindParam(':id_endroit', $idEndroit, PDO::PARAM_INT);
        $demandeContrats->execute(ImageDAO::SQL_LISTER_IMAGE);
        $images = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
        $contrats = [];
        foreach($images as $image) $contrats[] = new Image($image);

        return $contrats;
    }

    public static function ajouterEndroit($image){

        $basededonnees = ImageDAO::initialiser();

        $demandeContrats = $basededonnees->prepare(ImageDAO::SQL_AJOUTER_IMAGE );
        $demandeContrats->bindParam(':image', $image->image, PDO::PARAM_STR);
        $demandeContrats->bindParam(':id_endroit', $image->id_endroit, PDO::PARAM_INT);
        $demandeContrats->execute();
    }
}