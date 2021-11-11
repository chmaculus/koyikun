#!/bin/python
import connect, MySQLdb
#import sys

#tabla=sys.argv[1]


db=MySQLdb.connect(host='localhost',user=connect.user,passwd=connect.passwd,db=connect.db)
cursor=db.cursor()

sql='select * from articulos where presentacion!=""'
cursor.execute(sql)
resultado=cursor.fetchall()

print "Marca|Descripcion|Clasificacion|Subclasificacion|Contenido|Presentacion|"
for registro in resultado:
    #print "id: "+str(registro[0])+" presentacion: "+str(registro[5])
    print str(registro[2])+"|"+str(registro[3])+"|"+str(registro[9])+"|"+str(registro[10])+"|"+str(registro[4])+"|"+str(registro[5])+"|"


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
