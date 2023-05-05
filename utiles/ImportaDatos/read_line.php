
<?php
foreach(file("/tmp/a.csv") as $line) {
    $aa=split(",",$line);
        echo 'insert into margenes_descuentos set margen='.$aa[0].', descuento='.$aa[1]. ";\n";
}
?>
