<?php

    require_once './model/ApiModel.php';
    require_once 'api/apiController.php';

class apiControllerComentarios extends ApiController{


    function __construct(){
        parent::__construct();
        $this->view = new ApiView(); 
        $this->model = new ApiModel();
    }

    public function obtenerComentarios(){
        $obtener = $this->model-> getAll();
        $this->view->response($obtener,200);
    }

    public function obtenerElComentario($params = null){
        $id_comentario = $params[':ID'];
        $dato = $this->model->obtenerComentario($id_comentario);
        $this->view->response($dato,200); 
    }

    public function deleteComentariosById($params = null){
        $id_comentario = $params[':ID'];
        $result =  $this->model->deleteComentarioId($id_comentario);
        if ($result > 0) {
            $this->apiView->response("el comentario con el id=$id_comentario fue eliminada", 200);
        }
        else{
            $this->apiView->response("el comentario con el id=$id_comentario no existe", 404);
        }
    }
   public function crearComentario($params = null){
        $body = $this->getData();
        $comentario = $body->comentario;
        $puntaje = $body->puntaje;
        $id = $body->id_comentario;
        $id_dato = $this->model->crearComentario($comentario,$puntaje,$id);
        if (!empty($id_dato)) {
            $this->view->response("el comentario fue agregado con exito", 200);
        }
        else{
            $this->view->response("el comentario no se pudo insertar", 404);
        }
    }
}
