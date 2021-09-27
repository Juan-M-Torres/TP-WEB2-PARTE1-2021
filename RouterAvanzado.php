<?php
        require_once "./libs/smarty/libs/RouterClass.php";
        require_once "./controller/controllerComponentes.php";
        require_once "./controller/controllerGabinetes.php";


    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "controllerComponentes", "home");
    $r->addRoute("componentes", "GET", "controllerComponentes", "componentes");
    $r->addRoute("borrarComponentes/:ID", "GET", "controllerComponentes", "borrarComponente");
    $r->addRoute("gabinetes", "GET","controllerGabinetes", "gabinetes");
    $r->addRoute("borrarGabinetes/:ID", "GET", "controllerGabinetes", "borrarGabinetes");

    //Ruta por defecto.
    $r->setDefaultRoute("controllerComponentes", "home");
    $r->setDefaultRoute("controllerGabinetes", "home");

    //Advance
    $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>