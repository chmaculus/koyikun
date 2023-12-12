<?php
include("./includes/connect.php");

$q='select id_articulos, cantidad from stock_movimiento_interno where numero_envio in(2290, 
                                        2276, 
                                        2275, 
                                        2274, 
                                        2273, 
                                        2272, 
                                        2271, 
                                        2270, 
                                        2269, 
                                        2268, 
                                        2267, 
                                        2266, 
                                        2265, 
                                        2263, 
                                        2262, 
                                        2261, 
                                        2260, 
                                        2259, 
                                        2258, 
                                        2257,
                                        2256, 
                                        2255, 
                                        2254, 
                                        2253, 
                                        2252, 
                                        2250, 
                                        2249, 
                                        2248, 
                                        2247, 
                                        2246, 
                                        2245, 
                                        2244, 
                                        2243, 
                                        2242, 
                                        2241, 
                                        2240, 
                                        2238, 
                                        2237, 
                                        2236, 
                                        2235, 
                                        2233, 
                                        2232, 
                                        2231, 
                                        2230, 
                                        2229, 
                                        2228, 
                                        2226, 
                                        2221, 
                                        2218, 
                                        2217, 
                                        2216, 
                                        2215, 
                                        2214, 
                                        2213, 
                                        2212, 
                                        2211, 
                                        2210, 
                                        2209, 
                                        2208, 
                                        2207, 
                                        2206, 
                                        2205, 
                                        2204)';

$res=mysql_query($q);
if(mysql_error()){
    echo mysql_error()."\n";
} 
$count=0;
while($row=mysql_fetch_array($res)){
    $count++;
    //echo $row[0]." ".$row[1]."\n";  
    $q='insert into stock set id_articulo='.$row[0].', stock='.$row[1].', id_sucursal=33, fecha="2023-09-16", hora="15:22:09";' ; 
    echo $q."\n";
} 

echo "count: $count \n";
    

?>