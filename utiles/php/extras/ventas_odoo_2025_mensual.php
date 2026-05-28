<?php
// Script para exportar ventas Odoo del año 2025 discriminadas mes a mes
$host = 'localhost';
$dbname = 'pixie';
$username = 'cam';
$password = 'lps';
$port = '5432';

try {
	$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "
		SELECT
		  COALESCE(pp.default_code, '') AS default_code,
		  pc.name AS product_category,
		  pol.full_product_name,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 1)  AS enero,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 2)  AS febrero,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 3)  AS marzo,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 4)  AS abril,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 5)  AS mayo,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 6)  AS junio,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 7)  AS julio,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 8)  AS agosto,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 9)  AS septiembre,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 10) AS octubre,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 11) AS noviembre,
		  COUNT(*) FILTER (WHERE EXTRACT(MONTH FROM pol.create_date) = 12) AS diciembre,
		  COUNT(*) AS total_anual
		FROM public.pos_order_line pol
		JOIN public.product_product pp ON pol.product_id = pp.id
		JOIN public.product_template pt ON pp.product_tmpl_id = pt.id
		JOIN public.product_category pc ON pt.categ_id = pc.id
		WHERE EXTRACT(YEAR FROM pol.create_date) = 2026
		GROUP BY COALESCE(pp.default_code, ''), pol.full_product_name, pc.name
		ORDER BY product_category, full_product_name
	";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$datos_json = array();
	foreach ($results as $row) {
		$datos_json[] = array(
			"id_articulos"    => trim($row['default_code']),
			"categoria"       => trim($row['product_category']),
			"producto"        => trim($row['full_product_name']),
			"enero"           => (int)$row['enero'],
			"febrero"         => (int)$row['febrero'],
			"marzo"           => (int)$row['marzo'],
			"abril"           => (int)$row['abril'],
			"mayo"            => (int)$row['mayo'],
			"junio"           => (int)$row['junio'],
			"julio"           => (int)$row['julio'],
			"agosto"          => (int)$row['agosto'],
			"septiembre"      => (int)$row['septiembre'],
			"octubre"         => (int)$row['octubre'],
			"noviembre"       => (int)$row['noviembre'],
			"diciembre"       => (int)$row['diciembre'],
			"total_anual"     => (int)$row['total_anual']
		);
	}

	$json_output = json_encode($datos_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	$nombre_archivo = '/logs/ventas_odoo_2026_mensual.json';

	$resultado_escritura = file_put_contents($nombre_archivo, $json_output);

	if ($resultado_escritura !== false) {
		echo "Archivo JSON generado exitosamente: " . $nombre_archivo . "\n";
		echo "Registros procesados: " . count($datos_json) . "\n";
		echo "Tamaño del archivo: " . number_format($resultado_escritura) . " bytes\n";
	} else {
		echo "Error al escribir el archivo JSON\n";
	}

} catch (PDOException $e) {
	echo json_encode(array(
		"error" => true,
		"mensaje" => "Error de base de datos: " . $e->getMessage()
	), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	exit(1);
} catch (Exception $e) {
	echo json_encode(array(
		"error" => true,
		"mensaje" => "Error general: " . $e->getMessage()
	), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
	exit(1);
}

$pdo = null;
?>
