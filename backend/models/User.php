<?php
class User
{
    // Toutes les méthodes et propriétés nécessaires à la gestion des données de la tables etudiants
    private $table = "users";
    private $connexion = null;

    // Les propritées de l'objet etudiant
    public $id;
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

    public function create( $mail)
    {
        $res=$this->findUserByEmail($mail);
        if($res){
            return false;

        }else{

        $token = bin2hex(random_bytes(16));
        $sql = "INSERT INTO users (name,lastName,email,password,token) VALUES(:nom,:prenom,:email,:password,:token)";

        // Préparation de la réqête
        $req = $this->connexion->prepare($sql);
        $req->bindValue(":token", $token);
        $req->bindValue(":nom", $this->nom );
        $req->bindValue(":prenom", $this->prenom);
        $req->bindValue(":email", $this->email);
        $req->bindValue(":password", $this->password);

        // éxecution de la reqête
        $re = $req->execute();
        if ($re) {
            
                        return true;
        } else {
            return false;
        }
    }

    } 
    public function findUserByEmail($email){
        $sql = ("SELECT * FROM users WHERE email = :email");

        $req = $this->connexion->prepare($sql);
        $req->bindValue (':email', $email);
  
        $req = $this->connexion->query($sql);
  
        //Check Rows
        if($this->$req){
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