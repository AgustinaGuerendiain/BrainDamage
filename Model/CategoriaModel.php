<?php

class CategoriaModel{

    private $bbdd;
    
    function __construct(){

        $this->bbdd = new PDO ('mysql:host=localhost;'.'dbname=bbdd_cerveceria;charset=utf8', 'root', '');
    }

    //OBTENGO TODAS LAS CATEGORIAS DE LA BBDD
    function getCategoria(){
    
        $sentencia = $this->bbdd->prepare( " SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //OBTENGO UNA CATEGORIA POR EL ID DE LA BBDD
    function getCategoriaByID($categoria_id){
    
        $sentencia = $this->bbdd->prepare( " SELECT * FROM categoria WHERE id_categoria=?");
        $sentencia->execute(array($categoria_id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    //OBTENGO TODOS LOS NOMBRES DE LOS PRODUCTOS ASOCIADOS CON SUS CATEGORIAS
    function getProductoDeCategoria(){
    
        $sentencia = $this->bbdd->prepare( " SELECT CE.nombre_producto, CA.id_categoria FROM categoria CA, cerveza CE WHERE CA.id_categoria = CE.id_categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
 
    //INSERTO/AGREGO UNA NUEVA CATEGORIA
    function insertCategoria($nombre_categoria, $descripcion_categoria){
    
        $sentencia = $this->bbdd->prepare( " INSERT INTO categoria(nombre_categoria, descripcion) VALUES(?, ?)");
        $sentencia->execute(array($nombre_categoria, $descripcion_categoria));
    
    }
 
    //BORRO UNA CATEGORIA MEDIANTE UN ID
    function deleteCategoria($categoria_id){

        $sentencia = $this->bbdd->prepare( " DELETE FROM categoria WHERE id_categoria = ? ");
        $sentencia->execute(array($categoria_id));

    }
 
    //
    function updateCategoria($categoria_id, $nombre_categoria, $descripcion_categoria){
        $sentencia = $this->bbdd->prepare( " UPDATE categoria SET nombre_categoria=?, descripcion=? WHERE id_categoria=?");
        $sentencia->execute(array($nombre_categoria, $descripcion_categoria, $categoria_id));
    }




}



?>