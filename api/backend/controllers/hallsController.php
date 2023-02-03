<?php

class hallsController {

    public function __construct()
    {
        include('models/hallsModel.php');
    }
    public function create()
    {
        header('Access-Control-Allow-Origin:*');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Method: POST');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == "POST"){
            $label = $_POST['label'];
            $movie = $_POST['movie'];
            $halls = new halls;
            $halls->Creathalls($label,$movie);
        }else{
            $data = [
            'status' => 405,
            'message' => $requestMethod. 'Method Not Allowed',
            ];
            header("HTTP/1.0 405 Method Not Allowed");
            echo json_encode($data);
        }
    }
    public function getAll()
    {
        header('Access-Control-Allow-Origin:*');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Method: GET');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == "GET"){
            $halls = new halls;
            $hallssList = $halls->gethalls();
            echo $hallssList;
        }else{
            $data = [
            'status' => 405,
            'message' => $requestMethod. 'Method Not Allowed',
            ];
            header("HTTP/1.0 405 Method Not Allowed");
            echo json_encode($data);
        }
    }
    public function getSingle()
    {
        header('Access-Control-Allow-Origin:*');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Method: POST');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == "POST"){
            $id = $_POST['id'];
            $halls = new halls;
            $hallssList = $halls->getSingle($id);
            echo $hallssList;
        }else{
            $data = [
            'status' => 405,
            'message' => $requestMethod. 'Method Not Allowed',
            ];
            header("HTTP/1.0 405 Method Not Allowed");
            echo json_encode($data);
        }
    }
    public function update()
    {
        header('Access-Control-Allow-Origin:*');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Method: POST');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == "POST"){
            $id = $_POST['id'];
            $label = isset($_POST["label"]) ? $_POST["label"] : null;
            $movie = isset($_POST["movie"]) ? $_POST["movie"] : null;
            $halls = new halls;
            $halls->updatehalls($id,$label,$movie);
            echo " halls updated";
        }else{
            $data = [
            'status' => 405,
            'message' => $requestMethod. 'Method Not Allowed',
            ];
            header("HTTP/1.0 405 Method Not Allowed");
            echo json_encode($data);
        }
    }
    public function delete()
    {
        header('Access-Control-Allow-Origin:*');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Method: POST');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == "POST"){
            $id = $_POST['id'];
            $halls = new halls;
            $halls->deletehalls($id);
            echo " halls deleted in id= ".$id;
        }else{
            $data = [
            'status' => 405,
            'message' => $requestMethod. 'Method Not Allowed',
            ];
            header("HTTP/1.0 405 Method Not Allowed");
            echo json_encode($data);
        }
    }
}        