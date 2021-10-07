<?php
require_once "./libs/smarty/libs/Smarty.class.php";

class viewLogin{
    private $smarty;

     function __construct(){
        $this->smarty = new Smarty();
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['email'])){
            $this->smarty->assign('nombre', $_SESSION['email']);
        }       
    }

    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }
    
    function showLogin($error = ""){
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }  
    function showHome(){
        header("Location: ".BASE_URL."home");
    }

    function viewRegistrar(){
        $this->smarty->display('templates/registro.tpl');
    }
}