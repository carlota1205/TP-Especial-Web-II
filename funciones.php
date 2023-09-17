<?php
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
                <div class="form-grou">
                    <input type="submit" class="btn btn-primary" value="ingresar">
                </div>
            </form>
        </div>
    </div>
    <?php
    require_once "funcionesdb.php";
    if(isset($_POST["user"]) && isset($_POST["pass"])){
        if(!empty($_POST["user"]) && !empty($_POST["pass"])){
            $user = $_POST["user"];
            $pass = $_POST["pass"];
            login($user, $pass);
        } else {
            echo "Recuerda llenar todos los campos";
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
}
?>