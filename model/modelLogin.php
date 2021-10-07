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

    /*function insertUser($email, $password){
        $query = $this->db->prepare('INSERT INTO user (email, password) VALUES (? , ?)');
        $query->execute([$email, $password]);
    }*/
}