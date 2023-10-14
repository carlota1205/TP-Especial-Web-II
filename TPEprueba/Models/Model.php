<?php
include_once 'Controllers/controller.php';
require_once 'config.php';
class Model{
    private $db;

    function __construct(){
        $this->db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=utf8", DB_USER, "");
    }

    public function login($user){
        $query = $this->db->prepare("SELECT * FROM usuario_admin WHERE Nombre_Usuario = ?");
        $query->execute([$user]);
        $datos = $query->fetch(PDO::FETCH_OBJ);
        return $datos;
    }
    
    public function showCard(){
        $query = $this->db->prepare("SELECT * FROM libros");
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $datos;
    }
    
    public function showAutores(){
        $query = $this->db->prepare("SELECT * FROM autores");
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $datos;
    }

    public function mostrarNombreAutor($idAutor){
        $query = $this->db->prepare("SELECT Nombre_Autor, Profesion_Autor, Fecha_Autor FROM autores WHERE Autor_id = ?");
        $query->execute([$idAutor]);
        $autor = $query->fetch(PDO::FETCH_OBJ);
        return $autor;
    }

    public function devolverCarta($idCarta){
        $query = $this->db->prepare("SELECT Libro_id, Titulo, Descripcion, Genero, Autor_id FROM libros WHERE Libro_id = ?");
        $query->execute([$idCarta]);
        $libro = $query->fetch(PDO::FETCH_OBJ);
        return $libro;
    }
    public function eliminarCarta($idEliminar){
        $query = $this->db->prepare("DELETE FROM libros WHERE Libro_id = ?");
        $query->execute([$idEliminar]);
        header("Location: router.php?action=homeAdmin");
    }
   
    public function filtrarAutor($autor){
        $query = $this->db->prepare("SELECT * FROM libros WHERE Autor_id = ?");
        $query->execute([$autor]);
        $libro = $query->fetchAll(PDO::FETCH_OBJ);
        return $libro;
    }
    public function ModificarCarta($Titulo, $Descripcion, $Genero,$id_Autor, $libro_id){
        $query = $this->db->prepare("UPDATE libros SET Titulo=?, Descripcion=?, Genero=?,Autor_id=? WHERE Libro_id=? ");
        $query->execute([$Titulo, $Descripcion, $Genero,$id_Autor, $libro_id]);
        header("Location: router.php?action=homeAdmin");
    }
    public function agregarAutor($name, $Profesion_Autor, $Fecha_Autor){
        $query = $this->db->prepare("INSERT INTO autores (Nombre_Autor, Profesion_Autor, Fecha_Autor) VALUES (?, ?, ?)");
        $query->execute([$name, $Profesion_Autor, $Fecha_Autor]);
        header("Location: router.php?action=homeAdmin");
    
    }
    
    function agregarLibro($titulo, $genero, $autor, $descripcion){
        $query = $this->db->prepare("INSERT INTO libros (Titulo, Descripcion, Genero, Autor_id) VALUES (?, ?, ?, ?)");
        $query->execute([$titulo, $descripcion, $genero, $autor]);
        header("Location: router.php?action=homeAdmin");
    
    }
    
}