<?php
if($_GET["id_clientes_persona2"]){
include_once("connect.php");
$query='select * from clientes_persona2 where id="'.$_GET["id_clientes_persona2"].'"';
$array_clientes_persona2=mysql_fetch_array(mysql_query($query));
if(mysql_error()){echo mysql_error()."<br>".$query."<br>".$_SERVER["SCRIPT_NAME"]."<br>";}
}
if($_GET["uuid_clientes_persona2"]){
include_once("connect.php");
$query='select * from clientes_persona2 where uuid="'.$_GET["uuid_clientes_persona2"].'"';
$array_clientes_persona2=mysql_fetch_array(mysql_query($query));
}
?>

<form method="post" action="clientes_persona2_update.php" name="form_clientes_persona2">

<center>
<table class="t1" border="1">

    <tr>
        <th>apellido</th>
        <td><input type="text" name="apellido" id="apellido" value="<?php if($array_clientes_persona2["apellido"]){echo $array_clientes_persona2["apellido"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>nombres</th>
        <td><input type="text" name="nombres" id="nombres" value="<?php if($array_clientes_persona2["nombres"]){echo $array_clientes_persona2["nombres"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>dni</th>
        <td><input type="text" name="dni" id="dni" value="<?php if($array_clientes_persona2["dni"]){echo $array_clientes_persona2["dni"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>estado_civil</th>
        <td><input type="text" name="estado_civil" id="estado_civil" value="<?php if($array_clientes_persona2["estado_civil"]){echo $array_clientes_persona2["estado_civil"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>telefono</th>
        <td><input type="text" name="telefono" id="telefono" value="<?php if($array_clientes_persona2["telefono"]){echo $array_clientes_persona2["telefono"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>celular</th>
        <td><input type="text" name="celular" id="celular" value="<?php if($array_clientes_persona2["celular"]){echo $array_clientes_persona2["celular"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>email</th>
        <td><input type="text" name="email" id="email" value="<?php if($array_clientes_persona2["email"]){echo $array_clientes_persona2["email"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>web</th>
        <td><input type="text" name="web" id="web" value="<?php if($array_clientes_persona2["web"]){echo $array_clientes_persona2["web"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>calle</th>
        <td><input type="text" name="calle" id="calle" value="<?php if($array_clientes_persona2["calle"]){echo $array_clientes_persona2["calle"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>numero</th>
        <td><input type="text" name="numero" id="numero" value="<?php if($array_clientes_persona2["numero"]){echo $array_clientes_persona2["numero"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>piso</th>
        <td><input type="text" name="piso" id="piso" value="<?php if($array_clientes_persona2["piso"]){echo $array_clientes_persona2["piso"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>dpto</th>
        <td><input type="text" name="dpto" id="dpto" value="<?php if($array_clientes_persona2["dpto"]){echo $array_clientes_persona2["dpto"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>localidad</th>
        <td><input type="text" name="localidad" id="localidad" value="<?php if($array_clientes_persona2["localidad"]){echo $array_clientes_persona2["localidad"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>departamento</th>
        <td><input type="text" name="departamento" id="departamento" value="<?php if($array_clientes_persona2["departamento"]){echo $array_clientes_persona2["departamento"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>provincia</th>
        <td><input type="text" name="provincia" id="provincia" value="<?php if($array_clientes_persona2["provincia"]){echo $array_clientes_persona2["provincia"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>pais</th>
        <td><input type="text" name="pais" id="pais" value="<?php if($array_clientes_persona2["pais"]){echo $array_clientes_persona2["pais"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>profesion</th>
        <td><input type="text" name="profesion" id="profesion" value="<?php if($array_clientes_persona2["profesion"]){echo $array_clientes_persona2["profesion"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>observaciones</th>
            <td><textarea name="observaciones" id="observaciones" rows="10" cols="33"><?php if($array_clientes_persona2["observaciones"]){echo $array_clientes_persona2["observaciones"];}?></textarea></td>    </tr>
    <tr>
        <th>usa_tarjeta</th>
        <td><input type="text" name="usa_tarjeta" id="usa_tarjeta" value="<?php if($array_clientes_persona2["usa_tarjeta"]){echo $array_clientes_persona2["usa_tarjeta"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>vendedor</th>
        <td><input type="text" name="vendedor" id="vendedor" value="<?php if($array_clientes_persona2["vendedor"]){echo $array_clientes_persona2["vendedor"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>sucursal</th>
        <td><input type="text" name="sucursal" id="sucursal" value="<?php if($array_clientes_persona2["sucursal"]){echo $array_clientes_persona2["sucursal"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>nombre_comercio</th>
        <td><input type="text" name="nombre_comercio" id="nombre_comercio" value="<?php if($array_clientes_persona2["nombre_comercio"]){echo $array_clientes_persona2["nombre_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>tel_comercial</th>
        <td><input type="text" name="tel_comercial" id="tel_comercial" value="<?php if($array_clientes_persona2["tel_comercial"]){echo $array_clientes_persona2["tel_comercial"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>dom_comercial</th>
        <td><input type="text" name="dom_comercial" id="dom_comercial" value="<?php if($array_clientes_persona2["dom_comercial"]){echo $array_clientes_persona2["dom_comercial"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>localidad_comercio</th>
        <td><input type="text" name="localidad_comercio" id="localidad_comercio" value="<?php if($array_clientes_persona2["localidad_comercio"]){echo $array_clientes_persona2["localidad_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>dpto_comercio</th>
        <td><input type="text" name="dpto_comercio" id="dpto_comercio" value="<?php if($array_clientes_persona2["dpto_comercio"]){echo $array_clientes_persona2["dpto_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>calle_comercio</th>
        <td><input type="text" name="calle_comercio" id="calle_comercio" value="<?php if($array_clientes_persona2["calle_comercio"]){echo $array_clientes_persona2["calle_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>numero_comercio</th>
        <td><input type="text" name="numero_comercio" id="numero_comercio" value="<?php if($array_clientes_persona2["numero_comercio"]){echo $array_clientes_persona2["numero_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>piso_comercio</th>
        <td><input type="text" name="piso_comercio" id="piso_comercio" value="<?php if($array_clientes_persona2["piso_comercio"]){echo $array_clientes_persona2["piso_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>provincia_comercio</th>
        <td><input type="text" name="provincia_comercio" id="provincia_comercio" value="<?php if($array_clientes_persona2["provincia_comercio"]){echo $array_clientes_persona2["provincia_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>pais_comercio</th>
        <td><input type="text" name="pais_comercio" id="pais_comercio" value="<?php if($array_clientes_persona2["pais_comercio"]){echo $array_clientes_persona2["pais_comercio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>carnet</th>
        <td><input type="text" name="carnet" id="carnet" value="<?php if($array_clientes_persona2["carnet"]){echo $array_clientes_persona2["carnet"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>codigo_barras</th>
        <td><input type="text" name="codigo_barras" id="codigo_barras" value="<?php if($array_clientes_persona2["codigo_barras"]){echo $array_clientes_persona2["codigo_barras"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>fecha_entrega</th>
        <td><input type="text" name="fecha_entrega" id="fecha_entrega" value="<?php if($array_clientes_persona2["fecha_entrega"]){echo $array_clientes_persona2["fecha_entrega"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>radio</th>
        <td><input type="text" name="radio" id="radio" value="<?php if($array_clientes_persona2["radio"]){echo $array_clientes_persona2["radio"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>canal</th>
        <td><input type="text" name="canal" id="canal" value="<?php if($array_clientes_persona2["canal"]){echo $array_clientes_persona2["canal"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>programas</th>
        <td><input type="text" name="programas" id="programas" value="<?php if($array_clientes_persona2["programas"]){echo $array_clientes_persona2["programas"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>fecha</th>
        <td><input type="text" name="fecha" id="fecha" value="<?php if($array_clientes_persona2["fecha"]){echo $array_clientes_persona2["fecha"];}?>" size="10"></td>
    </tr>
    <tr>
        <th>hora</th>
        <td><input type="text" name="hora" id="hora" value="<?php if($array_clientes_persona2["hora"]){echo $array_clientes_persona2["hora"];}?>" size="10"></td>
    </tr>

</table>


</table>

<?php
if($_GET["id_clientes_persona2"] OR $array_clientes_persona2["id"]){
echo '<input type="hidden" name="accion" value="modificacion">';
echo '<input type="hidden" name="id_clientes_persona2" value="'.$array_clientes_persona2["id"].'">';
echo '<input type="hidden" name="uuid_clientes_persona2" value="'.$array_clientes_persona2["uuid"].'">';
}else{
echo '<input type="hidden" name="accion" value="ingreso">';
}
?>
<input type="submit" name="ACEPTAR" value="ACEPTAR">
</form>
</center>