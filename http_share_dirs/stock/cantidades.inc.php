<select name="cantidad">
<?php
echo '<option value="">Seleccione</option>'.chr(10);
for($i=1;$i<=1000;$i++){
	echo '<option value="'.$i.'" label="'.$i.'">'.$i.'</option>'.chr(10);
}
?>
</select>
