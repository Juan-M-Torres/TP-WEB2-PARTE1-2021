<?php

class modelComponentes{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }

    function getComponentes(){
        $query = $this->db->prepare('SELECT * FROM componentes');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function deleteComponente($id){
        
        $query=$this->db->prepare('DELETE FROM componentes WHERE id_componentes=?');
        $query->execute(array($id));
        }
}