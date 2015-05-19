<?php
function str2mysqltime($str, $format = 'Y-m-d H:i:s') {
	$date = '';
	$date = date ( $format, strtotime ( $str ) );
	if (date ( 'Y-m-d', strtotime ( $date ) ) <= '1970-01-02') {
		$str = str_replace ( '-', '/', $str );
		$date = date ( $format, strtotime ( $str ) );
		if (date ( 'Y-m-d', strtotime ( $date ) ) <= '1970-01-02') {
			$str = str_replace ( '/', '-', $str );
			$date = date ( $format, strtotime ( $str ) );
		}
	}

	return (date ( 'Y-m-d', strtotime ( $date ) ) <= '1970-01-02' || $date == '00:00:00') ? '' : $date;
}

function interpolateQuery($query, $params) {
	$keys = array();

	# build a regular expression for each parameter
	foreach ($params as $key => $value) {
		if (is_string($key)) {
			$keys[] = '/:'.$key.'/';
		} else {
			$keys[] = '/[?]/';
		}
		
		if (get_magic_quotes_gpc()){
			$value = stripslashes($value);
		}
		$value = addslashes($value);
		
		$params[$key] = "'".$value."'";
	}

	$query = preg_replace($keys, $params, $query, 1, $count);
	
	#trigger_error('replaced '.$count.' keys');
	
	return $query;
}