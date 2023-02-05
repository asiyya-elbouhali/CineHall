<?php
// Les entêtes requises
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset= UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: * ");
 

require_once '../../config/Database.php';
require_once '../../models/Room.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnexion();

    // On instancie l'objet room
    $room = new Room($db);

    // On récupère les infos envoyées
    // $data = json_decode(file_get_contents("php://input"));
    if (!empty($_POST['number']) && !empty($_POST['capacity']) && !empty($_POST['movie']) ) {
        // On hydrate l'objet room
        $room->number = htmlspecialchars($_POST['number']);
        $room->capacity = htmlspecialchars($_POST['capacity']);
        $room->movie = htmlspecialchars($_POST['movie']);

        $result = $room->create();
        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => "chambre ajouté avec sucès"]);
        } else {
            http_response_code(503);
            echo json_encode(['message' => "L'ajout de la chambre a échoué"]);
        }
    } else {
        echo json_encode(['message' => "Les données ne sont au complet"]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => "La méthode n'est pas autorisée"]);
}
