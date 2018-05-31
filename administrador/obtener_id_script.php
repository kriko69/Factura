<?php
    function obtener($carnet)
    {
        try
        {
            //instanciar la clase PDO
            $base = new PDO('mysql:host=localhost;dbname=Facturacion','root','Element34');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec('SET character SET utf8');
            $sql="select id_usuario from usuario where carnet = ?";
            $resultado=$base->prepare($sql); //objeto PDO_stmt
            $resultado->execute(array($carnet)); // igualar ? = $nmbre
            while($fila=$resultado->fetch(PDO::FETCH_OBJ))
            {
                return $fila->id_usuario;
            }
            if ($resultado->rowCount()==0) { //si no ha registros
                return null;
            }
            $resultado->closeCursor(); //cerramos
        }
        catch (Exception $e)
        {
            die("Error ".$e->getMessage());
        }
    }

?>