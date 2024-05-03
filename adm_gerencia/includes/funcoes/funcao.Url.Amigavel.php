<?php
	// Criação de Url Amigável
	function url_amigavel($str, $replace = array(), $delimiter = '-') {
		if (! empty ( $replace )) {
			$str = str_replace ( ( array ) $replace, ' ', $str );
		}
		
		$clean = iconv ( 'ISO-8859-1', 'ASCII//TRANSLIT', $str );
		$clean = preg_replace ( "/[^a-zA-Z0-9\/_|+ -]/", '', $clean );
		$clean = strtolower ( trim ( $clean, '-' ) );
		$clean = preg_replace ( "/[\/_|+ -]+/", $delimiter, $clean );
		
		return $clean;
	}
	
	$converteUrl = url_amigavel($postUrl);
	$urlAmigavel = $converteUrl;
?>