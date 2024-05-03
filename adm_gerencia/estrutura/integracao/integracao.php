<div class="br-mainpanel" id="cadastra"> 
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="index.php">Dashboard</a>
            <span class="breadcrumb-item active">Integração com Portais</span>
        </nav>
    </div>
    
    
    <div class="col-md-12 pd-30 mg-b-0-force pd-b-10-force">
        <div class="row">
            <div class="col-md-9 text-left">
                <h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
                    <i class="fa fa-cube tx-yellow mg-r-10 mg-l-10"></i> Lista de Integradores
                </h4>
                <p class="mg-b-0 pd-l-45 pd-r-45">
                    Para importar seus imóveis para os sites dos Integradores forneça o link do XML desejado a seu integrador
                </p>
            </div>
        </div>
    </div>
    
</div>

<div class="br-mainpanel mg-t-10">
    
    <div class="br-pagebody mg-mobile mg-t-15-force">
        <div class="br-section-wrapper">
        	
            <div class="row">
            
            	<?php
					$_quantidade = 7;
					for ($_i = 1; $_i < $_quantidade; $_i++) {
						
						switch ($_i) {
							case 1:
								$_imagem_array = "olx-logo.jpg";
								$_nome_array   = "Olx";
								$_texto_array  = "";
								$_link_array   = "olx-imoveis.xml";
								$_backg_array  = "#f1f1f1";
							break;
							case 2:
								$_imagem_array = "chaves-na-mao-logo.jpg";
								$_nome_array   = "Chaves na Mão";
								$_texto_array  = "";
								$_link_array   = "chaves-na-mao.xml";
								$_backg_array  = "#e5e5e5";
							break;
							case 3:
								$_imagem_array = "viva-real-logo.jpg";
								$_nome_array   = "Viva Real";
								$_texto_array  = "";
								$_link_array   = "vivareal.xml";
								$_backg_array  = "#f1f1f1";
							break;
							case 4:
								$_imagem_array = "zap-logo.jpg";
								$_nome_array   = "Zap Imóveis";
								$_texto_array  = "";
								$_link_array   = "zap-imoveis.xml";
								$_backg_array  = "#e5e5e5";
							break;
							case 5:
								$_imagem_array = "imovel-web-logo.jpg";
								$_nome_array   = "Imóvel Web";
								$_texto_array  = "";
								$_link_array   = "imovelweb.xml";
								$_backg_array  = "#f1f1f1";
							break;
							case 6:
								$_imagem_array = "mercado-livre-logo.jpg";
								$_nome_array   = "Mercado Livre";
								$_texto_array  = "";
								$_link_array   = "mercado-livre.xml";
								$_backg_array  = "#e5e5e5";
							break;
						}	
				?>
                <div class="col-md-12 col-xs-12 pd-t-25 pd-b-25" style="background:<?php echo $_backg_array;?>">
                    <div class="row">
                        <div class="col-md-2">
                            <img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/<?php echo $_imagem_array;?>' class="img-fluid">
                        </div>
                        <div class="col-md-10 pd-t-10">
                            <div class="row">
                                <div class="col-md-12 tx-left">
                                    <h6 class="tx-uppercase tx-bold tx-17 tx-yellow mg-b-5">
                                        <?php echo $_nome_array;?>
                                    </h6>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input 
                                                id="input_link_<?php echo $_i;?>" 
                                                class="form-control" 
                                                value="<?php echo $_linkCompleto;?>/<?php echo $_link_array;?>"
                                            >
                                        </div>
                                        <div class="col-md-2">
                                            <button onclick="copiar_link_<?php echo $_i;?>()" class="btn btn-info">
                                            	<i class="fa fa-copy"></i> Copiar
                                            </button>
                                            <script>
                                                let copiar_link_<?php echo $_i;?> = () =>{
                                                    const input_link_<?php echo $_i;?> = document.querySelector("#input_link_<?php echo $_i;?>");
                                                    input_link_<?php echo $_i;?>.select();
                                                    document.execCommand('copy');
                                                };
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
					}
				?>

                
            </div>
        </div>
