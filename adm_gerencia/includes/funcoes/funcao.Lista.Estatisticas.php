<?php	
    // AÇÕES INICIAIS
	
	$total_visitas_hora = null;
	$exibeAnos = null;
	$exibeMeses = null;
	$exibeDias = null;
	$busca_anos = null;
	$pontos= null;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// TRANSFORMA VARIAVEIS EM GET E POST
	
	$variables=(strtoupper($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST; foreach ($variables as $k=> $v) $$k=$v;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// CONFIGURAÇÕES
	
	$palavra = "Relatório Geral de Visitas";
	$tamanhobarra = 160;
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	$hora = date("H");
	$mesVai = intval(date('t', mktime(0, 0, 0, intval($mes), 1, intval($ano))));
	$dia1 = $dia-$dia+1;
	$dataH = "$ano-$mes-$dia";
	$dataA = "$ano-$mes-$dia1";
	$diaS = $dia-date("w");
	if($diaS <= "9" &preg_match("(^[1-9]{1})",$diaS)) {
		$diaS = "0".$diaS;
	} 
	$dataS = "$ano-$mes-$diaS";
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// BUSCAS
	
	//Busca por Horas
	$busca0 = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data between '$dataH $hora:00:00' AND '$dataH $hora:59:59'");
	$total_visitas_hora = mysqli_num_rows($busca0);
	for($i = 0; $i < 24; $i++){ 
		if($i <= "9" &preg_match("(^[0-9]{1})",$i)) {
			$hr = "0".$i;
		} else {
			$hr = $i;
		}
		$busca_horas[$i] = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data LIKE ('%-%-% $hr:%:%')");
	}
	
	//Busca por dia Atual
	$busca1 = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data between '$dataH 00:00:00' AND '$dataH 23:59:59'");
	$total_visitas_hoje = mysqli_num_rows($busca1);
	
	//Busca por Semana
	$busca2 = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data between '$dataS 00:00:00' AND '$dataH 23:59:59'");
	$total_visitas_semana = mysqli_num_rows($busca2);
	for($i = 0; $i < 7; $i++){
		$busca_semana[$i] = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE dia_semana = '$i'");
	}
	
	//Busca por Mes
	$busca3 = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data between '$dataA 00:00:00' AND '$dataH 23:59:59'");
	$total_visitas_mes = mysqli_num_rows($busca3);
	for($i = 1; $i < 19; $i++){
		if($i<="9"&preg_match("(^[0-9]{1})",$i)) {
			$mr = "0".$i;
		} else {
			$mr = $i;
		}
		$busca_mes[$i] = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data between '$ano-$mr-01 00:00:00' AND '$ano-$mr-31 23:59:59'");
	}
	
	//Buscas Total Visitas
	$busca4 = mysqli_query($link, "SELECT * FROM tb_estatisticas");
	$total_visitas = mysqli_num_rows($busca4);
	
	//Buscas por Ano
	$busca5 = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data between '$dataA 00:00:00' AND '$dataH 23:59:59'");
	$total_visitas_ano = mysqli_num_rows($busca5);
	$total_anos = date("Y")-2019+5;
	for($i = 0; $i < $total_anos; $i++){ 
		$a = "201".$i+9;
		$busca_anos[$i] = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data between '$a-01-01 00:00:00' AND '$a-12-31 23:59:59'");
	}

	//Buscas por Dias
	for($i = 1; $i < $mesVai +1; $i++){
		if($i<="9"&preg_match("(^[0-9]{1})",$i)) {
			$dr = "0".$i;
		} else {
			$dr = $i;
		}
		$busca_dias[$i] = mysqli_query($link, "SELECT * FROM tb_estatisticas WHERE data LIKE ('$ano-$mes-$dr %:%:%')");
	}
		
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	