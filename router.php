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
        break;
}


?>