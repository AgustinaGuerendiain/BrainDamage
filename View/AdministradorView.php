<?php

    require_once './libs/smarty/Smarty.class.php';

class AdministradorView{

    private $title;

    function __construct(){
        $this->title = "Iniciar Sesión";
    }

    //RENDER INICIO DE SESIÓN
    function showLogin( $message = "" ){

        $smarty = new Smarty();
        $smarty->assign('titulo_smarty', $this->title);
        $smarty->assign('message', $message);
        $smarty->display('templates/login.tpl'); 

    }

    



}

    
?>