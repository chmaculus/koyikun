<?php
include("connect.php");
?>
<form action="<?php echo $SCRIPT_NAME; ?>" method="post">
<table border=1>
	<tr>
		<td>Marca</td>
		<td><?php include("select_marca.inc.php");?></td>
	</tr>
</table>
</form>