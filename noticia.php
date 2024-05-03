<?php
// Arquivos de Configuração
include_once("adm_gerencia/includes/Conexao.php");

// Consulta Base Noticias
$sql_N_Noticias = mysqli_query($link, "SELECT * FROM tb_noticias WHERE id='" . $_GET["id"] . "'");
$dados_N_Noticias = mysqli_fetch_array($sql_N_Noticias, MYSQLI_ASSOC);

// Detectar o dispositivo para carregar a imagem apropriada
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function is_mobile_device($user_agent) {
    return preg_match('/iphone|ipod|ipad|android|blackberry|windows phone/i', $user_agent);
}

// Determinar o tamanho da imagem baseado no dispositivo
$tamanhoImagem = is_mobile_device($user_agent) ? "650x325" : "1300x650";
list($largura, $altura) = explode('x', $tamanhoImagem);
$_caminhoFoto = "assets/uploads/tb_noticias/" . $dados_N_Noticias['id'] . "/" . $dados_N_Noticias['foto'];
if (!empty($dados_N_Noticias['foto'])) {
    $_img_Noticia = $_linkCompleto . "/thumbnail.php?w=$largura&h=$altura&imagem=" . $_caminhoFoto;
} else {
    $_img_Noticia = "https://via.placeholder.com/{$largura}x{$altura}.png?text=Sem+Imagem+Cadastrada";
}

// Dados Seo / Meta Tags
define('META_SITE_NAME', utf8_encode(NOME));
define('META_SITE_TITLE', utf8_encode($dados_N_Noticias['titulo']));
define('META_SITE_DESCRIPTION', utf8_encode($dados_N_Noticias['subtitulo']));
define('META_SITE_KEYWORDS', utf8_encode(META_KEYWORDS));
define('META_SITE_IMAGE', $_img_Noticia);
define('META_SITE_LINK', $_linkCompleto . '/noticia/' . $dados_N_Noticias['id'] . '/' . $dados_N_Noticias['url_amigavel']);
?>
<!doctype html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="https://static.imoveisroberta.com.br/assets/estilos.css">
<?php include "includes/include.Html.Head.Noticias.php";?>
</head>

<body>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=745016227318705&ev=PageView&noscript=1"
/></noscript>
<div id="menu-accessibility">
    <?php include "includes/include.Painel.Acessibilidade.php";?>
</div>

<header>
    <?php include "includes/include.Top.Menu.php";?>
</header>

<section class="margin-content-section">
    <?php include "includes/include.Buscador.php";?>
</section>

<section class="background-color-white padding-top-70 padding-bottom-60" id="pagina-impressao">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-align-center margin-bottom-15">
                <h1 class="font-color-primaria font-weight-400 font-size-25 text-uppercase margin-bottom-0" style="margin: 0; padding: 0;">
                    <?php echo utf8_encode($dados_N_Noticias['titulo']);?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-align-center">
                <div class="row">
                    <div class="col-md-12">
                        <img 
    src="<?php echo $_img_Noticia;?>" 
    alt="<?php echo utf8_encode($dados_N_Noticias['titulo']); // Descrição relevante da imagem ?>"
    class="img-fluid">
                    </div>
                    <div class="col-md-12">
                        <?php 
                            if(!empty($dados_N_Noticias['creditos'])){
                        ?>
                        <p class="font-color-silver-dark font-size-13 line-height-20 font-weight-400 padding-10 background-color-silver-light margin-bottom-0">
                            Créditos: <?php echo utf8_encode($dados_N_Noticias['creditos']);?>
                        </p>
                        <?php
                            }
                        ?>
                    </div>
                    
					<?php 
                        $_carroussel_status = 1;
                        $_id_noticia = $dados_N_Noticias['id'];
                        $_condicao   = "id_registro='".$dados_N_Noticias['id']."'";
                        $_ordenacao  = "id_ordem ASC, data_criacao DESC";
                        $_quantidade = "100"; 
                        include "includes/listas/lista.Noticias.Fotos.php";
                    ?>
                    

                    
                </div>
            </div>
            <div class="col-md-12">
            	<div class="col-md-12 text-align-center margin-top-30 text-align-justify c-card-detalhes">
                    <p class="font-color-secundaria font-size-13 margin-bottom-0 text-align-center">
                        (Postada em <strong><?php echo date("d/m/Y", strtotime($dados_N_Noticias['data_criacao']));?></strong>)
                    </p>

<br>

              



<?php 
    if(!empty($dados_N_Noticias['subtitulo'])){
?>
    <h2 class="font-color-silver-dark font-size-14 line-height-20 font-weight-700 margin-top-15 margin-bottom-0 acessibilidade text-align-center">
        <?php 
            $texto = utf8_encode($dados_N_Noticias['subtitulo']); 
            $texto = strip_tags($texto,'');
            $texto = str_replace("\n","",$texto);
            echo $texto;
        ?>
    </h2>
<?php
    }
?>
                    <h3 class="font-color-silver-dark font-size-14 line-height-20 margin-top-15 margin-bottom-0 acessibilidade">
    <?php 
        $texto = utf8_encode($dados_N_Noticias['texto']); 
        $texto = str_replace("</p>","<br><br>",$texto); 
        // Incluímos a tag <a> na lista de tags permitidas
        $texto = strip_tags($texto,'<br><br><strong></strong><b></b><a>'); 
        $texto = str_replace("\n","",$texto);
        echo $texto;
    ?>
</h3>
                </div>
            </div>
             <div class="col-md-12 text-align-center margin-top-35">
                <p>
                    <a href="<?php echo $_linkCompleto;?>/noticias" class="botoes-primaria-to-secundaria text-uppercase">
                       <i class="fa fa-arrow-left"></i> Ler mais Notícias
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="background-color-silver-light padding-top-70 padding-bottom-60">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 text-align-center margin-bottom-20">
            	<h2 class="font-color-secundaria font-weight-400 font-size-25 text-uppercase">
                	<i class="fa fa-newspaper-o"></i> Notícias <span class="font-weight-800">do Mercado Imobiliário</span>
                </h2>
            </div>
            <div class="col-md-12">
				<?php 
					$_carroussel_status = 1;
					$_condicao   = "AND id!='".$dados_N_Noticias['id']."'";
					$_ordenacao  = "data_edicao DESC";
					$_quantidade = "6"; 
					include "includes/listas/lista.Home.Noticias.php";
				?>
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