<?php

include("connect.php");


for($i=2008;$i<=2020;$i++){
	for($j=1;$j<=12;$j++){
		echo $i.'-'.$j.chr(10);
		trae_datos_ventas222($j,$i);
	}
}



function trae_datos_ventas222($mes,$anio){
	$mes_actual=date("n");
	$anio_actual=date("Y");
	if($mes_actual==$mes and $anio_actual==$anio){
	     $q='delete from ventas_historico_global where mes="'.$mes.'" and anio="'.$anio.'"';
//	     echo "q0: $q".chr(10);
       mysql_query($q);
       $contado=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="co" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31"'),0,0);
       $debito=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="de" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31"'),0,0);
       $tarjeta=mysql_result(mysql_query('select sum(cantidad*precio_unitario) from ventas where tipo_pago="ta" and fecha>="'.$anio.'-'.$mes.'-01" and fecha<="'.$anio.'-'.$mes.'-31"'),0,0);
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
