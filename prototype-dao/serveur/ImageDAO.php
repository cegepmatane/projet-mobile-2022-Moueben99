<?php

class ImageDAO extends Connexion implements ImageSQL{

public static function listerImage($idEndroit){

    $basededonnees = ImageDAO::initialiser();
    $demandeContrats = $basededonnees->prepare('SELECT * FROM image WHERE id_endroit = :id_endroit');
    $demandeContrats->bindParam(':id_endroit', $idEndroit, PDO::PARAM_INT);
    $demandeContrats->execute();
    $images = $demandeContrats->fetchAll(PDO::FETCH_ASSOC);
    $contrats = [];
    foreach($images as $image) $contrats[] = new Image($image);

    return $contrats;
}

public static function ajouterEndroit($image){

    $basededonnees = ImageDAO::initialiser();

    $demandeContrats = $basededonnees->prepare('INSERT INTO image(image, id_endroit) VALUES(:image, :id_endroit)');
    $demandeContrats->bindParam(':image', $image->image, PDO::PARAM_STR);
    $demandeContrats->bindParam(':id_endroit', $image->id_endroit, PDO::PARAM_INT);
    $demandeContrats->execute();
}
}