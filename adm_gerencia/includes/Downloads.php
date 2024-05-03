<?php
	// Vamos recuperar o nome do arquivo que desejamos fazer o download
	 $arquivo = $_GET["arquivo"];
	 
	// Vamos descobrir a sua extensão, afinal não queremos ninguém baixando o PHP, ou html do site correto?
	$testa = substr($arquivo,-3);
	 
	// Definimos os arquivos que devem ser bloqueados ou seja não autorizados para download, vocês podem colocar quantas extensões
	// desejarem
	$bloqueados = array('php','tml','htm');
	 
	// Se as extensões forem diferentes das citadas, vai executar normalmente o script
	if(!in_array($testa,$bloqueados)){
	 
	// Verificamos se o arquivo existe e se a variável não esta vazia.
	 
	if(isset($arquivo) && file_exists($arquivo)){
	 
	// fazer um SWITCH para baixar o arquivo, verificando novamente a extensão desejada porém desta vez a extensão completa
	// já que acima apenas limitamos em 3 caracteres para remover as mais "comuns".
	 
	switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){
	 
	// Agora criar para cada caso um "tipo"
	case "pdf":
	 
	$tipo="application/pdf";
	break;
	 
	case "exe":
	 
	$tipo="application/octet-stream";
	 break;
	 
	case "zip":
	 
	$tipo="application/zip";
	break;
	 
	case "doc":
	$tipo="application/msword";
	break;
	 
	case "xls":
	 
	$tipo="application/vnd.ms-excel";
	break;
	 
	case "ppt":
	 
	$tipo="application/vnd.ms-powerpoint";
	break;
	 
	case "gif":
	 
	$tipo="image/gif";
	break;
	 
	case "png":
	 
	$tipo="image/png";
	break;
	 
	case "jpg":
	 
	$tipo="image/jpg";
	break;
	 
	case "mp3":
	 
	$tipo="audio/mpeg";
	break;
	 
	}
	 
	// Informamos ao navegador o tipo
	header("Content-Type: ".$tipo);
	 
	// O tamanho do arquivo
	header("Content-Length: ".filesize($arquivo));
	 
	// O tipo do arquivo
	header("Content-Disposition: attachment; filename=".basename($arquivo));
	 
	// Lê o arquivo
	readfile($arquivo);
	 
	// Finaliza o script após as verificações
	exit;
	 
	}
	 
	// Caso contrário saímos do script
	}else{
	 
	echo "Arquivo protegido!";
	 
	exit;
	 
	}
?>