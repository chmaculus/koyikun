#!/bin/python
import connect, MySQLdb
#import sys

#tabla=sys.argv[1]


db=MySQLdb.connect(host='localhost',user=connect.user,passwd=connect.passwd,db=connect.db)
cursor=db.cursor()

sql='select * from articulos where presentacion like "%cc%"'
cursor.execute(sql)
resultado=cursor.fetchall()

for registro in resultado:
    sql='update articulos set contenido="'+str(registro[5])+'", presentacion="" where id="'+str(registro[0])+'"'
    cursor.execute(sql)
    #print sql


#estructura tabla
#--------------------------------------
# 0 id
# 1 codigo_interno
# 2 marca
# 3 descripcion
# 4 contenido
# 5 presentacion
# 6 codigo_barra
# 7 fecha
# 8 hora
# 9 clasificacion
# 10 subclasificacion
#--------------------------------------
