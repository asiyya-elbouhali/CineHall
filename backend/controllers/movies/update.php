<?php
// Les entêtes requises
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset= UTF-8");
header("Access-Control-Allow-Methods: PUT");

require_once '../config/Database.php';
require_once '../models/Etudiant.php';

if ($_SERVER['REQUEST_METHOD'] === "PUT") {
    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnexion();

    // On instancie l'objet etudiant
    $etudiant = new Movie($db);

    // On récupère les infos envoyées
    $data = json_decode(file_get_contents("php://input"));

    if (!empty($data->id) && !empty($data->nom) && !empty($data->prenom) && !empty($data->age) && !empty($data->niveau_id)) {
        // On hydrate l'objet etudiant
        $etudiant->id = intval($data->id);
        $etudiant->nom = htmlspecialchars($data->nom);
        $etudiant->prenom = htmlspecialchars($data->prenom);
        $etudiant->age = htmlspecialchars($data->age);
        $etudiant->niveau_id = htmlspecialchars($data->niveau_id);

        $result = $etudiant->update();
        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => "étudiant a été modifié avec sucès"]);
        } else {
            http_response_code(503);
            echo json_encode(['message' => "La modification de l'étudiant a échoué"]);
        }
    } else {
        echo json_encode(['message' => "Les données ne sont au complet"]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => "La méthode n'est pas autorisée"]);
}
