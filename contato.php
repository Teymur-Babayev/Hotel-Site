<?php
	// Arquivos de Configuração
	include_once("adm_gerencia/includes/Conexao.php");
	
	// Dados da Especialidade
	$sql_Institucional   = mysqli_query($link, "SELECT * FROM tb_institucional WHERE id='1'");
	$dados_Institucional = mysqli_fetch_array($sql_Institucional, MYSQLI_ASSOC);
		
	// Dados Seo / Meta Tags específicos para a página de Financiamento
	$meta_site_name = utf8_encode(NOME);
	$meta_site_title = 'Entrar em Contato - Roberta Pires';
	$meta_site_description = 'Entre em contato conosco para mais informações sobre imóveis em Camboriú. Estamos prontos para ajudar você a encontrar o imóvel perfeito ou vender o seu.';
	$meta_site_keywords = ('contato imobiliaria camboriu, contato roberta pires, imobiliaria camboriu, imobiliaria camboriu sc, imobiliaria em camboriu');
	$meta_site_link = $_linkCompleto . '/contato';
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

<section class="background-color-white padding-top-70 padding-bottom-60">
	<div class="container">
    	<div class="row center-xs middle-xs">
            <div class="col-md-12 text-align-center margin-bottom-20">
            	<h1 class="font-color-primaria font-weight-400 font-size-25 text-uppercase margin-bottom-0" style="margin: 0; padding: 0;">
                    <i class="fa fa-phone font-color-secundaria"></i> Entre em Contato com a <span class="font-weight-800 font-color-secundaria">Roberta Pires Imobiliária</span>
                </h1>
<h2 class="font-size-14 acessibilidade font-color-silver-dark margin-bottom-0" style="text-transform: uppercase;">
    Agende uma Visita ou Solicite Mais Informações
</h2>


<section class="padding-top-70 padding-bottom-60">
    <div class="container">
        <div class="row center-xs middle-xs">
       
           <?php
               if(!empty(TELEFONE)){
           ?>
           <div class="col-md-4 margin-bottom-30">
                <div class="col-md-12 background-color-primaria padding-20 border-radius-5">
                    <i class="fa fa-phone font-color-secundaria font-size-60 margin-bottom-10"></i>
                    <p class="font-color-white font-size-15 line-height-20 margin-top-0 margin-bottom-5 acessibilidade">
                        Atendimento via Telefone
                    </p>
                    <p class="font-size-19 line-height-20 margin-top-0 margin-bottom-5">
                        <a href="tel:<?php echo preg_replace("/[^0-9]/", "", TELEFONE);?>" class="font-weight-800 font-color-secundaria">
                            <?php echo TELEFONE;?>
                        </a>
                    </p>
                </div>
            </div>
            <?php
                }
            ?>
            
            <?php
                if(!empty(CELULAR)){
            ?> 
            <div class="col-md-4 margin-bottom-30">
                <div class="col-md-12 background-color-primaria padding-20 border-radius-5">
                    <i class="fa fa-whatsapp font-color-secundaria font-size-60 margin-bottom-10"></i>
                    <p class="font-color-white font-size-15 line-height-20 margin-top-0 margin-bottom-5 acessibilidade">
                        Atendimento via WhatsApp
                    </p>
                    <p class="font-size-19 line-height-20 margin-top-0 margin-bottom-5">
                        <a href="//api.whatsapp.com/send?1=pt_BR&phone=+55<?php echo preg_replace("/[^0-9]/", "", CELULAR);?>" class="font-weight-800 font-color-secundaria">
                            <?php echo CELULAR;?>
                        </a>
                    </p>
                </div>
            </div>
            <?php
                }
            ?>
            
            <?php
                if(!empty(EMAIL)){
            ?>
            <div class="col-md-4 margin-bottom-30">
                <div class="col-md-12 background-color-primaria padding-20 border-radius-5">
                    <i class="fa fa-envelope-o font-color-secundaria font-size-60 margin-bottom-10"></i>
                    <p class="font-color-white font-size-15 line-height-20 margin-top-0 margin-bottom-5 acessibilidade">
                        Atendimento via E-mail
                    </p>
                    <p class="font-size-17 line-height-20 margin-top-0 margin-bottom-5">
                        <a href="mailto:<?php echo EMAIL;?>?Subject=Contato enviado através do Site" class="font-weight-800 font-color-secundaria">
                            <?php echo EMAIL;?>
                        </a>
                    </p>
                </div>
            </div>
            <?php
                }
            ?>
            
        </div>
        <div class="row">
            <div class="col-md-12 text-align-center margin-top-0">
                <i class="fa fa-angle-double-down font-size-50 font-color-secundaria"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-bottom-30  margin-top-20 text-align-center">
                <p class="font-size-15 font-weight-800 font-color-primaria margin-bottom-5">
                    Para agilizar seu atendimento preencha corretamente os campos abaixo.
                </p>
                <p class="font-size-18 font-color-secundaria font-weight-800 margin-bottom-0">
                    campos com (*) são obrigatórios
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 margin-top-0">
                <form id="contactForm" data-toggle="validator" class="shake">
                    <div class="row text-left">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="controls"> 
                                    <input 
                                        type="text"  
                                        class="form-control"
                                        id="nome" 
                                        placeholder="Nome (*)"
                                        required data-error="* Insira seu Nome"
                                    >
                                    <div class="help-block with-errors"></div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="controls">
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        id="telefone" 
                                        placeholder="Telefone (*)"
                                        required data-error="* Insira seu Telefone"
                                    >
                                    <div class="help-block with-errors"></div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <input 
                                        type="email" 
                                        class="form-control" 
                                        id="email" 
                                        placeholder="E-mail (*)"
                                        required data-error="* Insira seu Email"
                                    >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="assunto" 
                                        placeholder="Assunto"
                                    >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 input-message">
                            <div class="form-group">
                                <div class="controls"> 
                                    <textarea 
                                        id="mensagem" 
                                        name="mensagem" 
                                        rows="9" 
                                        class="form-control font-weight-800" 
                                        placeholder="Mensagem"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 margin-top-5">
                            <div id="msgSubmit" class="hidden"></div> 
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-md-12 text-align-center margin-top-5 form-btn margin-bottom-5 text-uppercase">  
                            <button type="submit" id="submit" class="botoes-primaria-to-secundaria border-0">
                                <i class="fa fa-send"></i> Enviar Contato
                            </button>  
                        </div>
<div class="col-md-12">
            	<div class="col-md-12 c-card-detalhes-dependencias">
                	<div class="row" id="dependencias_imoveis">
                    
                        <div class="col-md-12 margin-bottom-10 margin-top-5 text-align-left" style="background:transparent !important">
                        	<h2 class='uppercase-display font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0'>
                        		
<h2 class="font-size-14 acessibilidade font-color-silver-dark margin-bottom-0" style="text-transform: uppercase;">
	Entre em Contato conosco, temos a negociação perfeita pra você.
</h2>
                        	</p></div>   </div>
              
Estamos prontos para ajudá-lo a encontrar o imóvel perfeito para suas necessidades! Na nossa página de contato, você pode enviar suas dúvidas, sugestões ou solicitações com facilidade. Preencha o formulário acima ou, se preferir, entre em contato diretamente pelo Whatsapp ou e-mail fornecidos nesta página. Nossa equipe está sempre disponível para oferecer o suporte necessário, seja para comprar, vender ou alugar. Sua satisfação é nossa prioridade. Entre em contato conosco hoje mesmo e dê o próximo passo em direção ao seu novo lar!
                 
           </div>
        </div>
        </div>
    </div>
            
                </form>
            </div>
        </div>
    </div>

</section>
</section>
<footer>
	<?php include "includes/include.Footer.php";?>
</footer>
    
<?php include "includes/include.Footer.Scripts.php";?>

</body>
</html>