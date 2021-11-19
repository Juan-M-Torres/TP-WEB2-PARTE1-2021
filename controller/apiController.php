<?php
require_once "./model/apiModel.php";
require_once "./view/apiView.php";

class apiController{
    private $model;
    private $view;
    function __construct(){
        $this->model = new apiModel();
        $this->view = new apiView();
    }


     function Comentarios($params = null){
        $comentario = $this->model->obtenerComentarios();
        return $this->view->response($comentario, 200);    
    }
        
    function Comentario($params = null){
        $id = $params[':ID'];
        $comentario = $this->model->obtenerComentario($id);
        $cant = count($comentario);
        if($comentario){
            for ($i=0; $i < $cant ; $i++) { 
                return $this->view->response($comentario, 200);
            }   
        }else{
            return $this->view->response("El id= $id no tiene comentarios", 404);
        }
    }

    function crearComentario(){
        $body = $this->getBody();
        if(isset($body->id_comentario) && isset($body->comentario) && isset($body->puntaje)){
            $id = $this->model->insertarComentario($body->id_comentario, $body->comentario, $body->puntaje);
            if($id != 0){
                $this->view->response("El comentario de inserto con el id=$id", 200);    
            } else{
                $this->view->response("No se pudo insertar", 500);
            }
        }else{
            $this->view->response("Faltan datos", 400);
        }
    }

    private function getBody(){
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }

    /*function borrarComentario($params = null){
        $id = $params[':ID'];
        $comentario = $this->model->obtenerIdComentario($id);
        if($comentario){
            $this->model->borrarComentarioDDBB($id);
            return $this->view->response("El comentario con el id=$id fue borrado", 200);
        }else{
            $this->view->response("El comentario con id=$id no existe", 404);
        }   
    }*/
}