<?php
	// Arquivos de Configuração
	include_once("adm_gerencia/includes/Conexao.php");
	
	

// Verifica se a conexão é segura ou não
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Captura o host e a URI solicitada para montar a URL completa
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI']; // Captura a URI atual, por exemplo /noticias

// Monta a URL completa
$currentUrl = $scheme . $host . $uri;





	if(empty(IMG_COMPARTILHAMENTO)){
		define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/template/img/img_compartilhamento.png');
	}else{
		define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/uploads/tb_configuracao/1/'.IMG_COMPARTILHAMENTO);
	}
	
	define('META_SITE_LINK', $_linkCompleto.'/noticias');
?>
<!doctype html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="https://static.imoveisroberta.com.br/assets/estilos.css">
<?php include "includes/include.Html.Head.bairros.php";?>
<title>Blog - Roberta Pires Imobiliária </title>
<meta name="viewport" content="width=device-width">
<meta name="description" content="Acompanhe nosso blog para dicas, notícias e insights sobre o mercado imobiliário em Camboriú e arredores. Artigos úteis para compradores, vendedores e investidores.">
<meta name="keywords" content="noticias imobiliaria, mercado imobiliario camboriu, mercado imobiliario balneario camboriu, blog imobiliaria, imobiliaria em camboriu, imobiliaria camboriu"> 
<meta property="og:type" content="website">
<meta property="og:title" content="Roberta Pires Corretora - Camboriú SC">
<meta property="og:description" content="Deseja comprar ou vender seu imóvel? Nós temos a sua próxima residencia, acesse e conheça o imóvel do seus sonhos.">
<meta property="og:image" content="https://imoveisroberta.com.br/social.jpg">
<link rel="canonical" href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:site_name" content="Roberta Pires - Imobiliária em Camboriú">
<link rel="canonical" href="<?php echo htmlspecialchars($currentUrl, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="Language" content="Portuguese">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="1">
<meta name="distribution" content="global">
<meta name="rating" content="general">
<meta name="format-detection" content="telephone=yes"> 
</head>

<body>

<div id="menu-accessibility">
	<?php include "includes/include.Painel.Acessibilidade.php";?>
</div>

<header>
	<?php include "includes/include.Top.Menu.php";?>
</header>

<section class="margin-content-section">
	<?php include "includes/include.Buscador.php";?>
</section>

<section class="background-color-white padding-top-70 padding-bottom-60">
	<div class="container">
    	<div class="row">
            <div class="col-md-12 text-align-center margin-bottom-25">
            	<h1 class="acustom-h1">
    <i class='fa fa-newspaper-o font-color-secundaria' aria-hidden="true"></i> Noticias do <span class='font-weight-800 font-color-secundaria'>Mercado Imobiliário</span>
</h1>

            </div>
        </div>
        <div class="row">
        	<?php include "includes/listas/lista.Noticias.php";?>
        </div>
    </div>
</section>

<footer>
	<?php include "includes/include.Footer.php";?>
</footer>
    
<?php include "includes/include.Footer.Scripts.php";?>

</body>
</html>