<?php
function login($user, $pass){
$db = new PDO("mysql:host=localhost;dbname=dbtpeweb;charset=utf8", "root", "");
$query = $db->prepare("SELECT * FROM usuario_admin WHERE username = ? AND password = ?");
$query->execute([$user, $pass]);
$datos = $query->fetchAll(PDO::FETCH_OBJ);

if(count($datos) == 1){
    //return true;
    header("Location: router.php?action=homeAdmin");
} else {
    return false;
}

}
?>