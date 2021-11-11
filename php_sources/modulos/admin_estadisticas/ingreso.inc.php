<?php
    echo '<table class="t1">';

    echo "<tr>";
	echo "<td>IN</td>";

	echo "<td>";
		echo $ultimo_ingreso["fecha"];
	echo "</td>";

	echo "<td>";
		echo '<font size="4" style="font-weight: bold;">'.$ultimo_ingreso["cantidad"].'</font>';
	echo "</td>";
	echo "<td>";
		echo "0";
	echo "</td>";
    echo "</tr>";

    $qb='select * from ventas where id_articulos="'.$row["id_articulo"].'" order by id desc limit 0,1';
    $array_ult=mysql_fetch_array(mysql_query($qb));

    echo "<tr>";
	echo "<td>";
	    echo "VE";
	echo "</td>";

	echo "<td>";
	    echo $array_ult["fecha"];
	echo "</td>";

	echo "<td>";
	    echo $array_ult["sucursal"];
	echo "</td>";

	echo "<td>";
	    echo $array_ult["cantidad"];
	echo "</td>";

    echo "</tr>";
    echo "</table>";

?>