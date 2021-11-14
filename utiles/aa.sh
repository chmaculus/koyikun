#!/bin/sh
fecha=`date +%G"-"%m"-"%d`
hora=`date +%H"_"%M`
path='/home/php/KoyiKun0.26/utiles/php/'

cd $path
echo "export excel"
php precios_excel.php>"lista_af_"$fecha"_"$hora".xls"

echo "comprime lista"
rm -f precios_af.zip
zip precios_af.zip "lista_af_"$fecha"_"$hora".xls"
rm -f "lista_af_"$fecha"_"$hora".xls"

rm -f /home/httpd/html/precios_af.zip
cp precios_af.zip /home/httpd/html

echo "genera tabla para exportar"
php precios_export.php

echo "dump tabla precios_export"
mysqldump -u root lucas2 articulos_export>export.sql

echo "comprime dump precios_export"
rm -f export.sql.gz
gzip -9 export.sql

rm -f /home/httpd/html/export.sql.gz 
cp export.sql.gz /home/httpd/html




