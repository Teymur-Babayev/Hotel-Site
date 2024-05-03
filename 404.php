<?php
	// Arquivos de Configuração
	include_once("adm_gerencia/includes/Conexao.php");
	
	// Dados Seo / Meta Tags
	define('META_SITE_NAME', utf8_encode(NOME));
	define('META_SITE_TITLE', '404');
	define('META_SITE_DESCRIPTION', 'Ops! ocorreu um erro. A página que você está tentando acessar parece ter sido removida ou não está mais disponível.');
	define('META_SITE_KEYWORDS', utf8_encode(META_KEYWORDS));
	
	if(empty(IMG_COMPARTILHAMENTO)){
		define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/template/img/img_compartilhamento.png');
	}else{
		define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/uploads/tb_configuracao/1/'.IMG_COMPARTILHAMENTO);
	}
	
	define('META_SITE_LINK', $_linkCompleto.'/404');
?>
<!doctype html>
<html lang="pt">
<head>
<?php include "includes/include.Html.Headi.php";?>
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
    	<div class="row center-xs middle-xs">
            <div class="col-md-12 text-align-center margin-bottom-20">
            	<h3 class="font-color-primaria font-weight-400 font-size-25 text-uppercase">
                	<i class="fa fa-warning font-color-secundaria"></i> Página <span class="font-weight-800 font-color-secundaria">não encontrada</span>
                </h3>
            </div>
           <div class="col-md-12">
                <div class="col-md-12 alert alert-warning padding-content-sobre border-radius-5">
                    <div class="row center-xs middle-xs">
                        <div class="col-md-12 text-align-center padding-top-30 padding-bottom-30">
                            <p class="text-uppercase font-color-silver-dark font-size-13 font-weight-400 margin-0 acessibilidade">
                                A página que você está tentando acessar parece ter sido removida ou não está mais disponível. 
                            </p>
                            <p class="text-uppercase font-color-silver-dark font-size-13 font-weight-800 margin-0 acessibilidade">
                                Tente novamente usando outro termo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
	<?php include "includes/include.Footer.php";?>
</footer>
    
<?php include "includes/include.Footer.Scripts.php";?>

</body>
</html>