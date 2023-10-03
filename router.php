<?php
define('BASE_URL', '//'. $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/' );

require_once "funciones.php";

$action = "ingreso";
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
$params = explode('/', $action);

switch($params[0]){
    case "ingreso":
        showIngreso();
        break;
    case "homeAdmin":
        showHomeAd();
        break;
    case "homeInvitado":
        showHomeGuest();
        break;
    case "verMas":
        verCarta($params[1]);
        break;
    case "delete":
        eliminarCarta($params[1]);
        break;
    case "actualizar":
        if(isset($_POST['titulo']) && isset($_POST['genero']) && isset($_POST['autor']) && isset($_POST['descripcion'])&& isset($_POST['idLibro'])){
            if(!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['autor']) && !empty($_POST['descripcion'])&& !empty($_POST['idLibro'])){
                $titulo = $_POST['titulo'];
                $genero = $_POST['genero'];
                $autor = $_POST['autor'];
                $descripcion = $_POST['descripcion'];
                $idLibro= $_POST['idLibro'];
                ModificarCarta($titulo,$descripcion,$genero,$autor,$idLibro);
            }
        }
        break;
    case "agregar":
        if(isset($_POST['nombreEscritor'])){
            if(!empty($_POST['nombreEscritor'])){
                $nombre = $_POST['nombreEscritor'];
                agregarAutor($nombre);
            }
            //en este y en agregarLibro habría que hacer un else mostrando algo de no metiste nada de datos
        }
        break;
    case "agregarLibro":
        if(isset($_POST['titulo']) && isset($_POST['genero']) && isset($_POST['autor']) && isset($_POST['descripcion'])){
            if(!empty($_POST['titulo']) && !empty($_POST['genero']) && !empty($_POST['autor']) && !empty($_POST['descripcion'])){
                $titulo = $_POST['titulo'];
                $genero = $_POST['genero'];
                $autor = $_POST['autor'];
                $descripcion = $_POST['descripcion'];
                agregarLibro($titulo, $genero, $autor, $descripcion);
            }
        }
        break;
    case "filtrarAutor":
        if(isset($_POST['autorFiltrar'])){
            if(!empty($_POST['autorFiltrar'])){
                $autorId = $_POST['autorFiltrar'];
                verAutoresFiltrados($autorId);
            }
        }
        break;
}


?>