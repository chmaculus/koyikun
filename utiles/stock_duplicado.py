#!/bin/python
import connect, MySQLdb
#import sys

#tabla=sys.argv[1]

count=0
id_articulo=""
id_sucursal=""


db=MySQLdb.connect(host='localhost',user=connect.user,passwd=connect.passwd,db=connect.db)
cursor=db.cursor()

sql='select id_articulo, id_sucursal from stock order by id_articulo, id_sucursal'
cursor.execute(sql)
resultado=cursor.fetchall()

for registro in resultado:
	if registro[1]==id_sucursal:
		if registro[0]==id_articulo:
			print "art: "+str(registro[0])+" suc: "+str(registro[1])+" Esta duplicado"
		else:
			id_articulo=registro[0]
	else:
		id_sucursal=registro[1]

