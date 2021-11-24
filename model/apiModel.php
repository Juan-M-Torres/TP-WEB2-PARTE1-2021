<?php

class apiModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }

    function obtenerComentarios(){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios'); 
        $sentencia->execute(); 
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function obtenerComentario($id){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario=?'); 
        $sentencia->execute(array($id)); 
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function insertarComentario($id, $comentario, $puntaje){
        $sentencia = $this->db->prepare('INSERT INTO comentarios (id_comentario, comentario, puntaje) VALUE(?,?,?)');
        $sentencia->execute(array($id, $comentario, $puntaje));
    }

    /*function borrarComentarioDDBB($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id=?");
        $sentencia->execute(array($id));
    }

    function obtenerIdComentario($id){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id=?'); 
        $sentencia->execute(array($id)); 
        $tarea = $sentencia->fetch(PDO::FETCH_OBJ);
        return $tarea;
    }*/
}