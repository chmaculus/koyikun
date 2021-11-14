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


#--------------------------------------------------------------
def getnumero(sucursal):
	q='select id from sucursales where sucursal="'+sucursal+'"'
	cursor.execute(q)
	id_sucursal=cursor.fetchone()
	return id_sucursal[0]
	
#--------------------------------------------------------------



sql1='truncate table numero_venta'
cursor.execute(sql1)


sql='select sucursal,fecha,hora from ventas order by sucursal,fecha,hora'
cursor.execute(sql)
resultado=cursor.fetchall()

for registro in resultado:
	if(esprimero=="1"):
		sucursal=registro[0]
		esprimero="0"

	if(registro[0]!=sucursal):
		q2='insert into numero_venta set numero="'+str(nventa+1)+'", id_sucursal="'+str(numerosuc)+'"'	
		print q2
		cursor.execute(q2)
		sucursal=registro[0]
		nventa=0

	if(fecha!=registro[1] or hora!=registro[2]):
		nventa=nventa+1
		q='update ventas set numero_venta="'+str(nventa)+'" where sucursal="'+str(registro[0])+'" and fecha="'+str(registro[1])+'" and hora="'+str(registro[2])+'"'
		cursor.execute(q)
		fecha=registro[1]
		hora=registro[2]
		numerosuc=getnumero(registro[0])





