<?php

class AdministradorModel{

    private $bbdd;
    
    function __construct(){
    
        $this->bbdd = new PDO ('mysql:host=localhost;'.'dbname=bbdd_cerveceria;charset=utf8', 'root', '');
    }

    //OBTENGO DATOS DE USUARIO MEDIANTE UN EMAIL, EN LA BBDD
    function getAdministrador($email){

        $sentencia = $this->bbdd->prepare("SELECT * FROM administrador WHERE email=?");
        $sentencia->execute(array($email));
        return $sentencia->fetch(PDO::FETCH_OBJ);

    }






}



?>