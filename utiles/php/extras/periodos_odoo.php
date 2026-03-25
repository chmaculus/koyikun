<?php
// Script PHP 5.6 para consulta de productos por períodos - Salida JSON
// Configuración de la base de datos PostgreSQL
$host = 'localhost';
$dbname = 'pixie';
$username = 'cam';
$password = 'lps';
$port = '5432';

// Script modificado para escribir JSON a archivo

try {
	// Conexión a PostgreSQL usando PDO
	$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// Consulta SQL
	$sql = "
		SELECT
		  COALESCE(pp.default_code, '') AS default_code,
		  pc.name AS product_category,
		  pol.full_product_name,
		  COUNT(*) FILTER (WHERE pol.create_date >= now() - INTERVAL '1 month') AS last_1m,
		  COUNT(*) FILTER (WHERE pol.create_date >= now() - INTERVAL '2 month') AS last_2m,
		  COUNT(*) FILTER (WHERE pol.create_date >= now() - INTERVAL '3 month') AS last_3m,
		  COUNT(*) FILTER (WHERE pol.create_date >= now() - INTERVAL '4 month') AS last_4m,
		  COUNT(*) FILTER (WHERE pol.create_date >= now() - INTERVAL '5 month') AS last_5m,
		  COUNT(*) FILTER (WHERE pol.create_date >= now() - INTERVAL '6 month') AS last_6m,
		  COUNT(*) AS total_all_time
		FROM public.pos_order_line pol
		JOIN public.product_product pp ON pol.product_id = pp.id
		JOIN public.product_template pt ON pp.product_tmpl_id = pt.id
		JOIN public.product_category pc ON pt.categ_id = pc.id
		GROUP BY COALESCE(pp.default_code, ''), pol.full_product_name, pc.name
		ORDER BY product_category, full_product_name
	";
	
	// Ejecutar la consulta
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	
	// Obtener resultados
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	// Array para almacenar todos los resultados
	$datos_json = array();
	
	// Procesar resultados
	foreach ($results as $row) {
		// Crear objeto con todos los campos de la consulta
		$producto = array(
			"id_articulos" => trim($row['default_code']),
			"categoria" => trim($row['product_category']),
			"producto" => trim($row['full_product_name']),
			"1_mes" => (int)$row['last_1m'],
			"2_meses" => (int)$row['last_2m'],
			"3_meses" => (int)$row['last_3m'],
			"4_meses" => (int)$row['last_4m'],
			"5_meses" => (int)$row['last_5m'],
			"6_meses" => (int)$row['last_6m']
		);
		
		// Agregar al array principal
		$datos_json[] = $producto;
	}
	
	// Crear respuesta final con metadatos
	$respuesta_final = $datos_json;
	
	// echo print_r($respuesta_final,true);
	// exit;



	// Generar JSON con formato legible
	$json_output = json_encode($respuesta_final, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	
	// Nombre del archivo con timestamp
	$nombre_archivo = '/logs/ventas_odoo.json';
	
	// Escribir JSON al archivo
	$resultado_escritura = file_put_contents($nombre_archivo, $json_output);
	
	if ($resultado_escritura !== false) {
		echo "Archivo JSON generado exitosamente: " . $nombre_archivo . "\n";
		echo "Registros procesados: " . count($datos_json) . "\n";
		echo "Tamaño del archivo: " . number_format($resultado_escritura) . " bytes\n";
	} else {
		echo "Error al escribir el archivo JSON\n";
	}
	
} catch (PDOException $e) {
	// Error de conexión o consulta
	$error_response = array(
		"error" => true,
		"mensaje" => "Error de base de datos: " . $e->getMessage(),
		"fecha" => date('Y-m-d H:i:s')
	);
	echo json_encode($error_response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	exit(1);
} catch (Exception $e) {
	// Error general
	$error_response = array(
		"error" => true,
		"mensaje" => "Error general: " . $e->getMessage(),
		"fecha" => date('Y-m-d H:i:s')
	);
	echo json_encode($error_response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	exit(1);
}

// Cerrar conexión
$pdo = null;
?>
