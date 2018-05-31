<?php
    if(isset($_POST['nombre']) && isset($_POST['carnet']) && isset($_POST['carnet']) && isset($_POST['ciudad']) && isset($_POST['tipo']) && isset($_POST['pass1'])){
    
        echo agregar($_POST['nombre'],$_POST['apellido'],$_POST['carnet'],$_POST['ciudad'],$_POST['tipo'],$_POST['pass1']);   
    }
    
    
    function agregar($nombre,$apellido,$carnet,$ciudad,$tipo,$pass1)
    {
        $host='mysql:host=localhost;dbname=Facturacion';
        $user='root';
        $pass='Element34';
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
            $conexion=new PDO($host,$user,$pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql='insert into usuario(nombre,apellido,carnet,ciudad,tipo,pass) values (?,?,?,?,?,?)';
            $resultado=$conexion->prepare($sql);
            $resultado->execute(array($nombre,$apellido,$carnet,$ciudad,$tipo,$pass1));
            if($resultado==false)
            {
                return 0;
                
            }else {
                return 1;
            }
            $resultado->closeCursor();
        }
        catch (Exception $e)
        {
            die('Error: '.$e->getMessage());
        }


    }


?>