<?php
class Room
{
    // Toutes les méthodes et propriétés nécessaires à la gestion des données de la tables rooms
    private $table = "rooms";
    private $connexion = null;

    // Les propritées de l'objet room
    public $id;
    public $number; 
    public $capacity;
    public $movie;


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
        $sql = "SELECT * FROM rooms ";

        // On éxecute la requête
        $req = $this->connexion->query($sql);

        // On retourne le resultat
        return $req;
    }
    public function create()
    {
        $sql = "INSERT INTO rooms(number,capacity,movie_id) VALUES(:number,:capacity,:movie)";

        // Préparation de la réqête
        $req = $this->connexion->prepare($sql);

        $req->bindValue(":number",$this->number);
        $req->bindValue(":capacity",$this->capacity);
        $req->bindValue(":movie",$this->movie);

        // éxecution de la reqête
        $re = $req->execute();
        if ($re) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $sql = "UPDATE $this->table SET number=:number, capacity=:capacity, movie_id=:movie WHERE id=:id";

       // Préparation de la réqête
       $req = $this->connexion->prepare($sql);

       $req->bindValue(":number",$this->number);
       $req->bindValue(":capacity",$this->capacity);
       $req->bindValue(":movie",$this->movie);

       // éxecution de la reqête
       $re = $req->execute();
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
