<?php
	include_once("../../adm_gerencia/includes/Conexao.php");
	
	error_reporting(0);

	if (empty($_POST["nome_news"])) {
		$errorMSG = "Nome é obrigatório";
	} else {
		$nome_news = $_POST["nome_news"];
	}
	
	if (empty($_POST["email_news"])) {
		$errorMSG .= "Email é obrigatório";
	} else {
		$email_news = $_POST["email_news"];
	}
	
	// Aplica as Datas
	$_data_criacao = date('Y-m-d H:i:s');
	
	// Verifica se o email ja se encontra na base de dados e grava o mesmo
	$sql       = mysqli_query($link, "SELECT * FROM tb_newsletter WHERE email='$email_news'");  
	$resultado = mysqli_num_rows($sql);
	
	if ($resultado == 0 && $errorMSG == ""){
	   mysqli_query($link, "INSERT INTO tb_newsletter (data_criacao, nome, telefone, email)VALUES('$_data_criacao', '$nome_news','$telefone_news','$email_news')");
	   echo utf8_decode("Cadastro realizado com sucesso!");
	}else{
		if($errorMSG == ""){
			echo "Opa! Ocorreu um erro. Este email já está cadastrado em nosso site!";
		} else {
			echo $errorMSG;
		}
	}
?>