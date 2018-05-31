
<!doctype html>
<html lang="en">
  <head>
    <title>LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            let ver1=true;
            $('#ver-pass1').click(function(){
                if(ver1)
                {
                    $('#pass1').attr('type','text');
                    ver1=!ver1;
                }else{
                    $('#pass1').attr('type','password');
                    ver1=!ver1;
                }
            });
        });
    </script>
  </head>
  <body>
    <div class="jumbotron">
        <h3 class="display-3 text-center">LOGIN XUXA'S</h3>
    </div>

    <div class="row" style="margin-top:40px">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php
                if(isset($_GET['status'])) //recibo el parametro del eliminar.php
                {
                    if($_GET['status']=='0') //si es 0 es correcto
                    {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='margin-top:40px;'>
                        CERRO SESION CORRECTAMENTE.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                    
                }
            ?>
        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <div class="form-group">
                        <label>Carnet de Usuario</label>
                        <input type="text" class="form-control" name="carnet" placeholder="Carnet" required>
                    </div>
                    <div class="form-group">
                    <label>Contraseña</label>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" id="pass1" name="password" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="button" id="ver-pass1">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="ingresar" id="ingresar">Ingresar</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <?php
        if (isset($_POST['ingresar'])) {
            $carnet=htmlentities(addslashes($_POST['carnet']));
            $password=htmlentities(addslashes($_POST['password']));
            require 'log_script.php';
            loguearse($carnet,$password);
        }
    ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>