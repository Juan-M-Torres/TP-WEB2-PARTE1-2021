<?php

class authHelper{
 

    function __construct(){
    
    }

    function checkLoggedIn(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if(!isset($_SESSION['email'])){
            header("Location: ".BASE_URL."home");
        }
    }

}