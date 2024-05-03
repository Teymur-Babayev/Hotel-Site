<?php
	// Arquivos de Configuração
	include_once("adm_gerencia/includes/Conexao.php");
	
	// Dados da Especialidade
	$sql_Institucional   = mysqli_query($link, "SELECT * FROM tb_institucional WHERE id='1'");
	$dados_Institucional = mysqli_fetch_array($sql_Institucional, MYSQLI_ASSOC);

	// Dados Seo / Meta Tags específicos para a página de Financiamento
	$meta_site_name = utf8_encode(NOME);
	$meta_site_title = 'Sobre a Roberta Pires Imobiliária';
	$meta_site_description = 'Saiba mais sobre Roberta Pires Imobiliária em Camboriú, nossa missão, visão e valores. Descubra por que somos a escolha certa para comprar, vender e alugar imóveis na região.';
	$meta_site_keywords = ('roberta pires camboriu, imobiliaria camboriu, imobiliaria em camboriu, imobiliaria pires, roberta corretora');
	$meta_site_link = $_linkCompleto . '/institucional';
	$meta_site_image = empty(IMG_COMPARTILHAMENTO) ? $_linkCompleto . '/thumbnail.php?w=330px&h=330px&imagem=assets/template/img/img_compartilhamento.png' : $_linkCompleto . '/thumbnail.php?w=330px&h=330px&imagem=assets/uploads/tb_configuracao/1/' . IMG_COMPARTILHAMENTO;

	
?>
<!doctype html>
<html lang="pt">
<head>
<link rel="stylesheet" type="text/css" href="https://static.imoveisroberta.com.br/assets/estilos.css">
<?php include "includes/include.Html.Head.Paginas.php";?>
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

<section class="background-color-white padding-top-70 padding-bottom-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-align-center margin-bottom-15">
                <h1 class="font-color-primaria font-weight-400 font-size-25 text-uppercase margin-bottom-0" style="margin: 0; padding: 0;">
                    <i class="fa fa-building-o font-color-secundaria"></i> Conheça a <span class="font-weight-800 font-color-secundaria">Roberta Pires Imobiliária</span>
                </h1>
            </div>
        </div><a href="#" id="whatsapp-link" onclick="sendWhatsAppMessage(); return false;">
    <img src="https://www.imoveisroberta.com.br/whats.png" alt="WhatsApp" />
</a>
    	<div class="row">
            <div class="col-md-6 text-align-left margin-top-10 margin-bottom-10 img-effect">
				<?php 
                    if(!empty($dados_Institucional['foto'])){
                ?>
                <img 
                    src="<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=695px&imagem=assets/uploads/tb_institucional/1/<?php echo $dados_Institucional['foto'];?>" 
                    class="img-fluid"
                >
                <?php
                    }else{
                ?>
                <img src="//via.placeholder.com/800x695/cccccc/999999/" class="img-fluid">
                <?php
                    }
                ?>
            </div>
            <div class="col-md-6 text-align-left margin-top-10 margin-bottom-10">
                <div class="col-md-12 c-card-detalhes">
                    <p class="font-color-silver-dark font-size-15 line-height-19 acessibilidade margin-bottom-0">
                        <?php 
                            $texto = utf8_encode($dados_Institucional['descricao']); 
                            $texto = str_replace("</p>","<br>",$texto); 
                            $texto = strip_tags($texto,'<br><br><strong></strong><b></b>'); 
                            $texto = str_replace("\n","",$texto);
                            echo $texto;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="background-color-silver-light padding-top-50 padding-bottom-50">
	<div class="container">
        <div class="row">
            <div class="col-md-4 text-align-center margin-top-15 margin-bottom-15">
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-lightbulb-o font-size-70 font-color-secundaria"></i>
                    </div>
                    <div class="col-md-12 margin-top-15">
                        <h2 class="font-size-16 font-color-silver-dark font-weight-800 text-uppercase">
                            Missão da Imobiliária
                        </h2>
                        <p class="font-color-silver-dark margin-top-10 margin-bottom-0 font-size-15 line-height-20 acessibilidade">
                            <?php 
                                $texto = utf8_encode($dados_Institucional['missao']); 
                                $texto = strip_tags($texto,'');
                                $texto = str_replace("\n","",$texto);
                                echo $texto;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-align-center margin-top-15 margin-bottom-15">
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-eye font-size-70 font-color-secundaria"></i>
                    </div>
                    <div class="col-md-12 margin-top-15">
                        <h2 class="font-size-16 font-color-silver-dark font-weight-800 text-uppercase">
                            Nossa Visão
                        </h2>
                        <p class="font-color-silver-dark margin-top-10 margin-bottom-0 font-size-15 line-height-20 acessibilidade">
                            <?php 
                                $texto = utf8_encode($dados_Institucional['visao']); 
                                $texto = strip_tags($texto,'');
                                $texto = str_replace("\n","",$texto);
                                echo $texto;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-align-center margin-top-15 margin-bottom-15">
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-diamond font-size-70 font-color-secundaria"></i>
                    </div>
                    <div class="col-md-12 margin-top-15">
                        <h2 class="font-size-16 font-color-silver-dark font-weight-800 text-uppercase">
                            Nossos Valores
                        </h2>
                        <p class="font-color-silver-dark margin-top-10 margin-bottom-0 font-size-15 line-height-20 acessibilidade">
                            <?php 
                                $texto = utf8_encode($dados_Institucional['valores']); 
                                $texto = strip_tags($texto,'');
                                $texto = str_replace("\n","",$texto);
                                echo $texto;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
	$_carroussel_status = 1;
	$_condicao   = "id_registro='".$dados_Institucional['id']."'";
	$_ordenacao  = "id_ordem ASC, data_criacao DESC";
	$_quantidade = "30"; 
	include "includes/listas/lista.Institucional.Fotos.php";
?>

<footer>
	<?php include "includes/include.Footer.php";?>
</footer>
    
<?php include "includes/include.Footer.Scripts.php";?>

</body>
</html>