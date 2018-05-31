<?php
    // setcookie('empleado','',time()-3600,'/Facturacion/administrador');
    // setcookie('tipo','',time()-3600,'/Facturacion/administrador');
    
    session_start();
    session_destroy();
    header('location:../login/login.php?status=0');

//      include('login.php');
//      echo '<div class="container"  style="margin-top:30px;">
//      <div class="row" id="salio">
//          <div class="col-md-4"></div>
//          <div class="col-md-4">
//              <div class="alert alert-success" role="alert">
//                  <p class="mb-0">Saliste correctamente!</p>
//              </div>
//          </div>
//          <div class="col-md-4"></div>
//      </div>
//  </div>';

?>