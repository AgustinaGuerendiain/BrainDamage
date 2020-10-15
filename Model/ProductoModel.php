<?php

class ProductoModel{

    private $bbdd;
    
    function __construct(){
        $this->bbdd = new PDO ('mysql:host=localhost;'.'dbname=bbdd_cerveceria;charset=utf8', 'root', '');
    }

    //OBTENGO TODOS LOS PRODUCTOS DE LA BBDD
    function getProducto(){
    
        $sentencia = $this->bbdd->prepare( " SELECT * FROM cerveza");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    //OBTENGO UN PRODUCTO POR EL ID DE LA BBDD
    function getProductobyID($producto_id){
    
        $sentencia = $this->bbdd->prepare( " SELECT * FROM cerveza WHERE id_cerveza=?");
        $sentencia->execute(array($producto_id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    //OBTENGO EL NOMBRE DEL PRODUCTO ASOCIADO AL NOMBRE DE SU CATEGORIA (nombre, no id)
    function getCategoriaDeProducto(){

        $sentencia = $this->bbdd->prepare( " SELECT CA.nombre_categoria, CE.nombre_producto FROM categoria CA, cerveza CE WHERE CE.id_categoria = CA.id_categoria
        ");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
 
    //INSERTO PRODUCTO 
    function insertProducto($nombre_producto, $descripcion, $porcentaje_alc, $precio, $categoria){
    
        $sentencia = $this->bbdd->prepare(" INSERT INTO cerveza(nombre_producto, descripcion, porcentaje_alc, precio, id_categoria) VALUES (?, ? , ?, ?, ?)");
 
        $sentencia->execute(array($nombre_producto, $descripcion, $porcentaje_alc, $precio, $categoria));
    }
 
    //BORRO UN PRODUCTO MEDIANTE UN ID
    function deleteProducto($producto_id){

        $sentencia = $this->bbdd->prepare( " DELETE FROM cerveza WHERE id_cerveza = ? ");
        $sentencia->execute(array($producto_id));

    }
 
    function updateProducto( $id_producto, $nombre_producto, $descripcion, $porcentaje_alc, $precio, $categoria){
        $sentencia = $this->bbdd->prepare( " UPDATE cerveza SET nombre_producto=?, descripcion=?, porcentaje_alc=?, precio=?, id_categoria=? WHERE cerveza.id_cerveza=?");
        $sentencia->execute(array($nombre_producto,$descripcion, $porcentaje_alc, $precio, $categoria, $id_producto));


    }





}



?>