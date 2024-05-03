<?php
	$mail = null;
	
	error_reporting(0);
	
	include_once("../Conexao.php");
	include_once("../Configuracao.php");
	
	@session_start();

	if(isset($_POST['acao']) && $_POST['acao'] == "recupera-senha"){
		$pegaUsuario = $_POST["login"];

		if(!empty($login)){
			$_SESSION['loginErro'] = "<i class='fa fa-exclamation-triangle' style='color:red'></i> ";
			$_SESSION['loginErro'] = utf8_decode("Preencha o seu login corretamente.");
			header("Location: ../../lembrar-senha.php");
		}else{
			$busca     = mysqli_query($link, "SELECT * FROM tb_usuarios WHERE login='".$pegaUsuario."'");
			$resultado = mysqli_num_rows($busca);
			$dados     = mysqli_fetch_array($busca, MYSQLI_ASSOC);
			
			$nome  = $dados['nome'];
			$login = $dados['login'];
			$email = $dados['email'];
			$senha = base64_decode($dados['password']);
			
			if($resultado > 0) {
				
				require_once('../classes/class.phpmailer.php');
				require_once('../classes/class.smtp.php');
				
				$Email = new PHPMailer;
				$Email->SetLanguage("br");
				$Email->IsSMTP();
				$Email->IsHTML(true);
				$Email->SMTPAuth   = true;
				$Email->Port       = SERVER_EMAIL_PORTA;
				$Email->Host       = SERVER_EMAIL_HOST;
				$Email->Username   = SERVER_EMAIL_USUARIO;
				$Email->Password   = SERVER_EMAIL_SENHA;
				$Email->Subject    = "Senha do Painel Administrativo";
				$Email->From       = $Email->Username;
				$Email->FromName   = "Senha do Painel Administrativo";
				$Email->AddReplyTo($email);
				$Email->AddAddress($email);
				
				$Email->Body = "
					<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
						<tr>
							<td align='center'>
								<font size='2' face='Tahoma, Arial'>".utf8_decode("Olá")." <b>".$nome."</b>,<br>
								<br>
								".utf8_decode("Você solicitou sua senha de acesso no sistema de administração do seu website.")."<br><br>
								".utf8_decode("Seu login cadastrado no sistema é:")." <b>".$login."</b><br>
								".utf8_decode("Sua senha cadastrada no sistema é:")." <b>".$senha."</b><br>
								<br>
								<br>
								<a href='".$_linkCompletoAdmin."'>Acessar seu Painel de Controle</a><br>
								</font>
							</td>
						</tr>
					</table>
				";
			
				$Email->AltBody = $mail->Body;
				if(!$Email->Send()) {
					$_SESSION['loginErro'] = "<i class='fa fa-exclamation-triangle' style='color:red'></i> ";
					$_SESSION['loginErro'] .= "Houve um problema ao enviar a sua mensagem. Tente novamente.";
					header("Location: ../../lembrar-senha.php");
				} else {
					$_SESSION['loginErro']  = "<span style='color:green'>";
					$_SESSION['loginErro'] .= "<i class='fa fa-check-circle'></i> ";
					$_SESSION['loginErro'] .= "Senha enviada para o email cadastrado, verifique sua caixa de entrada e lixo eletrônico.";
					$_SESSION['loginErro'] .= "</span>";
					$_SESSION['loginErro'] .= "<meta http-equiv='refresh' content='6; URL=login.php'>";
					header("Location: ../../lembrar-senha.php");
				}
			} else {
				$_SESSION['loginErro'] = "<i class='fa fa-exclamation-triangle' style='color:red'></i> ";
				$_SESSION['loginErro'] .= "Login inválido ou não encontrado no sistema, tente novamente.";
				header("Location: ../../lembrar-senha.php");
			}
		}
	}
?>