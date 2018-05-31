<?php
    function determinar_ciudad($ciudad)
    {
        $txt='<div class="col-md-4">
        <select class="custom-select" name="ciudad" id="ciudad">';
        $txt.= (strcmp($ciudad,'La Paz')==0) ? '<option selected>LP</option>' : '<option>LP</option>';
        $txt.= (strcmp($ciudad,'Cochabamba')==0) ? '<option selected>CBBA</option>' : '<option>CBBA</option>';
        $txt.= (strcmp($ciudad,'Santa cruz')==0) ? '<option selected>SCZ</option>' : '<option>SCZ</option>';
        $txt.= (strcmp($ciudad,'Oruro')==0) ? '<option selected>OR</option>' : '<option>OR</option>';
        $txt.= (strcmp($ciudad,'Potosi')==0) ? '<option selected>PT</option>' : '<option>PT</option>';
        $txt.= (strcmp($ciudad,'Chuquisaca')==0) ? '<option selected>CHQ</option>' : '<option>CHQ</option>';
        $txt.= (strcmp($ciudad,'Tarija')==0) ? '<option selected>TRJ</option>' : '<option>TRJ</option>';
        $txt.= (strcmp($ciudad,'Pando')==0) ? '<option selected>PND</option>' : '<option>PND</option>';
        $txt.= (strcmp($ciudad,'Beni')==0) ? '<option selected>BEN</option>' : '<option>BEN</option>';
        $txt.='</select></div>';
        echo $txt;
    }
?>

        
