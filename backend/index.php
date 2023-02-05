<?php
require_once("./config/Database.php");
require_once(("./models/Movie.php"));

$data = new Database();
$con = $data->getConnexion();

$etudiant = new Movie($con);






?>

