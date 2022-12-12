<?php
include_once 'donnee/ImageDAO.php';

if(isset($_SERVER["HTTP_ORIGIN"]))
{
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
}

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 600");  

if($_SERVER["REQUEST_METHOD"] == "OPTIONS")
{
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
        header("Access-Control-Allow-Methods: POST"); 

    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

error_log(print_r($_FILES, true));

if(isset($_FILES['files'])) {
    error_log('ici début');
    $errors = [];
    $chemin = '/var/www/services.mayal.systems/Images/';
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];

    $total_images = count($_FILES['files']['tmp_name']);

    for($i = 0; $i < $total_images; $i++){
        $image_nom = $_FILES['files']['name'][$i];
        $image_tmp = $_FILES['files']['tmp_name'][$i];
        $image_type = $_FILES['files']['type'][$i];
        $image_size = $_FILES['files']['size'][$i];
        $image_ext = strtolower(end(explode('.', $image_nom)));

        $image = $chemin . $image_nom;
        $fichier_images =  "http://services.mayal.systems/" . $image_nom;

        if (!in_array($image_ext, $extensions)) {
            $errors[] = 'Extension not allowed: ' . $image_nom . ' ' . $image_type;
        }
        
        if ($image_size > 2097152) {
            $errors[] = 'File size exceeds limit: ' . $image_nom . ' ' . $image_type;
        }

        if(empty($errors)){
            error_log('ici sans erreurs');
            ImageDAO::ajouterImage($fichier_images);
            move_uploaded_file($image_tmp, $image);
        }
    }

    if ($errors) print_r($errors);
}