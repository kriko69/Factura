<?php
    session_start();
    if(!isset($_SESSION['usuario']) || !isset($_SESSION['tipo'])) //si no hay dats en $_SESSION[úsuario]
    {
        header('Location:../login/login.php');
    }
    else{
      if($_SESSION['tipo']=='c'){
        $_SESSION['tipo']="cajero";
      }else{
        if($_SESSION['tipo']=='a'){
            $_SESSION['tipo']="administrador";
        }
      }
    }
    // setcookie('empleado',$_SESSION['usuario'],time()+86400,'/Facturacion/administrador');
    // setcookie('tipo',$_SESSION['tipo'],time()+86400,'/Facturacion/administrador');         
                
?>

<!doctype html>
<html lang="en">
  <head>
    <title>BIENVENIDA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php 
      /*con include solo incluimos codigo asi que las variables de arriba de la 
      sesion pueden ser utilizadas en el codigo que incluimos, y como siempre 
      vamos a iniciar la sesion (session_start()) no es necesario cookies porque
      podremos utilizar las variables globales $_SESSION*/
      include('navbar.php'); 
    ?>

  </body>
</html>