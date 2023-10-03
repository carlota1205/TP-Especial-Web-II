<?php
function login($user, $pass){
$db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
$query = $db->prepare("SELECT * FROM usuario_admin WHERE Nombre_Usuario = ? AND Password_User = ?");
$query->execute([$user, $pass]);
$datos = $query->fetchAll(PDO::FETCH_OBJ);

if(count($datos) == 1){
    header("Location: router.php?action=homeAdmin");
} else {
    echo "datos erroneos";
}

}

function showCard(){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("SELECT * FROM libros");
    $query->execute();
    $datos = $query->fetchAll(PDO::FETCH_OBJ);

    return $datos;
}

function showAutores(){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("SELECT * FROM autores");
    $query->execute();
    $datos = $query->fetchAll(PDO::FETCH_OBJ);

    return $datos;
}

function mostrarNombreAutor($idAutor){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("SELECT Nombre_Autor FROM autores WHERE Autor_id = ?");
    $query->execute([$idAutor]);
    $autor = $query->fetch(PDO::FETCH_OBJ);
    return $autor;
}

function eliminarCarta($idEliminar){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("DELETE FROM libros WHERE Libro_id = ?");
    $query->execute([$idEliminar]);
    header("Location: router.php?action=homeAdmin");
}

function devolverCarta($idCarta){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("SELECT Libro_id, Titulo, Descripcion, Genero, Autor_id FROM libros WHERE Libro_id = ?");
    $query->execute([$idCarta]);
    $libro = $query->fetch(PDO::FETCH_OBJ);
    return $libro;
}

function agregarAutor($name){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("INSERT INTO autores (Nombre_Autor) VALUES (?)");
    $query->execute([$name]);
    header("Location: router.php?action=homeAdmin");

}

function agregarLibro($titulo, $genero, $autor, $descripcion){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("INSERT INTO libros (Titulo, Descripcion, Genero, Autor_id) VALUES (?, ?, ?, ?)");
    $query->execute([$titulo, $descripcion, $genero, $autor]);
    header("Location: router.php?action=homeAdmin");

}

function filtrarAutor($autor){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("SELECT * FROM libros WHERE Autor_id = ?");
    $query->execute([$autor]);
    $libro = $query->fetchAll(PDO::FETCH_OBJ);
    return $libro;
}
function ModificarCarta($Titulo, $Descripcion, $Genero,$id_Autor, $libro_id){
    $db = new PDO("mysql:host=localhost;dbname=tpe;charset=utf8", "root", "");
    $query = $db->prepare("UPDATE libros SET Titulo=?, Descripcion=?, Genero=?,Autor_id=? WHERE Libro_id=? ");
    $query->execute([$Titulo, $Descripcion, $Genero,$id_Autor, $libro_id]);
    header("Location: router.php?action=homeAdmin");
}
?>
