<?php
include("../../includes/connect.php");
//$str='<?php'.chr(10);
$str='	<table>'.chr(10);

$q1='select * from temporales.varios1'.chr(10);
$r=mysql_query($q1);

while($row=mysql_fetch_array($r)){
	$str.='			<td>'.chr(10);
	$str.='				<input type="checkbox" name="'.$row["categ"].'" value="'.$row["nombre"].'"  <?php if(get_clientes_persona_valores($id_cliente,"'.$row["categ"].'")!=""){echo "checked";}?> />'.chr(10);
	$str.='				'.$row["nombre"].chr(10);
	$str.='			</td>'.chr(10);
}
$str.='	</table>';

echo $str;

?>