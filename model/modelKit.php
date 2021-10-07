<?php

class modelKit{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }

    function getKit(){
        $query = $this->db->prepare('SELECT * FROM kit');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function deleteKit($id){        
        $query=$this->db->prepare('DELETE FROM kit WHERE id_kit=?');
        $query->execute(array($id));
        }

    function addKit($dMicro,$dMother,$dRam,$dGamer,$dDescripcion){
        $query=$this->db->prepare('INSERT INTO kit(microprocesador,motherboard,ram,descripcion,id_gabinete) VALUE (?,?,?,?,?)');
        $query->execute(array($dMicro,$dMother,$dRam,$dDescripcion,$dGamer));
    }
    
    function VerKitAsociadosAgabinete($id){
        $query = $this->db->prepare('SELECT * FROM kit WHERE kit.id_gabinete = ?');
        $query->execute(array($id));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function obtenerDatosKit($id){
        $query = $this->db->prepare('SELECT * FROM kit JOIN gabinete ON (kit.id_gabinete = gabinete.id_gabinete) WHERE kit.id_kit =?');
        $query->execute(array($id));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function obtenerDatosDelKit($id){
        $query = $this->db->prepare('SELECT * FROM kit WHERE id_kit=?');
        $query->execute(array($id));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function editarElKit($editMicro,$editMother,$editRam,$editGamer,$editDescripcion,$editId){
        $query = $this->db->prepare('UPDATE kit SET microprocesador=?,motherboard=?,ram=?,descripcion=?,id_gabinete=? WHERE id_kit=?');
        $query->execute(array($editMicro,$editMother,$editRam,$editDescripcion,$editGamer,$editId));
    }
}