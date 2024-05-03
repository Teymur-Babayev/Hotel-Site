<?php
	// Inclusão do arquivo de Configuração
	include_once("../../includes/Configuracao.php");
 
	// parametros de recebimento do ajax do CKeditor
	$CKEditor = $_GET['CKEditor'];
	$funcNum = $_GET['CKEditorFuncNum'];
	 
	// inicio do processo de upload
	 
	$allowed_extension = array(
	  "png","jpg","jpeg"
	);
 
	// pega a extensao do arquivo carregado
	$file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);
	
	// Gera o novo nome para o arquivo
	$nome_novo_arquivo = uniqid().base_convert(mt_rand(),10,36).'.png';
 
	if(in_array(strtolower($file_extension),$allowed_extension)){
 
	   if(move_uploaded_file($_FILES['upload']['tmp_name'], "../../../assets/uploads/tb_imagens_ckeditor/".$nome_novo_arquivo)){
		  // realiza o upload
		  if(isset($_SERVER['HTTPS'])){
			 $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
		  }
		  else{
			 $protocol = 'http';
		  }
		  $url = "../assets/uploads/tb_imagens_ckeditor/".$nome_novo_arquivo;
 
		  // retorna pro CKeditor a resposta com a URL do arquivo carregado
		  echo '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
	   }
 
	}
	exit;
?>