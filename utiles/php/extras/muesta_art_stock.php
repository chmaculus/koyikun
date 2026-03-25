<?php






$archivo = '/logs/ventas_mysql_koyi.json';
$contenido = file_get_contents($archivo);

if ($contenido !== false) {
    // echo "Archivo leído exitosamente\n";
    // $contenido ahora tiene todo el contenido del archivo
} else {
    echo "Error al leer el archivo\n";
}

$array_ventas_mysql=json_decode($contenido,true);

$archivo = '/logs/ventas_odoo.json';
$contenido = file_get_contents($archivo);

if ($contenido !== false) {
    // echo "Archivo leído exitosamente\n";
    // $contenido ahora tiene todo el contenido del archivo
} else {
    echo "Error al leer el archivo\n";
}

$array_ventas_odoo=json_decode($contenido,true);

// $count=0;
// foreach($array_ventas_mysql as $ventas_mysql){
//     $count++;
//     echo print_r($ventas_mysql,true);
//     if($count>10){
//         exit;
//     }
// }


#-------------------------------------------
function buscar_articulo_mysql($id_articulos, $lista_articulos) {
    foreach ($lista_articulos as $articulo) {
        if (isset($articulo['id_articulos']) && $articulo['id_articulos'] == $id_articulos) {
            return $articulo; // Devuelve el array completo
        }
    }
    return false; // Si no encuentra coincidencia
}
#-------------------------------------------


// $id_articulos=43900;

// $art_mysql=buscar_articulo_mysql($id_articulos, $array_ventas_mysql);
// $art_odoo=buscar_articulo_mysql($id_articulos, $array_ventas_odoo);

// echo "koyi ".print_r($art_mysql,true);
// echo "odoo ".print_r($art_odoo,true);



// exit;





// Configuración de la base de datos
$servidor = "localhost";
$usuario = "root";
$password = "maculuss";
$base_datos = "koyikun";

// Conectar a la base de datos usando mysqli
$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Configurar charset para caracteres especiales
mysqli_set_charset($conexion, "utf8");

// Consulta SQL con LEFT JOIN para mostrar todos los artículos con stock de sucursal 1
// Si no hay stock, muestra 0
$sql = "SELECT 
            a.id,
            a.codigo_interno,
            a.marca,
            a.descripcion,
            a.color,
            a.contenido,
            a.presentacion,
            a.clasificacion,
            a.subclasificacion,
            COALESCE(s.stock, 0) as stock,
            COALESCE(s.maximo, 0) as maximo,
            COALESCE(s.minimo, 0) as minimo
        FROM articulos a
        LEFT JOIN stock s ON a.id = s.id_articulo AND s.id_sucursal = 1
        ORDER BY a.marca, a.clasificacion, a.subclasificacion, a.contenido, a.presentacion";

$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Función para limpiar datos CSV
function limpiar_csv($valor) {
    // Convertir a string y eliminar espacios del principio y final
    $valor = trim((string)$valor);
    
    // Si contiene comas, comillas o saltos de línea, envolver en comillas
    if (strpos($valor, ',') !== false || strpos($valor, '"') !== false || strpos($valor, "\n") !== false) {
        // Escapar comillas dobles duplicándolas
        $valor = str_replace('"', '""', $valor);
        $valor = '"' . $valor . '"';
    }
    
    return $valor;
}

// Escribir encabezados CSV
$encabezados = array(
    'ID',
    'Codigo Interno',
    'Marca',
    'Descripcion',
    'Color',
    'Contenido',
    'Presentacion',
    'Clasificacion',
    'Subclasificacion',
    'Stock koyi',
    'Mes 1',
    'Mes 2',
    'Mes 3',
    'Mes 4',
    'Mes 5',
    'Mes 6'
);

echo implode(';', $encabezados) . "\n";

// Escribir datos
$count=0;
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $count++;

        $art_mysql=buscar_articulo_mysql($fila['id'], $array_ventas_mysql);
        $art_odoo=buscar_articulo_mysql($fila['id'], $array_ventas_odoo);

		if($art_mysql!=false){
			$mes1_mysql=$art_mysql['1_mes'];
			$mes2_mysql=$art_mysql['2_meses'];
			$mes3_mysql=$art_mysql['3_meses'];
			$mes4_mysql=$art_mysql['4_meses'];
			$mes5_mysql=$art_mysql['5_meses'];
			$mes6_mysql=$art_mysql['6_meses'];
		}else{
			$mes1_mysql=0;
			$mes2_mysql=0;
			$mes3_mysql=0;
			$mes4_mysql=0;
			$mes5_mysql=0;
			$mes6_mysql=0;
		}
		if($art_odoo!=false){
			$mes1_odoo=$art_odoo['1_mes'];
			$mes2_odoo=$art_odoo['2_meses'];
			$mes3_odoo=$art_odoo['3_meses'];
			$mes4_odoo=$art_odoo['4_meses'];
			$mes5_odoo=$art_odoo['5_meses'];
			$mes6_odoo=$art_odoo['6_meses'];
		}else{
			$mes1_odoo=0;
			$mes2_odoo=0;
			$mes3_odoo=0;
			$mes4_odoo=0;
			$mes5_odoo=0;
			$mes6_odoo=0;
		}

		$mes1=$mes1_odoo+$mes1_mysql;
		$mes2=$mes2_odoo+$mes2_mysql;
		$mes3=$mes3_odoo+$mes3_mysql;
		$mes4=$mes4_odoo+$mes4_mysql;
		$mes5=$mes5_odoo+$mes5_mysql;
		$mes6=$mes6_odoo+$mes6_mysql;


        $linea_csv = array(
            limpiar_csv($fila['id']),
            limpiar_csv($fila['codigo_interno']),
            limpiar_csv($fila['marca']),
            limpiar_csv($fila['descripcion']),
            limpiar_csv($fila['color']),
            limpiar_csv($fila['contenido']),
            limpiar_csv($fila['presentacion']),
            limpiar_csv($fila['clasificacion']),
            limpiar_csv($fila['subclasificacion']),
            limpiar_csv($fila['stock']),
            limpiar_csv($mes1),
            limpiar_csv($mes2),
            limpiar_csv($mes3),
            limpiar_csv($mes4),
            limpiar_csv($mes5),
            limpiar_csv($mes6)
        );
        
        echo implode(';', $linea_csv) . "\n";
        // echo print_r($art_odoo,true);
        // if($count>20){
        //     exit;
        // }
    }// end while
} // end if

// Liberar memoria del resultado
mysqli_free_result($resultado);

// Cerrar conexión
mysqli_close($conexion);
?>
