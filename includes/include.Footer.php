<section class="background-color-secundaria padding-top-40 padding-bottom-30">
	<div class="container">
    	<div class="row middle-xs">
        	<div class="col-md-12 text-align-left">
                <form id="newsletterForm" data-toggle="validator" class="shake">
                    <div class="row">
                    	<div class="col-md-12">
                            <div id="msgSubmit_Newsletter" class="hidden"></div> 
                        	<div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-envelope-o font-color-white font-size-40"></i>
                        </div>
                        <div class="col-md-3">
                            <p class="margin-top-0 margin-bottom-10 font-size-14 line-height-20 font-color-white font-weight-500">
                                Cadastre-se e recebe novidades e informações diretamente em seu email.
                            </p>
                        </div>
                        <div class="col-md-8">
                        	<div class="row">
                            	<div class="col-md-5 text-align-left">
                                	<div class="form-group">
                                        <div class="controls"> 
                                            <input 
                                                type="text"  
                                                class="form-control20"
                                                id="nome_news" 
                                                placeholder="Nome"
                                                required data-error="* Insira seu Nome"
                                            >
                                            <div class="help-block with-errors font-color-white"></div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 text-align-left">
                                	<div class="form-group">
                                        <div class="controls">
                                            <input 
                                                type="email" 
                                                class="form-control20" 
                                                id="email_news" 
                                                placeholder="E-mail"
                                                required data-error="* Insira seu Email"
                                            >
                                            <div class="help-block with-errors font-color-white"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-align-left">
                                	<button type="submit" id="submit" class="botoes-primaria-to-white border-0">
                                        Cadastro
                                    </button>  
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="background-color-primaria padding-top-35 padding-bottom-50">
	<div class="container">
    	<div class="row">
        	<div class="col-md-3 text-align-left">
            	<div class="row">
                	<div class="col-md-12 margin-top-20 text-align-left">
                    	<a href="<?php echo $_linkCompleto;?>" class="navbar-brand-footer">
							<?php
                                if(empty(LOGO_RODAPE)){
                            ?>
                            <img src="https://static.imoveisroberta.com.br/logofooter.webp" alt="Logotipo secundário da Imobiliária Roberta Pires em Camboriú" title="Roberta Pires Corretora" width="200" height="49">
</div>
                            <?php
                                }else{
                            ?>
                           <img src="https://static.imoveisroberta.com.br/logofooter.webp" alt="logo rodapé" width="200" height="40">
   <?php
                                }
                            ?>
                        </a>
                    </div>
                    <?php
						if(!empty(CRECI)){
					?>
                    <div class="col-md-12 margin-top-5 text-align-center">
                    	<p class="margin-bottom-0 font-color-secundaria">
                            <i class="fa fa-address-card-o font-color-secundaria"></i> Creci: <span class="font-color-white"><?php echo CRECI;?></span>
                        </p>
                    </div>
                    <?php
						}
					?>
                    <div class="col-md-12 text-align-left margin-top-10 margin-bottom-0">
                    	<ul class="menu-social-bottom">
                            <?php
								if(!empty(LINK_FACEBOOK)){
							?>
                            <li>
                                <a href="<?php echo LINK_FACEBOOK;?>" aria-label="Instagram" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <?php
								}
							?>
                            <?php
								if(!empty(LINK_INSTAGRAM)){
							?>
                            <li>
                                <a href="<?php echo LINK_INSTAGRAM;?>" aria-label="Instagram" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>

                            <?php
								}
							?>
                            <?php
								if(!empty(LINK_LINKEDIN)){
							?>
                            <li>
                                <a href="<?php echo LINK_LINKEDIN;?>" target="_blank">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </li>
                            <?php
								}
							?>
                            <?php
								if(!empty(CELULAR)){
							?>
                            <li>
                                <a href="https://wa.link/366gd7" aria-label="Whatsapp" target="_blank">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                            <?php
								}
							?>
                        </ul>
<div itemscope itemtype="http://schema.org/LocalBusiness" style="display: none;">
  <span itemprop="name">Roberta Pires - Imobiliária em Camboriú</span>
  <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
    <span itemprop="streetAddress">Rua José Francisco Bernardes 242</span>,
    <span itemprop="addressLocality">Centro</span>,
    <span itemprop="addressRegion">SC</span>,
    <span itemprop="postalCode">88340-233</span>,
    <span itemprop="addressCountry">BR</span>
  </div>
  <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
    Avaliação Média: <span itemprop="ratingValue">4.82</span> estrelas
    <meta itemprop="bestRating" content="5"/>
    <meta itemprop="worstRating" content="1"/>
    Baseado em <span itemprop="reviewCount">22</span> avaliações
  </div>
</div>

                    </div>
                </div>
            </div>
            
  <div class="col-md-2 margin-top-25 text-align-left">
            	<div class="row">
                	<div class="col-md-12 margin-bottom-5">
                    	<h3 class="text-uppercase font-size-15 font-weight-800 font-color-secundaria">Navegação</h3>
                    </div>
                    <div class="col-md-12 cor_links_topo">
                        <p class="margin-bottom-0 line-height-22">
                        	<a href="<?php echo $_linkCompleto;?>">
                            	<i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Home
                            </a>
                        </p>
                        <p class="margin-bottom-0 line-height-22">
                        	<a href="<?php echo $_linkCompleto;?>/institucional">
                            	<i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> A Imobiliária
                            </a>
                        </p>
                        <p class="margin-bottom-0 line-height-22">
                        	<a href="<?php echo $_linkCompleto;?>/financiamento">
                            	<i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Financiamento
                            </a>
                        </p>
                        <p class="margin-bottom-0 line-height-22">
                        	<a href="<?php echo $_linkCompleto;?>/noticias">
                            	<i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Blog
                            </a>
                        </p>
                        <p class="margin-bottom-0 line-height-22">
                        	<a href="<?php echo $_linkCompleto;?>/contato">
                            	<i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Contato
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            
  <div class="col-md-2 margin-top-25 text-align-left">
    <div class="row">
        <div class="col-md-12 margin-bottom-5">
            <h3 class="text-uppercase font-size-15 font-weight-800 font-color-secundaria">Melhores Bairros</h3>
        </div>
        <div class="col-md-12 cor_links_topo">
            <p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/areias">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Areias
                </a>
            </p>
            <p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/cedros-lidia-duarte">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Cedros (Lidia Duarte)
                </a>
            </p>
            <p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/centro">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Centro
                </a>
            </p>
            <p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/rio-pequeno">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Rio Pequeno
                </a>
            </p>
		<p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/santa-clara">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Santa Clara
                </a>
            </p>
<p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/santa-regina">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Santa Regina
                </a>
            </p>
<p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/sao-francisco-de-assis-barranco">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> São F. Assis (Barranco)
                </a>
            </p>
<p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/tabuleiro">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Tabuleiro
                </a>
            </p>
<p class="margin-bottom-0 line-height-22">
                <a href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/sao-francisco-de-assis-barranco">
                    <i class="fa fa-chevron-right font-size-10 font-color-secundaria"></i> Terras Altas
                </a>
            </p>
        </div>
    </div>
</div>
 <div class="col-md-5 margin-top-25 text-align-left">
            	<div class="row">
                	<div class="col-md-12 margin-bottom-5">
                    	<h3 class="text-uppercase font-size-15 font-weight-800 font-color-secundaria">Fale Conosco</h3>
                    </div>
                    <div class="col-md-12 cor_links_topo">
                    	
                        <div class="row">
                        
							<?php
                                if(!empty(ENDERECO)){
                            ?>
                            <div class="col-md-12">
                                <p class="margin-bottom-10 font-color-white font-size-14 line-height-20">
                                    <?php echo utf8_encode(ENDERECO.", ".NUMERO.", ".COMPLEMENTO." - ".BAIRRO." - ".CIDADE." - ".ESTADO." - Cep: ".CEP);?>
                                </p>
                            </div>
                            <?php
                                }
                            ?>
 <?php
								if(!empty(CELULAR)){
							?>
                            <div class="col-md-6">
                                <p class="margin-bottom-10">
                                    <a href="//api.whatsapp.com/send?1=pt_BR&phone=+55<?php echo preg_replace("/[^0-9]/", "", CELULAR);?>" target="_blank">
                                        <i class="fa fa-whatsapp font-color-secundaria"></i> 
                                        <span class="font-color-secundaria">Celular:</span>
                                        <strong class="font-weight-700"><?php echo CELULAR;?></strong>
                                    </a>
                                </p>
                            </div>
							<?php
								}
							?>
			</div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

