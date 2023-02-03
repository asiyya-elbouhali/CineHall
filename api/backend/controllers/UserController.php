<?php

class UserController {

    public function __construct()
    {
        include('models/userModel.php');
    }
    public function create()
    {
        header('Access-Control-Allow-Origin:*');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Method: POST');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorisation');
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if($requestMethod == "POST"){
            $identifier = md5(rand());
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $password = md5($_POST['password']);
            $user = new user;
            $user->Creatuser($fullname,$identifier,$email,$password,$role);
            echo " User Created your identifier : ".$identifier;
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
            $user = new user;
            $usersList = $user->getuser();
            echo $usersList;
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
            $user = new user;
            $usersList = $user->getSingle($id);
            echo $usersList;
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
            $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
            $email = isset($_POST["email"]) ? $_POST["email"] : null;
            $role = isset($_POST["role"]) ? $_POST["role"] : null;
            $password = isset($_POST["password"]) ? md5($_POST["password"]) : null;
            $user = new user;
            $user->updateUser($id,$fullname,$email,$password,$role);
            echo " User updated";
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
            $user = new user;
            $user->deleteUser($id);
            echo " User deleted in id= ".$id;
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