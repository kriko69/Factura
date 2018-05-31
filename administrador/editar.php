<?php
    session_start();
    if(!isset($_SESSION['usuario']) || !isset($_SESSION['tipo'])) //si no hay dats en $_SESSION[úsuario]
    {
        header('Location:../login/login.php');
    }

    $data;
    if(isset($_GET['datos']))
    {
        $data=$_GET['datos'];
        $data=array_recibe($data);
    }else
    {
      $status=1;
      if(isset($_GET['staus']))
      {
        $status=$_GET['status'];
      }
    }
    $tipo;
    if((strcmp($data[4],'c')==0))
    {
        $tipo='cajero';
    }else{
        $tipo='administrador';
    }

    function array_recibe($url_array) {
        $tmp = stripslashes($url_array);
        $tmp = urldecode($tmp);
        $tmp = unserialize($tmp);
       return $tmp;
    } 
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Editar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#update').click(function(e){
                e.preventDefault();
                let nombre = $('#nombre').val();
                let apellido = $('#apellido').val();
                let carnet = $('#carnet').val();
                let ciudad = $('#ciudad').val();
                let tipo = $('#tipo').val();
                let pass1 = $('#pass1').val();
                let pass2 = $('#pass2').val();
                let id='<?php echo $data[6];?>';
                console.log(id);
                if(pass1!==pass2)
                {
                    $('#pass-diferente').html(`<div class='row'>
                        <div class='col-md-4'></div>
                        <div class='col-md-4'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        LAS PASSWORDS NO COINCIDEN.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                        </div></div>
                        <div class='col-md-4'></div>
                        </div>`);
                }
                else
                {
                    if(('<?php echo $data[0];?>'=='<?php echo $_SESSION['usuario'];?>') && ('<?php echo $tipo;?>'=='<?php echo strtolower($_SESSION['tipo']);?>') )
                    //si el nombre de la base de datos al cargar == al de la sesion le paso el nombre al url
                    {
                        $.ajax({
                            url:'modificar_script.php',
                            type: 'POST',
                            data:{id:id,nombre:nombre,apellido:apellido,carnet:carnet,ciudad:ciudad,tipo:tipo,pass1:pass1},
                            success:function(data){
                                console.log(data);
                                location.assign("listar.php?modificar="+data+"&newname="+nombre+"&newtipo="+tipo); //newname sera el nombre para modificar a la sesion
                                //si es que el usuario que edita es el ede la session
                            }
                        }); 
                    }else{ //en caso de que no sea solo le paso la data (para los demas usuarios distintos al de la session)
                        $.ajax({
                            url:'modificar_script.php',
                            type: 'POST',
                            data:{id:id,nombre:nombre,apellido:apellido,carnet:carnet,ciudad:ciudad,tipo:tipo,pass1:pass1},
                            success:function(data){
                                console.log(data);
                                location.assign("listar.php?modificar="+data); //newname sera el nombre para modificar a la sesion
                                //si es que el usuario que edita es el ede la session
                            }
                        }); 
                    }
                }
            });
        });
    </script>
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
            let ver2=true;
            $('#ver-pass2').click(function(){
                if(ver2)
                {
                    $('#pass2').attr('type','text');
                    ver2=!ver2;
                }else{
                    $('#pass2').attr('type','password');
                    ver2=!ver2;
                }
            });
            
        });
    </script>
  </head>
  <body>
  <?php include("navbar.php")?>

    <div class="row" style="margin-top:40px;">
        <div class="col-md-4 col-sm-12"></div>
        <div class="col-md-4 col-sm-12">
        <button type="button" class="btn btn-danger btn-block" onclick="location.assign('listar.php');"><i class="far fa-arrow-alt-circle-left"></i> Regresar</button>
        <br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre" value="<?php echo $data[0]?>">
                </div>
                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido"  placeholder="Apellido" value="<?php echo $data[1]?>">
                </div>
                <div class="form-group">
                    <label>Carnet</label>
                    <div class="row">
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="carnet" name="carnet"  placeholder="Carnet" value="<?php echo $data[2]?>">
                        </div>
                        <?php
                          include('ciudad_carnet_script.php');
                          determinar_ciudad($data[3]);
                        ?>

                    </div>
                </div>
                <?php
                  include('tipo_cajero_script.php');
                  determinar_tipo($data[4])
                ?>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" id="pass1" name="pass1"  placeholder="Password" value="<?php echo $data[5]?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="button" id="ver-pass1">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Repita Password</label>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" id="pass2" name="pass2"  placeholder="Repetir Password" value="<?php echo $data[5]?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="button" id="ver-pass2">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block" name="update" id='update'>Actualizar Datos</button>
                
            </form>
            <br><br>
        </div>
        <div class="col-md-4 col-sm-12"></div>
    </div>
    <div id="pass-diferente"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>