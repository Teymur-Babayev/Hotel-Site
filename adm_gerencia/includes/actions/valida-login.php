<?php
	include_once("../Conexao.php");
	include_once("../Configuracao.php");
	
	@session_start();

	if(isset($_POST['entrar']) && $_POST['entrar'] == "login"){
		$login = mysqli_real_escape_string($link, $_POST['login']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($link, $_POST['senha']);
		$SenhaCriptografada = base64_encode($senha);

		if(empty($login) || empty($senha)){
			$_SESSION['loginErro'] = utf8_decode("Preencha todos os campos!");
			header("Location: ../../login.php");
		}else{
			$sql="SELECT login, password FROM tb_usuarios WHERE login = '$login' AND password = '$SenhaCriptografada'";
			$result = mysqli_query($link, $sql);
			$busca = mysqli_num_rows($result);
			$linha = mysqli_fetch_assoc($result);
			if($busca > 0){
				$_SESSION['id']    = $linha['id'];
				$_SESSION['login'] = $linha['login'];
				$_SESSION['senha'] = $linha['senha'];
				$_SESSION['nome']  = $linha['nome'];
				header('Location:../../index.php');
				exit;
			}else{
				$_SESSION['loginErro'] = utf8_decode("Usuário ou senha inválidos.");
				header("Location: ../../login.php");
			}
		}
	}
?>