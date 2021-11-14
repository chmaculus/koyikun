<div id="mainselection">
<?php
echo '<select name="cantidad'.$row["id_articulo"].'">';
?>

<option value="0" selected>0</option>
<?php
for($i=1;$i<=1000;$i++){
	echo '<option value="'.$i.'">'.$i.'</option>'.chr(10);
}
echo '</select>'.chr(10);

?>
</div>