<?php
include_once 'Secret/Connexion.php';
include_once 'ImageSQL.php';

class ImageDAO extends Connexion implements ImageSQL{


    public static function listerImage($idEndroit){

        $basededonnees = ImageDAO::initialiser();
        $demandeContrats = $basededonnees->prepare(ImageDAO::SQL_LISTER_IMAGE);
        $demandeContrats->bindParam(':id_endroit', $idEndroit, PDO::PARAM_INT);
        $demandeContrats->execute();
        $images = $demandeContrats->fetch(PDO::FETCH_ASSOC);

        return $images;
    }

    public static function ajouterImage($image){

        $basededonnees = ImageDAO::initialiser();

        $demandeContrats = $basededonnees->prepare(ImageDAO::SQL_AJOUTER_IMAGE );
        $demandeContrats->bindParam(':image', $image, PDO::PARAM_STR);
        //$demandeContrats->bindParam(':id_endroit', $id, PDO::PARAM_INT);
        $demandeContrats->execute();
    }
}