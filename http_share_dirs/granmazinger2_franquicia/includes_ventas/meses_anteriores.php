<?php

echo '<table class="t1">';
        /////////////////////////////////////////////
        for($i=-6;$i<=-1;$i++){
                //$bbb=;
                $epoch1=strtotime($i." days", $epoch);
                $epoch2=strtotime($i." month", $epoch);
                $aa=date("Y-m-d",$epoch1);
                $bb=date("Y-m",$epoch2);
                $week=date("w",$epoch1);

                $query='select distinct numero_venta from ventas where fecha="'.$aa.'"';
                $rows=mysql_num_rows(mysql_query($query));

                $query='select distinct numero_venta from ventas where fecha>="'.$bb.'-01" and fecha<="'.$bb.'-31"';
                $rows2=mysql_num_rows(mysql_query($query));

                echo '<tr>';
                        echo '<td>TCD '.$days[$week]." ".date("d",$epoch1).'</td>';
                        echo '<td>'.$rows.'</td>';
                        $tot=mysql_result(mysql_query('select sum(cantidad * precio_unitario) from ventas where fecha="'.$aa.'"'),0,0);
                        echo '<td>'.$tot.'</td>';
                        echo '<td>'.date("M",$epoch2)."</td><td>".$rows2.'</td>';
                        //echo '<td>'.$query.'</td>';
                echo '</tr>';
                echo chr(10);
        }

echo "</table>";
?>
