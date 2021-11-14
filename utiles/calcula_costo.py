#!/bin/python
import connect, MySQLdb

def calcula(row):
    temp1=row[2] - (( row[2] * row[4] ) / 100 ) 
    temp1=temp1 - (( temp1 * row[5]) / 100)
    temp1=temp1 - (( temp1 * row[6]) / 100)
    temp1=temp1 - (( temp1 * row[7]) / 100)
    temp1=temp1 - (( temp1 * row[8]) / 100)
    temp1=temp1 - (( temp1 * row[9]) / 100)
    temp1=temp1 - (( temp1 * row[10]) / 100)
    temp1=temp1 - (( temp1 * row[11]) / 100)
    temp1=temp1 - (( temp1 * row[12]) / 100)
    temp1=temp1 - (( temp1 * row[13]) / 100)
    temp1=temp1 + (( temp1 * row[14]) / 100)
    temp1=temp1 + (( temp1 * row[15]) / 100)
    return temp1

	

db=MySQLdb.connect(host='localhost',user=connect.user,passwd=connect.passwd,db=connect.db)
cursor=db.cursor()

sql='select * from costos where precio_costo>0'

cursor.execute(sql)
result=cursor.fetchall()

print 'use lucas2;'
print 'truncate table precios;'
for row in result:
    p_venta=calcula(row)
    sql='insert into precios set id_articulo="'+str(row[1])+'", precio_base="'+str( round(p_venta,6) )+'", porcentaje_contado="0", porcentaje_tarjeta="20", id_sucursal=1, fecha="'+str(row[16])+'", hora="'+str(row[17])+'";'
    print sql
    
#estructura tabla: costos
#--------------------------------------
# 0     id      mediumint(8) unsigned
# 1     id_articulos    mediumint(9)
# 2     precio_costo    double
# 3     moneda  varchar(6)
# 4     descuento1      double
# 5     descuento2      double
# 6     descuento3      double
# 7     descuento4      double
# 8     descuento5      double
# 9     descuento6      double
# 10    descuento7      double
# 11    descuento8      double
# 12    descuento9      double
# 13    descuento10     double
# 14    iva     double
# 15    margen  double
# 16    fecha   date
# 17    hora    time
# 18    fecha_gerencia  date
# 19    hora_gerencia   time
#--------------------------------------

