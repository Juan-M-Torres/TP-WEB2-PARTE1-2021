<?php

class modelGabinetes{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }

    function getGabinetes(){
        $query = $this->db->prepare('SELECT * FROM gabinetes');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function deleteGabinetes($id){
        
        $query=$this->db->prepare('DELETE FROM gabinetes WHERE id_gabinetes=?');
        $query->execute(array($id));
        
    }

    function agregarGabinete($marcaAgre,$nombreAgre,$gamerAgre){
        $query=$this->db->prepare('INSERT INTO gabinetes (marca,nombre,gamer) VALUE (?,?,?)');
        $query->execute(array($marcaAgre,$nombreAgre,$gamerAgre));
    }
    

      
}