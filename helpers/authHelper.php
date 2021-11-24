<?php

class AuthHelper{

    public function sessionStarted(){
        if(!isset($_SESSION)){
            session_start();
        }
        
        if(isset($_SESSION['email']) || isset($_SESSION['email_admin'])){
            return true;
        }else{
            return false;
        }
            
    }

    public function retornarUsuario(){
        if(isset($_SESSION['email']) || isset($_SESSION['email_admin'])){
           $user = $_SESSION['email_admin'];
            return $user;
        }
    }

    function checkLoggedIn(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        
        }
        if(!isset($_SESSION["email_admin"])){
            header("Location: ".BASE_URL."login");
        }
    }

    function logout(){
        session_start();
        session_destroy();
        $this->showHomeLocation();
    }

    function showHomeLocation(){
        header("Location: " . BASE_URL . "home");
    }

}