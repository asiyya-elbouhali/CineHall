<?php
// Les entêtes requises
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset= UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: * ");

require_once '../../config/Database.php';
require_once '../../models/Movie.php';



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnexion();

    // On instancie l'objet movie
    $movie = new Movie($db);  

    // On récupère les infos envoyées

    // $data = json_decode(file_get_contents("php://input"));

    if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['image']) && !empty($_POST['description']) && !empty($_POST['trailler'])) {


//         // $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//         $target_dir = "../../../frontend/uploads/";
//         $target_file = $target_dir . basename($_FILES["image"]["name"]);
//         if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//             $image = "uploads/" . $_FILES["image"]["name"];

// }



        // On hydrate l'objet movie
        $movie->nom = htmlspecialchars($_POST['nom']);
        $movie->prix = htmlspecialchars($_POST['prix']);
        $movie->image = htmlspecialchars($_POST['image']);
        $movie->description = htmlspecialchars($_POST['description']);
        $movie->trailler = htmlspecialchars($_POST['trailler']);


        $result = $movie->create();
        if ($result) {
            http_response_code(201); //201 Created
            echo json_encode(['message' => "étudiant ajouté avec succès"]);
        } else {
            http_response_code(503); // 503 Service Unavailable
            echo json_encode(['message' => "L'ajout de l'étudiant a échoué"]);
        }
    } else {
        
        var_dump($_POST);
        echo json_encode(['message' => "Les données ne sont au complet"]);
        
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => "La méthode n'est pas autorisée"]);
}
