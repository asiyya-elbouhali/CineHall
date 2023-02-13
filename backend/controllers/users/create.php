<?php
// Les entêtes requises
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset= UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: * ");
 
require_once '../../config/Database.php';
require_once '../../models/User.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnexion();

    // On instancie l'objet user
    $user = new User($db);

  
    // On récupère les infos envoyées
    // $data = json_decode(file_get_contents("php://input"));
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password']))
    
     {
        $token = bin2hex(random_bytes(16));
        $user->nom = htmlspecialchars(strip_tags($_POST['nom']));
        $user->prenom = htmlspecialchars(strip_tags($_POST['prenom']));
        $user->email = htmlspecialchars(strip_tags($_POST['email']));
        $user->password = htmlspecialchars(strip_tags($_POST['password']));
        $user->token = $token;
 
        $result = $user->create($user->email,$user->token);
        
        if ($result) {

            http_response_code(201);
            echo json_encode([
                            'succes' => true,
                            'message' => "Login succeed!",
                            'token' => $token
                              ]);
        } else {
            // http_response_code(503);
            echo json_encode([
                'succes' => false,
                'message' => "You already have an account with this email!"
            ]);
        }
    } else {
        echo json_encode(['message' => "Les données ne sont au complet"]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => "La méthode n'est pas autorisée"]);
}




