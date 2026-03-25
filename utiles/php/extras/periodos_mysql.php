<?php
/**
 * Script PHP para exportar resultados de ventas a JSON
 * Compatible con PHP 5.6+ y MySQL
 */

// Configuración de la base de datos
$config = array(
	'host' => 'localhost',
	'username' => 'root',
	'password' => 'maculuss',
	'database' => 'koyikun',
	'charset' => 'utf8'
);

// Configuración de exportación
$export_config = array(
	'filename' => '/logs/ventas_mysql_koyi.json',
	'pretty_print' => true,
	'include_metadata' => true
);

try {
	// Conexión a MySQL
	$mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
	
	// Verificar conexión
	if ($mysqli->connect_error) {
		throw new Exception("Error de conexión: " . $mysqli->connect_error);
	}
	
	// Establecer charset
	$mysqli->set_charset($config['charset']);
	
	echo "✓ Conexión exitosa a MySQL\n";
	
	// Consulta principal - Detalle por productos
	$sql_detalle = "
		SELECT 
			id_articulos, 
			marca,
			descripcion,
			clasificacion,
			subclasificacion,
			SUM(CASE 
				WHEN fecha >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) 
				THEN cantidad 
				ELSE 0 
			END) AS cantidad_1_mes,
			SUM(CASE 
				WHEN fecha >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH) 
				THEN cantidad 
				ELSE 0 
			END) AS cantidad_2_meses,
			SUM(CASE 
				WHEN fecha >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH) 
				THEN cantidad 
				ELSE 0 
			END) AS cantidad_3_meses,
			SUM(CASE 
				WHEN fecha >= DATE_SUB(CURDATE(), INTERVAL 4 MONTH) 
				THEN cantidad 
				ELSE 0 
			END) AS cantidad_4_meses,
			SUM(CASE 
				WHEN fecha >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH) 
				THEN cantidad 
				ELSE 0 
			END) AS cantidad_5_meses,
			SUM(CASE 
				WHEN fecha >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH) 
				THEN cantidad 
				ELSE 0 
			END) AS cantidad_6_meses,
			COUNT(*) AS total_transacciones,
			ROUND(AVG(precio_unitario), 2) AS precio_promedio,
			ROUND(SUM(cantidad * precio_unitario), 2) AS ventas_totales
		FROM ventas 
		WHERE fecha IS NOT NULL 
		  AND cantidad > 0
		GROUP BY id_articulos, marca, descripcion, clasificacion, subclasificacion
		ORDER BY cantidad_1_mes DESC, marca, descripcion
	";
	
	// Ejecutar consultas
	echo "⏳ Ejecutando consulta de detalle...\n";
	$result_detalle = $mysqli->query($sql_detalle);
	if (!$result_detalle) {
		throw new Exception("Error en consulta detalle: " . $mysqli->error);
	}
	
	
	// Procesar resultados
	
	
	// Detalle por productos
	$data = array();
	while ($row = $result_detalle->fetch_assoc()) {
		$producto = array(
			'id_articulos' => (int)$row['id_articulos'],
			'marca' => $row['marca'],
			'descripcion' => $row['descripcion'],
			'clasificacion' => $row['clasificacion'],
			'subclasificacion' => $row['subclasificacion'],
			'1_mes' => (int)$row['cantidad_1_mes'],
			'2_meses' => (int)$row['cantidad_2_meses'],
			'3_meses' => (int)$row['cantidad_3_meses'],
			'4_meses' => (int)$row['cantidad_4_meses'],
			'5_meses' => (int)$row['cantidad_5_meses'],
			'6_meses' => (int)$row['cantidad_6_meses']
		);
		$data[] = $producto;
	}
	
	// Generar JSON
	$json_flags = JSON_UNESCAPED_UNICODE;
	if ($export_config['pretty_print']) {
		$json_flags |= JSON_PRETTY_PRINT;
	}
	
	$json_data = json_encode($data, $json_flags);
	
	if ($json_data === false) {
		throw new Exception("Error al generar JSON: " . json_last_error_msg());
	}
	
	// Guardar archivo
	$bytes_written = file_put_contents($export_config['filename'], $json_data);
	
	if ($bytes_written === false) {
		throw new Exception("Error al escribir archivo JSON");
	}
	
	// Mostrar estadísticas
	echo "\n" . str_repeat("=", 60) . "\n";
	echo "✅ EXPORTACIÓN COMPLETADA EXITOSAMENTE\n";
	echo str_repeat("=", 60) . "\n";
	echo "📁 Archivo generado: " . $export_config['filename'] . "\n";
	echo "📊 Tamaño del archivo: " . number_format($bytes_written / 1024, 2) . " KB\n";
	echo "🔢 Total productos: " . count($data['productos']) . "\n";
	echo "📈 Cantidad total (6 meses): " . number_format($data['resumen_general']['cantidad_6_meses']) . "\n";
	echo "💰 Ventas totales: $" . number_format($data['resumen_general']['ventas_totales'], 2) . "\n";
	echo str_repeat("=", 60) . "\n";
	
	// Mostrar muestra del JSON (primeros 500 caracteres)
	echo "📋 Muestra del JSON generado:\n";
	echo substr($json_data, 0, 500) . "...\n";
	
} catch (Exception $e) {
	echo "❌ ERROR: " . $e->getMessage() . "\n";
	exit(1);
} finally {
	// Cerrar conexión
	if (isset($mysqli)) {
		$mysqli->close();
	}
}

echo "\n🎉 Script completado exitosamente.\n";
?>
