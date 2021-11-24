<?php

class modelAdministrador{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }
       
    function getAdministradores($data){
            $query = $this->db->prepare('SELECT * FROM user WHERE email<>?');
            $query->execute(array($data));
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
    }

    function getUsuarioById($nombre){
        $query= $this->db->prepare('SELECT * FROM user WHERE id_usuario=?');
        $query->execute(array($nombre));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function deleteUsuario($id){  
        $query=$this->db->prepare('DELETE FROM user WHERE id_usuario=?');
        $query->execute(array($id));  
    }
    
    function colocarOsacarAdmin ($admin,$id){
        $query=$this->db->prepare('UPDATE user SET admin=? WHERE id_usuario=?');
        $query->execute(array($admin,$id));
    }

    
}
