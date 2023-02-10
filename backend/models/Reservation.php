<?php
class Reservation
{
    // Toutes les méthodes et propriétés nécessaires à la gestion des données de la tables etudiants
    private $table = "reservations";
    private $connexion = null;

    // Les propritées de l'objet etudiant
    public $id;
    public $movie; 
    public $room;
    public $seat;
    public $client;
    public $date;

    public function __construct($db)
    {
        if ($this->connexion == null) {
            $this->connexion = $db;
        }
    }

    // Lecture des étudiants

    public function readAll()
    {
        // On ecrit la requete
        $sql = "SELECT  reservations.*,
		rooms.number AS movieRoomReservation,
        movies.name AS movieReservation ,
        users.name AS clientReservation
	    FROM reservations
        INNER JOIN rooms
        ON reservations.id_room=rooms.id
        INNER JOIN movies
        ON reservations.id_movie=movies.id
        INNER JOIN users
        ON reservations.id_client=users.id";

        // On éxecute la requête
        $req = $this->connexion->query($sql);

        // On retourne le resultat
        return $req;
    }
    public function create($room,$seat)
    {
        $res = $this->getSeatsByRoom($room,$seat);
        if ($res){
            return false;
        } else{
        $sql = "INSERT INTO reservations (seat,date,id_movie,id_room,client_token) VALUES(:seat,:date,:movie,:room,:client)";

        // Préparation de la réqête
        $req = $this->connexion->prepare($sql);

        $req->bindValue(":seat",$this->seat);
        $req->bindValue(":date", $this->date);
        $req->bindValue(":movie", $this->movie);
        $req->bindValue(":room", $this->room);
        $req->bindValue(":client", $this->client);
          // éxecution de la reqête
          $re = $req->execute();
          if ($re) {
              return true;
          } else {
              return false;
          }
        }
    }


    





    public function getSeatsByRoom($room,$seat){
        $sql = "SELECT seat FROM reservations INNER JOIN rooms ON reservations.id_room= rooms.id WHERE rooms.id= '{$room}' AND reservations.seat='{$seat}'";

         // On éxecute la requête
         $req = $this->connexion->query($sql);
         return (bool)$req->rowCount();
         
     }


    public function update()
    {
        $sql = "UPDATE $this->table SET nom=:nom, prenom=:prenom, age=:age, niveau_id=:niveau_id WHERE id=:id";

        // Préparation de la réqête
        $req = $this->connexion->prepare($sql);

        // éxecution de la reqête
        $re = $req->execute([
            ":nom" => $this->nom,
            ":prenom" => $this->prenom,
            ":age" => $this->age,
            ":niveau_id" => $this->niveau_id,
            ":id" => $this->id
        ]);
        if ($re) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $req = $this->connexion->prepare($sql);

        $re = $req->execute(array(":id" => $this->id));

        if ($re) {
            return true;
        } else {
            return false;
        }
    }
}
