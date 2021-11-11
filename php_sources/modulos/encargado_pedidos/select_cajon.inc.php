<div id="mainselection">
<?php


$qa='select distinct cajon from pedidos where estado="Transito"';
$resb=mysql_query($qa);
if(mysql_error()){echo mysql_error()." ".$qa."<br>";}
while($rowss=mysql_fetch_array($resb)){
        $array_cajones[]=$rowss[0];
}


/*
foreach($array_listas as $value){
    echo '<th>'.$value["nombre"].'</th>';
}
*/

/*
for($i=1;$i<=50;$i++){
//      echo "i:".$i." ";
        $indice=array_search($i,$array_cajones,false);
        if($indice!=0){
                //echo "1".chr(10);
        }else{
        echo "i:".$i." ";
                echo "0".chr(10);
                
        }
        echo $indice.chr(10);
        
}
*/





echo '<select name="cajon'.$row["id_articulo"].'">';
?>
<option value="0" selected>X</option>
<?php


for($i=1;$i<=66;$i++){
        $indice=array_search($i,$array_cajones,false);
        if($indice==0){
					echo '<option value="'.$i.'">'.$i.'</option>'.chr(10);
				}
}



echo '</select>'.chr(10);

echo '</div>';



echo '<div id="mainselection">';
echo '<br><select name="cajon2'.$row["id_articulo"].'">';
?>
<option value="0" selected>X</option>
<?php


for($i=67;$i<=132;$i++){
        $indice=array_search($i,$array_cajones,false);
        if($indice==0){
					echo '<option value="'.$i.'">'.$i.'</option>'.chr(10);
				}
}


echo '</select>'.chr(10);
echo '</div>';

echo '<div id="mainselection">';
echo '<br><select name="cajon3'.$row["id_articulo"].'">';
?>
<option value="0" selected>X</option>
<?php


for($i=133;$i<=200;$i++){
        $indice=array_search($i,$array_cajones,false);
        if($indice==0){
					echo '<option value="'.$i.'">'.$i.'</option>'.chr(10);
				}
}
echo '</select>'.chr(10);




?>
</div>