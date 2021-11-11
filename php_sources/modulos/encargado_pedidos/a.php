<?php


	    echo '<select name="cantidad'.$row["id"].'">'.chr(10);



	    echo '<option value="0" selected>0</option>'.chr(10);
for($i=1;$i<=1000;$i++){
	    echo '<option value="'.$i.'">'.$i.'</option>'.chr(10);
}




	    echo '</select>'.chr(10);



?>