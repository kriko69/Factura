<?php
    function determinar_tipo($tipo)
    {
        $txt='<div class="form-group">
        <label>Tipo de Empleado</label>
        <select class="custom-select" name="tipo" id="tipo">';
        $txt.= (strcmp($tipo,'c')==0) ? '<option selected>Cajero</option>' : '<option>Cajero</option>';
        $txt.= (strcmp($tipo,'a')==0) ? '<option selected>Administrador</option>' : '<option>Administrador</option>';
        $txt.='</select></div>';
        echo $txt;
    }
?>


                        
                        
                    