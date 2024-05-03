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
			
			$nome_novo_arquivo = uniqid().base_convert(mt_rand(),10,36).'.png';
			
			if($tipo_arquivo == 'image/jpeg' || $tipo_arquivo == 'image/jpg' || $tipo_arquivo == 'image/png' || $tipo_arquivo == 'image/gif') {
				if($tamanho_arquivo <= 3145728) {
					if(move_uploaded_file($nome_arquivo_temp, $pasta.$nome_novo_arquivo)) {
						//$foto_destaque_1 = $foto_nome_novo;
						mysqli_query($link, "UPDATE $tabela SET ".$postArquivo."='".$nome_novo_arquivo."' WHERE id='$id_recuperado'");
					}else{
						echo "<script>alert('".utf8_decode('Ocorreu um erro ao enviar o arquivo para a pasta correta!')."');</script>";
					}
				}else{
					echo "<script>alert('".utf8_decode('Esse arquivo é maior que o permitido, o tamanho máximo permitido é de: 3MB!.')."');</script>";	
				}
			}else{
				echo "<script>alert('".utf8_decode('Arquivo não suportado! Os tipos suportados são: JPG, JPEG, PNG e GIF! Edite seu registro e insira um arquivo válido.')."');</script>";		
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
			
			$nome_novo_arquivo = uniqid().base_convert(mt_rand(),10,36).'.png';
			
			if($tipo_arquivo == 'image/jpeg' || $tipo_arquivo == 'image/jpg' || $tipo_arquivo == 'image/png' || $tipo_arquivo == 'image/gif') {
				if($tamanho_arquivo <= 3145728) {
					if(move_uploaded_file($nome_arquivo_temp, $pasta.$nome_novo_arquivo)) {
						$varArquivo = $nome_novo_arquivo;
					}else{
						echo "<script>alert('".utf8_decode('Ocorreu um erro ao enviar o arquivo para a pasta correta!')."');</script>";
					}
				}else{
					echo "<script>alert('".utf8_decode('Esse arquivo é maior que o permitido, o tamanho máximo permitido é de: 3MB!.')."');</script>";
				}
			}else{
				echo "<script>alert('".utf8_decode('Arquivo não suportado! Os tipos suportados são: JPG, JPEG, PNG e GIF! Edite seu registro e insira um arquivo válido.')."');</script>";
			}
			
		}
	}
?>