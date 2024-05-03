<?php
	session_start();
	
	// ARQUIVO DE CONFIGURAÇÃO ONDE VEM OS DADOS DE BANCO, URL E LICENÇA
	include_once("Configuracao.php");
		
	// CONEXÃO COM O BANCO DE DADOS DO CLIENTE
	$link = mysqli_connect(SERVIDOR, USUARIO_DB, SENHA_DB, BANCO_DADOS);
	
	$link -> set_charset("latin1");
	
	// CONFIGURAÇÃO DO SERVIDOR
	$paginaLink = basename($_SERVER['SCRIPT_NAME']);
	setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
	date_default_timezone_set('America/Sao_Paulo');
	
	// CONFIGURAÇÃO DE LINKS
	
	if (!empty($_SERVER['HTTPS'])){
    	$host = "https://$_SERVER[HTTP_HOST]";
	}else{
   		$host = "http://$_SERVER[HTTP_HOST]";
	}
	
	$_linkCompleto = $host;
	$_linkCompletoAdmin = $_linkCompleto."/adm_gerencia";
	
	// CONFIGURAÇÃO CONEXÃO A TABELA DE DADOS DO USUÁRIO
	$sqlConfiguracao   = mysqli_query($link, "SELECT * FROM tb_configuracao WHERE id='1'");
	$dadosConfiguracao = mysqli_fetch_array($sqlConfiguracao, MYSQLI_ASSOC);
	
	define('NOME', $dadosConfiguracao['nome']);
	define('CRECI', $dadosConfiguracao['creci']);
	define('ENDERECO', $dadosConfiguracao['endereco']);
	define('NUMERO', $dadosConfiguracao['numero']);
	define('COMPLEMENTO', $dadosConfiguracao['complemento']);
	define('BAIRRO', $dadosConfiguracao['bairro']);
	define('CIDADE', $dadosConfiguracao['cidade']);
	define('ESTADO', $dadosConfiguracao['estado']);
	define('CEP', $dadosConfiguracao['cep']);
	define('TELEFONE', $dadosConfiguracao['telefone']);
	define('CELULAR', $dadosConfiguracao['celular']);
	define('EMAIL', $dadosConfiguracao['email']);
	define('EMAIL_RECEBE_CONTATO', $dadosConfiguracao['email_recebe_contato']);
	define('COR_PRIMARIA', $dadosConfiguracao['cor_primaria']);
	define('COR_SECUNDARIA', $dadosConfiguracao['cor_secundaria']);
	define('FAVICON', $dadosConfiguracao['favicon_site']);
	define('QTD_DESTAQUES', $dadosConfiguracao['qtd_destaques']);
	define('QTD_RECENTES', $dadosConfiguracao['qtd_recentes']);
	define('LOGO_TOPO', $dadosConfiguracao['logo_topo']);
	define('LOGO_RODAPE', $dadosConfiguracao['logo_rodape']);
	define('LOGO_FOTOS', $dadosConfiguracao['logo_fotos']);
	define('IMG_COMPARTILHAMENTO', $dadosConfiguracao['img_compartilhamento']);
	define('LINK_FACEBOOK', $dadosConfiguracao['link_facebook']);
	define('LINK_LINKEDIN', $dadosConfiguracao['link_linkedin']);
	define('LINK_INSTAGRAM', $dadosConfiguracao['link_instagram']);
	define('LINK_TWITTER', $dadosConfiguracao['link_twitter']);
	define('SERVER_EMAIL_PORTA', $dadosConfiguracao['server_email_porta']);
	define('SERVER_EMAIL_HOST', $dadosConfiguracao['server_email_host']);
	define('SERVER_EMAIL_USUARIO', $dadosConfiguracao['server_email_usuario']);
	define('SERVER_EMAIL_SENHA', $dadosConfiguracao['server_email_senha']);
	define('KEY_GOOGLE_ANALYTICS', $dadosConfiguracao['key_google_analytics']);
	define('KEY_GOOGLE_MAPS', $dadosConfiguracao['key_google_maps']);
	define('META_KEYWORDS', $dadosConfiguracao['meta_keywords']);
?>