<?php
// Inclui os arquivos de configuração e estabelece conexão com o banco de dados
include_once("adm_gerencia/includes/Conexao.php");

// Obtém os dados institucionais (assumindo que 'id=1' se refere aos dados institucionais principais)
$sql_Institucional = mysqli_query($link, "SELECT * FROM tb_institucional WHERE id='1'");
$dados_Institucional = mysqli_fetch_array($sql_Institucional, MYSQLI_ASSOC);

// Gera a URL canônica baseada na URL atual da página
$scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$canonicalUrl = $scheme . '://' . $host . $uri;

// Dados SEO / Meta Tags específicos para a página de Financiamento
$meta_site_name = utf8_encode(NOME);
$meta_site_title = 'Busca personalizada de Imóveis';
$meta_site_description = 'Explore nossa seleção de imóveis à venda em Camboriú, Balneário Camboriú e região. Encontre casas, apartamentos, sobrados e terrenos ideais para morar ou investir. Opções atualizadas para atender a todos os gostos e orçamentos.';
$meta_site_keywords = 'roberta pires camboriu, imobiliaria camboriu, imobiliaria em camboriu, imobiliaria pires, roberta corretora';
$meta_site_link = $canonicalUrl; // Usando a URL canônica gerada dinamicamente
$meta_site_image = empty(IMG_COMPARTILHAMENTO) ? $_linkCompleto . '/thumbnail.php?w=330px&h=330px&imagem=assets/template/img/img_compartilhamento.png' : $_linkCompleto . '/thumbnail.php?w=330px&h=330px&imagem=assets/uploads/tb_configuracao/1/' . IMG_COMPARTILHAMENTO;
?>
<!doctype html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="https://static.imoveisroberta.com.br/assets/estilos.css">
<?php include "includes/include.Html.Head.Imoveis.php";?>
<style>
    #valor_maximo, #valor_minimo {
        height: 39px; 
    }
</style>
<!-- Google Tag Manager -->
<script type="584dbd7bdeab2dc059c02165-text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TS38FZKJ');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<noscript><img height="1" width="1" alt="fbb" style="display:none"
  src="https://www.facebook.com/tr?id=745016227318705&ev=PageView&noscript=1"
/></noscript>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TS38FZKJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="menu-accessibility">
	<?php include "includes/include.Painel.Acessibilidade.php";?>
</div>
<header>
	<?php include "includes/include.Top.Menu.php";?>
</header>
<section class="margin-content-section">
	<?php include "includes/include.BuscadorImovel.php";?>
</section>

<section class="background-color-white padding-top-70 padding-bottom-60">
	<div class="container">
    	<div class="row center-xs middle-xs">
            <div class="col-md-12 text-align-center margin-bottom-20">
            	<h1 class="font-color-primaria font-weight-400 font-size-25 text-uppercase margin-bottom-0" style="margin: 0; padding: 0;">
                    <i class="fa fa-search font-color-secundaria"></i> Resultado da sua <span class="font-weight-800 font-color-secundaria">Busca</span>
                </h1>

            </div>
        </div>
        <div class="row center-xs middle-xs">
			<?php include "includes/listas/lista.Imoveis.Busca.php";?>
        </div>
    </div>
</section>

<footer>
	<?php include "includes/include.Footer.php";?>
</footer>
    
<?php include "includes/include.Footer.Scripts.php";?>

</body>
</html>