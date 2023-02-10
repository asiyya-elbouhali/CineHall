<?php
// Les entêtes requises
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset= UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: * ");
 


require_once '../../config/Database.php';
require_once '../../models/Reservation.php';
 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // On instancie la base de données
    $database = new Database();
    $db = $database->getConnexion();

    // On instancie l'objet reservation
    $reservation = new Reservation($db);

    // On récupère les infos envoyées
    // $data = json_decode(file_get_contents("php://input"));
    if (!empty($_POST['movie'])  && !empty($_POST['date'])&& !empty($_POST['room'])&& !empty($_POST['seat'])) {
        // On hydrate l'objet reservation
        $reservation->movie = htmlspecialchars($_POST['movie']);
        $reservation->date = htmlspecialchars($_POST['date']);
        $reservation->room = htmlspecialchars($_POST['room']);
        $reservation->seat = htmlspecialchars($_POST['seat']);
        $reservation->client = htmlspecialchars($_POST['client']);

        $room = $_POST['room'];
        $seat = $_POST['seat'];
        $result = $reservation->create($room,$seat);
        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => "reservation ajouté avec sucès",
                                'success'=> true
                            ]);
        } else {
            http_response_code(503);
            echo json_encode(['message' => "L'ajout de la reservation a échoué",
                             'success'=> false
                            ]);
        }
    } else {
        echo json_encode(['message' => "Les données ne sont au complet"]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => "La méthode n'est pas autorisée"]);
}
