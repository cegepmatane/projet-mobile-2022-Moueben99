<?php
include_once 'donnee/MembreDAO.php';
include_once 'modele/Membre.php';

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

$membre = new Membre($_POST);
$verifier = MembreDAO::verifierMembre($membre);
$json = null;

if(empty($verifier))
    $json = '{"membre":"false"}';
else if($verifier == true)
    $json ='{"membre":' . $verifier .'}';

echo $json;