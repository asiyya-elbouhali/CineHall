<?php
class Movie
{
    // Toutes les méthodes et propriétés nécessaires à la gestion des données de la tables etudiants
    private $table = "movies";
    private $connexion = null;

    // Les propritées de l'objet etudiant
    public $id;
    public $nom; 
    public $prix;
    public $image;
    public $description;
    public $trailler;

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
        $sql = "SELECT * FROM movies";

        // On éxecute la requête
        $req = $this->connexion->query($sql);

        // On retourne le resultat
        return $req;
    }
    public function create()
    {
        $sql = "INSERT INTO movies(name,price,image,trailer,description) VALUES(:nom,:prix,:image,:trailler,:description)";

        // Préparation de la réqête
        $req = $this->connexion->prepare($sql);
      
        $req->bindValue(":nom",$this->nom);
        $req->bindValue(":prix", $this->prix);
        $req->bindValue(":image", $this->image);
        $req->bindValue(":trailler", $this->trailler);
        $req->bindValue(":description", $this->description);
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
