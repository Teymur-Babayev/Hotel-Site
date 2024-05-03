<?php
	include_once("../../adm_gerencia/includes/Conexao.php");
		
	require_once('../../adm_gerencia/includes/classes/class.phpmailer.php');
	require_once('../../adm_gerencia/includes/classes/class.smtp.php');
	
	error_reporting(0);

	if (empty($_POST["nome"])) {
		$errorMSG = "Nome é obrigatório";
	} else {
		$nome = $_POST["nome"];
	}
	
	if (empty($_POST["telefone"])) {
		$errorMSG = "Telefone é obrigatório";
	} else {
		$telefone = $_POST["telefone"];
	}
	
	if (empty($_POST["email"])) {
		$errorMSG .= "Email é obrigatório";
	} else {
		$email = $_POST["email"];
	}
	
	$Email = new PHPMailer;
	$Email->SetLanguage("br");
	$Email->IsSMTP();
	$Email->IsHTML(true);
	$Email->SMTPAuth   = true;
	$Email->Port       = SERVER_EMAIL_PORTA;
	$Email->Host       = SERVER_EMAIL_HOST;
	$Email->Username   = SERVER_EMAIL_USUARIO;
	$Email->Password   = SERVER_EMAIL_SENHA;
	$Email->Subject    = utf8_decode("Contato enviado pelo site ".$_linkCompleto."");
	$Email->From       = $Email->Username;
	$Email->FromName   = utf8_decode("Contato enviado pelo site ".$_linkCompleto."");
	$Email->AddAddress(EMAIL_RECEBE_CONTATO);
	
	$errorMSG = $Email->ErrorInfo;
	
	// Aplica as Datas
	$_data_criacao = date('Y-m-d H:i:s');
	
	// Verifica se o email ja se encontra na base de dados e grava o mesmo
	$sql       = mysqli_query($link, "SELECT * FROM tb_newsletter WHERE email='$email'");  
	$resultado = mysqli_num_rows($sql);
	if($resultado == 0)
	{
		mysqli_query($link, "INSERT INTO tb_newsletter (data_criacao, nome, telefone, email)VALUES('$_data_criacao', '".utf8_decode($nome)."','$telefone','$email')");
	}
	
	$Email->Body  = "<table width='450' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family:Verdana;'>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td align='center' bgcolor='#eaeaea' style='padding:30px'>";
	
	if(empty(LOGO_TOPO)){
		$logo_email = $_linkCompleto."/assets/template/img/logo.png";
	}else{
		$logo_email = $_linkCompleto."/assets/uploads/tb_configuracao/1/".LOGO_TOPO;
	}
	
	$Email->Body .= "<img src='".$logo_email."' border='0' height='50'>";
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td bgcolor='".COR_PRIMARIA."' style='padding:30px'>";
	$Email->Body .= "<table width='100%' border='0' cellspacing='3' cellpadding='3' style='font-family:Verdana;'>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td align='left' valign='top' style='font-size:13px; color:#fff'>";
	$Email->Body .= "<strong style='color:".COR_SECUNDARIA."'>Nome:</strong> <br> ".utf8_decode($nome);
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td align='left' valign='top' style='font-size:13px; color:#fff'>";
	$Email->Body .= "<strong style='color:".COR_SECUNDARIA."'>Telefone:</strong> <br> ".utf8_decode($telefone);
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td align='left' valign='top' style='font-size:13px; color:#fff'>";
	$Email->Body .= "<strong style='color:".COR_SECUNDARIA."'>E-mail:</strong> <br> <a href='mailto:".$email."' style='color:#fff'>".utf8_decode($email)."</a>";
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td align='left' valign='top' style='font-size:13px; color:#fff'>";
	$Email->Body .= "<strong style='color:".COR_SECUNDARIA."'>Assunto:</strong> <br> ".utf8_decode($_POST["assunto"]);
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td align='left' valign='top' style='font-size:13px; color:#fff'>";
	$Email->Body .= "<strong style='color:".COR_SECUNDARIA."'>Mensagem:</strong> <br> ".utf8_decode($_POST["mensagem"]);
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "</table>";
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "<tr>";
	$Email->Body .= "<td align='center' bgcolor='#eaeaea' style='padding:30px;  font-size:13px; font-weight:bold;'>";
	$Email->Body .= "<a href='".$_linkCompleto."' style='color:#444444; text-decoration:none'>";
	$Email->Body .= $_linkCompleto;
	$Email->Body .= "</a>";
	$Email->Body .= "</td>";
	$Email->Body .= "</tr>";
	$Email->Body .= "</table>";
	
	$Email->AltBody = $mail->Body;
	//$Email->AddAttachment($_FILES['anexo']['tmp_name'], $_FILES['anexo']['name']);
	
	if ($Email->Send() && $errorMSG == ""){
	   echo "Olá ".$_POST["nome"].", seu contato enviado com sucesso. Em breve responderemos!";
	}else{
		if($errorMSG == ""){
			echo "Ops ocorreu um erro! Sua mensagem não pode ser enviada, tente novamente.";
		} else {
			echo $errorMSG;
		}
	}
?>