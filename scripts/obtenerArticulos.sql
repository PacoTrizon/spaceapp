DELIMITER $$
DROP PROCEDURE IF EXISTS obtenerArticulos $$
CREATE PROCEDURE obtenerArticulos(
IN _categoria INTEGER,
	IN _palabra NVARCHAR(100),
	IN _fechainicial DATETIME,
	IN _fechafinal DATETIME,
	IN _usuario INTEGER,
	IN _address nvarchar(17)
)
BEGIN
	DECLARE exist int;
	DECLARE response nvarchar(500) default '';
DECLARE lastid INT default 0;
	DECLARE _rollback BOOL DEFAULT 0;
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET _rollback = 1;
	START TRANSACTION;

	drop table if exists articles;

IF _usuario not like '' THEN
	IF _fechainicial not like '' THEN
		IF _fechafinal not like '' THEN
			IF _palabra not like '' THEN
				insert into consultas (palabras,categoria_id,usuario_id,fecha_inicio,fecha_fin,fecha_consulta)
				values (_palabra,_categoria,_usuario,_fechainicial,_fechafinal,now());
					if _categoria between 0 and 6 then
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						( art.fecha_creacion BETWEEN _fechainicial and _fechafinal) and
						art.categoria_id = _categoria and
						(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
						order by art.fecha_creacion desc );
											else
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						( art.fecha_creacion BETWEEN _fechainicial and _fechafinal) and
						(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
						order by art.fecha_creacion desc );
					end if;
							ELSE
				insert into consultas (categoria_id,usuario_id,fecha_inicio,fecha_fin,fecha_consulta)
				values (_categoria,_usuario,_fechainicial,_fechafinal,now());
				if _categoria between 0 and 6 then
					create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						( art.fecha_creacion BETWEEN _fechainicial and _fechafinal) and
						art.categoria_id = _categoria
						order by art.fecha_creacion desc );
				else
					create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						( art.fecha_creacion BETWEEN _fechainicial and _fechafinal)
						order by art.fecha_creacion desc );
				end if;
							END IF;
		ELSE
			IF _palabra not like '' THEN
				insert into consultas (palabras,categoria_id,usuario_id,fecha_inicio,fecha_consulta)
				values (_palabra,_categoria,_usuario,_fechainicial,now());
					if _categoria between 0 and 6 then
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						art.fecha_creacion > _fechainicial and
						art.categoria_id = _categoria and
						(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
						order by art.fecha_creacion desc );
											else
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						art.fecha_creacion > _fechainicial and
							(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
						order by art.fecha_creacion desc );
					end if;
							ELSE
				insert into consultas (categoria_id,usuario_id,fecha_inicio,fecha_consulta)
				values (_categoria,_usuario,_fechainicial,now());
									if _categoria between 0 and 6 then
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						art.fecha_creacion > _fechainicial and
						art.categoria_id = _categoria
						order by art.fecha_creacion desc );
											else
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						art.fecha_creacion > _fechainicial
						order by art.fecha_creacion desc );
					end if;
							END IF;
		END IF;
			ELSE
		IF _fechafinal not like '' THEN
			IF _palabra not like '' THEN
				insert into consultas (palabras,categoria_id,usuario_id,fecha_fin,fecha_consulta)
				values (_palabra,_categoria,_usuario,_fechafinal,now());
									if _categoria between 0 and 6 then
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						art.fecha_creacion < _fechafinal and
						art.categoria_id = _categoria and
						(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
						order by art.fecha_creacion desc );
											else
						create temporary table articles as (
													select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
						inner join categorias cat on cat.id = art.categoria_id where
						art.fecha_creacion < _fechafinal and
						(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
						order by art.fecha_creacion desc );
					end if;
							ELSE
				insert into consultas (categoria_id,usuario_id,fecha_fin,fecha_consulta)
				values (_categoria,_usuario,_fechafinal,now());
					if _categoria between 0 and 6 then
							create temporary table articles as (
							select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
							inner join categorias cat on cat.id = art.categoria_id where
							art.fecha_creacion < _fechafinal and
							art.categoria_id = _categoria
							order by art.fecha_creacion desc );
						else
							create temporary table articles as (
							select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
							inner join categorias cat on cat.id = art.categoria_id where
							art.fecha_creacion < _fechafinal
							order by art.fecha_creacion desc );
						end if;
							END IF;
		ELSE
			IF _palabra not like '' THEN
							#call obtenerArticulos(4,'de',null,null,1,'');
				insert into consultas (palabras,categoria_id,usuario_id,fecha_consulta)
				values (_palabra,_categoria,_usuario,now());
					if _categoria between 0 and 6 then
							create temporary table articles as (
							select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
							inner join categorias cat on cat.id = art.categoria_id where
							#art.categoria_id = _categoria
									(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
							order by art.fecha_creacion desc );
						else
							create temporary table articles as (
							select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
							inner join categorias cat on cat.id = art.categoria_id where
							(upper(art.nombre) like upper(concat('%',_palabra,'%')) or upper(CONVERT(art.contenido USING utf8)) like upper(concat('%',_palabra,'%')))
							order by art.fecha_creacion desc );
						end if;
							ELSE
				insert into consultas (categoria_id,usuario_id,fecha_consulta)
				values (_categoria,_usuario,now());
									if _categoria between 0 and 6 then
							create temporary table articles as (
							select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
							inner join categorias cat on cat.id = art.categoria_id where
							art.categoria_id = _categoria
							order by art.fecha_creacion desc );
						else
							create temporary table articles as (
							select art.id ,art.nombre, art.contenido,cat.nombre	as categoria,art.fecha_creacion from articulos art
							inner join categorias cat on cat.id = art.categoria_id
							order by art.fecha_creacion desc );
						end if;
							END IF;
		END IF;
			END IF;
	END IF;

if _rollback = 1 then
	ROLLBACK;
	select 0 as id;
	elseif _rollback = 2 then
	select -1 as id;
else
	commit;
			select * from articles;
end if;

END $$

DELIMITER

--  call obtenerArticulos(1,'de','2017-01-01 00:00:00','2018-01-01 00:00:00',1,'');
--  call obtenerArticulos(7,'de','2017-01-01 00:00:00','2018-01-01 00:00:00',1,'');
--  call obtenerArticulos(2,'','2017-01-01 00:00:00','2018-01-01 00:00:00',1,'');
--  call obtenerArticulos(7,'','2017-01-01 00:00:00','2018-01-01 00:00:00',1,'');
--  call obtenerArticulos(2,'de','2017-01-01 00:00:00',null,1,'');
--  call obtenerArticulos(7,'de','2017-01-01 00:00:00',null,1,'');
--  call obtenerArticulos(2,'','2017-01-01 00:00:00',null,1,'');
--  call obtenerArticulos(7,'','2017-01-01 00:00:00',null,1,'');
--
--  call obtenerArticulos(3,'de',null,'2018-01-01 00:00:00',1,'');
--  call obtenerArticulos(7,'de',null,'2018-01-01 00:00:00',1,'');
--  call obtenerArticulos(3,'',null,'2018-01-01 00:00:00',1,'');
--  call obtenerArticulos(7,'',null,'2018-01-01 00:00:00',1,'');
--
--  call obtenerArticulos(4,'de',null,null,1,'');
--  call obtenerArticulos(7,'de',null,null,1,'');
--  call obtenerArticulos(4,'',null,null,1,'');
--  call obtenerArticulos(7,'',null,null,1,'');
--
