<?php
include_once 'Controllers/controller.php';
define('BASE_URL', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/' );

//require_once "funciones.php";

$action = "homeInvitado";
if(!empty($_GET['action'])){
    $action = $_GET['action'];
}
$params = explode('/', $action);


switch($params[0]){
    case "ingreso":
        //poner login en el header para ingresar  a los datos
        //mostrar las cajas solo si estas logueado (condicional)
        $controller = new Controller();
        $controller -> showIngreso();
        break;
    case "Autenticar":
        $controller = new Controller();
        $controller -> Autenticar();
        break;
    case "homeAdmin":
        $controller = new Controller();
        $controller -> showHomeAd();
        break;
    case "homeInvitado":
        $controller = new Controller();
        $controller -> showHomeGuest();
        break;
    case "verMas":
        $controller = new Controller();
        $controller -> verCarta($params[1]);
        break;
    case "verMasGuest":
        $controller = new Controller();
        $controller -> verCartaGuest($params[1]);
        break;
    case "delete":
        $controller = new Controller();
        $controller -> eliminarCarta($params[1]);
        break;
    case "actualizar":
        $controller = new Controller();
        $controller-> ModificarCarta();
        break;
    case "agregar":
        $controller = new Controller();
        $controller -> agregarAutor();
       break;
    case "agregarLibro":
        $controller = new Controller();
        $controller-> agregarLibro();
        break;
    case "filtrarAutor":
        $controller = new Controller();
        $controller -> verAutoresFiltrados();
        break;
    case "logOut":
        AutenticacionEstatica::logout();
        break;
    default:
        $controller = new Controller();
        $controller -> showHomeGuest();
        break;
}


?>