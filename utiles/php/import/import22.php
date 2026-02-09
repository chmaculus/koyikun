<?php
// Ruta del archivo CSV
$archivo = "/tmp/city_girl.csv";

// Verifica que el archivo exista
if (!file_exists($archivo)) {
    die("El archivo no existe.");
}

// Abre el archivo en modo lectura
$handle = fopen($archivo, "r");

if ($handle) {
    while (($linea = fgets($handle)) !== false) {
        $linea=str_replace(chr(13),"",$linea);
        $linea=str_replace(chr(10),"",$linea);
        // Elimina saltos de línea
        $linea = trim($linea);

        // Separa la línea por punto y coma
        $cam = explode(";", $linea);
        /*
        MARCA	CODIGO INTERNO	DETALLE	COSTO	DT1 	IVA	CLASIFICACION	SUBCLASIFICACION

        */

        $q='delete from articulos where codigo_interno="'.$cam[1].'"';
        echo $q.";\n";
        // Muestra los campos
        $q='insert into articulos set codigo_interno="'.$cam[1].'", 
        clasificacion="'.strtoupper($cam[6]).'",
        subclasificacion="'.strtoupper($cam[7]).'",
        contenido="",
        color="",
        presentacion="",
        marca="'.strtoupper($cam[0]).'",
        descripcion="'.strtoupper($cam[2]).'",
        codigo_barra=""
        ';

        echo $q.";\n";
        //echo $cam[0];
    }

    fclose($handle);
} else {
    echo "No se pudo abrir el archivo.";
}



/*
cod int;clasificacion;subclasificacion;contenido;color;Presentación;Marca;descripcion;codigo barra
+------------------+-----------------------+------+-----+---------+----------------+
| Field            | Type                  | Null | Key | Default | Extra          |
+------------------+-----------------------+------+-----+---------+----------------+
| id               | mediumint(8) unsigned | NO   | PRI | NULL    | auto_increment |
| codigo_interno   | varchar(25)           | YES  |     | NULL    |                |
| marca            | varchar(30)           | YES  | MUL | NULL    |                |
| descripcion      | varchar(80)           | YES  | MUL | NULL    |                |
| contenido        | varchar(80)           | YES  |     | NULL    |                |
| presentacion     | varchar(80)           | YES  |     | NULL    |                |
| codigo_barra     | varchar(20)           | YES  | MUL | NULL    |                |
| fecha            | date                  | YES  |     | NULL    |                |
| hora             | time                  | YES  |     | NULL    |                |
| clasificacion    | varchar(60)           | YES  | MUL | NULL    |                |
| subclasificacion | varchar(60)           | YES  | MUL | NULL    |                |
| id_web           | mediumint(9)          | YES  |     | NULL    |                |
| publicar_web     | varchar(1)            | YES  |     | NULL    |                |
| discontinuo      | varchar(1)            | YES  |     | NULL    |                |
| lanzamiento      | varchar(1)            | YES  | MUL | NULL    |                |
| codigo_af        | mediumint(9)          | YES  |     | NULL    |                |
| marca_corta      | varchar(10)           | YES  |     | NULL    |                |
| color            | varchar(40)           | YES  |     | NULL    |                |
| observaciones    | text                  | YES  |     | NULL    |                |
| prom_asoc        | mediumint(8) unsigned | YES  |     | NULL    |                |
| zona             | tinyint(4)            | YES  |     | NULL    |                |
+------------------+-----------------------+------+-----+---------+----------------+
*/
?>
