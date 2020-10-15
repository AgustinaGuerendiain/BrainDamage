<?php

require_once "./View/ProductoView.php";
require_once "./Model/ProductoModel.php";
require_once "./Model/CategoriaModel.php";
require_once "AdministradorController.php";

class ProductoController{

    private $view;
    private $model;
    private $modelCategoria;
   
    function __construct(){
 
        $this->view = new ProductoView();
        $this->model = new ProductoModel();
        $this->modelCategoria = new CategoriaModel();
        $this->controllerAdmin = new AdministradorController();
    }

    //LLAMA AL HOME
    function home(){
        $logueado = $this->controllerAdmin->checkLoggedIn();
        $producto = $this->model->getProducto();
        $categoria = $this->model->getCategoriaDeProducto();
        $categoriasSelect = $this->modelCategoria->getCategoria();
        $this->view->showInicio($producto, $categoria, $categoriasSelect);

    }

    //MUESTRA EL DETALLE DE UN PRODUCTO
    function detalleProducto($params = null){
        $logueado = $this->controllerAdmin->checkLoggedIn();
        $producto_id = $params[":ID"];
        $producto = $this->model->getProductobyID($producto_id);
        $categoria = $this->model->getCategoriaDeProducto();
        $this->view->showDetalleProducto($producto_id, $producto, $categoria);
    }
 

    //LOGICA PARA INSERTAR PRODUCTO
    function insertProducto(){
        $logueado = $this->controllerAdmin->checkLoggedIn();
        if ($logueado) {
            if (isset($_POST['input_nombre_producto']) && isset($_POST['input_descripcion_producto']) && isset($_POST['input_porcentajeAlc_producto']) && isset($_POST['input_precio_producto']) && isset($_POST['input_categoria'])) {
                $this->model->insertProducto($_POST['input_nombre_producto'],$_POST['input_descripcion_producto'], $_POST['input_porcentajeAlc_producto'], $_POST['input_precio_producto'], $_POST['input_categoria']);
                $this->view->showHomeLocation();
            }
        }
        else { 
            $this->view->showHomeLocation();
        }
     
    }

    // //PARA LLAMAR A BORRAR UN PRODUCTO
    function deleteProducto($params = null){
        $logueado = $this->controllerAdmin->checkLoggedIn();

        if ($logueado) {
            $producto_id = $params[":ID"];
            $this->model->deleteProducto($producto_id);
            $this->view->showHomeLocation();
        }
        else {
            $this->view->showHomeLocation();
        }   
    }

    //PARA LLAMAR A EDITAR UN PRODUCTO
    function editProducto($params = null){

        $logueado = $this->controllerAdmin->checkLoggedIn();

        if ($logueado) {
            $producto_id = $params[':ID'];
            $producto = $this->model->getProductobyID($producto_id);
            $categoria = $this->model->getCategoriaDeProducto();
            $categoriasSelect = $this->modelCategoria->getCategoria();
            $this->view->mostrarEditarProducto($categoria, $categoriasSelect, $producto);
        }
        else {
            $this->view->showHomeLocation();
        }
        
    }

    
    //PARA HACER UPDATE DE UN PRODUCTO
    function UpdateProducto($params = null){
        $logueado = $this->controllerAdmin->checkLoggedIn();
        if ($logueado) {
            $id_producto = $params[':ID'];
            if (isset($_POST['input_nombre_producto']) && isset($_POST['input_descripcion_producto']) && isset($_POST['input_porcentajeAlc_producto']) && isset($_POST['input_precio_producto']) && isset($_POST['input_categoria'])) {
                $nombre_producto = $_POST['input_nombre_producto'];
                $descripcion = $_POST['input_descripcion_producto'];
                $porcentaje_alc = $_POST['input_porcentajeAlc_producto'];
                $precio = $_POST['input_precio_producto'];
                $categoria = $_POST['input_categoria'];

                $this->model->updateProducto( $id_producto, $nombre_producto, $descripcion, $porcentaje_alc, $precio, $categoria);
                $this->home();
            } else {
                
                $this->view->showHomeLocation();
            }   
        }
        else {
            $this->view->showHomeLocation();
        }
    }





}


?>