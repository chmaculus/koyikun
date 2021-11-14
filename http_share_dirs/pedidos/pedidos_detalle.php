<?php

include_once("../../includes/connect.php");
include_once("../../includes/funciones_varias.php");
include_once("../../includes/funciones_articulos.php");
include_once("../../login/login_verifica.inc.php");

#jrarquia 0 coresponde a administrador
#if($jerarquia!="1"){
#	header('Location: ../../login/login_nologin.php?nologin=6');
#	exit;
#} 
?>
<script language="javascript" src="funciones.js"></script>

<center>
Pedido Actual<BR>
<?php
include("../../includes/connect.php");
include("pedidos_base.php");

if($_GET["numero_pedido"]){
	$query='select * from pedidos where numero_pedido="'.$_GET["numero_pedido"].'" and sucursal="'.$_GET["sucursal"].'" order by marca, clasificacion, subclasificacion, contenido, presentacion, descripcion';
	$q1='select * from pedidos where numero_pedido="'.$_GET["numero_pedido"].'" and sucursal="'.$_GET["sucursal"].'" limit 0,1';
	
}else{
	echo "jejejje";
	exit;
}


$result=mysql_query($query);
if(mysql_error()){echo mysql_error()."<br>".$query."<br>";}


$r0=mysql_query($q1);
$arr0=mysql_fetch_array($r0);

/*
sucursal
fecha

hora
atraso

*/

$q1='';


$time_stamp=time($fecha);

$fecha1=$arr0["fecha"];
$f2=strtotime($fecha1);
$retraso=($time_stamp - $f2);
$dias=($retraso / 60 / 60 / 24);
$aa=explode(".",$dias);

echo '<P ALIGN=left>';
echo '<font color="#000000" size="15">';
echo nombre_sucursal($_GET["sucursal"])."";
echo "<br>";
echo '<table border="1">';

echo "<tr>";
echo "<td>Fecha</td><td>".$fecha1."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Hora</td><td>".$arr0["hora"]."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Dias de retraso</td><td>".$aa[0]."</td>";
echo "</tr>";

echo "</table>";
echo "</font>";
echo "</P>";


echo '<P ALIGN=center>';
echo '<font color="#000000" size="10">';
echo "Formulario de picking<br>";
echo "</font>";
echo "</P>";



echo '<center>';
echo '<form action="pedidos_update.php" method="post">';
echo '<table class="t1">';
echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Cod Interno</th>";
    echo "<th>marca</th>";
    echo "<th>descripcion</th>";
    echo "<th>contenido</th>";
    echo "<th>presentacion</th>";
    echo "<th>clasificacion</th>";
    echo "<th>subclasificacion</th>";
    echo "<th>barras</th>";
    echo "<th>EPMR</th>";
    echo "<th>Imagen</th>";
    echo "<th>Cant.Ped</th>";
    echo "<th>Stk.Act.</th>";
    echo "<th>Cant.Env</th>";
    echo "<th>fecha</th>";
    echo "<th>hora</th>";
echo "</tr>";

while($row=mysql_fetch_array($result)){
	$array_stock=array_stock($row["id_articulo"],$id_sucursal);
	$array_articulo=array_articulos($row["id_articulo"]);
	
	
	
	
    echo "<tr>";
    echo '<td>'.$row["id_articulo"].'</td>';
    echo '<td>'.$array_articulo["codigo_interno"].'</td>';
    echo '<td>'.$row["marca"].'</td>';
    echo '<td>'.$row["descripcion"].'</td>';
    echo '<td>'.$row["contenido"].'</td>';
    echo '<td>'.$row["presentacion"].'</td>';
    echo '<td>'.$row["clasificacion"].'</td>';
    echo '<td>'.$row["subclasificacion"].'</td>';
    echo '<td>'.$array_articulo["codigo_barra"].'</td>';


	////////////////////////EPMR /*
	$qa='select * from stock_epmr where id_articulo="'.$row["id_articulo"].'"';
	$ra=mysql_query($qa);
	$rowa=mysql_num_rows($ra);
	if($rowa>0){
		$array_epmr=mysql_fetch_array($ra);
		
	}else{
		$array_epmr["estanteria"]="NO";
		$array_epmr["piso"]="NO";
		$array_epmr["modulo"]="NO";
		$array_epmr["reserva"]="NO";
	}
   echo '<td><A HREF="../admin_stock_epmr/stock_epmr_ingreso.php?id_articulo='.$row["id_articulo"].'" onClick="return popup(this, \'notes\')"><font3>';
   echo '<table border="1">';

   echo "<tr>";
   echo '<td>E</td>';
   echo '<td>'.$array_epmr["estanteria"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>P</td>';
   echo '<td>'.$array_epmr["piso"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>M</td>';
   echo '<td>'.$array_epmr["modulo"].'</td>';
   echo "<tr>";

   echo "<tr>";
   echo '<td>R</td>';
   echo '<td>'.$array_epmr["reserva"].'</td>';
   echo "<tr>";

   echo '</table>';
   echo '</font3></A></td>';
	////////////////////////////EPMR */


	///////////////////////////////// imagen /*
  	if(file_exists ( "./imagenes/miniaturas/".$row["id_articulo"].".jpg" )==1){
		echo '<td><A HREF="detalle.php?id_articulo='.$row["id_articulo"].'" onClick="return popup(this, \'notes\')">
		<img  src="./imagenes/miniaturas/'.$row["id_articulo"].'".jpg" width="150" height="100">
		</A></td>';
	}else{
		echo '<td></td>';
	}
	///////////////////////////////// imagen */

    
    echo '<td>'.$row["cantidad_solicitada"].'</td>';
    echo '<td>'.$array_stock["stock"].'</td>';
    if($row["finalizado"]=="N"){
	    echo '<td>';
	    //<input type="text" name="cantidad'.$row["id"].'" value="0" size="5">
	    echo '<select name="cantidad'.$row["id"].'">';
	    echo '<option value="0" selected>0</option>';
	    echo '<option value="1">1</option>';
	    echo '<option value="2">2</option>';
	    echo '<option value="3">3</option>';
	    echo '<option value="4">4</option>';
	    echo '<option value="5">5</option>';
	    echo '<option value="6">6</option>';
	    echo '<option value="7">7</option>';
	    echo '<option value="8">8</option>';
	    echo '<option value="9">9</option>';
	    echo '<option value="10">10</option>';
	    echo '<option value="11">11</option>';
	    echo '<option value="12">12</option>';
	    echo '<option value="13">13</option>';
	    echo '<option value="14">14</option>';
	    echo '<option value="15">15</option>';
	    echo '<option value="16">16</option>';
	    echo '<option value="17">17</option>';
	    echo '<option value="18">18</option>';
	    echo '<option value="19">19</option>';
	    echo '<option value="20">20</option>';
	    echo '<option value="21">21</option>';
	    echo '<option value="22">22</option>';
	    echo '<option value="23">23</option>';
	    echo '<option value="24">24</option>';
	    echo '<option value="25">25</option>';
	    echo '<option value="26">26</option>';
	    echo '<option value="27">27</option>';
	    echo '<option value="28">28</option>';
	    echo '<option value="29">29</option>';
	    echo '<option value="30">30</option>';
	    echo '<option value="31">31</option>';
	    echo '<option value="32">32</option>';
	    echo '<option value="33">33</option>';
	    echo '<option value="34">34</option>';
	    echo '<option value="35">35</option>';
	    echo '<option value="36">36</option>';
	    echo '<option value="37">37</option>';
	    echo '<option value="38">38</option>';
	    echo '<option value="39">39</option>';
	    echo '<option value="40">40</option>';
	    echo '<option value="41">41</option>';
	    echo '<option value="42">42</option>';
	    echo '<option value="43">43</option>';
	    echo '<option value="44">44</option>';
	    echo '<option value="45">45</option>';
	    echo '<option value="46">46</option>';
	    echo '<option value="47">47</option>';
	    echo '<option value="48">48</option>';
	    echo '<option value="49">49</option>';
	    echo '<option value="50">50</option>';
	    echo '<option value="51">51</option>';
	    echo '<option value="52">52</option>';
	    echo '<option value="53">53</option>';
	    echo '<option value="54">54</option>';
	    echo '<option value="55">55</option>';
	    echo '<option value="56">56</option>';
	    echo '<option value="57">57</option>';
	    echo '<option value="58">58</option>';
	    echo '<option value="59">59</option>';
	    echo '<option value="60">60</option>';
	    echo '<option value="61">61</option>';
	    echo '<option value="62">62</option>';
	    echo '<option value="63">63</option>';
	    echo '<option value="64">64</option>';
	    echo '<option value="65">65</option>';
	    echo '<option value="66">66</option>';
	    echo '<option value="67">67</option>';
	    echo '<option value="68">68</option>';
	    echo '<option value="68">69</option>';
	    echo '<option value="70">70</option>';
	    echo '<option value="71">71</option>';
	    echo '<option value="72">72</option>';
	    echo '<option value="73">73</option>';
	    echo '<option value="74">74</option>';
	    echo '<option value="75">75</option>';
	    echo '<option value="76">76</option>';
	    echo '<option value="77">77</option>';
	    echo '<option value="78">78</option>';
	    echo '<option value="79">79</option>';
	    echo '<option value="80">80</option>';
	    echo '<option value="81">81</option>';
	    echo '<option value="82">82</option>';
	    echo '<option value="83">83</option>';
	    echo '<option value="84">84</option>';
	    echo '<option value="85">85</option>';
	    echo '<option value="86">86</option>';
	    echo '<option value="87">87</option>';
	    echo '<option value="88">88</option>';
	    echo '<option value="89">89</option>';
	    echo '<option value="90">90</option>';
	    echo '<option value="91">91</option>';
	    echo '<option value="92">92</option>';
	    echo '<option value="93">93</option>';
	    echo '<option value="94">94</option>';
	    echo '<option value="95">95</option>';
	    echo '<option value="96">96</option>';
	    echo '<option value="97">97</option>';
	    echo '<option value="98">98</option>';
	    echo '<option value="99">99</option>';
	    echo '<option value="100">100</option>';
	    echo '</select>';
	    echo '</td>';
    }else{
        echo '<td>'.$row["cantidad_recibida"].'</td>';
	$finalizado=1;
    }
  
    echo '<td>'.$row["fecha"].'</td>';
    echo '<td>'.$row["hora"].'</td>';
    echo "</tr>".chr(10);
}

echo '<input type="hidden" name="query" value="'.base64_encode($query).'">';


#-----------------------------------------------------------------
function array_stock($id_articulo,$id_sucursal){
	$query='select * from stock where id_articulo="'.$id_articulo.'" and id_sucursal="'.$id_sucursal.'"';
	$res=mysql_query($query);
	if(mysql_error()){
		$array_stock["error"]=mysql_error();
		$array_stock["query"]=$query;
		return $array_stock;
	}
	$rows=mysql_num_rows($res);

	if($rows==1){
		$array_stock=mysql_fetch_array($res);
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;		
	}

	if($rows<1){
		$array_stock["stock"]=0;
		$array_stock["rows"]=$rows;
		$array_stock["query"]=$query;
		return $array_stock;
	}
}
#-----------------------------------------------------------------


echo '</table>';
if($finalizado!=1){
    echo '<input type="submit" name="ACEPTAR" value="ACEPTAR">';
}
echo '</form>';

?>


</center>