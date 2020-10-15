<?php

    require_once 'Controller/ProductoController.php';
    require_once 'Controller/CategoriaController.php';
    require_once 'Controller/AdministradorController.php';
    require_once 'routerClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    $r = new Router();

    //RUTA POR DEFECTO
    $r->setDefaultRoute("ProductoController", "home");

    //RUTAS INICIALES
    $r->addRoute("home", "GET", "ProductoController", "home");
    $r->addRoute("categorias", "GET", "CategoriaController", "categoria");

    //RUTAS USUARIO
    $r->addRoute("login", "GET", "AdministradorController", "login");
    $r->addRoute("logout", "GET", "AdministradorController", "logout");
    $r->addRoute("verifyAdmin", "POST", "AdministradorController", "verifyAdmin");

    //RUTAS PRODUCTO
    $r->addRoute("insert_producto", "POST", "ProductoController", "insertProducto");
    $r->addRoute("borrar_producto/:ID", "GET", "ProductoController", "deleteProducto");
    $r->addRoute("editar_producto/:ID", "GET", "ProductoController", "editProducto");
    $r->addRoute("update_producto/:ID", "POST", "ProductoController", "updateProducto");
    $r->addRoute("detalle_producto/:ID", "GET", "ProductoController", "detalleProducto");

    //RUTAS CATEGORIA
    $r->addRoute("insert_categoria", "POST", "CategoriaController", "insertCategoria");
    $r->addRoute("borrar_categoria/:ID", "GET", "CategoriaController", "deleteCategoria");
    $r->addRoute("editar_categoria/:ID", "GET", "CategoriaController", "editCategoria");
    $r->addRoute("update_categoria/:ID", "POST", "CategoriaController", "updateCategoria");
    
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 

?>


