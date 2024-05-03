<?php
// Incluindo arquivos de configuração e classes necessárias
header('Content-Type: text/html; charset=utf-8');
require_once "adm_gerencia/includes/Conexao.php";
require_once "adm_gerencia/estrutura/estatisticas/class.Visitante.php";
define('META_SITE_NAME',('Roberta Pires - Imobiliária em Camboriú'));
define('META_SITE_TITLE',('Roberta Pires Imobiliária - Sua Imobiliária em Camboriú e região'));
define('META_SITE_DESCRIPTION', 'Encontre o imóvel ideal em Camboriú e região. Compra e venda de casas e apartamentos com facilidade. Acesse agora e realize seu sonho!');
define('META_SITE_KEYWORDS',('imobiliaria camboriu, imobiliaria em camboriu, imobiliarias camboriu, imobiliária em camboriú, casa camboriu, terreno camboriu, sobrado camboriu, apartamento camboriu, casa a venda camboriu, terreno a venda camboriu, sobrado  a venda camboriu, apartamento a venda camboriu'));
$imagem_compartilhamento = !empty(IMG_COMPARTILHAMENTO) ? "assets/uploads/tb_configuracao/1/" . IMG_COMPARTILHAMENTO : "assets/template/img/img_compartilhamento.png";
define('META_SITE_IMAGE', $_linkCompleto . '/thumbnail.php?w=330px&h=330px&imagem=' . $imagem_compartilhamento);
define('META_SITE_LINK', $_linkCompleto);
$visitante = new Visitante();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
 <link rel="preload" as="image" href="https://www.imoveisroberta.com.br/banner01.webp">
    <?php include "includes/include.Html.Head.php"; ?>
<link rel="stylesheet" type="text/css" href="https://static.imoveisroberta.com.br/assets/estilos.css">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TS38FZKJ');</script>
<!-- End Google Tag Manager -->
<style>
    #more {display: none;} 
    #myBtn {
        background-color: white; 
        color: #037084; 
        border: 2px solid #fff; 
        font-size: 16px; 
        cursor: pointer; 
        transition: all 0.3s ease; 
    }
</style>
<style>
    .hidden-content {
        display: none; /* Oculta o conteúdo inicialmente */
    }
    h2.custom-font-size, p.custom-font-size {
        font-size: 14px; /* Aplica tamanho de fonte personalizado */
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
    <?php include "includes/include.Painel.Acessibilidade.php"; ?>
</div>
<header>
    <?php include "includes/include.Top.Menu.php"; ?>
</header>
<div id="banner">
    <div id="buscador">
        <?php include "includes/include.BuscadorR.php"; ?>
    </div>
</div>
<section class="background-color-white padding-top-70 padding-bottom-60">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 text-align-center margin-bottom-20">
            	<h2 class="font-color-primaria font-weight-400 font-size-25 text-uppercase">
                	<i class="fa fa-building-o font-color-secundaria"></i> Imóveis em <span class="font-weight-800 font-color-secundaria">Destaque</span>
                </h2></div>

            </div>
            <div class="col-md-12">
				<?php 
					// Definição das variáveis para listar imóveis em destaque
					$_carroussel_status = 1;
					$_condicao   = "AND destaque='S'";
			
		$_ordenacao  = "id_ordem ASC, id DESC";
					$_quantidade = QTD_DESTAQUES; 
					include "includes/listas/lista.Home.Imoveis.php";
				?>
            </div>
   
    </div>
</section>
<section class="background-color-silver-light padding-top-70 padding-bottom-50">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 text-align-center margin-bottom-20">
            	<h3 class="font-color-primaria font-weight-400 font-size-25 text-uppercase">
                	<i class="fa fa-building-o font-color-secundaria"></i> Imóveis <span class="font-weight-800 font-color-secundaria">Recentes</span>
                </h3>
            </div>
            <div class="col-md-12">
				<?php 
					// Definição das variáveis para listar imóveis recentes
					$_carroussel_status = 0;
					$_condicao   = "";
					$_ordenacao  = "data_edicao DESC";
					$_quantidade = QTD_RECENTES; 
					include "includes/listas/lista.Home.Imoveis.php";
				?>
            </div>
        </div>
    </div><center>
    <div class="col-md-3 background-color-white border-radius-5 margin-5">
        <center>
            <p class="font-size-13 line-height-50 padding-5 margin-0 text-uppercase d-block">
    <a href="https://www.imoveisroberta.com.br/imoveis/1/" class="text-center"> <i class="fa fa-plus" aria-hidden="true"></i> VER MAIS IMÓVEIS</a>
</p>
        </center>
    </div>
</center>

</section>

<section class="background-color-white padding-top-70 padding-bottom-50">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 text-align-center margin-bottom-20">
            	<h3 class="font-color-primaria font-weight-400 font-size-25 text-uppercase">
                	<i class="fa fa-newspaper-o font-color-secundaria"></i> Últimas <span class="font-weight-800 font-color-secundaria">Notícias</span>
                </h3>

            </div>
            <div class="col-md-12">
				<?php 
					// Definição das variáveis para listar últimas notícias
					$_carroussel_status = 0;
					$_condicao   = "";
					$_ordenacao  = "data_edicao DESC";
					$_quantidade = "3"; 
					include "includes/listas/lista.Home.Noticias.php";
				?>

<div id="hiddenContent" class="hidden-content">
        <h2 class="custom-font-size">Bem-vindo à Roberta Pires Imobiliária em Camboriú, Balneário Camboriú SC e região!</h2>
        <p class="custom-font-size">Em nossa imobiliária, nos dedicamos a ajudá-lo a encontrar o imóvel perfeito seja <strong>sobrado, apartamento, casa ou terreno</strong>, em uma das regiões mais belas do Brasil. Temos lindos imóveis nos principais <strong>bairros e loteamentos de Camboriú</strong>, como <strong>Areias, Cedros - Lidia Duarte, Centro, Rio Pequeno, Santa Regina, São Francisco de Assis - Barranco, Tabuleiro, Terras Altas </strong> etc. Seja você um comprador, um vendedor ou esteja apenas explorando as opções, nossa equipe de Corretores está aqui para guiar você em cada passo do caminho. Com uma vasta experiência no mercado local, nossa imobiliária se destaca por oferecer um atendimento personalizado e por nossa profunda conhecimento das localidades em Camboriú. Venha descobrir como podemos ajudá-lo a realizar seu sonho imobiliário na região de Camboriú e Balneário Camboriú!</p>
    </div>
    <button onclick="toggleVisibility()" id="myBtn">Saiba Mais</button>
            </div>
        </div>
</section>
<footer>
    <?php include "includes/include.Footer.php"; ?>
</footer>
<?php include "includes/include.Footer.Scripts.php"; ?>
    <script>
    function toggleVisibility() {
        var content = document.getElementById("hiddenContent");
        if (content.style.display === "none") {
            content.style.display = "block"; 
            document.getElementById("myBtn").textContent = "Ver Menos";
        } else {
            content.style.display = "none"; 
            document.getElementById("myBtn").textContent = "Saiba Mais";
        }
    }
    </script>
 </body>
</html>
