<?php
    session_start();
    if(!isset($_SESSION['usuario']) || !isset($_SESSION['tipo'])) //si no hay dats en $_SESSION[úsuario]
    {
        header('Location:../login/login.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Listar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function eliminar(carnet)
        {
            //con event.target.parentNode.className obtengo la 
            //clase del elemento padre que en este caso es el carnet y lo paso como paarametro a esta funcion
            //console.log(clase);
            let clase="."+carnet; // .carnet para que sea un selector
            $(clase).remove(); //lo elimino
            location.assign("eliminar.php?carnet="+carnet); //location.assign = header 
            //le paso un parametro que es el carnet
        }
        function editar(carnet)
        {
            location.assign("editar_script.php?carnet="+carnet); //location.assign = header 
            //le paso un parametro que es el carnet
        }
        function add()
        {
            location.assign('agregar.php');
        }
    </script>
  </head>
  <body>
      
    <?php include("navbar.php")?>

    <div class="row" style="margin-top:40px;">
        <div class="col-md-2"></div>
        <div class="col-md-2">
        <button type="button" class="btn btn-outline-success btn-block" onclick="add()">Agregar Usuario <i class="fas fa-user-plus"></i></button>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
                if(isset($_GET['status'])) //recibo el parametro del eliminar.php
                {
                    if($_GET['status']=='0') //si es 0 es correcto
                    {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='margin-top:40px;'>
                        EL USUARIO SE ELIMINO CORRECTAMENTE.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }else{
                        if($_GET['status']=='1') //si es 1 hay un error
                    {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='margin-top:40px;'>
                        ERROR AL ELIMINAR EL USUARIO.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                    }
                }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
                if(isset($_GET['modificar'])) //recibo el parametro del eliminar.php
                {
                    if($_GET['modificar']=='0') //si es 0 es correcto
                    {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='margin-top:40px;'>
                        EL USUARIO SE MODIFICO CORRECTAMENTE.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }else{
                        if($_GET['modificar']=='1') //si es 1 hay un error
                    {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='margin-top:40px;'>
                        ERROR AL MODIFICAR EL USUARIO.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                    }
                }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
                if(isset($_GET['agregar'])) //recibo el parametro del eliminar.php
                {
                    if($_GET['agregar']=='1') //si es 0 es correcto
                    {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert' style='margin-top:40px;'>
                        EL USUARIO SE AGREGO CORRECTAMENTE.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }else{
                        if($_GET['agregar']=='0') //si es 1 hay un error
                    {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='margin-top:40px;'>
                        ERROR AL AGRERGAR EL USUARIO.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                    }
                    }
                }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>


    <div class="row" style="margin-top:40px;">
        <div class="col-sm-12 col-md-2"></div>
        <div class="col-sm-12 col-md-8">
            <div class="table-responsive-sm">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Carnet</th>
                        <th>Ciudad</th>
                        <th>Tipo</th>
                        <th>Password</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php include('listar_script.php');?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-md-2"></div>
    </div>
    

 



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


