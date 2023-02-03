<?php 
require("connection.php");
    class reservation {
        function getreservation(){
            $test = new connection;
            $con = $test->connection();
            $response = array();
            if ($con) {
            $sql = "SELECT * FROM `reservations`";
            $result = mysqli_query($con, $sql);
            if($result) {
                $x = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $response [$x]['id'] = $row['id'];
                    $response [$x]['costumer'] = $row['costumer'];
                    $response [$x]['seat'] = $row['seat'];
                    $response [$x]['hall'] = $row['hall'];
                    $response [$x]['date'] = $row['date'];
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
            $sql = "SELECT * FROM `reservations` WHERE id = $id";
            $result = mysqli_query($con, $sql);
            if($result) {
                $x = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $response [$x]['id'] = $row['id'];
                    $response [$x]['costumer'] = $row['costumer'];
                    $response [$x]['seat'] = $row['seat'];
                    $response [$x]['hall'] = $row['hall'];
                    $response [$x]['date'] = $row['date'];
                    $x++;
                }
                return json_encode($response, JSON_PRETTY_PRINT);
            }
            }
        }
        function creatreservation($costumer,$seat,$hall,$date){
            $test = new connection;
            $conn = $test->connection();
            
            if($conn->connect_error){
                die('conection failed :'.$conn->connect_error);
                echo "error";
                }else{
                $sql="INSERT INTO `reservations` (`costumer`,`seat`, `hall`,`date`) VALUES (?,?,?,?)";
                $resultat = $conn->prepare($sql);
                $resultat->bind_param("ddds",$costumer,$seat,$hall,$date);
                $resultat->execute() or die("Erreur lors de l'execution de la requete: ");
                echo "Success:";
            }
        }
        function updatereservation($id,$costumer,$seat,$hall,$date){
            $test = new connection;
            $conn = $test->connection();
            $sql="UPDATE `reservations` SET `costumer` = '$costumer', `seat` = '$seat', `hall` = '$hall' , `date` = '$date'  WHERE `reservations`.`id` = $id;";
            if($conn->connect_error){
               die('conection failed :'.$conn->connect_error);
               echo "error";
               }else{
                $resultat = $conn->prepare($sql);
                $resultat->execute() or die("Erreur lors de l'execution de la requete: ");
                echo "Success:";
            }
    }
        function deletereservation($id){
            $test = new connection;
            $conn = $test->connection();
            if($conn->connect_error){
                die('conection failed :'.$conn->connect_error);
                echo "error";
            }else{
                 $sql = "DELETE FROM `reservations` WHERE `reservations`.`id` = ?";
                 $resultat = $conn->prepare($sql);
                 $resultat->bind_param("d",$id);
                 $resultat->execute() or die("Erreur lors de l'execution de la requete: ");
                 echo "Success:";
            }
        }
    }
?>