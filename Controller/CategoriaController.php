<?php

require_once "./View/CategoriaView.php";
require_once "./Model/CategoriaModel.php";
require_once "AdministradorController.php";

class CategoriaController{

    private $view;
    private $model;
   
    function __construct(){

        $this->view = new CategoriaView();
        $this->model = new CategoriaModel();
        $this->controllerAdmin = new AdministradorController();
    }
    
    //PARA LLAMAR A LA PAGINA DE CATEGORIAS
    function categoria(){
        $logueado = $this->controllerAdmin->checkLoggedIn();
        $categoria = $this->model->getCategoria();
        $cervezasDeCategoria = $this->model->getProductoDeCategoria();
        $this->view->showCategoria($categoria, $cervezasDeCategoria);
    }

   
    //PARA INSERTAR/AGREGAR UNA NUEVA CATEGORIA
    function insertCategoria(){
        $logueado = $this->controllerAdmin->checkLoggedIn();
        if ($logueado) {
            if (isset($_POST['input_nombre_categoria']) && isset($_POST['input_descripcion_categoria'])) {
                $this->model->insertCategoria($_POST['input_nombre_categoria'], $_POST['input_descripcion_categoria']);
                header("Location:" . BASE_URL . "categorias");
            }
        } else {
            $this->view->showHomeLocation();
        }
    }

    //PARA LLAMAR A BORRAR UNA CATEGORIA
    function deleteCategoria($params = null){

        $logueado = $this->controllerAdmin->checkLoggedIn();
        if ($logueado) {
            $categoria_id = $params[":ID"];
            $this->model->deleteCategoria($categoria_id);
            header("Location:" . BASE_URL . "categorias");
        }
        else {
            $this->view->showHomeLocation();
        }   
    }

    //LLAMA LA VISTA PARA EDITAR UNA MARCA POR ID
    function editCategoria($params = null){

        $logueado = $this->controllerAdmin->checkLoggedIn();
        if ($logueado) {
            $categoria_id = $params[':ID'];
            $categoria = $this->model->getCategoriaByID($categoria_id);
            $this->view->mostrarEditarCategoria($categoria);
        }else{
            $this->view->showHomeLocation();
        }
    }
    
    //PARA HACER UPDATE DE UNA CATEGORIA
    function updateCategoria($params = null){
        $logueado = $this->controllerAdmin->checkLoggedIn();
        if ($logueado) {
            $categoria_id = $params[':ID'];
            if (isset($_POST['input_edit_nombre_categoria']) && isset($_POST['input_edit_descripcion_categoria'])) {
                $nombre_categoria = $_POST['input_edit_nombre_categoria'];
                $descripcion_categoria = $_POST['input_edit_descripcion_categoria'];
                $this->model->updateCategoria($categoria_id, $nombre_categoria , $descripcion_categoria);
                $this->categoria();
            } else {
            $this->view->showHomeLocation();
            }
        }
    }
}

?>
