<?php

$archivo = 'ventas_por_periodos_2025-10-21_15-31-02.json';
$contenido = file_get_contents($archivo);

if ($contenido !== false) {
    // echo "Archivo leído exitosamente\n";
    // $contenido ahora tiene todo el contenido del archivo
} else {
    echo "Error al leer el archivo\n";
}

$array=json_decode($contenido,true);



// Script PHP 5.6 para consulta de productos por períodos
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'pixie';
$username = 'cam';
$password = 'lps';
$port = '5432';

try {
	// Conexión a PostgreSQL usando PDO
	$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
	$pdo = new PDO($dsn, $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// echo "Conexión exitosa a la base de datos\n";
	
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
	
	// Mostrar encabezados
	// echo "\n" . str_repeat("=", 120) . "\n";
	// echo sprintf("%-15s %-25s %-30s %8s %8s %8s %8s %8s %8s %10s\n",
	// 	"Código", "Categoría", "Producto", "1M", "2M", "3M", "4M", "5M", "6M", "Total"
	// );
	// echo str_repeat("=", 120) . "\n";



	$array_salida=array();
	
	// Mostrar resultados
	foreach ($results as $row) {
		// Asignar cada columna a una variable
		$codigo = substr($row['default_code'], 0, 15);
		$categoria = substr($row['product_category'], 0, 25);
		$producto = substr($row['full_product_name'], 0, 30);

		// echo "cod $codigo \n";

		$start=microtime(true);
		foreach($array['productos'] as $prod){
			$id_articulo=$prod['id_articulos'];
			if($codigo==$id_articulo){
				$mesa1=$prod['cantidades_por_periodo']['1_mes'];
				$mesa2=$prod['cantidades_por_periodo']['2_meses'];
				$mesa3=$prod['cantidades_por_periodo']['3_meses'];
				$mesa4=$prod['cantidades_por_periodo']['4_meses'];
				$mesa5=$prod['cantidades_por_periodo']['5_meses'];
				$mesa6=$prod['cantidades_por_periodo']['6_meses'];


				$mes1 = $row['last_1m'] + $mesa1;
				$mes2 = $row['last_2m'] + $mesa2;
				$mes3 = $row['last_3m'] + $mesa3;
				$mes4 = $row['last_4m'] + $mesa4;
				$mes5 = $row['last_5m'] + $mesa5;
				$mes6 = $row['last_6m'] + $mesa6;
				// $total = $row['total_all_time'];
				
				// Crear nuevo array con las variables
				$nuevo_array = array(
					'codigo' => $codigo,
					'categoria' => $categoria,
					'producto' => $producto,
					'mes_1' => $mes1,
					'mes_2' => $mes2,
					'mes_3' => $mes3,
					'mes_4' => $mes4,
					'mes_5' => $mes5,
					'mes_6' => $mes6
				);
				
				$array_salida[]=$nuevo_array;


				break;
			}
		}
		$end=microtime(true);
		// echo "time: ".($end - $start)."\n";


		// echo sprintf("%-15s %-25s %-30s %8d %8d %8d %8d %8d %8d %10d\n",
		// 	$codigo, $categoria, $producto, $mes1, $mes2, $mes3, $mes4, $mes5, $mes6, $total
		// );
	}
	
	
} catch (PDOException $e) {
	echo "Error de conexión: " . $e->getMessage() . "\n";
	exit(1);
} catch (Exception $e) {
	echo "Error general: " . $e->getMessage() . "\n";
	exit(1);
}

// Cerrar conexión
$pdo = null;




// echo print_r($array_salida,true);

// echo json_encode($array_salida);

// Imprimir resultados del array_salida
echo "Codigo;Categoria;Producto;1M;2M;3M;4M;5M;6M \n";



foreach ($array_salida as $item) {
	echo $item['codigo'].";";
	echo $item['categoria'].";";
	echo $item['producto'].";";
	echo $item['mes_1'].";";
	echo $item['mes_2'].";";
	echo $item['mes_3'].";";
	echo $item['mes_4'].";";
	echo $item['mes_5'].";";
	echo $item['mes_6'];
	echo "\n";
}

?>