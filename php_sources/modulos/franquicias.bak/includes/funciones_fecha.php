<?php

#--------------------------------------------------------
function resta_fecha( $fecha, $dias ){
        if(!$fecha OR $fecha=="" ){
                return NULL;
        }
        $array=explode("-",$fecha);

        $anio=$array[0];
        $mes=$array[1];
        $dia=$array[2];

        if($mes=="1"){ $cant_dias=31;   }
        if($mes=="2"){ $cant_dias=29;   }
        if($mes=="3"){ $cant_dias=31;   }
        if($mes=="4"){ $cant_dias=30;   }
        if($mes=="5"){ $cant_dias=31;   }
        if($mes=="6"){ $cant_dias=30;   }
        if($mes=="7"){ $cant_dias=31;   }
        if($mes=="8"){ $cant_dias=31;   }
        if($mes=="9"){ $cant_dias=30;   }
        if($mes=="10"){ $cant_dias=31;  }
        if($mes=="11"){ $cant_dias=30;  }
        if($mes=="12"){ $cant_dias=31;  }

        $dia_nuevo=( $dia - $dias );

        if($dia_nuevo<1){
                $dia_nuevo=( $dia_nuevo + $cant_dias );
                $mes=( $mes - 1 );
                if($mes<1){
                        $mes=$mes+"12";
                        $anio=$anio-1;
                }
        }
        $fecha_nueva=$anio."-".$mes."-".$dia_nuevo;
        return $fecha_nueva;
}
#--------------------------------------------------------

?>
