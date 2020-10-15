<?php

require_once "./View/AdministradorView.php";
require_once "./Model/AdministradorModel.php";

class AdministradorController{

    private $view;
    private $model;
   
    function __construct(){

        $this->view = new AdministradorView();
        $this->model = new AdministradorModel();
    }

    //PAGINA DE INICIO DE SESIÓN
    function login(){
        
        $this->view->showLogin();
    }
   
    //DESCONECTARSE DE LA SESIÓN
    function Logout(){

        session_start();
        session_destroy();
        header("Location:" . LOGIN);
    }

    //VERIFICA SI EXISTE EL USUARIO
    function verifyAdmin(){

        $email = $_POST["input_email"];
        $pass = $_POST["input_pass"];

        if (isset($email)) {
            $userFromDB = $this->model->getAdministrador($email);
            if (isset($userFromDB) && $userFromDB) {
                if (password_verify($pass, $userFromDB->password)) {
                    session_start();
                    $_SESSION["EMAIL"] = $userFromDB->email;     
                    header("Location:" . BASE_URL . "home");
                }else {
                    $this->view->showLogin("contraseña incorrecta");
                }
            }else {
                $this->view->showLogin("el usuario no existe");
            }
        }
    }

    //VERIFICA SI HAY UN USUARIO LOGUEADO
    function checkLoggedIn(){
        if (session_status()!==PHP_SESSION_ACTIVE) {
            session_start();
        }
        if(!isset($_SESSION['EMAIL'])){
            return false;
        }else return true;
    }
    
}



?>