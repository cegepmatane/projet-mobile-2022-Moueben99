<?php
session_start();
$_SESSION ['id'] = null;
$_SESSION['pseudo'] = null;
$_SESSION['nom'] = null;
$_SESSION['courriel'] = null;

header("Location: https://blog.mayal.systems/index.php");