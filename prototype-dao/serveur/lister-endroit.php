<?php

include 'donnee/EndroitDAO.php';
include 'donnee/ImageDAO.php';

if(isset($_SERVER["HTTP_ORIGIN"]))
{
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
}

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 600");  

if($_SERVER["REQUEST_METHOD"] == "OPTIONS")
{
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
        header("Access-Control-Allow-Methods: GET"); 

    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$endroitEnvoie = [];
$endroits = EndroitDAO::listerEndroit();
$i = -1;
//echo var_dump($endroits);

foreach ($endroits as $endroit)
{
    $image = ImageDAO::listerImage($endroit['id']);
    $endroit['image'] = $image['image'];
    $i += 1;
    $endroitEnvoie[$i] = $endroit;
}

//echo '</br></br>';
echo var_dump($endroitEnvoie);