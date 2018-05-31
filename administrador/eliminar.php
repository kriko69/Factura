<?php
  
  $host='mysql:host=localhost;dbname=Facturacion';
  $user='root';
  $pass='Element34';
  $carnet=$_GET['carnet']; //obtengo el parametro 
  try
  {
    $conexion=new PDO($host,$user,$pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql='delete from usuario where carnet=?'; //lo elimino
    $resultado=$conexion->prepare($sql);
    $resultado->execute(array($carnet));
    if($resultado==false)
    {
      header('location:listar.php?status=1'); //redireccion pasano un parametro
    }else {
      header('location:listar.php?status=0'); //0 si no hay error y 1 si tiene error
    }
    $resultado->closeCursor();
  }
  catch (Exception $e)
  {
    die('Error: '.$e->getMessage());
  }
  
?>
