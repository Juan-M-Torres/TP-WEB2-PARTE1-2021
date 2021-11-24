<?php
    require_once "./libs/RouterClass.php";
    require_once "./controller/controllerKit.php";
    require_once "./controller/controllerGabinetes.php";
    require_once "./controller/controllerLogin.php";
    require_once "./controller/controllerAdministrador.php";

    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // Rutas Gabinetes
    $r->addRoute("home", "GET", "controllerGabinetes", "home");
    $r->addRoute("gabinetes", "GET","controllerGabinetes", "gabinetes");
    $r->addRoute("borrarGabinete/:ID", "GET", "controllerGabinetes", "borrarGabinete");
    $r->addRoute("agregarGabinete", "POST", "controllerGabinetes", "agregarGabinete");
    $r->addRoute("verKitsAsociados/:ID", "GET", "controllerGabinetes", "verKitsAsociados");
    $r->addRoute("editarGabinete/:ID", "GET", "controllerGabinetes", "editarGabinete");
    $r->addRoute("editGabinete", "POST", "controllerGabinetes", "editGabinete");
    $r->addRoute("verComentario/:ID", "GET", "controllerGabinetes", "mostrarComentarios");
    

    //Rutas Kit
    $r->addRoute("kit", "GET", "controllerKit", "kit");
    
    $r->addRoute("borrarKit/:ID", "GET", "controllerKit", "borrarKit");
    $r->addRoute("agregarKit", "POST", "controllerKit", "agregarKit");
    $r->addRoute("verMas/:ID", "GET", "controllerKit", "verMas");
    $r->addRoute("editarKit/:ID", "GET", "controllerKit", "editarKit");
    $r->addRoute("editKit", "POST", "controllerKit", "editKit");
    

    //Rutas Login
    $r->addRoute("login", "GET", "controllerLogin", "login");
    $r->addRoute("logout", "GET", "controllerLogin", "logout");
    $r->addRoute("verify", "POST", "controllerLogin", "verifyLogin");
    $r->addRoute("registrar", "GET", "controllerLogin", "formularioRegistro");
    $r->addRoute("registry", "POST", "controllerLogin", "registrarUsuario");

    //Rutas Administrador
    $r->addRoute("tablaAdmin", "GET", "controllerAdministrador", "tablaAdmin");
    $r->addRoute("hacerAdmin/:ID", "GET", "controllerAdministrador", "hacerAdmin");
    $r->addRoute("eliminarAdmin/:ID", "GET", "controllerAdministrador", "eliminarAdmin");
    $r->addRoute("eliminarUsuario/:ID", "GET", "controllerAdministrador", "eliminarUsuario");
    
    
    //Ruta por defecto.
    $r->setDefaultRoute("controllerGabinetes", "home");
    

    //Advance
    $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>


