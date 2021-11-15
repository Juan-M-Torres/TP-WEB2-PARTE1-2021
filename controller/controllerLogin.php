<?php
require_once "./view/viewLogin.php";
require_once "./model/modelLogin.php";
require_once "./helpers/authHelper.php";

class controllerLogin{
    private $model;
    private $view;
    private $authHelper;

    function __construct() {
        $this->model = new modelLogin();
        $this->view = new viewLogin();
        $this->authHelper = new authHelper();
    }

    function login(){
        $this->view->showLogin();
    }

   function logout(){
        session_start();
        session_destroy();
        $this->view->showHome();
    }

    function verifyLogin(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $user = $this->model->verifyLoginModel($email);
            $rol = $user->id_rol;
            if($user && password_verify($password, $user->password)){

                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['rol'] = $rol;
                $this->view->showHome();
            }else{
                $this->view->showLogin("Acceso denegado");
            }
        }
    }

    function registrar(){
        $this->view->viewRegistro();
    }

    function registroUsuario(){
        if(!empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['rol'])){
            $email = $_POST['email'];
            $rol = $_POST['rol'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }
        $this->model->insertUser($email, $password, $rol);
        $this->verifyLogin();
    }   

    function usuarios(){
        $this->authHelper->checkLoggedIn();

        $users = $this->model->usersDDBB();
        $this->view->mostrarUsuarios($users);
    }

    function borrarUsuario($params = null){
        $this->authHelper->checkLoggedIn();

        $id = $params[':ID'];
        $this->model->borrarUsuarioDDBB($id);
        $this->view->showMessage("Has borrado al usuario con id: $id");
    }

    function adminUsuario($params = null){
        $this->authHelper->checkLoggedIn();

        $id = $params[':ID'];
        $this->model->adminUsuarioDDBB($id);
        $this->view->showMessage("Has hecho admin al usuario con id: $id");
    }

    function colaboradorUsuario($params = null){
        $this->authHelper->checkLoggedIn();

        $id = $params[':ID'];
        $this->model->colaboradorUsuarioDDBB($id);
        $this->view->showMessage("Has hecho colaborador al usuario con id: $id");
    }
    
}
