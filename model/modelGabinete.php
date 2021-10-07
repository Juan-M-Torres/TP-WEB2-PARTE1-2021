<?php

class modelGabinete{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }

    function getGabinetes(){
        $query = $this->db->prepare('SELECT * FROM gabinete');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function deleteGabinete($id){   
        $query=$this->db->prepare('DELETE FROM gabinete WHERE id_gabinete=?');
        $query->execute(array($id));  
    }

    function agregarGabinete($marcaAgre,$nombreAgre,$gamerAgre){
        $query=$this->db->prepare('INSERT INTO gabinete (marca,nombre,gamer) VALUE (?,?,?)');
        $query->execute(array($marcaAgre,$nombreAgre,$gamerAgre));
    }

    function seleccionarGabinete($id){
        $query=$this->db->prepare('SELECT * FROM gabinete WHERE id_gabinete=?');
        $query->execute(array($id));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function editarElgabinete($marcaEdit,$nombreEdit,$gamerEdit,$idEdit){
        $query = $this->db->prepare('UPDATE gabinete SET nombre=?,marca=?,gamer=? WHERE id_gabinete=?');
        $query->execute(array($marcaEdit,$nombreEdit,$gamerEdit,$idEdit));
    }    
}