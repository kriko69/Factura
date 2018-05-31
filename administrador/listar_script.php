<?php
  try
  {
    //instanciar la clase PDO
    $base = new PDO('mysql:host=localhost;dbname=Facturacion','root','Element34');
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $base->exec('SET character SET utf8');
    $sql="select nombre,apellido,carnet,ciudad,tipo,pass from usuario"; //selecciono todos los usuarios
    $resultado=$base->prepare($sql); //objeto PDO_stmt
    $resultado->execute(); // igualar ? = $nmbre
    $txt="";
    $numero=1;
    while($fila=$resultado->fetch(PDO::FETCH_OBJ))
    {
        if($fila->tipo=='c')
        {
            $fila->tipo='cajero';
        }else
        {
            if($fila->tipo=='a')
            {
                $fila->tipo='administrador';
            }
        }
        $txt.= "<tr class=".$fila->carnet.">
        <th>".$numero."</th>
        <td>".ucfirst($fila->nombre)."</td> 
        <td>".ucfirst($fila->apellido)."</td>
        <td>".$fila->carnet."</td>
        <td>".ucwords($fila->ciudad)."</td>
        <td>".ucfirst($fila->tipo)."</td>
        <td>".$fila->pass."</td>
        <td class=".$fila->carnet.">
            <button type='button' class='btn btn-danger btn-outline-danger' onclick='eliminar(event.target.parentNode.className)' >Eliminar <i class='fas fa-trash-alt'></i></button>
            <button type='button' class='btn btn-primary btn-outline-primary' onclick='editar(event.target.parentNode.className)' >Editar <i class='fas fa-user-edit'></i></button>
        </td>
        </tr>";
        $numero++;
    }
    if ($resultado->rowCount()==0) { //si no ha registros
      echo "<br><br><div class='row'>
            <div class='col-md-4'></div>
            <div class='col-md-4'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
            NO HAY RESULTADOS!
            <button type='button' class='close' data-dismiss='alert' aria-label=Close>
            <span aria-hidden=true>&times;</span>
            </button>
            </div></div>
            <div class='col-md-4'></div>
            </div>";
    }else{
      echo $txt;
      $numero=1;
    }
    $resultado->closeCursor(); //cerramos
  }
  catch (Exception $e)
  {
    die("Error ".$e->getMessage());
  }

?>
