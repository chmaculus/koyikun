<?php

$archivo = 'ventas_por_periodos_2025-10-21_15-31-02.json';
$contenido = file_get_contents($archivo);

if ($contenido !== false) {
    echo "Archivo leído exitosamente\n";
    // $contenido ahora tiene todo el contenido del archivo
} else {
    echo "Error al leer el archivo\n";
}

$array=json_decode($contenido,true);

// echo print_r($array['productos'],true);

foreach($array['productos'] as $prod){
    echo print_r($prod);
    echo $prod['id_articulos']."\n";
    echo $prod['cantidades_por_periodo']['1_mes']."\n";
    $id_articulo=$prod['id_articulos'];
    $mes1=$prod['cantidades_por_periodo']['1_mes'];
    $mes2=$prod['cantidades_por_periodo']['2_meses'];
    $mes3=$prod['cantidades_por_periodo']['3_meses'];
    $mes4=$prod['cantidades_por_periodo']['4_meses'];
    $mes5=$prod['cantidades_por_periodo']['5_meses'];
    $mes6=$prod['cantidades_por_periodo']['6_meses'];
    // exit;
}


?>
