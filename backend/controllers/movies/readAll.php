<?php
// Les entêtes requises
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset= UTF-8");
header("Access-Control-Allow-Methods: GET");
 
require_once '../../config/Database.php';
require_once '../../models/Movie.php';

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnexion();

    // On instancie l'objet etudiant
    $movie = new Movie($db);

    // Récupération des données
    $statement = $movie->readAll();
    $seatsReservation = $movie->getSeatsByRoom();

    if ($statement->rowCount() > 0) {

        $data = [   
            'movies'=>$statement->fetchAll(),
            'seatsReservation'=>$seatsReservation->fetchAll()
        ];


        // on renvoie ses données sous format json
        http_response_code(200);
        echo json_encode($data);
    } else {
        
        echo json_encode(["message" => "Aucune données à renvoyer"]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => "La méthode n'est pas autorisée"]);
}

