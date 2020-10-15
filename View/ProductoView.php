<?php

    require_once './libs/smarty/Smarty.class.php';

class ProductoView{

    private $title;

    function __construct(){
        $this->title = "Brain Damage";
    }

    //RENDER DE INICIO
    function showInicio($producto, $categoria, $categoriasSelect){

        $smarty = new Smarty();
        $smarty->assign('titulo_smarty', $this->title);
        $smarty->assign('producto_smarty', $producto);
        $smarty->assign('categoria_smarty', $categoria);
        $smarty->assign('categoriasSelect_smarty', $categoriasSelect);
        $smarty->display('templates/productos.tpl'); 
    }

    //LLEVA A INICIO
    function showHomeLocation(){
        header("Location:" . BASE_URL . "home");
    }


    //RENDER DETALLE DE UN PRODUCTO
    function showDetalleProducto($producto_id, $producto, $categoria){
        $smarty = new Smarty();
        $smarty->assign('titulo_smarty', $this->title);
        $smarty->assign('producto_smarty', $producto);
        $smarty->assign('categoria_smarty', $categoria);
        $smarty->display('templates/detalleProducto.tpl'); 

    }
    

    function mostrarEditarProducto($categoria, $categoriasSelect, $producto){
        $smarty = new Smarty();
        $smarty->assign('titulo_smarty', $this->title);
        $smarty->assign('producto_smarty', $producto);
        $smarty->assign('categoria_smarty', $categoria);
        $smarty->assign('categoriasSelect_smarty', $categoriasSelect);
        $smarty->display('templates/editProducto.tpl');  

    }


}

    
?>