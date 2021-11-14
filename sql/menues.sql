#-----------------------------------------------------------
drop table if exists menues;
create table menues (
	id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_padre MEDIUMINT UNSIGNED NOT NULL,
	jerarquia MEDIUMINT UNSIGNED NOT NULL,
	orden MEDIUMINT UNSIGNED NOT NULL,
	url varchar(512),
	submenu varchar(1),
	PRIMARY KEY (id)
);
alter table menues add index orden(orden);
alter table menues add index jerarquia(jerarquia);
#-----------------------------------------------------------

