<?php
include("cabecera.inc.php");
include("../../includes/connect.php");
include("funciones.php");
$query="select * from clientes_persona limit 0,1000";
$result=mysql_query($query)or die(mysql_error());
?>
<center>
<table border="1">
<tr>
	<th>apellido</th>
	<th>nombres</th>
	<th>dni</th>
	<th>estado_civil</th>
	<th>telefono</th>
	<th>celular</th>
	<th>email</th>
	<th>profesion</th>
	<th>observaciones</th>
	<th>usa_tarjeta</th>
	<th>vendedor</th>
	<th>sucursal</th>
	<th>tel_comercial</th>
	<th>dom_comercial</th>
	<th>ciudad</th>
	<th>provincia</th>
	<th>carnet</th>
	<th>codigo_barras</th>
	<th>fecha_entrega</th>
	<th>radio</th>
	<th>canal</th>
	<th>programas</th>
	<th>fecha</th>
	<th>hora</th>
	<th>Mastercard</th>
	<th>Cabal</th>
	<th>Visa</th>
	<th>Nevada</th>
	<th>Nativa</th>
	<th>Provencred</th>
	<th>Naranja</th>
	<th>Diners</th>
	<th>Fiorella</th>
	<th>Laca</th>
	<th>Daylplas</th>
	<th>Germaine de capuccini</th>
	<th>Loreal</th>
	<th>Wella</th>
	<th>Karastase</th>
	<th>Silkey</th>
	<th>Framesi</th>
	<th>Alfaparf</th>
	<th>Bonmetique</th>
	<th>Single</th>
	<th>Accion</th>
	<th>Accion</th>
</tr>
<?php
while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo '<td>'.$row["apellido"].'</td>';
	echo '<td>'.$row["nombres"].'</td>';
	echo '<td>'.$row["dni"].'</td>';
	echo '<td>'.$row["estado_civil"].'</td>';
	echo '<td>'.$row["telefono"].'</td>';
	echo '<td>'.$row["celular"].'</td>';
	echo '<td>'.$row["email"].'</td>';
	echo '<td>'.$row["profesion"].'</td>';
	echo '<td>'.$row["observaciones"].'</td>';
	echo '<td>'.$row["usa_tarjeta"].'</td>';
	echo '<td>'.$row["vendedor"].'</td>';
	echo '<td>'.$row["sucursal"].'</td>';
	echo '<td>'.$row["tel_comercial"].'</td>';
	echo '<td>'.$row["dom_comercial"].'</td>';
	echo '<td>'.$row["ciudad"].'</td>';
	echo '<td>'.$row["provincia"].'</td>';
	echo '<td>'.$row["carnet"].'</td>';
	echo '<td>'.$row["codigo_barras"].'</td>';
	echo '<td>'.$row["fecha_entrega"].'</td>';
	echo '<td>'.$row["radio"].'</td>';
	echo '<td>'.$row["canal"].'</td>';
	echo '<td>'.$row["programas"].'</td>';
	echo '<td>'.$row["fecha"].'</td>';
	echo '<td>'.$row["hora"].'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta1").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta2").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta3").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta4").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta5").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta6").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta7").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"tarjeta8").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Cosme1").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Cosme2").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Cosme3").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Cosme4").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu1").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu2").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu3").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu4").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu5").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu6").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu7").'</td>';
	echo '<td>'.get_clientes_persona_valores($row["id"],"Pelu8").'</td>';
	echo '<td><A href="clientes_ingreso_persona.php?id_clientes='.$row["id"].'"><button>Modificar</button></A></td>';
	echo '<td><A href="clientes_persona_eliminar.php?id_clientes='.$row["id"].'"><button>Eliminar</button></A></td>';
	echo "</tr>";
}
?>
</center>
