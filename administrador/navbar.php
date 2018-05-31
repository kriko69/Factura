
<div class="jumbotron col-lg-auto" style="margin-bottom:0px;">
    <h3 class="display-4">Bienvenido</h3>
    <p class="lead">Usuario: <?php echo $_SESSION['usuario']?>
        (<?php echo $_SESSION['tipo']?>)</p>  
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="administrador.php">Xuxa's</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="listar.php">Empleados<span class="sr-only">(current)</span></a>
      </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Agregar <i class="fas fa-user-plus" style="position:absolute;right:10px;"></i></a>
                <a class="dropdown-item" href="#">Modificar <i class="fas fa-edit"style="position:absolute;right:10px;"></i></a>
                <a class="dropdown-item" href="#">Eliminar <i class="fas fa-trash-alt" style="position:absolute;right:10px;"></i></a>
                <a class="dropdown-item" href="#">Listar <i class="fas fa-address-book" style="position:absolute;right:10px;"></i></a>
            </li>
        </ul>
        <a href="salir.php" ><button type="button" class="btn btn-danger">Cerrar Sesion</button></a>
    </div>
</nav>


<!--font awesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">    <!-- Optional JavaScript -->
