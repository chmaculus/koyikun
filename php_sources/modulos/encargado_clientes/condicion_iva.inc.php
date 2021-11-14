<?php

echo '<select name="condicion_iva" size="1">';
echo '	<option value="RI"'; if($array_clientes["condicion_iva"]=="RI"){echo " SELECTED";} echo '>Responsable inscripto</option>';
echo '	<option value="RM"'; if($array_clientes["condicion_iva"]=="RM"){echo " SELECTED";} echo '>Monotributo</option>';
echo '	<option value="EX"'; if($array_clientes["condicion_iva"]=="EX"){echo " SELECTED";} echo '>Exento</option>';
echo '	<option value="RN"'; if($array_clientes["condicion_iva"]=="RN"){echo " SELECTED";} echo '>Responsable no inscripto</option>';
echo '</select>';

?>