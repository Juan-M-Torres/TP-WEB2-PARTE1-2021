<?php
require_once "./libs/RouterClass.php";
require_once "./api/apiControllerComentarios.php";



$router = new Router();

//ApiRest
$router->addRoute("comentarios", "GET", "apiControllerComentarios", "obtenerComentarios");
$router->addRoute("comentarios/:ID", "GET", "apiControllerComentarios", "obtenerElComentario");
$router->addRoute("borrarComentario/:ID", "DELETE", "apiControllerComentarios", "deleteComentariosById");
$router->addRoute("comentarios", "POST", "apiControllerComentarios", "crearComentario");




 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 