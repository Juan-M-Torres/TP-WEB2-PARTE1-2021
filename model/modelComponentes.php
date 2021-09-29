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

    function addComponente($dMicro,$dMother,$dRam,$dGamer,$dDescripcion){
        $query=$this->db->prepare('INSERT INTO componentes(microprocesador,motherboard,ram,descripcion,fk_gabinetes) VALUE (?,?,?,?,?)');
        $query->execute(array($dMicro,$dMother,$dRam,$dDescripcion,$dGamer));
    }
    
    function VerComponentesAsociadosAgabinete($id){
        $query = $this->db->prepare('SELECT * FROM componentes WHERE componentes.fk_gabinetes = ?');
        $query->execute(array($id));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function obtenerDatosComponentes($id){
        $query = $this->db->prepare('SELECT * FROM componentes JOIN gabinetes ON (componentes.fk_gabinetes = gabinetes.id_gabinetes) WHERE componentes.id_componentes =?');
        $query->execute(array($id));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }
}