<?php

    require_once './libs/smarty/Smarty.class.php';

class CategoriaView{

    private $title;

    function __construct(){
        $this->title = "Brain Damage";
    }

    //RENDER CATEGORIAS
    function showCategoria($categoria, $cervezasDeCategoria){

        $smarty = new Smarty(); 
        $smarty->assign('titulo_smarty', $this->title);
        $smarty->assign('categoria_smarty', $categoria);
        $smarty->assign('cervezasDeCategoria', $cervezasDeCategoria);
        $smarty->display('templates/categorias.tpl'); 

    }

    //RENDER INICIO
    function showHomeLocation(){
        header("Location:" . BASE_URL . "categorias");
    }

    //RENDER EDITAR CATEGORIA
    function mostrarEditarCategoria($categoria){

        $titulo = "Editar categoría";
        $smarty = new Smarty();
        $smarty->assign('titulo_smarty', $titulo);
        $smarty->assign('categoria_smarty', $categoria);
        $smarty->display('templates/editCategoria.tpl');  
    }

}

    
?>