<?php
/*
    Script PHP 5.6
    Lee un archivo CSV y genera un archivo .sql
    con los INSERT para la tabla articulos

    Compatible con:
    - PHP 5.6
    - MySQL / MariaDB

    CONFIGURACION
*/

$archivo_csv = "articulos.csv";
$archivo_sql = "insert_articulos.sql";


// ========================================
// ABRIR ARCHIVOS
// ========================================

$fp_csv = fopen($archivo_csv, "r");

if (!$fp_csv) {
    die("No se pudo abrir el CSV\n");
}

$fp_sql = fopen($archivo_sql, "w");

if (!$fp_sql) {
    die("No se pudo crear el archivo SQL\n");
}


// ========================================
// SALTAR CABECERA
// ========================================

$cabecera = fgetcsv($fp_csv, 0, ";");


// ========================================
// RECORRER CSV
// ========================================

while (($datos = fgetcsv($fp_csv, 0, ";")) !== FALSE) {

    // ========================================
    // CAMPOS CSV
    // ========================================

    $marca              = trim($datos[0]);
    $descripcion        = trim($datos[1]);
    $color              = trim($datos[2]);
    $contenido          = trim($datos[3]);
    $presentacion       = trim($datos[4]);
    $clasificacion      = trim($datos[5]);


    // ========================================
    // LIMPIAR COMILLAS
    // ========================================

    $marca              = addslashes($marca);
    $descripcion        = addslashes($descripcion);
    $color              = addslashes($color);
    $contenido          = addslashes($contenido);
    $presentacion       = addslashes($presentacion);
    $clasificacion      = addslashes($clasificacion);


    // ========================================
    // FECHA Y HORA
    // ========================================

    $fecha = date("Y-m-d");
    $hora  = date("H:i:s");


    // ========================================
    // GENERAR SQL
    // ========================================

    $sql  = "INSERT INTO articulos SET \n";
    $sql .= "marca              = '$marca',\n";
    $sql .= "descripcion        = '$descripcion',\n";
    $sql .= "contenido          = '$contenido',\n";
    $sql .= "presentacion       = '$presentacion',\n";
    $sql .= "fecha              = '$fecha',\n";
    $sql .= "hora               = '$hora',\n";
    $sql .= "clasificacion      = '$clasificacion',\n";
    $sql .= "color              = '$color';\n\n";


    // ========================================
    // ESCRIBIR ARCHIVO
    // ========================================

    fwrite($fp_sql, $sql);
}


// ========================================
// CERRAR ARCHIVOS
// ========================================

fclose($fp_csv);

fclose($fp_sql);


echo "Archivo SQL generado correctamente\n";

?>