<h1 class="imobiliaria-header" style="text-transform: uppercase;">
    <span class="nome-imobiliaria"><span class="dash">-</span> Roberta Pires - Imobiliária em Camboriú. <span class="dash">-</span></span>
    <span class="slogan">Encontre <span class="seo-text">o imóvel</span><span class="typing-container" id="typing-container"><span id="typed-word"></span></span>
    dos seus sonhos em <br><strong>Camboriú e região.</strong></span>
</h1>

<div class="container-fluid larger-container-fluid">  
   
    <div class="container buscador-responsive">
        <div class="row middle-xs">
            <!-- Tipo de Imóvel -->
            <div class="form-group col-xs-12 col-sm-3"> 
 <label for="id_tipo" class="visually-hidden">Tipo de Imóvel</label>
                <select id="id_tipo" name="id_tipo" class="form-control" style="height: 50px;">
                    <option value="0">TIPO</option>                    <?php 
                    // Assume-se que $link já está definido e conectado ao banco de dados
                    $sqlTipo = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE status='S' ORDER BY nome");
                    while($dadosTipo = mysqli_fetch_array($sqlTipo)){ ?>
                        <option value='<?php echo $dadosTipo['id']?>'><?php echo utf8_encode($dadosTipo['nome']);?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Cidade -->
            <div class="form-group col-xs-12 col-sm-3"> 
	<label for="id_cidade" class="visually-hidden">Cidade</label>
                <select id="id_cidade" name="id_cidade" class="form-control" style="height: 50px;">
                    <option value="0"> <i class="fa fa-home" aria-hidden="true"></i>
 CIDADE</option>
                    <?php 
                    $sqlCidade = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE status='S' ORDER BY nome");
                    while($dadosCidade = mysqli_fetch_array($sqlCidade)){ ?>
                        <option value='<?php echo $dadosCidade['id']?>'><?php echo utf8_encode($dadosCidade['nome']);?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Bairro -->
            <div class="form-group col-xs-12 col-sm-3">
<label for="id_bairro" class="visually-hidden">Bairro</label>
                <select id="id_bairro" name="id_bairro" class="form-control" style="height: 50px;">
                    <option value="0">BAIRRO</option>
                    <!-- Os bairros serão carregados aqui com base na cidade selecionada -->
                </select>
            </div>

     <!-- Campos Ocultos com valores predefinidos -->
            <input type="hidden" id="id_transacao" name="id_transacao" value="1">
            <input type="hidden" id="id_finalidade" name="id_finalidade" value="1">
            <input type="hidden" id="dependencias_quartos" name="dependencias_quartos" value="0">
            <input type="hidden" id="dependencias_suites" name="dependencias_suites" value="0">
            <input type="hidden" id="dependencias_banheiro" name="dependencias_banheiro" value="0">
            <input type="hidden" id="dependencias_garagem" name="dependencias_garagem" value="0">
            <input type="hidden" id="valor_minimo" name="valor_minimo" value="0">
            <input type="hidden" id="valor_maximo" name="valor_maximo" value="0">
            <!-- Botão de Busca -->
            <div class="form-group col-xs-12 col-sm-3">
 <label for="btnBuscar" class="visually-hidden">Buscar</label>
		<button id="btnBuscar" class="btn btn-primary border-0 d-block" style="width:250px; cursor:pointer" onclick="buscarImovelDetalhado()">
                    <i class="fa fa-search"></i> MOSTRAR TODOS IMÓVEIS
                </button>

            </div>
        </div>
    </div>
</div>


<script>
    function displayTitleBasedOnScreenSize() {
        var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        if (width > 768) { // Considera telas acima de 768px como desktop
            document.getElementById('titleDesktop').style.display = 'block';
            document.getElementById('titleMobile').style.display = 'none';
        } else { // Telas 768px ou menores são consideradas mobile
            document.getElementById('titleDesktop').style.display = 'none';
            document.getElementById('titleMobile').style.display = 'block';
        }
    }

    // Chama a função quando a página carrega
    displayTitleBasedOnScreenSize();

    // Adiciona um ouvinte para chamadas de resize e ajusta a visibilidade conforme necessário
    window.addEventListener('resize', displayTitleBasedOnScreenSize);
</script>
