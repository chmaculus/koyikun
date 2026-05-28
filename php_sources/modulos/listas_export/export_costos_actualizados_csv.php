<?php
include_once("../../includes/connect.php");
include_once("../../includes/funciones_costos.php");

$fecha=date("Y-n-d");
$hora=date("H_i_s");

$user_path='/var/www/html/listas/';

// ---- Traer timestamp de última ejecución ----
$last_run_file = '/data_scripts/cargar_productos_last_run.txt';
if (!file_exists($last_run_file)) {
    die("Error: no se encontró el archivo $last_run_file\n");
}
$last_run_ts = trim(file_get_contents($last_run_file));
if (empty($last_run_ts)) {
    die("Error: el archivo $last_run_file está vacío\n");
}
// Convertir a formato datetime si es un epoch unix numérico
if (is_numeric($last_run_ts)) {
    $last_run_datetime = date('Y-m-d H:i:s', (int)$last_run_ts);
} else {
    // Asumir que ya viene como datetime string
    $last_run_datetime = $last_run_ts;
}

echo "Última ejecución: $last_run_datetime\n";

// ---- Nombre de archivo de salida ----
$nombre_archivo = 'listas_odoo_actualizados.csv';
$fopen = fopen($user_path . $nombre_archivo, 'w');

$header  = '"ID"';
$header .= ';"Codigo"';
$header .= ';"Marca"';
$header .= ';"Descripcion"';
$header .= ';"Color"';
$header .= ';"Contenido"';
$header .= ';"Presentacion"';
$header .= ';"Categoria"';
$header .= ';"Subcategoria"';
$header .= ';"clasificacion"';
$header .= ';"Sub clasificacion"';
$header .= ';"Codigo barra"';
$header .= ';"Costo"';
$header .= ';"Des1"';
$header .= ';"Des2"';
$header .= ';"Des3"';
$header .= ';"Des4"';
$header .= ';"Des5"';
$header .= ';"Des6"';
$header .= ';"Costo S/IVA"';
$header .= ';"Costo Mayorista S/IVA"';
$header .= ';"Porcentaje mayorista"';
$header .= ';"IVA"';
$header .= ';"Margen AF"';
$header .= ';"Descuento"';
$header .= ';"Contado"';
$header .= ';"Categoria odoo"';
$header .= chr(10);
fwrite($fopen, $header);

// ---- Query con JOIN y filtro por epoch_updated ----
// Trae artículos donde el artículo O el costo hayan sido actualizados desde la última ejecución
$query = "SELECT articulos.*
          FROM articulos
          INNER JOIN costos ON costos.id_articulos = articulos.id
          WHERE articulos.marca != ''
            AND (
                articulos.epoch_updated > '" . mysql_real_escape_string($last_run_datetime) . "'
                OR costos.epoch_updated > '" . mysql_real_escape_string($last_run_datetime) . "'
            )
          GROUP BY articulos.id
          ORDER BY articulos.marca, articulos.clasificacion, articulos.subclasificacion,
                   articulos.contenido, articulos.presentacion, articulos.descripcion";

$result = mysql_query($query) or die(mysql_error());
$rows2  = mysql_num_rows($result);
echo "Artículos encontrados: $rows2\n";

while ($array_articulo = mysql_fetch_array($result)) {

    $array_costo = array_costo($array_articulo["id"]);

    $precio          = calcula_precio_venta($array_costo);
    $preciosiva      = calcula_precio_costo_siva($array_costo);
    $array_descuento = margen_descuento($array_costo["margen"]);

    $temp1               = ($precio - ($precio * $array_descuento["descuento"] / 100));
    $costo_mayorista_siva = $temp1;
    if ($array_costo["iva"] > 1) {
        $divid                = ($array_costo["iva"] / 100) + 1;
        $costo_mayorista_siva = round(($temp1 / $divid), 0);
        $costo_mayorista_civa = round($costo_mayorista_siva + ($costo_mayorista_siva * $array_costo["iva"] / 100), 0);
        $porc_mayorista       = round(((($precio / $costo_mayorista_civa) - 1) * 100), 0);
    } else {
        $costo_mayorista_siva = "revisar";
        $costo_mayorista_civa = "";
        $porc_mayorista       = "";
    }

    echo $array_articulo["id"] . " des: " . $costo_mayorista_civa . " porc may " . $porc_mayorista . "\n";

    $linea  = '"' . $array_articulo["id"] . '"';
    $linea .= ';"' . $array_articulo["codigo_interno"] . '"';
    $linea .= ';"' . strtoupper($array_articulo["marca"]) . '"';
    $linea .= ';"' . str_replace('"', '', strtoupper($array_articulo["descripcion"])) . '"';
    $linea .= ';"' . str_replace('"', '', strtoupper($array_articulo["color"])) . '"';
    $linea .= ';"' . strtoupper($array_articulo["contenido"]) . '"';
    $linea .= ';"' . strtoupper($array_articulo["presentacion"]) . '"';

    // Categoría web
    if ($array_articulo["id_web"] > 0) {
        $resaa      = mysql_query("select * from categorias_web where id=" . $array_articulo["id_web"]);
        $categoria  = mysql_result($resaa, 0, 1);
        $subcategoria = mysql_result($resaa, 0, 2);
        $linea .= ';"' . strtoupper($categoria) . '"';
        $linea .= ';"' . strtoupper($subcategoria) . '"';
    } else {
        $linea .= ';""';
        $linea .= ';""';
    }

    $linea .= ';"' . strtoupper($array_articulo["clasificacion"]) . '"';
    $linea .= ';"' . strtoupper($array_articulo["subclasificacion"]) . '"';
    $linea .= ';"' . strtoupper($array_articulo["codigo_barra"]) . '"';
    $linea .= ';"' . elimina_decimal($array_costo["precio_costo"]) . '"';
    $linea .= ';"' . $array_costo["descuento1"] . '"';
    $linea .= ';"' . $array_costo["descuento2"] . '"';
    $linea .= ';"' . $array_costo["descuento3"] . '"';
    $linea .= ';"' . $array_costo["descuento4"] . '"';
    $linea .= ';"' . $array_costo["descuento5"] . '"';
    $linea .= ';"' . $array_costo["descuento6"] . '"';
    $linea .= ';"' . $preciosiva . '"';             // precio af sin iva
    $linea .= ';"' . $costo_mayorista_siva . '"';   // precio mayorista sin iva
    $linea .= ';"' . $porc_mayorista . '"';         // porcentaje mayorista
    $linea .= ';"' . str_replace(".", ",", $array_costo["iva"]) . '"';
    $linea .= ';"' . $array_costo["margen"] . '"';
    $linea .= ';"' . elimina_decimal(trae_descuento($array_costo["margen"])) . '"';
    $linea .= ';"' . elimina_decimal($precio) . '"';
    $linea .= ';"' . strtoupper($array_articulo["marca"]) . '-' . $array_costo["margen"] . '"';
    $linea .= chr(10);

    fwrite($fopen, $linea);
}
fclose($fopen);

echo "Archivo generado: " . $user_path . $nombre_archivo . "\n";


#-----------------------------------------------------------------
function get_listas_porcentaje($id_articulos, $id_lista) {
    $query  = 'select * from listas_porcentaje where id_lista="' . $id_lista . '" and id_articulos="' . $id_articulos . '"';
    $result = mysql_query($query);
    if (mysql_error()) {
        echo mysql_error();
    }
    $rows = mysql_num_rows($result);
    if (isset($rows)) {
        if ($rows == 1) {
            $array_listas = mysql_fetch_array($result);
        } else {
            $array_listas["porcentaje"] = 0;
        }
    }
    return $array_listas;
}
#-----------------------------------------------------------------

function categoria_web($id_categorias_web) {
    $query               = 'select * from categorias_web where id="' . $id_categorias_web . '"';
    $array_categorias_web = mysql_fetch_array(mysql_query($query));
    if (mysql_error()) {
        echo mysql_error() . "<br>" . $query . "<br>" . $_SERVER["SCRIPT_NAME"] . "<br>";
    }
    return $array_categorias_web;
}
#-----------------------------------------------------------------

function elimina_decimal($value) {
    $aa = explode(".", $value);
    return $aa[0];
}

function trae_descuento($margen) {
    $q   = 'select descuento from margenes_descuentos where margen=' . $margen;
    $res = mysql_query($q);
    if (mysql_error()) {
        echo $q . "\n";
        echo mysql_error() . "\n";
    }
    $rows = mysql_num_rows($res);
    if ($rows < 1) {
        echo "rows: $rows \n";
    }
    $r = mysql_result($res, 0, 0);
    return $r;
}

function trae_desc2($id_articulo) {
    $q    = 'select numero from temp1 where id=' . $id_articulo;
    $res  = mysql_query($q);
    $rows = mysql_num_rows($res);
    if ($rows > 0) {
        $aa = mysql_result($res, 0, 0);
        if ($aa > 0) {
            return $aa;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

?>
