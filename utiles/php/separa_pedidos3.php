<?php
#modulo utilitario para separar en zonas los pedidos existentes

include("./includes/connect.php");
include("./includes/funciones_varias.php");





$fecha=date("Y-n-d");
$hora=date("H:i:s");

$exec=1;
$show=1;



#------------------------------------------------------------------------------------------------------------------
$result=mysql_query('select distinct id_sucursal from pedidos_temp_nuevo order by id_sucursal');
while($row=mysql_fetch_array($result)){
	$q='update pedidos_temp_nuevo set sucursal="'.nombre_sucursal($row["id_sucursal"]).'" where id_sucursal="'.$row["id_sucursal"].'"';

	if($show==1){echo $q.";".chr(10);}
	if($exec==1){mysql_query($q);}
}
#------------------------------------------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
if($show==1){ echo "\n\n\#nactualiza zonas en pedidos_temp_nuevo\n";};
$q='select distinct id_articulos from pedidos_temp_nuevo';
$r=mysql_query($q);
while($arr_art=mysql_fetch_array($r)){
//	$q='select distinct id_sucursal from pedidos_temp_nuevo where id_articulos="'.$arr_art[0].'"';
		$q='select zona from articulos where id="'.$arr_art["id_articulos"].'"';
		if($show==1){echo $q.";".chr(10);}

		$res=mysql_query($q);
		$rows=mysql_num_rows($res);
		if($rows>0){$zona=mysql_result($res,0,0);}else{$zona="1";}
		if($zona==""){$zona="1";}

		$q='update pedidos_temp_nuevo set zona="'.$zona.'" where id_articulos="'.$arr_art[0].'"';

		if($show==1){echo $q.";\n\n";}
		if($exec==1){mysql_query($q);}
		if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}
}
#-----------------------------------------------------------------------------------



/*
SELECT email, COUNT(*) Total
FROM clientes
GROUP BY email
HAVING COUNT(*) > 1
*/




#------------------------------------------------------------------------------------------------------------------
if($show==1){ echo "\n\n\n"."#unifica registros duplicados de sucursal\n";};
#unifica registros duplicados de sucursal
$q='select  id_articulos, id_sucursal, count(*) as count from pedidos_temp_nuevo group by id_articulos, id_sucursal';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
	if($row["count"]>1){
		$array=mysql_fetch_array(mysql_query('select * from pedidos_temp_nuevo where id_articulos="'.$row[0].'" and id_sucursal="'.$row[1].'" order by fecha desc, hora desc limit 0,1'));
		echo "\n#nrep id_articulo: $row[0] id_sucursal: $row[1]\n";

		$q='select sum(cantidad) from pedidos_temp_nuevo where id_articulos="'.$row[0].'" and id_sucursal="'.$row[1].'"';
		$cantidad=mysql_result(mysql_query($q),0,0);

		$q='delete from pedidos_temp_nuevo where id_articulos="'.$row[0].'" and id_sucursal="'.$row[1].'"';
		if($show==1){echo $q.";".chr(10);}
		if($exec==1){mysql_query($q);}
		if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}
		
		$q='insert into pedidos_temp_nuevo set marca="'.$array["marca"].'", 
															clasificacion="'.$array["clasificacion"].'", 
															subclasificacion="'.$array["subclasificacion"].'", 
															descripcion="'.$array["descripcion"].'", 
															color="'.$array["color"].'", 
															cantidad="'.$cantidad.'", 
															id_articulos="'.$row[0].'", 
															id_sucursal="'.$row[1].'", 
															contenido="'.$array["contenido"].'",
															presentacion="'.$array["presentacion"].'",
															zona="'.$array["zona"].'",
															fecha="'.$array["fecha"].'",
															hora="'.$array["hora"].'",
															codigo_barra="'.$array["codigo_barra"].'"
															';
		if($show==1){echo $q.";".chr(10);}
		if($exec==1){mysql_query($q);}
		if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}
															
	}
	
}
#------------------------------------------------------------------------------------------------------------------



/*
#------------------------------------------------------------------------------------------------------------------
if($show==1){echo "#enumera los pedidos por sucursal zona 0\n";}
$q='select id, id_sucursal from pedidos_temp_nuevo where zona is NULL or zona="0" order by id_sucursal';
$res=mysql_query($q);
$suc=0;

$count1=0;

while($row=mysql_fetch_array($res)){
        if($suc!=$row["id_sucursal"]){
                $count1=30;
                $suc=$row["id_sucursal"];
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
        }
        if($count1>=30){
                if($show==1){echo "#--------------".chr(10);}
                
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
                $count1=0;
        }
        $q='update pedidos_temp_nuevo set pedido_numero="'.$npedid.'" where id="'.$row["id"].'"';

        if($show==1){echo $q.";#".$count1.chr(10);}
        if($exec==1){mysql_query($q);}
        if(mysql_error()){echo mysql_error().chr(10);}


        $count1++;
}
#------------------------------------------------------------------------------------------------------------------
*/







#------------------------------------------------------------------------------------------------------------------
if($show==1){echo "\n\n#enumera los pedidos por sucursal zona 1\n";}
$q='select id, id_sucursal from pedidos_temp_nuevo where zona="1" order by id_sucursal';
$res=mysql_query($q);
$suc=0;

$count1=0;

while($row=mysql_fetch_array($res)){
        if($suc!=$row["id_sucursal"]){
                $count1=30;
                $suc=$row["id_sucursal"];
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
        }
        if($count1>=30){
                if($show==1){echo "#--------------".chr(10);}
                
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
                $count1=0;
        }
        $q='update pedidos_temp_nuevo set pedido_numero="'.$npedid.'" where id="'.$row["id"].'"';

        if($show==1){echo $q.";#".$count1.chr(10);}
        if($exec==1){mysql_query($q);}
        if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}


        $count1++;
}
#------------------------------------------------------------------------------------------------------------------




#------------------------------------------------------------------------------------------------------------------
if($show==1){echo "\n\n#enumera los pedidos por sucursal zona 2\n";}
$q='select id, id_sucursal from pedidos_temp_nuevo where zona="2" order by id_sucursal';
$res=mysql_query($q);
$suc=0;

$count1=0;

while($row=mysql_fetch_array($res)){
        if($suc!=$row["id_sucursal"]){
               $count1=30;
                $suc=$row["id_sucursal"];
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
        }
        if($count1>=30){
                if($show==1){echo "#--------------".chr(10);}
                
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
                $count1=0;
        }
        $q='update pedidos_temp_nuevo set pedido_numero="'.$npedid.'" where id="'.$row["id"].'"';

        if($show==1){echo $q.";#".$count1.chr(10);}
        if($exec==1){mysql_query($q);}
        if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}


        $count1++;
}
#------------------------------------------------------------------------------------------------------------------




#------------------------------------------------------------------------------------------------------------------
if($show==1){echo "\n\n#enumera los pedidos por sucursal zona 3\n";}
$q='select id, id_sucursal from pedidos_temp_nuevo where zona="3" order by id_sucursal';
$res=mysql_query($q);
$suc=0;

$count1=0;

while($row=mysql_fetch_array($res)){
        if($suc!=$row["id_sucursal"]){
                $count1=30;
                $suc=$row["id_sucursal"];
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
        }
        if($count1>=30){
               if($show==1){echo "#--------------".chr(10);}
                
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
                $count1=0;
        }
        $q='update pedidos_temp_nuevo set pedido_numero="'.$npedid.'" where id="'.$row["id"].'"';

        if($show==1){echo $q.";#".$count1.chr(10);}
        if($exec==1){mysql_query($q);}
        if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}


        $count1++;
}
#------------------------------------------------------------------------------------------------------------------




#------------------------------------------------------------------------------------------------------------------
if($show==1){echo "\n\n#enumera los pedidos por sucursal zona 4\n";}
$q='select id, id_sucursal from pedidos_temp_nuevo where zona="4" order by id_sucursal';
$res=mysql_query($q);
$suc=0;

$count1=0;

while($row=mysql_fetch_array($res)){
        if($suc!=$row["id_sucursal"]){
                                        $count1=30;
                $suc=$row["id_sucursal"];
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
        }
        if($count1>=30){
               if($show==1){echo "#--------------".chr(10);}
                
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
                $count1=0;
        }
        $q='update pedidos_temp_nuevo set pedido_numero="'.$npedid.'" where id="'.$row["id"].'"';

        if($show==1){echo $q.";#".$count1.chr(10);}
        if($exec==1){mysql_query($q);}
        if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}


        $count1++;
}
#------------------------------------------------------------------------------------------------------------------





#------------------------------------------------------------------------------------------------------------------
if($show==1){echo "\n\n#enumera los pedidos por sucursal zona 5\n";}
$q='select id, id_sucursal from pedidos_temp_nuevo where zona="5" order by id_sucursal';
$res=mysql_query($q);
$suc=0;

$count1=0;

while($row=mysql_fetch_array($res)){
        if($suc!=$row["id_sucursal"]){
                                        $count1=30;
                $suc=$row["id_sucursal"];
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
        }
        if($count1>=30){
        			if($show==1){echo "#--------------".chr(10);}
                
                incrementa_n_pedido($row["id_sucursal"]);
                $npedid=get_numero_pedido($row["id_sucursal"]);
                $count1=0;
        }
        $q='update pedidos_temp_nuevo set pedido_numero="'.$npedid.'" where id="'.$row["id"].'"';

        if($show==1){echo $q.";#".$count1.chr(10);}
        if($exec==1){mysql_query($q);}
        if(mysql_error()){echo mysql_error().chr(10).$q.chr(10);}


        $count1++;
}
#------------------------------------------------------------------------------------------------------------------






#------------------------------------------------------------------------------------------------------------------

if($show==1){echo "\n\n#exporta pedidos temp a pedidos\n";}

$q='insert into pedidos( id_articulo, numero_pedido, marca, descripcion, clasificacion, 
subclasificacion, contenido, presentacion, cantidad_solicitada, sucursal, fecha, hora, finalizado, tipo, zona)
               	select id_articulos, pedido_numero, marca, descripcion, clasificacion, 
subclasificacion, contenido, presentacion, cantidad, id_sucursal, "'.$fecha.'", "'.$hora.'", "N", tipo, zona from pedidos_temp_nuevo';

if($show==1){echo $q.";".chr(10);}
if($exec==1){mysql_query($q);}

#------------------------------------------------------------------------------------------------------------------


$q='truncate table pedidos_temp_nuevo';
if($show==1){echo "\n$q;".chr(10);}
if($exec==1){mysql_query($q);}



$q='update pedidos set tipo="MANUAL" where tipo is NULL';
if($show==1){echo "\n$q;".chr(10);}
if($exec==1){mysql_query($q);}





/*
#-----------------------------------------
function trae_zona2($id_articulo){
	$q='select * from koyikun.articulos where id="'.$id_articulo.'"';
	$array1=mysql_fetch_array(mysql_query($q));
	if(mysql_error()){echo mysql_error().chr(10);}

	$q='select zona from marcas_zonas where marca="'.$array1["marca"].'" and clasificacion="'.$array1["clasificacion"].'"';
	//echo $q.chr(10);
	$res=mysql_query($q);
	if(mysql_error()){echo mysql_error().chr(10);}

	$rows=mysql_num_rows($res);
	if($rows>0){
		$zona=mysql_result($res,0,0);
		return $zona;
	}
	if($rows==0){
		$res=mysql_query('select zona from marcas_zonas where marca="'.$array1["marca"].'"');
		$rows2=mysql_num_rows($res);
		if($rows2>0){
			$zona=mysql_result($res,0,0);
			return $zona;
		}else{
			return 1;
		}
	}
}
#-----------------------------------------
*/


#-----------------------------------------
function get_numero_pedido($id_sucursal){
	$query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	if($rows<"1"){
		$numero_venta="1";
		$q1='insert into pedido_numero set numero="1", id_sucursal="'.$id_sucursal.'"';
		mysql_query($q1);
		if(mysql_error()){echo mysql_error()."\n".$q1."\n";}
	}else{
		$array_nventa=mysql_fetch_array($result);
		$numero_venta=$array_nventa["numero"];
	}	
	
return $numero_venta;
}
#-----------------------------------------


#-----------------------------------------
function incrementa_n_pedido($id_sucursal){
	$query='select * from pedido_numero where id_sucursal="'.$id_sucursal.'"';
	$result=mysql_query($query);
	$array_pedido=mysql_fetch_array($result);
	$numero_pedido=$array_pedido["numero"];
	$q1='update pedido_numero set numero="'.( $numero_pedido + 1 ).'" where  id_sucursal="'.$id_sucursal.'"';
	mysql_query($q1);
	if(mysql_error()){echo mysql_error()."\n".$q1."\n";}
}
#-----------------------------------------


/*
#------------------------------------------------------
function elimina_duplicados( $id_articulos, $id_sucursal ){
        $query='select id, id_articulos from pedidos_temp_nuevo where id_articulos="'.$id_articulos.'" order by id';
        $result=mysql_query($query) or die(mysql_error());
        echo "#rows: ".mysql_num_rows($result).chr(10);

        while($row=mysql_fetch_array($result)){
        	//echo "c1: ".$count1++.chr(10);

                if($aa==$row["id_articulos"]){
                	//echo "c2: ".$count2++.chr(10);
                        $q='delete from pedidos_temp_nuevo where id="'.$row["id"].'"';
                        //echo $q.";".chr(10);
                        mysql_query($q);
                }else{
                        $aa=$row["id_articulos"];
                }
        }
}
#------------------------------------------------------
*/



?>