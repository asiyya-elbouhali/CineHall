<?php
class User
{
    // Toutes les méthodes et propriétés nécessaires à la gestion des données de la tables etudiants
    private $table = "users";
    private $connexion = null;

    // Les propritées de l'objet etudiant
    // public $id;
    public $nom;
    public $prenom;
    public $email;
    public $password;
    public $token;


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
        $sql = "SELECT * FROM users ";

        // On éxecute la requête
        $req = $this->connexion->query($sql);

        // On retourne le resultat
        return $req;
    }

    public function create($mail,$token)
    {
        $res = $this->findUserByEmail($mail);
        if ($res) {
            return false;
        } else {
            $sql = "INSERT INTO users (name,lastName,email,password,token) VALUES(:nom,:prenom,:email,:password,:token)";

            // Préparation de la réqête
            $req = $this->connexion->prepare($sql);
            $req->bindValue(":token", $token);
            $req->bindValue(":nom", $this->nom);
            $req->bindValue(":prenom", $this->prenom);
            $req->bindValue(":email", $this->email);
            $req->bindValue(":password", $this->password);
            // éxecution de la reqête
            $res = $req->execute();
            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function findUserByEmail($email)
    {
        // On ecrit la requete
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        // On éxecute la requête
        $req = $this->connexion->query($sql);
        return (bool)$req->rowCount();
    }

    public function findUserByToken($token)
    {
        // On ecrit la requete
        $sql = "SELECT * FROM users WHERE token = '$token'";

        // On éxecute la requête
        $req = $this->connexion->query($sql);
        
        return (bool)$req->rowCount();
    }
 


    public function delete()
    {
        $sql = "DELETE FROM $this->table WHERE token = :token";
        $req = $this->connexion->prepare($sql);

        $re = $req->execute(array(":token" => $this->token));

        if ($re) {
            return true;
        } else {
            return false;
        }
    }
}
