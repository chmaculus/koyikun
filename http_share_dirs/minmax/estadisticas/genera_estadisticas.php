<?php
$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);
$ultimo_nueve=$hora-(60 * 60 * 24 * 30 * 9 );
$ultimo_doce=$hora-(60 * 60 * 24 * 365);



$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);
$u_nueve=date("Y-n-d",$ultimo_nueve);
$u_doce=date("Y-n-d",$ultimo_doce);



include("connect.php");

echo "elimina datos anteriores".chr(10);
$q0='drop table if exists ventas_estadistica';
mysql_query($q0);

echo "crea tabla nueva".chr(10);
$q0='create table ventas_estadistica(
	marca varchar(50),
	clasificacion varchar(50),
	subclasificacion varchar(50),
	contenido varchar(50),
	presentacion varchar(50),
	descripcion varchar(50),
	id_articulo mediumint,
	mes mediumint,
	tres mediumint,
	seis mediumint,
	nueve mediumint,
	doce mediumint,
	costo double,
	stock mediumint,
	inmovilizado double
)';
mysql_query($q0);



echo "genera estadisticas".chr(10);

$q='select * from articulos order by marca';
$res=mysql_query($q);
while($row=mysql_fetch_array($res)){
	$stock=stock_sucursal($row["id"],1);
	$stock1=$stock["stock"];
	$costo=calcula_precio_costo( $row["id"] );
	$inmovilizado= $costo * $stock1;

	$mes=tot($row[0],$u_mes);
	$tres=tot($row[0],$u_tres);
	$seis=tot($row[0],$u_seis);
	$nueve=tot($row[0],$u_nueve);
	$doce=tot($row[0],$u_doce);

	$q2='insert into ventas_estadistica set marca="'.$row["marca"].'", 
															id_articulo="'.$row["id"].'", 
															descripcion="'.addslashes($row["descripcion"]).'",
															clasificacion="'.addslashes($row["clasificacion"]).'",
															subclasificacion="'.addslashes($row["subclasificacion"]).'",
															mes="'.$mes.'", 
															tres="'.$tres.'", 
															seis="'.$seis.'", 
															nueve="'.$nueve.'", 
															doce="'.$doce.'",
															costo="'.$costo.'",
															stock="'.$stock1.'",
															inmovilizado="'.$inmovilizado.'"
															';
	mysql_query($q2);
	if(mysql_error()){
		echo mysql_error();
	}
//	echo $q2.chr(10);
}


echo "genera indices".chr(10);

$q='alter table ventas_estadistica add index marca(marca)';
mysql_query($q);
$q='alter table ventas_estadistica add index id_articulo(id_articulo)';
mysql_query($q);
$q='alter table ventas_estadistica add index mes(mes)';
mysql_query($q);
$q='alter table ventas_estadistica add index tres(tres)';
mysql_query($q);
$q='alter table ventas_estadistica add index seis(seis)';
mysql_query($q);
$q='alter table ventas_estadistica add index doce(doce)';
mysql_query($q);
$q='alter table ventas_estadistica add index nueve(nueve)';
mysql_query($q);

$q='alter table ventas_estadistica add index costo(costo)';
mysql_query($q);

$q='alter table ventas_estadistica add index stock(stock)';
mysql_query($q);

$q='alter table ventas_estadistica add index inmovilizado(inmovilizado)';
mysql_query($q);

$q='alter table ventas_estadistica add index descripcion(descripcion)';
mysql_query($q);

$q='alter table ventas_estadistica add index clasificacion(clasificacion)';
mysql_query($q);

$q='alter table ventas_estadistica add index subclasificacion(subclasificacion)';
mysql_query($q);



function tot($id,$fecha){
	$q='select sum(cantidad) from ventas where id_articulos="'.$id.'" and fecha>="'.$fecha.'"';
	$res=mysql_query($q);
	$tot=mysql_result($res,0);
	return $tot;
}



#-----------------------------------------
function array_articulos($id_articulos){
    $query='select * from articulos where id="'.$id_articulos.'"';
    $res=mysql_query($query);
    if(mysql_error()){
         echo mysql_error()."<br>".chr(10);
         echo $query."<br>".chr(10);
         echo $_SERVER["SCRIPT_NAME"]."<br>".chr(10);
         return "Error mysql_query";
    }
    $rows=mysql_num_rows($res);
    if($rows==1){
        $array_articulos=mysql_fetch_array($res);
        return $array_articulos;        
    }else{
        return NULL;
    }
}
#-----------------------------------------

#-----------------------------------------------------------------
function stock_sucursal($id_articulo,$id_sucursal){
	$query='select * from stock where 	id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query) or die(mysql_error()." ".$SCRIPT_NAME);
	$rows=mysql_num_rows($res);
	if($rows==1){
		$array=mysql_fetch_array($res);
		$array["rows"]=$rows;
		return $array;		
	}
	if($rows<1){
		$array["stock"]="0";
		$array["maximo"]="0";
		$array["minimo"]="0";
		$array["id_sucursal"]=$id_sucursal;
		$array["rows"]=0;
		return $array;		
	}
}
#-----------------------------------------------------------------




#---------------------------------------------------------------------------------------------
function calcula_precio_costo( $id_articulos ){

	$query='select * from costos where id_articulos="'.$id_articulos.'"';
	$result=mysql_query($query);
	$rows=mysql_num_rows($result);
	if($rows=="1"){
		$array_costos=mysql_fetch_array($result);
	}else{
		return "0";
	}

	$temp1=( ( $array_costos["precio_costo"] * ( $array_costos["descuento1"] * -1 ) ) / 100 )+ $array_costos["precio_costo"];
	$temp1=( ( $temp1 * ( $array_costos["descuento2"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento3"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento4"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento5"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento6"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento7"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento8"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento9"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["descuento10"] * -1 ) ) / 100 )+ $temp1;
	$temp1=( ( $temp1 * ( $array_costos["iva"] ) ) / 100 )+ $temp1;
	return str_replace(".",",",round($temp1,2));
}
#---------------------------------------------------------------------------------------------




?>