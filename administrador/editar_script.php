<?php
    $carnet=$_GET['carnet'];
    $data=array();
    include('obtener_id_script.php');
    $id=obtener($carnet);
    try
        {
            //instanciar la clase PDO
            $base = new PDO('mysql:host=localhost;dbname=Facturacion','root','Element34');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec('SET character SET utf8');
            $sql="select * from usuario where id_usuario = ?";
            $resultado=$base->prepare($sql); //objeto PDO_stmt
            $resultado->execute(array($id)); // igualar ? = $nmbre
            while($fila=$resultado->fetch(PDO::FETCH_OBJ))
            {
                array_push($data,$fila->nombre);
                array_push($data,$fila->apellido);
                array_push($data,$fila->carnet);
                array_push($data,$fila->ciudad);
                array_push($data,$fila->tipo);
                array_push($data,$fila->pass);
            }
            array_push($data,$id);
            if ($resultado->rowCount()==0) { //si no ha registros
                header('location:editar.php?status=0');
            }else{
                $data=array_envia($data);
                header('location:editar.php?datos='.$data);
            }
            $resultado->closeCursor(); //cerramos
        }
        catch (Exception $e)
        {
            die("Error ".$e->getMessage());
        }


        function array_envia($array) {
            $tmp = serialize($array);
            $tmp = urlencode($tmp);
            return $tmp;
        }
?>