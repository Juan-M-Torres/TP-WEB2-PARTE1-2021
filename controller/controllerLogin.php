<?php
    require_once "./view/viewLogin.php";
    require_once "./model/modelLogin.php";
    require_once "./helpers/AuthHelper.php";

class controllerLogin{
    private $model;
    private $view;
    private $authHelper; 

    function __construct() {
        $this->model = new modelLogin();
        $this->view = new viewLogin();
        $this->authHelper = new AuthHelper();
    }

    

    function login(){
        $this->view->showLogin();
    }

   function logout(){
       session_start();
        session_destroy();
        $this->view->showLoginLocation();
    }

    function verifyLogin(){
        $data = $this->authHelper->sessionStarted();
        if($data == false){
            if(!empty($_POST['email'])&& !empty($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                if(isset($email)){
                    $user = $this->model->verifyLoginModel($email);
                    if(isset($user)&& $user){
                        if($user && password_verify($password, $user->password)){
                            if($user->admin == 1){
                                session_start();
                                $_SESSION['email_admin'] = $email;
                                header("Location: ".BASE_URL);
                                
                            }else if($user->admin == 0){
                                session_start();
                                $_SESSION['email'] = $email;
                                header("Location: ".BASE_URL);
                            }
                            
                        }else{
                            $this->view->showLogin("Contraseña incorrrecta");
                        }
                    }else{
                        $this->view->showLogin("El usuario no existe");
                    }
                }
            }else{
                $this->view->showLogin("Ingrese los datos obligatorios");
            }
        }else{
            $this->view->showHome();
        }
        
    }
    

    function formularioRegistro(){
        $this->view->showRegistrar();
    }

    
    function registrarUsuario(){
        $data = $this->authHelper->sessionStarted();
        if($data == false){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model->verifyLoginModel($email);
            if($user){
            $this->view->showRegistrar("El usuario ingresado ya existe");    
            }else{
                if(strlen($password)>=6){
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $this->model->insertUser($email, $password);
                    session_start();
                    $_SESSION['email'] = $email;
                    $this->view->showHome();
                }else{
                    $this->view->showRegistrar("La contraseña debe ser mayor a 6 caracteres");
                }
            }  
            
        }
        }else{
            $this->view->showHome();
        }
    }

    
}
