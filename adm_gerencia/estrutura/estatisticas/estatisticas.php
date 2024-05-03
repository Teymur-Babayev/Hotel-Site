<div class="br-mainpanel" id="cadastra">

	<div class="br-pageheader pd-y-15 pd-l-20">
		<nav class="breadcrumb pd-0 mg-0 tx-12">
			<a class="breadcrumb-item" href="index.php">Dashboard</a>
			<span class="breadcrumb-item active">Relatório Geral de Visitas</span>
		</nav>
	</div>
	
	<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    	<h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
            <i class="fa fa-pie-chart tx-yellow mg-r-10 mg-l-10"></i> Relatório Geral de Visitas
        </h4>
		<p class="mg-b-0 pd-l-45 pd-r-45">
        	Confira aqui os <strong>relátórios de acessos</strong> e as datas que as pessoas visitaram o seu Website.
        </p>
	</div>
	
	<div class="br-pagebody mg-mobile mg-t-15-force">
		<div class="br-section-wrapper">
			<div class="row">
			
				<section class="wrapper padding-left-right" style="width:100%">
					<section class="panel">
						
						<header class=" mg-b-40-force">
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" role="tab" data-toggle="tab" href="#principal"><i class="fa fa-pie-chart"></i></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" role="tab" data-toggle="tab" href="#anos"><i class="fa fa-calendar"></i> Por Anos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" role="tab" data-toggle="tab" href="#meses"><i class="fa fa-calendar"></i> Por Meses</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" role="tab" data-toggle="tab" href="#dias-semana"><i class="fa fa-calendar"></i> Por Dias da Semana</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" role="tab" data-toggle="tab" href="#dias-mes"><i class="fa fa-calendar"></i> Por Dias do Mês</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" role="tab" data-toggle="tab" href="#por-horas"><i class="fa fa-clock-o"></i> Por Horas do Dia</a>
								</li>
								<li class="nav-item d-none">
									<a class="nav-link" role="tab" data-toggle="tab" href="#por-localizacao"><i class="fa fa-map-marker"></i> Por Localização</a>
								</li>
							</ul>
						</header>
						
						<div class="panel-body">
							<div class="tab-content">	 
								 
								<div id="principal" class="tab-pane active">
									<div class="col-md-12 col-xs-12" style="margin:0; padding:0">
										<section class="panel">                       
											
											<h4 class="tx-gray-800 tx-normal mg-b-0-force mg-l-15-force">
												<i class="fa fa-pie-chart tx-warning"></i> Breve resumo <span class="tx-bold">de Visitas</span>
											</h4>
											<p class="mg-l-45-force mg-b-30-force">
												Dados de acessos dos usuários que visitaram seu website <strong>nessa hora, hoje, nessa semana, nesse mês, nesse ano e total de todos os acessos.</strong>
											</p>
											
											<canvas id="estatisticas_principal" height="160">
											<script>
												$(function(){
													'use strict';
												
													var ctx_Principal = document.getElementById('estatisticas_principal').getContext('2d');
													var myChart_Principal = new Chart(ctx_Principal, {
																type: 'bar',
																data: {
															labels: ['Hora', 'Hoje', 'Semana', 'Mês', 'Ano', 'Total'],
														datasets: [{
															label: 'Total de visitas',
															data: 
															[
																<?php 
																	echo 
																		$total_visitas_hora. "," .
																		$total_visitas_hoje. "," .
																		$total_visitas_semana. "," .
																		$total_visitas_mes. "," .
																		$total_visitas_ano. "," .
																		$total_visitas;
																?>
															],
															backgroundColor: [
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00'
																]
															}]
														},
														options: {
															legend: {
																display: false,
																	labels: {
																		display: false
																	}
															},
															scales: {
																yAxes: [{
																	ticks: {
																		beginAtZero:true,
																		display: false,
																		fontSize: 9,
																		suggestedMin: 10,
																		suggestedMax: 50
																	}
																}],
																xAxes: [{
																	ticks: {
																		beginAtZero:true,
																		fontSize: 12,
																		fontStyle: "bold",
																	}
																}]
															}
														}
													});
												});
											</script>
											
										</section>
									</div>
								</div>
							 
								<div id="anos" class="tab-pane">
									<div class="col-md-12 col-xs-12" style="margin:0; padding:0">
										<section class="panel">          
											
											<h4 class="tx-gray-800 tx-normal mg-b-0-force mg-l-15-force">
												<i class="fa fa-calendar tx-warning"></i> Relátorios de <span class="tx-bold">visitas por Anos</span>
											</h4>
											<p class="mg-l-45-force mg-b-30-force">
												Em qual <strong>Ano</strong> o seu Website foi <strong>mais visitado</strong>? Confira abaixo os resultados das estatísticas.
											</p>
											
											<canvas id="estatisticas_anos" height="160">
											<script>
												$(function(){
													'use strict';
												
													var ctx_Anos = document.getElementById('estatisticas_anos').getContext('2d');
													var myChart_Anos = new Chart(ctx_Anos, {
														type: 'bar',
														data: {
														labels: 
														[
															<?php  
																for($i = 0; $i < $total_anos; $i++){ $a = "201".$i+9;
																		$total = mysqli_num_rows($busca_anos[$i]);
																		if($total > 0){
																			$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																			$altu = $porc*2;
																		} else {
																			$porc = 0;
																			$altu = 2;
																		}
																			echo "'$a', ";
																	}
															?>
														],
														datasets: [{
														label: 'Total de visitas',
														data: 
														[
															<?php  
																for($i = 0; $i < $total_anos; $i++){ 
																	$a = "201".$i+9;
																	$total = mysqli_num_rows($busca_anos[$i]);
																	if($total != 0){
																		$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																		$altu = $porc*2;
																	} else {
																		$porc = 0;
																		$altu = 2;
																	}
																	echo "$total, ";
																}
															?>
														],
														backgroundColor: [
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4'
																]
															}]
														},
														options: {
															legend: {
																display: false,
																	labels: {
																		display: false
																	}
															},
															scales: {
																yAxes: [{
																	ticks: {
																		beginAtZero:true,
																		display: false,
																		fontSize: 9,
																		suggestedMin: 10,
																		suggestedMax: 50
																	}
																}],
																xAxes: [{
																	ticks: {
																		beginAtZero:true,
																		fontSize: 12,
																		fontStyle: "bold",
																	}
																}]
															}
														}
													});
												});
											</script>
											
										</section>
									</div>
								</div>
								
                                <div id="meses" class="tab-pane">
									<div class="col-md-12 col-xs-12" style="margin:0; padding:0">
										<section class="panel">
											
											<h4 class="tx-gray-800 tx-normal mg-b-0-force mg-l-15-force">
												<i class="fa fa-calendar tx-warning"></i> Relátorios de <span class="tx-bold">visitas por Meses</span>
											</h4>
											<p class="mg-l-45-force mg-b-30-force">
												Em qual <strong>Mês</strong> o seu Website foi <strong>mais visitado</strong>? Confira abaixo os resultados das estatísticas.
											</p>
											
											<canvas id="estatisticas_meses" height="160">
											<script>
												$(function(){
													'use strict';
												
													var ctx_Meses = document.getElementById('estatisticas_meses').getContext('2d');
													var myChart_Meses = new Chart(ctx_Meses, {
														type: 'bar',
														data: {
														labels: 
														[
															<?php  
																for($i = 1; $i < 13; $i++){ 
																	$a = $i-1;
																	$total = mysqli_num_rows($busca_mes[$i]);
																	if($total != 0){
																		$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																		$altu = $porc*2;
																	} else {
																		$porc = 0;
																		$altu = 2;
																	}
																	if($a == 0) { echo "'Jan', ";}
																	if($a == 1) { echo "'Fev', ";}
																	if($a == 2) { echo "'Mar', ";}
																	if($a == 3) { echo "'Abr', ";}
																	if($a == 4) { echo "'Mai', ";}
																	if($a == 5) { echo "'Jun', ";}
																	if($a == 6) { echo "'Jul', ";}
																	if($a == 7) { echo "'Ago', ";}
																	if($a == 8) { echo "'Set', ";}
																	if($a == 9) { echo "'Out', ";}
																	if($a == 10){ echo "'Nov', ";}
																	if($a == 11){ echo "'Dez'";}
																}
															?>
														],
														datasets: [{
														label: 'Total de visitas',
														data: 
														[
															<?php
																for($i = 1; $i < 13; $i++){ 
																	$a = $i-1;
																	$total = mysqli_num_rows($busca_mes[$i]);
																	if($total != 0){
																		$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																		$altu = $porc*2;
																	} else {
																		$porc = 0;
																		$altu = 2;
																	}
																	if($a == 0) { echo "$total, ";}
																	if($a == 1) { echo "$total, ";}
																	if($a == 2) { echo "$total, ";}
																	if($a == 3) { echo "$total, ";}
																	if($a == 4) { echo "$total, ";}
																	if($a == 5) { echo "$total, ";}
																	if($a == 6) { echo "$total, ";}
																	if($a == 7) { echo "$total, ";}
																	if($a == 8) { echo "$total, ";}
																	if($a == 9) { echo "$total, ";}
																	if($a == 10){ echo "$total, ";}
																	if($a == 11){ echo "$total";}
																}
															?>				
														],
														backgroundColor: [
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0'
																]
															}]
														},
														options: {
															legend: {
																display: false,
																	labels: {
																		display: false
																	}
															},
															scales: {
																yAxes: [{
																	ticks: {
																		beginAtZero:true,
																		display: false,
																		fontSize: 9,
																		suggestedMin: 10,
																		suggestedMax: 50
																	}
																}],
																xAxes: [{
																	ticks: {
																		beginAtZero:true,
																		fontSize: 12,
																		fontStyle: "bold",
																	}
																}]
															}
														}
													});
												});
											</script>
											
										</section>
									</div>
								</div>
                                
                                <div id="dias-semana" class="tab-pane">
									<div class="col-md-12 col-xs-12" style="margin:0; padding:0">
										<section class="panel">
											
											<h4 class="tx-gray-800 tx-normal mg-b-0-force mg-l-15-force">
												<i class="fa fa-calendar tx-warning"></i> Relátorios de <span class="tx-bold">visitas por Dias da Semana</span>
											</h4>
											<p class="mg-l-45-force mg-b-30-force">
												Em qual <strong>Dia da Semana</strong> o seu Website foi <strong>mais visitado</strong>? Confira abaixo os resultados das estatísticas.
											</p>
											
											<canvas id="estatisticas_semana" height="160">
											<script>
												$(function(){
													'use strict';
												
													var ctx_Semana = document.getElementById('estatisticas_semana').getContext('2d');
													var myChart_Semana = new Chart(ctx_Semana, {
															type: 'bar',
															data: {
															labels: 
															[
																<?php  
																	for($i = 1; $i < 8; $i++){ 
																		$a = $i-1;
																		$total = mysqli_num_rows($busca_semana[$a]);
																		if($total != 0){
																			$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																			$altu = $porc*2;
																		} else {
																			$porc = 0;
																			$altu = 2;
																		}
																		if($a == 0){ echo "'Dom', ";}
																		if($a == 1){ echo "'Seg', ";}
																		if($a == 2){ echo "'Ter', ";}
																		if($a == 3){ echo "'Qua', ";}
																		if($a == 4){ echo "'Qui', ";}
																		if($a == 5){ echo "'Sex', ";}
																		if($a == 6){ echo "'Sáb' ";}
																	}
																?>
															],
															datasets: [{
															label: 'Total de visitas',
															data: 
															[
																<?php  
																	for($i = 1; $i < 8; $i++){ 
																		$a = $i-1;
																		$total = mysqli_num_rows($busca_semana[$a]);
																		if($total != 0){
																			$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																			$altu = $porc*2;
																		} else {
																			$porc = 0;
																			$altu = 2;
																		}
																		if($a == 0){ echo "$total, ";}
																		if($a == 1){ echo "$total, ";}
																		if($a == 2){ echo "$total, ";}
																		if($a == 3){ echo "$total, ";}
																		if($a == 4){ echo "$total, ";}
																		if($a == 5){ echo "$total, ";}
																		if($a == 6){ echo "$total ";}
																	}
																?>
															],
															backgroundColor: [
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4'
																]
															}]
														},
														options: {
															legend: {
																display: false,
																	labels: {
																		display: false
																	}
															},
															scales: {
																yAxes: [{
																	ticks: {
																		beginAtZero:true,
																		display: false,
																		fontSize: 9,
																		suggestedMin: 10,
																		suggestedMax: 50
																	}
																}],
																xAxes: [{
																	ticks: {
																		beginAtZero:true,
																		fontSize: 12,
																		fontStyle: "bold",
																	}
																}]
															}
														}
													});
												});
											</script>
											
										</section>
									</div>
								</div>
                                
                                <div id="dias-mes" class="tab-pane">
									<div class="col-md-12 col-xs-12" style="margin:0; padding:0">
										<section class="panel">
											
											<h4 class="tx-gray-800 tx-normal mg-b-0-force mg-l-15-force">
												<i class="fa fa-calendar tx-warning"></i> Relátorios de <span class="tx-bold">visitas por Dias do Mês</span>
											</h4>
											<p class="mg-l-45-force mg-b-30-force">
												Em qual <strong>Dia do Mês</strong> o seu Website foi <strong>mais visitado</strong>? Confira abaixo os resultados das estatísticas.
											</p>
											
											<canvas id="estatisticas_dia_mes" height="160">
											<script>
												$(function(){
													'use strict';
												
													var ctx_dia_mes = document.getElementById('estatisticas_dia_mes').getContext('2d');
													var myChart_dia_mes = new Chart(ctx_dia_mes, {
															type: 'bar',
															data: {
															labels: 
															[
																<?php  
																	for($i = 1; $i < $mesVai+1; $i++){
																	$total = mysqli_num_rows($busca_dias[$i]);
																	if($total != 0){
																		$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																		$altu = $porc*2;
																	} else {
																		$porc = 0;
																		$altu = 2;
																	}
																		echo "'$i', ";
																	}
																?>
															],
															datasets: [{
															label: 'Total de visitas',
															data: 
															[
																<?php  
																	for($i = 1; $i < $mesVai+1; $i++){
																	$total = mysqli_num_rows($busca_dias[$i]);
																	if($total != 0){
																		$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																		$altu = $porc*2;
																	} else {
																		$porc = 0;
																		$altu = 2;
																	}
																		echo "$total, ";
																	}
																?>
															],
															backgroundColor: [
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4'
																]
															}]
														},
														options: {
															legend: {
																display: false,
																	labels: {
																		display: false
																	}
															},
															scales: {
																yAxes: [{
																	ticks: {
																		beginAtZero:true,
																		display: false,
																		fontSize: 9,
																		suggestedMin: 10,
																		suggestedMax: 50
																	}
																}],
																xAxes: [{
																	ticks: {
																		beginAtZero:true,
																		fontSize: 12,
																		fontStyle: "bold",
																	}
																}]
															}
														}
													});
												});
											</script>

										</section>
									</div>
								</div>
                                
                                <div id="por-horas" class="tab-pane">
									<div class="col-md-12 col-xs-12" style="margin:0; padding:0">
										<section class="panel">
											
											<h4 class="tx-gray-800 tx-normal mg-b-0-force mg-l-15-force">
												<i class="fa fa-clock-o tx-warning"></i> Relátorios de <span class="tx-bold">visitas por Horas do Dia</span>
											</h4>
											<p class="mg-l-45-force mg-b-30-force">
												Em qual <strong>Hora do dia</strong> o seu Website foi <strong>mais visitado</strong>? Confira abaixo os resultados das estatísticas.
											</p>
											
											<canvas id="estatisticas_dia_horas" height="160">
											<script>
												$(function(){
													'use strict';
												
													var ctx_dia_horas = document.getElementById('estatisticas_dia_horas').getContext('2d');
													var myChart_dia_horas = new Chart(ctx_dia_horas, {
															type: 'bar',
															data: {
															labels: 
															[
																<?php  
																	for($i = 0; $i < 24; $i++){
																	$total = mysqli_num_rows($busca_horas[$i]);
																	if($total != 0){
																		$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																		$altu = $porc*2;
																	} else {
																		$porc = 0;
																		$altu = 2;
																	}
																		echo "'".$i."h', ";
																	}
																?>
															],
															datasets: [{
															label: 'Total de visitas',
															data: 
															[
																<?php  
																	for($i = 0; $i < 24; $i++){
																	$total = mysqli_num_rows($busca_horas[$i]);
																	if($total != 0){
																		$porc = sprintf("%.1f",($total / ($total_visitas/100)));
																		$altu = $porc*2;
																	} else {
																		$porc = 0;
																		$altu = 2;
																	}
																		echo "$total, ";
																	}
																?>
															],
															backgroundColor: [
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4',
																	'#A6A7AC',
																	'#F9BF00',
																	'#29B0D0',
																	'#4C6579',
																	'#F57E2E',
																	'#C8E0E4'
																]
															}]
														},
														options: {
															legend: {
																display: false,
																	labels: {
																		display: false
																	}
															},
															scales: {
																yAxes: [{
																	ticks: {
																		beginAtZero:true,
																		display: false,
																		fontSize: 9,
																		suggestedMin: 10,
																		suggestedMax: 50
																	}
																}],
																xAxes: [{
																	ticks: {
																		beginAtZero:true,
																		fontSize: 12,
																		fontStyle: "bold",
																	}
																}]
															}
														}
													});
												});
											</script>

										</section>
									</div>
								</div>	
                                
                                <div id="por-localizacao" class="tab-pane">
									<div class="col-md-12 col-xs-12" style="margin:0; padding:0">
										<section class="panel">
											
											<?php
												$sql = mysqli_query($link, "SELECT DISTINCT * FROM tb_estatisticas WHERE latitude !='' AND longitude !=''");
												while($dados = mysqli_fetch_array($sql)){
												$pontos.= '
														{
															lat:  '.$dados['latitude'].',
															lng:  '.$dados['longitude'].',
															 ip: "'.$dados['ip'].'",
														 data: "'.date("d/m/Y", strtotime($dados['data'])).'",
														 hora: "'.date("H:i:s", strtotime($dados['data'])).'",
													 cidade: "'.$dados['cidade'].'",
													 estado: "'.$dados['estado'].'",
														 pais: "'.$dados['pais'].'"
														 },
												';
											}?>	
											
											<h4 class="tx-gray-800 tx-normal mg-b-20-force mg-l-15-force">
												<i class="fa fa-map-marker tx-warning"></i> Relátorios de <span class="tx-bold">visitas por Localização</span>
											</h4>
											<p class="mg-l-45-force mg-b-30-force">
												De qual <strong>Local</strong> o seu Website foi <strong>mais visitado</strong>? Confira abaixo os resultados das estatísticas.
											</p>
											
											<div id="mapa_estatisticas" style="width:100%; height:600px; min-height:600px; max-height:600px"></div>
											<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo KEY_GOOGLE_MAPS;?>&callback=initMap"></script>
											<script>
												var map;
												var infoWindow;
												var markersData = [
													 <?php echo $pontos;?>
												];
												function initialize() {
													 var myLatLng = {lat: -21.9781833, lng: -46.8035141};
													 var mapOptions = {
															center: new google.maps.LatLng(-21.9781833,-46.8035141),
															zoom:16,
															panControl:true,
															zoomControl:true,
															mapTypeControl:false,
															scaleControl:true,
															streetViewControl:true,
															overviewMapControl:true,
															rotateControl:true,
															scrollwheel:false,
															mapTypeId: google.maps.MapTypeId.ROADMAP
													 };
												
													 map = new google.maps.Map(document.getElementById('mapa_estatisticas'), mapOptions);
													 infoWindow = new google.maps.InfoWindow();
													 google.maps.event.addListener(map, 'click', function() {
															infoWindow.close();
													 });
													 displayMarkers();
												}
												google.maps.event.addDomListener(window, 'load', initialize);
												function displayMarkers(){
													 var bounds = new google.maps.LatLngBounds();
													 for (var i = 0; i < markersData.length; i++){
												
															var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
															var ip = markersData[i].ip;
															var data = markersData[i].data;
															var hora = markersData[i].hora;
															var cidade = markersData[i].cidade;
															var estado = markersData[i].estado;
															var pais = markersData[i].pais;
												
															createMarker(latlng, ip, data, hora, cidade, estado, pais);
															bounds.extend(latlng);  
													 }
													 map.fitBounds(bounds);
												}
												function createMarker(latlng, ip, data, hora, cidade, estado, pais){
													 var marker = new google.maps.Marker({
															map: map,
															position: latlng,
															title: data
													 });
													 google.maps.event.addListener(marker, 'click', function() {
															var iwContent = '<div id="iw_container"><div class="iw_content">Ip: <strong>' + ip + '</strong><br>Data: <strong>' + data + '</strong><br>Hora: <strong>' + hora + '</strong><br>Cidade: <strong>' + cidade + '</strong><br /> Estado: <strong>' +
																 estado + '</strong><br />Pais: <strong>' +
																 pais + '</strong></div></div>';
															infoWindow.setContent(iwContent);
															infoWindow.open(map, marker);
													 });
												}
												</script>
										</section>
									</div>
								</div>

							</div>
						</div>
					</section>
					
				</section>

			</div>
		</div>

