<?php

    function loguearse($carnet,$password)
    {
        //$password=sha1($password);
        try
        {
            //variables para pasar a la sesion
            $usuario="";
            $tipo="";
            $intento;
            //instanciar la clase PDO
            $base = new PDO('mysql:host=localhost;dbname=Facturacion','root','Element34');
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec('SET character SET utf8');
            $sql="select * from usuario where carnet = binary :carnet and pass= binary :password"; //binary valida mayusculas y minusculas
            $resultado=$base->prepare($sql); //objeto PDO_stmt
            $resultado->bindValue(":carnet",$carnet);
            $resultado->bindValue(":password",$password); 
            $resultado->execute();
            if (($resultado->rowCount())!=0) {
                while($fila=$resultado->fetch(PDO::FETCH_OBJ))
                {
                    $usuario=$fila->nombre;
                    $tipo=$fila->tipo;
                }
                session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['tipo']=$tipo;
                header('Location:../administrador/administrador.php');
            }
            else {
                echo '<div class="container" style="margin-top:30px;">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="alert alert-danger" role="alert">
                            <p class="mb-0"><strong>Usuario</strong> o <strong>Contraseña</strong> incorrectos!</p>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>';
            }
            $resultado->closeCursor(); //cerramos
        }
        catch (Exception $e)
        {
            die("Error ".$e->getMessage());
        }
    }

?>