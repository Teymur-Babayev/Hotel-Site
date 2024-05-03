<div class="container-fluid fixed-top">
	<div class="row">
    	<div class="col-md-12 padding-3 background-color-primaria" id="top_header">
        	<div class="container">
            	<div class="row cor_links_topo">
                    <div class="col-md-10">
                    	<div class="row">
                        	<?php
								if(!empty(TELEFONE)){
							?>
							<div class="col-md-3 d-none d-sm-block text-align-left margin-top-10 margin-bottom-10">
								<p class="margin-bottom-0">
									
    <i class="fa fa-line-chart font-color-secundaria"></i>
<span class="estilo-ancora"> CUB SC ABR/24 R$ 2.757</span>
								</p>
							</div>
							<?php
								}
							?>
							<?php
								if(!empty(CELULAR)){
							?>
							<div class="col-md-3 d-none d-sm-block text-align-left margin-top-10 margin-bottom-10">
								<p class="margin-bottom-0">
									<a href="https://wa.link/366gd7" target="_blank">
										<i class="fa fa-whatsapp font-color-secundaria"></i> <?php echo CELULAR;?>
									</a> 
								</p>
							</div>
                            <?php
								}
							?>
                            <?php
								if(!empty(EMAIL)){
							?>
							<div class="col-md-4 d-none d-sm-block text-align-left margin-top-10 margin-bottom-10">
								<p class="margin-bottom-0">
									<a href="mailto:<?php echo EMAIL;?>?Subject=Contato pelo Site" target="_blank">
										<i class="fa fa-envelope font-color-secundaria"></i> <?php echo EMAIL;?>
									</a> 
								</p>
							</div>
                            <?php
								}
							?>
                            <?php
								if(!empty(CRECI)){
							?>
							<div class="col-md-2 d-none d-sm-block text-align-left margin-top-10 margin-bottom-10">
								<p class="margin-bottom-0 font-color-white">
									<i class="fa fa-address-card-o font-color-secundaria"></i> Creci: <?php echo CRECI;?> 
								</p>
							</div>
                            <?php
								}
							?>
                        </div>
                    </div>
                    <div class="col-md-2 text-align-right margin-top-10 margin-bottom-0 padding-left-20 padding-right-20">
                    	<ul class="menu-social-top">
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
								if(!empty(LINK_INSTAGRAM)){
							?>
      <li>
    <a href="https://www.imoveisroberta.com.br/favoritos" aria-label="Favoritos">
        <i class="fa fa-heart"></i>
        <span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0, 0, 0, 0); border: 0; margin: -1px;">Favoritos</span>
    </a>
</li>
                            
                            <?php
								}
							?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 padding-left-0 padding-right-0">
                    <nav class="navbar navbar-expand-lg background-color-white border-bottom-1px border-color-silver padding-top-5 padding-bottom-5">
                        <div class="container text-align-left"> 
                        	<a class="navbar-brand text-align-left" href="<?php echo $_linkCompleto;?>">
                				<?php
									if(empty(LOGO_TOPO)){
								?>
                                <img 
                                    src="https://static.imoveisroberta.com.br/img/65f364b319c4fcmmo9p.webp" 
                                    alt="Logo Roberta Pires"
                                >
                                <?php
									}else{
								?>
<img src="https://static.imoveisroberta.com.br/img/65f364b319c4fcmmo9p.webp" alt="Logo Roberta Pires" width="200" height="200">








                                <?php
									}
								?>
                			</a>
                            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#nTp" aria-controls="nTp" aria-label="Alternar navegação">
    <span class="navbar-toggler-icon" style="width:auto">
         <i class="fa fa-bars padding-top-0 font-color-secundaria fa-2x"></i>
    </span>
</button>
                            <?php 
								$classe_ativo = "navbar-active font-color-white background-color-secundaria border-radius-5 margin-right-10 margin-left-10";
								$classe_ativo_icon = "nav-link_i_ativo";
							?>
                            <div class="collapse navbar-collapse" id="nTp">
                                <ul class="navbar-nav ml-auto">
 
 <li class="nav-item">
                                        <a 
                                            class="nav-link <?php echo (@ $paginaLink=="index.php"?" $classe_ativo ":"");?>" 
                                            href="<?php echo $_linkCompleto;?>"
                                        >
                                        	Início
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a 
                                            class="nav-link <?php echo (@ $paginaLink=="institucional.php"?" $classe_ativo ":"");?>" 
                                            href="<?php echo $_linkCompleto;?>/institucional"
                                        >
                                            Sobre nós
                                        </a>
                                    </li>
                                    
                                    <?php
										// Criação de Url Amigável
										function url_amigavel_transacao($str, $replace = array(), $delimiter = '-') {
    if (!empty($replace)) {
        $str = str_replace((array)$replace, ' ', $str);
    }

    $clean = iconv('ISO-8859-1', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

    return $clean;
}

// Consulta SQL para selecionar apenas a transação com id igual a 1
$sql = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE status='S' AND id = 1 ORDER BY id ASC");

$total = mysqli_num_rows($sql);

if ($total > 0) {
    for ($i = 0; $i < $total; $i++) {
        $dados = mysqli_fetch_array($sql);

        //Monta Url Amigável
        $_pega_nome_transacao = url_amigavel_transacao($dados['nome']);
        $_converte_nome_transacao = $_pega_nome_transacao;
?>
        <li class="nav-item">
           <a class="nav-link <?php if (isset($_GET['id_transacao'])) {
    switch ($_GET['id_transacao']) {
        case $dados['id']:
            echo $classe_ativo;
            break;
    }
} ?>" href="<?php echo $_linkCompleto; ?>/imoveis/<?php echo $dados['id']; ?>">
    <i class="fa fa-star nav-link_i margin-right-1 <?php if (isset($_GET['id_transacao'])) {
        switch ($_GET['id_transacao']) {
            case $dados['id']:
                echo $classe_ativo_icon;
                break;
        }
    } ?>"></i> Imóveis
</a>
        </li>
									<?php
											} 
										}
									?>
                                                      <li class="nav-item">
                                        <a 
                                            class="nav-link <?php echo (@ $paginaLink=="noticias.php"?" $classe_ativo ":"");?><?php echo (@ $paginaLink=="noticia.php"?" $classe_ativo ":"");?>" 
                                            href="https://www.imoveisroberta.com.br/anuncie"
                                        >
                                        	<i class="fa fa-star" aria-hidden="true" style="color:#dba052"></i> ANUNCIE SEU IMÓVEL
                                        </a>
                                    </li> 
   
                                    <li class="nav-item">
                                        <a 
                                            class="nav-link <?php echo (@ $paginaLink=="imoveis-busca-camboriu.php"?" $classe_ativo ":"");?>" 
                                            href="https://www.imoveisroberta.com.br/imoveis-a-venda/camboriu/"
                                        >
                                        	<i class="fa fa-star" aria-hidden="true" style="color:#dba052"></i> Camboriú
                                        </a>
                                    </li>                 
                                    <li class="nav-item">
                                        <a 
                                            class="nav-link <?php echo (@ $paginaLink=="financiamento.php"?" $classe_ativo ":"");?>" 
                                            href="<?php echo $_linkCompleto;?>/financiamento"
                                        >
                                        	Financiamento
                                        </a>
                                    </li>
                                    

                                 
	 <li class="nav-item">
                                        <a 
                                            class="nav-link <?php echo (@ $paginaLink=="contato.php"?" $classe_ativo ":"");?>" 
                                            href="<?php echo $_linkCompleto;?>/contato"
                                        >
                                        	Contato
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" id="whatsapp-link" onclick="sendWhatsAppMessage(); return false;">
 <img 
  src="https://static.imoveisroberta.com.br/whats.webp" 
  alt="Ícone do WhatsApp para contato com a Imobiliária Roberta Pires" 
  title="Clique para entrar em contato com a Imobiliária Roberta Pires via WhatsApp"
  width="15" 
  height="15"
>
    <span style="position: absolute; overflow: hidden; clip: rect(0 0 0 0); height: 1px; width: 1px; margin: -1px; padding: 0; border: 0;">ENTRE EM CONTATO</span>
</a>