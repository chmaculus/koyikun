<?php
include("../../includes/connect.php");


$r=mysql_query('select id from sucursales order by id');
echo "rows: ".mysql_num_rows($r)."<br>";

$array=mysql_fetch_array($r);

foreach($array as $v) {
    print "$v\n";
}

?> 