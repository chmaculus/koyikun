
<select name="vendedor">

<?php
$q='select numero from vendedores order by numero';
$r=mysql_query($q);
while($row=mysql_fetch_array($r)){
    echo '<option value="'.$row["numero"].'">'.$row["numero"].'</option>'.chr(10);
}
?>
  </select>