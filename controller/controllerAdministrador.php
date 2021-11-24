<?php
require_once "./view/viewAdmins.php";
require_once "./helpers/AuthHelper.php";
require_once "./model/modelAdministrador.php";


class controllerAdministrador{

private $view;
private $authHelper; 
private $modelAdministrador;

function __construct() {
    $this->view = new viewAdmins();//
    $this->authHelper = new AuthHelper();
    $this->modelAdministrador = new modelAdministrador();

        if(session_status() !== PHP_SESSION_ACTIVE){
        session_start();
        }
    }

    function tablaAdmin(){  
        $data = $this->modelAdministrador->getAdministradores($_SESSION["email_admin"]);
        $this->view->showAdministradores($data);
    }

    function eliminarUsuario($params = null){
        $this->authHelper->checkLoggedIn();
        $id = $params[':ID'];
        $this->modelAdministrador->deleteUsuario($id);
        $this->view->locationAdministrador();     
    }

    function hacerAdmin($params = null){
        $this->authHelper->checkLoggedIn();
        $admin = 1;
        $id = $params[':ID'];
        $this->modelAdministrador-> colocarOsacarAdmin($admin,$id);
        $this->view->locationAdministrador(); 
    }

    function eliminarAdmin($params = null){
        $this->authHelper->checkLoggedIn();
        $admin = 0;
        $id = $params[':ID'];
        $this->modelAdministrador-> colocarOsacarAdmin($admin,$id);
        $this->view->locationAdministrador(); 
    }
     
}
