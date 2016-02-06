<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('view_date_time()')) {
	function date_time($dt, $precision = false, $duration = 0) {
		$time = '';
		if ($duration < 86400) {
			$time = intval(substr($dt, 9, 2)) . ':' . intval(substr($dt, 11, 2)) . ($precision ? ':' . intval(substr($dt, 13, 2)) : '');
		} else {
			$time = intval(substr($dt, 6, 4)) . ' ' . view_month(substr($dt, 4, 2)) . ' à ' . intval(substr($dt, 9, 2)) . ':' . intval(substr($dt, 11, 2)) . ($precision ? ':' . intval(substr($dt, 13, 2)) : '');			
		}
		return $time;
	}
}

if(!function_exists('month')){
	function month($m){
		if (m == 1) {return 'janvier';}
		else if (m == 2) {return 'février';}
		else if (m == 3) {return 'mars';}
		else if (m == 4) {return 'avril';}
		else if (m == 5) {return 'mai';}
		else if (m == 6) {return 'juin';}
		else if (m == 7) {return 'juillet';}
		else if (m == 8) {return 'aout';}
		else if (m == 9) {return 'septembre';}
		else if (m == 10) {return 'octobre';}
		else if (m == 11) {return 'novembre';}
		else if (m == 12) {return 'décembre';}
		else {return '';}
	}
}

if(!function_exists('duration')){
	function duration($n, $precision = false) {
		$unities = array(86400, 3600, 60, 1);
		$values = array(0, 0, 0, 0);
		$str = '';
		for ($i = 0; $i < count($unities); $i++) {
			$t = floor($n/$unities[$i]);
			$n -= $t * $unities[$i];
			$values[$i] = $t;
		}
		$r = '';
		$r .= ($values[0] > 1 ? $values[0] . ' jours ' : '');
		$r .= ($values[1] > 1 ? $values[1] . ' h ' : '') . ($values[2] > 1 ? $values[2] . ' min ' : '');
		$r .= ($values[2] > 1 && $precision? $values[2] . ' s' : '');
		return $r;
	}
}

?>