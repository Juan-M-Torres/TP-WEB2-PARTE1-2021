<?php

class ApiModel{
    
    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }

    function getAll(){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios'); 
        $sentencia->execute(); 
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    function obtenerComentario($id_comentario){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario_gabinete=?'); 
        $sentencia->execute(array($id_comentario)); 
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    function deleteComentarioId($id_comentario){
        $query=$this->db->prepare('DELETE FROM comentarios WHERE id=?');
        $query->execute(array($id_comentario));
        return $query->rowCount();
    }

    function crearComentario($comentario,$puntaje,$id){
        $sentencia = $this->db->prepare('INSERT INTO comentarios (comentario, puntaje,id_comentario_gabinete) VALUE(?,?,?)');
        $sentencia->execute(array($comentario,$puntaje,$id));
        return $sentencia;
    }
}