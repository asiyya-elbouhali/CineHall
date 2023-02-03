<?php 
require("connection.php");
    class movies {
        function getmovies(){
            $test = new connection;
            $con = $test->connection();
            $response = array();
            if ($con) {
            $sql = "SELECT * FROM `movies`";
            $result = mysqli_query($con, $sql);
            if($result) {
                $x = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $response [$x]['id'] = $row['id'];
                    $response [$x]['title'] = $row['title'];
                    $response [$x]['image'] = $row['image'];
                    $response [$x]['description'] = $row['description'];
                    $x++;
                }
                return json_encode($response, JSON_PRETTY_PRINT);
            }
            }
        }
        function getSingle($id){
            $test = new connection;
            $con = $test->connection();
            $response = array();
            if ($con) {
            $sql = "SELECT * FROM `movies` WHERE id = $id";
            $result = mysqli_query($con, $sql);
            if($result) {
                $x = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $response [$x]['id'] = $row['id'];
                    $response [$x]['title'] = $row['title'];
                    $response [$x]['image'] = $row['image'];
                    $response [$x]['description'] = $row['description'];
                    $x++;
                }
                return json_encode($response, JSON_PRETTY_PRINT);
            }
            }
        }
        function creatmovies($title,$image,$description){
            $test = new connection;
            $conn = $test->connection();
            
            if($conn->connect_error){
                die('conection failed :'.$conn->connect_error);
                echo "error";
                }else{
                $sql="INSERT INTO `movies` (`title`,`image`,`description`) VALUES (?,?,?)";
                $resultat = $conn->prepare($sql);
                $resultat->bind_param("sss",$title,$image,$description);
                $resultat->execute() or die("Erreur lors de l'execution de la requete: ");
                echo "Success";
            }
        }
        function updatemovies($id,$title,$image,$description){
            $test = new connection;
            $conn = $test->connection();
            $sql="UPDATE `movies` SET `title` = '$title', `image` = '$image' , `description` = '$description ' WHERE `id` = $id ;";
            if($conn->connect_error){
               die('conection failed :'.$conn->connect_error);
               echo "error";
               }else{
                $resultat = $conn->prepare($sql);
                $resultat->execute() or die("Erreur lors de l'execution de la requete: ");
                echo "Success";
            }
    }
        function deletemovies($id){
            $test = new connection;
            $conn = $test->connection();
            if($conn->connect_error){
                die('conection failed :'.$conn->connect_error);
                echo "error";
            }else{
                 $sql = "DELETE FROM `movies` WHERE `movies`.`id` = ?";
                 $resultat = $conn->prepare($sql);
                 $resultat->bind_param("d",$id);
                 $resultat->execute() or die("Erreur lors de l'execution de la requete: ");
                 echo "Success:";
            }
        }
    }
?>