<?php
	// Ação Upload de Foto
	if($acaoUpload == "uploadArquivo"){
		if(!file_exists($pasta)) {
			mkdir($pasta, 0777);
		}
		if(count($_FILES) > 0) {		
			$nome_arquivo      = $_FILES[$postArquivo]['name'];
			$tamanho_arquivo   = $_FILES[$postArquivo]['size'];
			$tipo_arquivo      = $_FILES[$postArquivo]['type'];
			$nome_arquivo_temp = $_FILES[$postArquivo]['tmp_name'];	
			
			$nome_novo_arquivo = uniqid().base_convert(mt_rand(),10,36).'.pdf';
			
			if($tipo_arquivo == 'application/pdf') {
				if($tamanho_arquivo <= 9145728) {
					if(move_uploaded_file($nome_arquivo_temp, $pasta.$nome_novo_arquivo)) {
						//$foto_destaque_1 = $foto_nome_novo;
						mysqli_query($link, "UPDATE $tabela SET ".$postArquivo."='".$nome_novo_arquivo."' WHERE id='$id_recuperado'");
					}else{
						echo "<script>alert('Ocorreu um erro ao enviar o arquivo para a pasta correta!');</script>";
					}
				}else{
					echo "<script>alert('Esse arquivo é maior que o permitido, o tamanho máximo permitido é de: 9MB!');</script>";	
				}
			}else{
				echo "<script>alert('Arquivo não suportado! O tipo de arquivo suportado é: PDF! Edite seu registro e insira um arquivo válido.');</script>";		
			}
		}
	}
	// Ação Update de Foto
	if($acaoUpload == "updateArquivo"){
		if(count($_FILES) > 0) {		
			$nome_arquivo      = $_FILES[$postArquivo]['name'];
			$tamanho_arquivo   = $_FILES[$postArquivo]['size'];
			$tipo_arquivo      = $_FILES[$postArquivo]['type'];
			$nome_arquivo_temp = $_FILES[$postArquivo]['tmp_name'];	
			
			$nome_novo_arquivo = uniqid().base_convert(mt_rand(),10,36).'.pdf';
			
			if($tipo_arquivo == 'application/pdf') {
				if($tamanho_arquivo <= 9145728) {
					if(move_uploaded_file($nome_arquivo_temp, $pasta.$nome_novo_arquivo)) {
						$varArquivo = $nome_novo_arquivo;
					}else{
						echo "<script>alert('Ocorreu um erro ao enviar o arquivo para a pasta correta!');</script>";
					}
				}else{
					echo "<script>alert('Esse arquivo é maior que o permitido, o tamanho máximo permitido é de: 9MB!');</script>";	
				}
			}else{
				echo "<script>alert('Arquivo não suportado! O tipo de arquivo suportado é: PDF! Edite seu registro e insira um arquivo válido.');</script>";		
			}
			
		}
	}
?>