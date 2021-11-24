<?php
class modelLogin{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_computadoras;charset=utf8', 'root', '');
    }

    function verifyLoginModel($email){
        $query = $this->db->prepare("SELECT * FROM user WHERE email=?");
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insertUser($email, $password, $rol){
        $query = $this->db->prepare('INSERT INTO user (email, password, id_rol) VALUES (?, ?, ?)');
        $query->execute(array($email, $password, $rol));
    }

    function usersDDBB(){
        $query = $this->db->prepare('SELECT * FROM user');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function borrarUsuarioDDBB($id){
        $query = $this->db->prepare("DELETE FROM user WHERE id_usuario=?");
        $query->execute(array($id));
    }

    function adminUsuarioDDBB($id){
        $query = $this->db->prepare("UPDATE user SET id_rol=1 WHERE id_usuario=?");
        $query->execute(array($id));
    }

    function colaboradorUsuarioDDBB($id){
        $query = $this->db->prepare("UPDATE user SET id_rol=2 WHERE id_usuario=?");
        $query->execute(array($id));
    }
}