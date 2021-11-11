<select id="marca" name="marca" class="comboGrande">
<?
$q="select distinct marca from koyikun.articulos order by marca ASC";
$res=mysql_query($q);
?>
<option value=0 selected>Todos los articulos</option>
<?
while ($rowfamilia=mysql_fetch_row($res)){ 
 	if ($anterior==$rowfamilia[0]) { ?>
		<option value="<? echo $rowfamilia[0]?>" selected><? echo utf8_encode($rowfamilia[0])?></option>
	<?	} else { ?>
					<option value="<? echo $rowfamilia[0]?>"><? echo utf8_encode($rowfamilia[0])?></option>
	<? }   
};
?>
</select>