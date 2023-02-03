<?php 
    class core {
        public function __construct()
        {
            include("controllers/UserController.php");
            include("controllers/hallsController.php");
            include("controllers/reservationsController.php");
            include("controllers/moviesController.php");

            if(isset($_GET['page'])){
                switch($_GET['page']){
                    case 'getUser' :
                        $get = new UserController;
                        $get->getAll();
                        break;
                    case 'getSingleUser' :
                        $getone = new UserController;
                        $getone->getSingle();
                        break;
                    case 'createUser' :
                        $create = new UserController;
                        $create->create();
                        break;
                    case 'deleteUser' :
                        $delete = new UserController;
                        $delete->delete();
                        break;
                    case 'updateUser' :
                        $update = new UserController;
                        $update->update();
                        break;
                    case 'getHall' :
                        $get = new hallsController;
                        $get->getAll();
                        break;
                    case 'getSingleHall' :
                        $getone = new hallsController;
                        $getone->getSingle();
                        break;
                    case 'createHall' :
                        $create = new hallsController;
                        $create->create();
                        break;
                    case 'deleteHall' :
                        $delete = new hallsController;
                        $delete->delete();
                        break;
                    case 'updateHall' :
                        $update = new hallsController;
                        $update->update();
                        break;  
                    case 'getReservation' :
                        $get = new reservationsController;
                        $get->getAll();
                        break;
                    case 'getSingleReservation' :
                        $getone = new reservationsController;
                        $getone->getSingle();
                        break;
                    case 'createReservation' :
                        $create = new reservationsController;
                        $create->create();
                        break;
                    case 'deleteReservation' :
                        $delete = new reservationsController;
                        $delete->delete();
                        break;
                    case 'updateReservation' :
                        $update = new reservationsController;
                        $update->update();
                        break;   
                    case 'getmovie' :
                        $get = new moviesController;
                        $get->getAll();
                        break;
                    case 'getSinglemovie' :
                        $getone = new moviesController;
                        $getone->getSingle();
                        break;
                    case 'createmovie' :
                        $create = new moviesController;
                        $create->create();
                        break;
                    case 'deletemovie' :
                        $delete = new moviesController;
                        $delete->delete();
                        break;
                    case 'updatemovie' :
                        $update = new moviesController;
                        $update->update();
                        break;
                    default :
                        echo "Please choose a valide requeste";
                        break;                             

                }
            }
        }
    }
?>