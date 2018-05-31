<?php
    if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['carnet']) && isset($_POST['carnet']) && isset($_POST['ciudad']) && isset($_POST['tipo']) && isset($_POST['pass1'])){
    
        echo modificar($_POST['id'],$_POST['nombre'],$_POST['apellido'],$_POST['carnet'],$_POST['ciudad'],$_POST['tipo'],$_POST['pass1']);   
    }
    
    
    
    function modificar($id,$nombre,$apellido,$carnet,$ciudad,$tipo,$pass)
    {
        $carnet=(int)$carnet;
        switch ($ciudad) {
            case "LP":
                $ciudad="La Paz";
                break;
            case "CBBA":
                $ciudad="Cochabamba";
                break;
            case "SCZ":
                $ciudad="Santa Cruz";
                break;
            case "OR":
                $ciudad="Oruro";
                break;
            case "PT":
                $ciudad="Potosi";
                break;
            case "CHQ":
                $ciudad="Chuquisaca";
                break;
            case "TRJ":
                $ciudad="Tarija";
                break;
            case "PND":
                $ciudad="Pando";
                break;
            case "BEN":
                $ciudad="Beni";
                break;
        }
        switch ($tipo) {
            case "Cajero":
                $tipo="c";
                break;
            case "Administrador":
                $tipo="a";
                break;
        }
        
        try
        {
            //instanciar la clase PDO
            $base = new PDO('mysql:host=localhost;dbname=Facturacion','root','Element34');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec('SET character SET utf8');
            $sql='update usuario set nombre=?,apellido=?,carnet=?,ciudad=?,tipo=?,pass=? where id_usuario=?'; //selecciono todos los usuarios
            $resultado=$base->prepare($sql); //objeto PDO_stmt
            $resultado->execute(array($nombre,$apellido,$carnet,$ciudad,$tipo,$pass,$id)); // igualar ? = $nmbre
            if ($resultado->rowCount()>0) {
                return 0;
            }else {
                return 1;
              }
              $resultado->closeCursor();
        }
        catch (Exception $e)
        {
            die("Error ".$e->getMessage());
        }
    }

?>

