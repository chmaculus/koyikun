<?php
include("../includes/funciones_varias.php");
$hora=time();

$ultimo_mes=$hora-(60 * 60 * 24 * 30);
$ultimo_tres=$hora-(60 * 60 * 24 * 30 * 3);
$ultimo_seis=$hora-(60 * 60 * 24 * 30 * 6);
$ultimo_nueve=$hora-(60 * 60 * 24 * 30 * 9 );
$ultimo_doce=$hora-(60 * 60 * 24 * 365);



$fecha=date("Y-n-d");

$u_mes=date("Y-n-d",$ultimo_mes);
$u_tres=date("Y-n-d",$ultimo_tres);
$u_seis=date("Y-n-d",$ultimo_seis);
$u_nueve=date("Y-n-d",$ultimo_nueve);
$u_doce=date("Y-n-d",$ultimo_doce);



include("../includes/connect.php");

echo "elimina datos anteriores".chr(10);
$q0='drop table if exists ventas_estadistica';
mysql_query($q0);

echo "crea tabla nueva".chr(10);
$q0='create table ventas_estadistica(
	marca varchar(30),
	clasificacion varchar(60),
	subclasificacion varchar(60),
	contenido varchar(80),
	presentacion varchar(80),
	descripcion varchar(80),
	id_articulo mediumint unsigned,
	mes double(20,2),
	tot_mes double(20,2),
	rent_mes double(20,2),
	tres double(20,2),
	tot_tres double(20,2),
	rent_tres double(20,2),
	seis double(20,2),
	tot_seis double(20,2),
	rent_seis double(20,2),
	nueve double(20,2),
	tot_nueve double(20,2),
	rent_nueve double(20,2),
	doce double(20,2),
	tot_doce double(20,2),
	rent_doce double(20,2),
	costo double(20,4),
	precio double(20,2),
	stock mediumint,
	inmovilizado double(20,2)
)';
mysql_query($q0);

// $q='select sum(cantidad), 
// 				sum(cantidad * precio_unitario), 
// 				sum(cantidad * costo), 
// 				sum(cantidad * (precio_unitario - costo)), 
// 				sum(cantidad * costo), 
// 				sum(cantidad * (precio_unitario - costo)) from ventas 
// 							where id_articulos="'.$id.'" and fecha>="'.$fecha.'"';


echo "elimina datos anteriores 2 ".chr(10);
$q0='drop table if exists ventas_estadistica_datos';
$res=mysql_query($q0);
if(mysql_error()){
	log_this("/tmp/estadistica.log",$q);
	log_this("/tmp/estadistica.log",mysql_error());
}
log_this("/tmp/estadistica.log",$q);
log_this("/tmp/estadistica.log","rows: ".mysql_num_rows($res));

echo "crea tabla nueva2".chr(10);
$q0='create table ventas_estadistica_datos(
    total_mes double(20,2),
    unidades_mes mediumint,
    total_tres double(20,2),
    unidades_tres mediumint,
    total_seis double(20,2),
    unidades_seis mediumint,
    total_nueve double(20,2),
    unidades_nueve mediumint,
    total_doce double(20,2),
    unidades_doce mediumint,
    fecha date
)';
mysql_query($q0);


echo "calcula totales venta".chr(10);
$t_mes=tot2($u_mes);
$t_tres=tot2($u_tres);
$t_seis=tot2($u_seis);
$t_nueve=tot2($u_nueve);
$t_doce=tot2($u_doce);



// log_this("/tmp/estadistica.log","vacioj: ".verifica_vacio("jejejeje"));
// log_this("/tmp/estadistica.log","vacio: ".verifica_vacio());

if($t_mes[1] != ""){

		$q1='insert into ventas_estadistica_datos set 	
							total_mes="'.verifica_vacio($t_mes[1]).'",
							unidades_mes="'.verifica_vacio($t_mes[0]).'",
							total_tres="'.verifica_vacio($t_tres[1]).'",
							unidades_tres="'.verifica_vacio($t_tres[0]).'",
							total_seis="'.verifica_vacio($t_seis[1]).'",
							unidades_seis="'.verifica_vacio($t_seis[0]).'",
							total_nueve="'.verifica_vacio($t_nueve[1]).'",
							unidades_nueve="'.verifica_vacio($t_nueve[0]).'",
							total_doce="'.verifica_vacio($t_doce[1]).'",
							unidades_doce="'.verifica_vacio($t_doce[0]).'",
							fecha="'.verifica_vacio($fecha).'"
		';

		log_this("/tmp/estadistica.log",$q1);
		//echo $q1.chr(10);
		mysql_query($q1);
		if(mysql_error()){
			echo mysql_error().chr(10);
		}
}


echo "genera estadisticas".chr(10);



$q='select * from articulos where discontinuo!="S" or discontinuo<=>NULL order by marca';
log_this("/tmp/estadistica.log","asdf1".$q);
echo $q.chr(10);
$res=mysql_query($q);
log_this("/tmp/estadistica.log","rows: ".mysql_num_rows($res));

while($row=mysql_fetch_array($res)){
	$stock=stock_sucursal($row["id"],1);
	$stock1=$stock["stock"];
	$costo=calcula_precio_costo( $row["id"] );
	$inmovilizado= $costo * $stock1;
	
	$a=tot($row[0],$u_mes);
	$mes=$a[0];
	$rent_mes=$a[3];
	$tot_mes=$a[1];
	if(!isset($rent_mes)){$rent_mes=0;}
	if(!isset($tot_mes)){$tot_mes=0;}

	$a=tot($row[0],$u_tres);
	$tres=$a[0];
	$rent_tres=$a[3];
	$tot_tres=$a[1];
	if(!isset($rent_tres)){$rent_mes=0;}
	if(!isset($tot_tres)){$tot_tres=0;}

	$a=tot($row[0],$u_seis);
	$seis=$a[0];
	$rent_tres=$a[3];
	$tot_seis=$a[1];
	if(!isset($rent_seis)){$rent_mes=0;}
	if(!isset($tot_seis)){$tot_seis=0;}

	$a=tot($row[0],$u_nueve);
	$nueve=$a[0];
	$rent_tres=$a[3];
	$tot_nueve=$a[1];
	if(!isset($rent_nueve)){$rent_nueve=0;}
	if(!isset($tot_nueve)){$tot_nueve=0;}

	$a=tot($row[0],$u_doce);
	$doce=$a[0];
	$rent_tres=$a[3];
	$tot_doce=$a[1];
	if(!isset($rent_doce)){$rent_doce=0;}
	if(!isset($tot_doce)){$tot_doce=0;}

	log_this("/tmp/estadistica.log","mes: ".$mes);
	log_this("/tmp/estadistica.log","verifica_vacio: ".verifica_vacio("asdf:".$mes));
	//if($mes!="" and $mes!=NULL){

			$q2='insert into ventas_estadistica set marca="'.$row["marca"].'", 
																	id_articulo="'.$row["id"].'", 
																	descripcion="'.addslashes($row["descripcion"]).'",
																	clasificacion="'.addslashes($row["clasificacion"]).'",
																	subclasificacion="'.addslashes($row["subclasificacion"]).'",
																	mes="'.verifica_vacio($mes).'", 
																	tot_mes="'.verifica_vacio($tot_mes).'", 
																	rent_mes="'.verifica_vacio($rent_mes).'", 
																	tres="'.verifica_vacio($tres).'", 
																	tot_tres="'.verifica_vacio($tot_tres).'", 
																	rent_tres="'.verifica_vacio($rent_tres).'", 
																	seis="'.verifica_vacio($seis).'", 
																	tot_seis="'.verifica_vacio($tot_seis).'", 
																	rent_seis="'.verifica_vacio($rent_seis).'", 
																	nueve="'.verifica_vacio($nueve).'", 
																	tot_nueve="'.verifica_vacio($tot_nueve).'", 
																	rent_nueve="'.verifica_vacio($rent_nueve).'", 
																	doce="'.verifica_vacio($doce).'",
																	tot_doce="'.verifica_vacio($tot_doce).'",
																	rent_doce="'.verifica_vacio($rent_doce).'",
																	costo="'.verifica_vacio($costo).'",
																	stock="'.verifica_vacio($stock1).'",
																	inmovilizado="'.verifica_vacio($inmovilizado).'"
																	';
			


			

			mysql_query($q2);
				if(mysql_error()){
					echo mysql_error();
					log_this("/tmp/estadistica.log","its here".$q1);
					log_this("/tmp/estadistica.log",mysql_error());
				}
				$count++;
				if($count>=100){
					$count2++;
					echo ($count * $count2).chr(10);
					$count=0;
				}
	//	echo $q2.chr(10);
	//}

}

echo ($count2 + $count).chr(10);



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

$q='alter table ventas_estadistica add index rent_mes(rent_mes)';
mysql_query($q);
$q='alter table ventas_estadistica add index rent_tres(rent_tres)';
mysql_query($q);
$q='alter table ventas_estadistica add index rent_seis(rent_seis)';
mysql_query($q);
$q='alter table ventas_estadistica add index rent_doce(rent_doce)';
mysql_query($q);
$q='alter table ventas_estadistica add index rent_nueve(rent_nueve)';
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

$q='update precios set porcentaje_tarjeta=20';
echo $q.chr(10);
mysql_query($q);

$q='update costos set porcentaje_tarjeta=20';
echo $q.chr(10);
mysql_query($q);


#--------------------------------------------------
function tot($id,$fecha){
	$q='select sum(cantidad), 
					sum(cantidad * precio_unitario), 
					sum(cantidad * costo), 
					sum(cantidad * (precio_unitario - costo)) 
					from ventas 
								where id_articulos="'.$id.'" and fecha>="'.$fecha.'"';
								
	$res=mysql_query($q);
	$rows=mysql_num_rows($res);
	if($rows<1){
	    $tot[0]=0;
	    $tot[1]=0;
	    $tot[2]=0;
	    $tot[3]=0;
	return $tot;
	}
	$tot=mysql_fetch_array($res);
	return $tot;
}
#--------------------------------------------------


#--------------------------------------------------
function tot2($fecha){
	$q='select sum(cantidad), 
					sum(cantidad * precio_unitario), 
					sum(cantidad * costo), 
					sum(cantidad * (precio_unitario - costo)) from ventas where fecha>="'.$fecha.'"';
	echo $q.chr(10);
	$res=mysql_query($q);
	$tot=mysql_fetch_array($res);
	return $tot;
}
#--------------------------------------------------



#--------------------------------------------------
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
#--------------------------------------------------

#--------------------------------------------------
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
#--------------------------------------------------




#--------------------------------------------------
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
	return round($temp1,2);
}
#--------------------------------------------------




?>