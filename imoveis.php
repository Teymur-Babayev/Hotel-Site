<?php
// Arquivos de Configuração
include_once("adm_gerencia/includes/Conexao.php");

// Captura dinâmica da URL completa e número da página
$scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$canonicalUrl = $scheme . '://' . $host . $uri;

// Tentativa de capturar o número da página da URL
$pageNumber = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

// Definição da URL canônica como constante
define('META_SITE_LINK', $canonicalUrl);

// Dados Seo / Meta Tags
define('META_SITE_NAME', utf8_encode(NOME));
define('META_SITE_TITLE', 'Nossos Imóveis');
define('META_SITE_DESCRIPTION', 'Explore nossa seleção de imóveis à venda em Camboriú, Balneário Camboriú e região. Encontre casas, apartamentos, sobrados e terrenos ideais para morar ou investir. Opções atualizadas para atender a todos os gostos e orçamentos.');
define('META_SITE_KEYWORDS', utf8_encode(META_KEYWORDS));

if(empty(IMG_COMPARTILHAMENTO)){
    define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/template/img/img_compartilhamento.png');
}else{
    define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/uploads/tb_configuracao/1/'.IMG_COMPARTILHAMENTO);
}
define('META_SITE_LINK', $_linkCompleto.'/imoveis/1');
?>
<!doctype html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="https://static.imoveisroberta.com.br/assets/estilos.css">
<?php include "includes/include.Html.Head.php";?>
<!-- Google Tag Manager -->
<script type="584dbd7bdeab2dc059c02165-text/javascript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TS38FZKJ');</script>
<!-- End Google Tag Manager -->
<style>
.form-control {
    padding: 8px 14px;
    border: 1px solid #cacaca;
    font-size: 14px !important;
    margin-bottom: 0;
    border-radius: 5px;
    font-weight: 800;
}
</style>

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
                	<?php
						if (isset($_GET['id_transacao'])){
							//Consulta no Banco
							$_sql   = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE id='".$_GET['id_transacao']."'");
							$_dados = mysqli_fetch_array($_sql);
							echo "<i class='fa fa-building-o font-color-secundaria'></i> ";
							echo "Imóveis para <span class='font-weight-800 font-color-secundaria'>" .utf8_encode($_dados['nome'])."</span>";
						}else if(isset($_GET['referencia'])!=""){
							echo "<i class='fa fa-search font-color-secundaria'></i> ";
							echo "Referência: <span class='font-weight-800 font-color-secundaria'>".$_GET['referencia']."</span>";
						}else{
							echo "<i class='fa fa-building-o font-color-secundaria'></i> ";
							echo "Todos os <span class='font-weight-800 font-color-secundaria'>Imóveis</span>";
						}
					?>
                </h1>
            </div>
        </div>
        <div class="row center-xs middle-xs">
			<?php include "includes/listas/lista.Imoveis.php";?>
        </div>
    </div>
</section>

<footer>
	<?php include "includes/include.Footer.php";?>
</footer>
    
<?php include "includes/include.Footer.Scripts.php";?>

</body>
</html>