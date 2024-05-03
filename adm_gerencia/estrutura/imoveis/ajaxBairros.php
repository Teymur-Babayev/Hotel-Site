<?php
	include("../../includes/Conexao.php");
	
	$_query = mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE status='S' and id_cidade='" . @$_GET["id"] . "' order by nome");
	
	$_array["encontrados"] = mysqli_num_rows($_query);
	
	$_cont = 0;
	
	$_array["subs"][$_cont]["id"] = 0;
	$_array["subs"][$_cont]["nome"] = "Selecione...";
	
	while($_dados = mysqli_fetch_array($_query)){
		$_array["subs"][$_cont]["id"] = $_dados["id"];
		$_array["subs"][$_cont]["nome"] = utf8_encode($_dados["nome"]);
		$_cont++;
	}
	
	echo json_encode($_array);
?>