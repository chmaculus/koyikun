<?php



for($i=1;$i<=$mes;$i++){
	$fecha_desde=$anio.'-'.$i.'-01';
	$fecha_hasta=$anio.'-'.$i.'-31';
	$aniomenos1=($anio -1);



	$array=trae_datos_ventas222($i,$anio);
	$arraymenos1=trae_datos_ventas222($i,($anio -1));


	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".round($array1[0],2)."</td>";

	$array=trae_datos_ventas222($i,$anio);
	echo "<td>".$i." -1Y</td>";
	echo "<td>".round($array2[0],2)."</td>";

	echo "<td>".round(($array1[0] / $array2[0]),2)."</td>";
	echo "</tr>";
	
	if($i<=($mes-1)){
		$count++;
		$prom=$prom+($array1[0] / $array2[0]);
	}

}
	echo "<tr>";
	echo "<td>Prom</td>";
	echo "<td>".round(($prom / $count ),2)."</td>";
	$ress1=mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="co" and fecha>="'.$fecha_desde.'" and fecha<="'.$fecha_hasta.'"');
	if(mysql_error()){echo mysql_error()."<br>";}
	$efectivo_mes=mysql_result($ress1,0,0);
	echo "<td>jejejeje".round($efectivo_mes,2)."</td>";
	echo "</tr>";


function trae_datos_ventas222($mes,$anio){
        $mes_actual=date("n");
        $anio_actual=date("Y");
        if($mes_actual==$mes and $anio_actual==$anio){
             $q='delete from ventas_historico_global where mes="'.$mes.'" and anio="'.$anio.'"';
//           echo "q0: $q".chr(10);
       mysql_query($q);
       $contado=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="co" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31" and sucursal !="157 AP OnLine" and sucursal!="88"'),0,0);
       $debito=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="de" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31" and sucursal !="157 AP OnLine" and sucursal!="88"'),0,0);
       $tarjeta=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="ta" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31" and sucursal !="157 AP OnLine" and sucursal!="88"'),0,0);
       $array["contado"]=$contado;
       $array["debito"]=$debito;
       $array["tarjeta"]=$tarjeta;
       return $array;
        }
        
        $res=mysql_query('select contado, debito, tarjeta from ventas_historico_global where mes="'.$mes.'" and anio="'.$anio.'"');
        $rows=mysql_num_rows($res);
  //      echo "r: ".$rows.chr(10);
        if($rows==1){
                $array=mysql_fetch_array($res);
                return $array;
                
        }
        
        if($rows>1){
                $q='delete from ventas_historico_global where mes="'.$mes.'" and anio="'.$anio.'"';
    //            echo "q1: ".$q.chr(10);
                mysql_query($q);
                $rows=0;
        }
        if($rows<1){
                $contado=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="co" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31"'),0,0);
                $debito=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="de" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31"'),0,0);
                $tarjeta=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="ta" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31"'),0,0);
      //          $q='insert into ventas_historico_global set mes="'.$mes.'", anio="'.$anio.'", contado="'.$contado.'", debito="'.$debito.'", tarjeta="'.$tarjeta.'"';
                mysql_query($q);
                if(mysql_error()){echo mysql_error().chr(10);}
        //        echo $q."<br>".chr(10);
                $array["contado"]=$contado;
                $array["debito"]=$debito;
                $array["tarjeta"]=$tarjeta;
                return $array;
        }
}




?>