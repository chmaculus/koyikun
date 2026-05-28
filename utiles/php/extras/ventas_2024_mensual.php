<?php
/**
 * Script PHP para exportar ventas de 2024 discriminadas mes a mes
 */

$config = array(
	'host' => 'localhost',
	'username' => 'root',
	'password' => 'maculuss',
	'database' => 'koyikun',
	'charset' => 'utf8'
);

$export_config = array(
	'filename' => '/logs/ventas_2026_mensual_koyi.json',
	'pretty_print' => true
);

try {
	$mysqli = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);

	if ($mysqli->connect_error) {
		throw new Exception("Error de conexión: " . $mysqli->connect_error);
	}

	$mysqli->set_charset($config['charset']);
	echo "✓ Conexión exitosa a MySQL\n";

	$sql = "
		SELECT 
			id_articulos,
			marca,
			descripcion,
            color,
			clasificacion,
			subclasificacion,
			SUM(CASE WHEN MONTH(fecha) = 1  THEN cantidad ELSE 0 END) AS enero,
			SUM(CASE WHEN MONTH(fecha) = 2  THEN cantidad ELSE 0 END) AS febrero,
			SUM(CASE WHEN MONTH(fecha) = 3  THEN cantidad ELSE 0 END) AS marzo,
			SUM(CASE WHEN MONTH(fecha) = 4  THEN cantidad ELSE 0 END) AS abril,
			SUM(CASE WHEN MONTH(fecha) = 5  THEN cantidad ELSE 0 END) AS mayo,
			SUM(CASE WHEN MONTH(fecha) = 6  THEN cantidad ELSE 0 END) AS junio,
			SUM(CASE WHEN MONTH(fecha) = 7  THEN cantidad ELSE 0 END) AS julio,
			SUM(CASE WHEN MONTH(fecha) = 8  THEN cantidad ELSE 0 END) AS agosto,
			SUM(CASE WHEN MONTH(fecha) = 9  THEN cantidad ELSE 0 END) AS septiembre,
			SUM(CASE WHEN MONTH(fecha) = 10 THEN cantidad ELSE 0 END) AS octubre,
			SUM(CASE WHEN MONTH(fecha) = 11 THEN cantidad ELSE 0 END) AS noviembre,
			SUM(CASE WHEN MONTH(fecha) = 12 THEN cantidad ELSE 0 END) AS diciembre,
			SUM(cantidad) AS total_anual
		FROM ventas
		WHERE YEAR(fecha) = 2026
		  AND fecha IS NOT NULL
		  AND cantidad > 0
		  AND (marca = 'color age' OR marca = 'framesi')
		GROUP BY id_articulos, marca, descripcion, clasificacion, subclasificacion
		ORDER BY marca, total_anual DESC, descripcion
	";

	echo "⏳ Ejecutando consulta...\n";
	$result = $mysqli->query($sql);
	if (!$result) {
		throw new Exception("Error en consulta: " . $mysqli->error);
	}

	$data = array();
	while ($row = $result->fetch_assoc()) {
		$data[] = array(
			'id_articulos'   => (int)$row['id_articulos'],
			'marca'          => $row['marca'],
			'descripcion'    => $row['descripcion'],
			'color'    => $row['color'],
			'clasificacion'  => $row['clasificacion'],
			'subclasificacion' => $row['subclasificacion'],
			'enero'          => (int)$row['enero'],
			'febrero'        => (int)$row['febrero'],
			'marzo'          => (int)$row['marzo'],
			'abril'          => (int)$row['abril'],
			'mayo'           => (int)$row['mayo'],
			'junio'          => (int)$row['junio'],
			'julio'          => (int)$row['julio'],
			'agosto'         => (int)$row['agosto'],
			'septiembre'     => (int)$row['septiembre'],
			'octubre'        => (int)$row['octubre'],
			'noviembre'      => (int)$row['noviembre'],
			'diciembre'      => (int)$row['diciembre'],
			'total_anual'    => (int)$row['total_anual']
		);
	}

	$json_flags = JSON_UNESCAPED_UNICODE;
	if ($export_config['pretty_print']) {
		$json_flags |= JSON_PRETTY_PRINT;
	}

	$json_data = json_encode($data, $json_flags);
	if ($json_data === false) {
		throw new Exception("Error al generar JSON: " . json_last_error_msg());
	}

	$bytes_written = file_put_contents($export_config['filename'], $json_data);
	if ($bytes_written === false) {
		throw new Exception("Error al escribir archivo JSON");
	}

	echo "\n" . str_repeat("=", 60) . "\n";
	echo "✅ EXPORTACIÓN COMPLETADA EXITOSAMENTE\n";
	echo str_repeat("=", 60) . "\n";
	echo "📁 Archivo: " . $export_config['filename'] . "\n";
	echo "📊 Tamaño: " . number_format($bytes_written / 1024, 2) . " KB\n";
	echo "🔢 Total productos: " . count($data) . "\n";
	echo str_repeat("=", 60) . "\n";

	echo "📋 Muestra del JSON generado:\n";
	echo substr($json_data, 0, 500) . "...\n";

} catch (Exception $e) {
	echo "❌ ERROR: " . $e->getMessage() . "\n";
	exit(1);
} finally {
	if (isset($mysqli)) {
		$mysqli->close();
	}
}

echo "\n🎉 Script completado exitosamente.\n";
?>
