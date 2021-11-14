#!/bin/python
import connect, MySQLdb
#import sys

#tabla=sys.argv[1]

count=0
id_articulo=""
id_sucursal=""


db=MySQLdb.connect(host='localhost',user=connect.user,passwd=connect.passwd,db=connect.db)
cursor=db.cursor()

#----------------------------------------
print "Eliminando huefanos en stock"
sql='select distinct id_articulo from stock order by id_articulo'
cursor.execute(sql)
result=cursor.fetchall()

for row in result:
	q='select id from articulos where id="'+str(row[0])+'"'
	cursor.execute(q)
	rows=cursor.rowcount
	if rows<1:
		q2='delete from stock where id_articulo="'+str(row[0])+'"'
		print q2
		cursor.execute(q2)
#----------------------------------------

	
#----------------------------------------
print "Eliminando huefanos en precios"
sql='select distinct id_articulo from precios order by id_articulo'
cursor.execute(sql)
result=cursor.fetchall()

for row in result:
	q='select id from articulos where id="'+str(row[0])+'"'
	cursor.execute(q)
	rows=cursor.rowcount
	if rows<1:
		q2='delete from precios where id_articulo="'+str(row[0])+'"'
		print q2
		cursor.execute(q2)
#----------------------------------------
	
#----------------------------------------
print "Eliminando huefanos en costos"
sql='select distinct id_articulos from costos order by id_articulos'

cursor.execute(sql)
result=cursor.fetchall()

for row in result:
	q='select id from articulos where id="'+str(row[0])+'"'
	cursor.execute(q)
	rows=cursor.rowcount
	if rows<1:
		q2='delete from costos where id_articulos="'+str(row[0])+'"'
		print q2
		cursor.execute(q2)
#----------------------------------------
	

