<?php
// Les entêtes requises
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset= UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: * ");
 
// if(isset($_GET['username'])&&($_GET['key'])){
//     if($_GET['username'] == 'asiyya' && $_GET['key' == '1234']){
//         $data = ["name" => "Asiyya"];
//         $JSON_data = json_encode($data);
//         print_r($JSON_data);
//     }else{
//         $data = ["Message" => "Wrong key or username!"];
//         $JSON_data = json_encode($data);
//         print_r($JSON_data);
//     }
    
// }else{
//     $data = ['message'=>'You need an authentification to get the API!'];
//     $JSON_data = json_encode($data);
//     print_r($JSON_data);
// }



require_once '../config/Database.php';
require_once '../models/Etudiant.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnexion();

    // On instancie l'objet etudiant
    $etudiant = new Reservation($db);

    // On récupère les infos envoyées
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->nom) && !empty($data->prenom) && !empty($data->age) && !empty($data->niveau_id)) {
        // On hydrate l'objet etudiant
        $etudiant->nom = htmlspecialchars($data->nom);
        $etudiant->prenom = htmlspecialchars($data->prenom);
        $etudiant->age = htmlspecialchars($data->age);
        $etudiant->niveau_id = htmlspecialchars($data->niveau_id);

        $result = $etudiant->create();
        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => "étudiant ajouté avec sucès"]);
        } else {
            http_response_code(503);
            echo json_encode(['message' => "L'ajout de l'étudiant a échoué"]);
        }
    } else {
        echo json_encode(['message' => "Les données ne sont au complet"]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => "La méthode n'est pas autorisée"]);
}
