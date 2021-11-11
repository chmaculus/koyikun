<SELECT name="turno"> 
	<OPTION <?php if(!$turno){ echo "selected"; } ?> value="">Seleccione turno</OPTION>
	<OPTION <?php if($turno=="M"){ echo "selected"; } ?> value="M">Manana</OPTION>
	<OPTION <?php if($turno=="T"){ echo "selected"; } ?> value="T">Tarde</OPTION>
</select>
