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
        if(isset($_SESSION['rol'])){
            if($_SESSION['rol'] == 1){
                $this->smarty->assign('admin', $_SESSION['rol']);
            }else{
                $this->smarty->assign('usuario', $_SESSION['rol']);
            }
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

    function viewRegistro(){
        $this->smarty->assign('titulo', 'Registrate');
        $this->smarty->display('templates/registro.tpl');
    }

    function mostrarUsuarios($users){
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/usuarios.tpl');
    }
    
    function showMessage($message = null){
        $this->smarty->assign('message', $message);
        $this->smarty->display('templates/message.tpl');
    }
    
}