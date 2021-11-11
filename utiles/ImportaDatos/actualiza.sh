#! /bin/bash
echo "borra viejo"
rm nuevos.csv
echo "copia archivo csv nuevo"
cp "$1" nuevos.csv
echo "importa archivo csv en tabla preciosnuevos"
mysql -u root <sql/import1.sql
echo "aqui deberia ir tabla de reemplazos"
echo "importa stock, minimos y maximos a la tabla principal"
python python/actualiza.py
