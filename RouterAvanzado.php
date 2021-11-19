<?php
        require_once "./libs/RouterClass.php";
        require_once "./controller/controllerKit.php";
        require_once "./controller/controllerGabinetes.php";
        require_once "./controller/controllerLogin.php";
        require_once "./controller/apiController.php";


    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "controllerGabinetes", "home");
    $r->addRoute("kit", "GET", "controllerKit", "kit");
    $r->addRoute("gabinetes", "GET","controllerGabinetes", "gabinetes");
    $r->addRoute("login", "GET", "controllerLogin", "login");
    $r->addRoute("verify", "POST", "controllerLogin", "verifyLogin");
    $r->addRoute("logout", "GET", "controllerLogin", "logout");
    $r->addRoute("registrar", "GET", "controllerLogin", "registrar");
    $r->addRoute("usuarios", "GET", "controllerLogin", "usuarios");

    //Eliminar
    $r->addRoute("borrarKit/:ID", "GET", "controllerKit", "borrarKit");
    $r->addRoute("borrarGabinete/:ID", "GET", "controllerGabinetes", "borrarGabinete");
    $r->addRoute("borrarUsuario/:ID", "GET", "controllerLogin", "borrarUsuario");

    //Agregar
    $r->addRoute("agregarGabinete", "POST", "controllerGabinetes", "agregarGabinete");
    $r->addRoute("agregarKit", "POST", "controllerKit", "agregarKit");
    $r->addRoute("registroUsuario", "POST", "controllerLogin", "registroUsuario");
    $r->addRoute("adminUsuario/:ID", "GET", "controllerLogin", "adminUsuario");
    $r->addRoute("colaboradorUsuario/:ID", "GET", "controllerLogin", "colaboradorUsuario");

    //Ver Detalles
    $r->addRoute("verKitsAsociados/:ID", "GET", "controllerGabinetes", "verKitsAsociados");
    $r->addRoute("verMas/:ID", "GET", "controllerKit", "verMas");
    $r->addRoute("verComentario/:ID", "GET", "controllerGabinetes", "verComentarios");

    //Editar
                //action o url       //metodo get o post //a que controller va     // nombre de la funcion que tiene que ir
    $r->addRoute("editarKit/:ID", "GET", "controllerKit", "editarKit");
    $r->addRoute("editKit", "POST", "controllerKit", "editKit");
    $r->addRoute("editarGabinete/:ID", "GET", "controllerGabinetes", "editarGabinete");
    $r->addRoute("editGabinete", "POST", "controllerGabinetes", "editGabinete");

    //ApiRest
    $r->addRoute("comentarios", "GET", "apiController", "Comentarios");
    $r->addRoute("comentarios/:ID", "GET", "apiController", "Comentario");
    $r->addRoute("comentarios", "POST", "apiController", "crearComentario");
    //$r->addRoute("comentarios/:ID", "DELETE", "apiController", "borrarComentario");

    //Ruta por defecto.
    $r->setDefaultRoute("controllerGabinetes", "home");

    //Advance
    $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>