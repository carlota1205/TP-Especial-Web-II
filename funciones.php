<?php
require_once "funcionesdb.php";
function showIngreso(){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <base href="<?php echo BASE_URL ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>Trabajo II</title>
    </head>
    <body>
    <div class="card">
        <div class="card-header">
            Ingreso
        </div>
        <div class="card-body">
            <form action="router.php" method="post">
                <div class="form-group">
                    <label for="formGroupExampleInput">Usuario</label>
                    <input type="text" name="user" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Contraseña</label>
                    <input type="text" name="pass" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Ingresar">
                    <a href="router.php?action=homeInvitado" class="btn btn-primary">Entrar como invitado</a>

                </div>

            </form>
        </div>
    </div>
    <?php
    //require_once "funcionesdb.php";
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        if(!empty($_POST["user"]) && !empty($_POST["pass"])){
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            login($user, $pass);
        } else {
            echo "Recuerda llenar todos los campos";
            //esto podría ser con setTimeout
        }
    } 
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>

<?php
}
?>
<?php
function showHomeGuest(){ ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <base href="<?php echo BASE_URL ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <title>SI</title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="router.php?action=ingreso"><i class="bi bi-arrow-90deg-left"></i>  (volver al ingreso)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>

        
        <div class="d-flex flex-row justify-content-around">
            <?php $datos = showCard();
            foreach($datos as $dato){
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dato->Titulo?></h5>
                    <h6 class="card-title"><?php $nombre = mostrarNombreAutor($dato->Autor_id); echo $nombre->Nombre_Autor ?></h6>
                    <p class="card-text"><?php echo $dato->Descripcion ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $dato->Genero?></li>
                    <li class="list-group-item">ID del libro: <?php echo $dato->Libro_id ?></li>
                </ul>
                <div class="card-body">
                    <a href="router.php?action=verMas/<?php echo $dato->Libro_id ?>" class="card-link">Ver mas</a>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
}
?>


<?php
function showHomeAd(){ ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <base href="<?php echo BASE_URL ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>SI</title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="router.php?action=ingreso"><i class="bi bi-arrow-90deg-left"></i>  (volver al ingreso)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>


        <div class="d-flex flex-row">
            <div class="card ms-4 my-4">
                <div class="card-header">
                    Agregar escritor
                </div>
                <div class="card-body">
                    <form action="router.php?action=agregar" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nombre del escritor</label>
                            <input type="text" name="nombreEscritor" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ingresar">
                        </div>
                    </form>
                </div>
            </div>

            <div class="card ms-4 my-4">
                <div class="card-header">
                    Ingrese libro
                </div>
                <div class="card-body">
                    <form action="router.php?action=agregarLibro" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese titulo</label>
                            <input type="text" name="titulo" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese genero</label>
                            <input type="text" name="genero" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Seleccione autor</label>
                            <select name="autor" class="form-control" id="exampleFormControlSelect1">
                            <?php $autores = showAutores();
                            foreach($autores as $autor){
                            ?>
                            <option value="<?php echo $autor->Autor_id ?>"><?php echo $autor->Nombre_Autor ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Breve descripcion del libro</label>
                            <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ingresar">
                        </div>
                    </form>
                </div>
            </div>

            <div class="card ms-4 my-4">
                <div class="card-header">
                    Actualizar datos de libro
                </div>
                <div class="card-body">
                    <form action="router.php?action=actualizar" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese titulo</label>
                            <input type="text" name="titulo" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese genero</label>
                            <input type="text" name="genero" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese idLibro</label>
                            <input type="text" name="idLibro" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Seleccione autor</label>
                            <select name="autor" class="form-control" id="exampleFormControlSelect1">
                            <?php $autores = showAutores();
                            foreach($autores as $autor){
                            ?>
                            <option value="<?php echo $autor->Autor_id ?>"><?php echo $autor->Nombre_Autor ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Breve descripcion del libro</label>
                            <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ingresar">
                        </div>
                    </form>
                </div>
            </div>

            <div class="card ms-4 my-4">
                <div class="card-header">
                    Filtrar por autor
                </div>
                <div class="card-body">
                    <form action="router.php?action=filtrarAutor" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Seleccione autor</label>
                            <select name="autorFiltrar" class="form-control" id="exampleFormControlSelect1">
                            <?php $autores = showAutores();
                            foreach($autores as $autor){
                            ?>
                            <option value="<?php echo $autor->Autor_id ?>"><?php echo $autor->Nombre_Autor ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ingresar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="d-flex flex-row justify-content-around">
            <?php $datos = showCard();
            foreach($datos as $dato){
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dato->Titulo?></h5>
                    <h6 class="card-title"><?php $nombre = mostrarNombreAutor($dato->Autor_id); echo $nombre->Nombre_Autor ?></h6>
                    <p class="card-text"><?php echo $dato->Descripcion ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $dato->Genero?></li>
                    <li class="list-group-item">ID del libro: <?php echo $dato->Libro_id ?></li>
                </ul>
                <div class="card-body">
                    <a href="router.php?action=delete/<?php echo $dato->Libro_id ?>" class="card-link">Eliminar</a>
                    <a href="router.php?action=verMas/<?php echo $dato->Libro_id ?>" class="card-link">Ver mas</a>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
}
?>

<?php
function verCarta($idLibro){ ?>
  <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <base href="<?php echo BASE_URL ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>SI</title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="router.php?action=ingreso"><i class="bi bi-arrow-90deg-left"></i>  (volver al ingreso)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
       
        <div class="card">
            <?php $libro = devolverCarta($idLibro); ?>
            <div class="card-header">
            <?php $nombre = mostrarNombreAutor($libro->Autor_id); echo $nombre->Nombre_Autor ?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $libro->Titulo?></h5>
                <p class="card-text"><?php echo $libro->Descripcion ?></p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $libro->Genero?></li>
                    <li class="list-group-item">ID del libro: <?php echo $libro->Libro_id ?></li>
                </ul>
                <a href="router.php?action=delete/<?php echo $libro->Libro_id ?>" class="card-link">Eliminar</a>
                <a href="router.php?action=homeAdmin" class="card-link">Volver</a>
            </div>
        </div>

    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
}
?>

<?php
function verAutoresFiltrados($idAutor){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <base href="<?php echo BASE_URL ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>SI</title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="router.php?action=ingreso"><i class="bi bi-arrow-90deg-left"></i>  (volver al ingreso)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="router.php?action=homeAdmin">Volver a Menu Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>


        <div class="d-flex flex-row">
            <div class="card ms-4 my-4">
                <div class="card-header">
                    Agregar escritor
                </div>
                <div class="card-body">
                    <form action="router.php?action=agregar" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nombre del escritor</label>
                            <input type="text" name="nombreEscritor" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ingresar">
                        </div>
                    </form>
                </div>
            </div>

            <div class="card ms-4 my-4">
                <div class="card-header">
                    Ingrese libro
                </div>
                <div class="card-body">
                    <form action="router.php?action=agregarLibro" method="post">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese titulo</label>
                            <input type="text" name="titulo" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Ingrese genero</label>
                            <input type="text" name="genero" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Seleccione autor</label>
                            <select name="autor" class="form-control" id="exampleFormControlSelect1">
                            <?php $autores = showAutores();
                            foreach($autores as $autor){
                            ?>
                            <option value="<?php echo $autor->Autor_id ?>"><?php echo $autor->Nombre_Autor ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Breve descripcion del libro</label>
                            <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ingresar">
                        </div>
                    </form>
                </div>
            </div>

            <div class="card ms-4 my-4">
                <div class="card-header">
                    Filtrar por autor
                </div>
                <div class="card-body">
                    <form action="router.php?action=filtrarAutor" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Seleccione autor</label>
                            <select name="autorFiltrar" class="form-control" id="exampleFormControlSelect1">
                            <?php $autores = showAutores();
                            foreach($autores as $autor){
                            ?>
                            <option value="<?php echo $autor->Autor_id ?>"><?php echo $autor->Nombre_Autor ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="ingresar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="d-flex flex-row justify-content-around">
            <?php $autorFiltrado = filtrarAutor($idAutor);
            foreach($autorFiltrado as $dato){
            ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dato->Titulo?></h5>
                    <h6 class="card-title"><?php $nombre = mostrarNombreAutor($dato->Autor_id); echo $nombre->Nombre_Autor ?></h6>
                    <p class="card-text"><?php echo $dato->Descripcion ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $dato->Genero?></li>
                    <li class="list-group-item">ID del libro: <?php echo $dato->Libro_id ?></li>
                </ul>
                <div class="card-body">
                    <a href="router.php?action=delete/<?php echo $dato->Libro_id ?>" class="card-link">Eliminar</a>
                    <a href="router.php?action=verMas/<?php echo $dato->Libro_id ?>" class="card-link">Ver mas</a>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
}
?>
