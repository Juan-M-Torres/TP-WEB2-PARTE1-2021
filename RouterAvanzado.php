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
    $r->addRoute("gabinetes", "GET","controllerGabinetes", "gabinetes");

    //Elimar
    $r->addRoute("borrarComponentes/:ID", "GET", "controllerComponentes", "borrarComponente");
    $r->addRoute("borrarGabinetes/:ID", "GET", "controllerGabinetes", "borrarGabinetes");

    //Agregar
    $r->addRoute("agregarGabinetes", "POST", "controllerGabinetes", "agregarGabinetes");
    $r->addRoute("agregarComponentes", "POST", "controllerComponentes", "agregarComponentes");

    //Ver Detalles
    $r->addRoute("verComponentesAsociados/:ID", "GET", "controllerGabinetes", "verComponentesAsociados");
    $r->addRoute("verMas/:ID", "GET", "controllerComponentes", "verMas");

    //Editar
                //action o url       //metodo get o post //a que controller va     // nombre de la funcion que tiene que ir
    $r->addRoute("editarComponente/:ID", "GET", "controllerComponentes", "editarComponente");
    $r->addRoute("editComponente", "POST", "controllerComponentes", "editComponente");
    $r->addRoute("editarGabinete/:ID", "GET", "controllerGabinetes", "editarGabinete");
    $r->addRoute("editGabinete", "POST", "controllerGabinetes", "editGabinete");

    //Ruta por defecto.
    $r->setDefaultRoute("controllerComponentes", "home");
    $r->setDefaultRoute("controllerGabinetes", "home");

    //Advance
    $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>