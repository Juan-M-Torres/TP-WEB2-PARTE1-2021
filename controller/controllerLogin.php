<?php
require_once "./view/viewLogin.php";
require_once "./model/modelLogin.php";

class controllerLogin{
    private $model;
    private $view;

    function __construct() {
        $this->model = new modelLogin();
        $this->view = new viewLogin();
    }

    private function checkLoggedIn(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION["email"])){
            $this->view->showHome();
            die();
        }
     }

    function login(){
        $this->checkLoggedIn();
        $this->view->showLogin();
    }

   function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste");
        $this->view->showHome();
    }

    function verifyLogin(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $user = $this->model->verifyLoginModel($email);

            if($user && password_verify($password, $user->password)){

                session_start();
                $_SESSION['email'] = $email;
                $this->view->showHome();
            }else{
                $this->view->showLogin("Acceso denegado");
            }
        }
    }

    function registrar(){
        $this->view->viewRegistrar();
    }

    /*function registrarUsuario(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            session_start();
        }
        $this->model->insertUser($email, $password);
        $this->view->showLogin();
    }*/

    
}
