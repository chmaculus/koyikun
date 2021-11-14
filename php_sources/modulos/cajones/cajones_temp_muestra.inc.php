<?php

    $query='select * from cajones_temp where id_session="'.$id_session.'"';
    $res=mysql_query($query);
    if(mysql_error()){
         echo mysql_error()."<br>".chr(10);
         echo $query."<br>".chr(10);
         echo $_SERVER["SCRIPT_NAME"]."<br>".chr(10);
         return "Error mysql_query";
    }
    $rows=mysql_num_rows($res);
    $array_cajones_temp=mysql_fetch_array($res);

echo '<table border="1"><tr>';
echo "<td>Origen: ".$array_cajones_temp["sucursal_origen"]."</td>";
echo "<td>Destino: ".$array_cajones_temp["sucursal_destino"]."</td>";
echo "<td>Vendedor envia: ".$array_cajones_temp["vendedor_envia"]."</td>";
echo "</tr></table>";
?>