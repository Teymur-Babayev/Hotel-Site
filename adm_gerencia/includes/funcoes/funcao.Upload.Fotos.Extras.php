<?php
	// Aplica as Datas
	$_data_criacao = date('Y-m-d H:i:s');
	
	$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;
	
	for ($k = 0; $k < count($arquivo['name']); $k++){	
		$destino    = $diretorio."/";
		$novaImagem = uniqid().base_convert(mt_rand(),10,36).'.jpg';

		if (move_uploaded_file($arquivo['tmp_name'][$k], $destino . $novaImagem))
		{
			//Executa Insert
			mysqli_query($link, "INSERT INTO $tabela(
					id_registro,
					id_ordem,
					data_criacao,
					foto,
					login_usuario
				)VALUES(
					'$id_do_registro',
					'0',
					'".$_data_criacao."',
					'$novaImagem',
					'$login_usuario_logado'
				)"
			);
		}
	}
?>