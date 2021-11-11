use blackcat;

truncate table temp5;
load data local infile "repuestos.csv" into table temp5 fields terminated by "|";

