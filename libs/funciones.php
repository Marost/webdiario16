<?php

function hace( $fecha_mysql ) {
	$fecha	  = explode(" ", ($fecha_mysql));
	$dia		= explode("-", $fecha[0]);
	$hora	   = explode(":", $fecha[1]);
	$fecha_unix = mktime($hora[0], $hora[1], $hora[2], $dia[1], $dia[2], $dia[0]);
	$ht		 = time() - $fecha_unix;
	if( 2116800 <= $ht ){
		$dia	  = date('d', $fecha_unix);
		$mes	  = date('n', $fecha_unix);
		$ano	  = date('Y', $fecha_unix);
		$hora	 = date('H', $fecha_unix);
		$minuto   = date('i',$fecha_unix);
		$mesarray = array('', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
		$fecha	= "el $dia de $mesarray[$mes] del $ano";
	}
	if( 60 > $ht ){
		$fecha = "hace $ht segundos";
	} elseif( 3570 > $ht ){
		$hc = round( $ht / 60 );
		if( 1 < $hc ){
			$s = "s";
		}
		$fecha = "hace $hc minuto".$s;
	} elseif( 84600 > $ht ){
		$hc = round( $ht / 3600 );
		if( 1 < $hc ){
			$s = "s";
		}
		$fecha = "hace $hc hora".$s;
		if( 4200 < $ht && 5400 > $ht ){
			$fecha = "hace más de una hora";
		}
	} elseif( 561600 > $ht ){
		$hc = round( $ht / 86400 );
		if( 1 == $hc ){
			$fecha = "ayer";
		}
		if( 2 ==$hc ){
			$fecha = "antes de ayer";
		}
		if( 2 < $hc )
			$fecha = "hace $hc días";
	} elseif( 2116800 > $ht ){
		$hc = round( $ht / 604800 );
		if( 1< $hc ){
			$s = "s";
		}
		$fecha = "hace $hc semana".$s;
	} elseif( 30242054.045 > $ht ){
		$hc = round( $ht / 2629743.83 );
		if( 1 < $hc ){
			$s = "es";
		}
		$fecha = "hace $hc mes".$s;
	}
	return $fecha;
}

?>