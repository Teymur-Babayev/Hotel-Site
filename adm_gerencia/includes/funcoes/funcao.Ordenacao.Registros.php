<?php
	include_once("../Conexao.php");
	
	$qualTabela = $_GET['tabela'];
	
	if(isset($_GET['acao']) && $_GET['acao'] == 'ordenar'){
		$posicoes = $_GET['widgetArray'];
		$newOrder = 1;
		foreach($posicoes as $valorId){
			mysqli_query($link, "UPDATE ".$qualTabela." SET id_ordem=".$newOrder." WHERE id=".$valorId."");
			$newOrder = $newOrder +1;
		}
		echo '<pre>';
		print_r($posicoes);
		echo '</pre>';
	}
?>