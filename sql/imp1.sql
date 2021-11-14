insert into lucas.articulos(select	null, 
					codigo_interno, 
					marca, 
					descripcion, 
					codigo_barra,
					null,
					null, 
					clasificacion, 
					subclasificacion 
					    from temp.articulos);
