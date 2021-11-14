#!/bin/python
import connect, MySQLdb
#import sys

#tabla=sys.argv[1]

sucursal=""
nventa=0
esprimero="1"
fecha=""
hora=""


db=MySQLdb.connect(host='localhost',user=connect.user,passwd=connect.passwd,db=connect.db)
cursor=db.cursor()



#sql='select * from ventas order by sucursal,numero_venta'
sql='select * from ventas order by sucursal,fecha desc, hora desc'
cursor.execute(sql)
resultado=cursor.fetchall()

#print "numero venta"+"|"+"cantidad"+"|"+"precio unitario"+"|"+"sucursal"+"|"+"tipo pago"+"|"+"vendedor"+"|"+"fecha"+"|"+"hora"
print "numero venta"+"|"+"sucursal"+"|"+"tipo pago"+"|"+"vendedor"+"|"+"fecha"+"|"+"hora"

for registro in resultado:
	#print registro[1],"|",registro[6],"|",registro[7],"|",registro[8],"|",registro[9],"|",registro[10],"|",registro[11],"|",registro[12]
	print registro[1],"|",registro[8],"|",registro[9],"|",registro[10],"|",registro[11],"|",registro[12]



#estructura tabla
#--------------------------------------
# 0 id
# 1 numero_venta
# 2 marca
# 3 descripcion
# 4 clasificacion
# 5 subclasificacion
# 6 cantidad
# 7 precio_unitario
# 8 sucursal
# 9 tipo_pago
# 10 vendedor
# 11 fecha
# 12 hora
#--------------------------------------

