<?php
// Configuración de la base de datos
$servidor = "localhost";
$usuario = "tu_usuario";
$password = "tu_password";
$base_datos = "tu_base_datos";

// Conectar a la base de datos usando mysqli
$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Configurar charset para caracteres especiales
mysqli_set_charset($conexion, "utf8");

// Configurar headers para descarga CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="articulos_' . date('Y-m-d_H-i-s') . '.csv"');

// Consulta SQL para obtener los campos solicitados
$sql = "SELECT id, codigo_interno, marca, descripcion, contenido, presentacion, clasificacion, subclasificacion, color  
        FROM articulos 
        ORDER BY marca, clasificacion, subclasificacion, contenido, presentacion";

$resultado = mysqli_query($conexion, $sql);

// Verificar si hay resultados
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

// Función para limpiar datos CSV
function limpiar_csv($valor) {
    // Convertir a string y limpiar
    $valor = (string)$valor;
    
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
    'color',
    'Contenido',
    'Presentacion',
    'Clasificacion',
    'Subclasificacion'
);

echo implode(',', $encabezados) . "\n";

// Escribir datos
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $linea_csv = array(
            limpiar_csv($fila['id']),
            limpiar_csv($fila['codigo_interno']),
            limpiar_csv($fila['marca']),
            limpiar_csv($fila['descripcion']),
            limpiar_csv($fila['color']),
            limpiar_csv($fila['contenido']),
            limpiar_csv($fila['presentacion']),
            limpiar_csv($fila['clasificacion']),
            limpiar_csv($fila['subclasificacion'])
        );
        
        echo implode(',', $linea_csv) . "\n";
    }
}

// Liberar memoria del resultado
mysqli_free_result($resultado);

// Cerrar conexión
mysqli_close($conexion);
?>