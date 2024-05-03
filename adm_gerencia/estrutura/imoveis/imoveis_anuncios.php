<?php
	// AÇÕES INICIAIS
	
	$acao = null;
	$pos_acao_mensagem = null;
	$id = null;
	$url = null;
	$id_ordem = null;
	$dados = null;
	$foto = null;
	$nova_foto = null;
	$page = null;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// TRANSFORMA VARIAVEIS EM GET E POST
	
	$variables=(strtoupper($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST; foreach ($variables as $k=> $v) $$k=$v;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// CONFIGURAÇÕES
	
	$palavra       = "Imóveis / Anúncios";
	$tabela        = "tb_imoveis_anuncios";
	$tabela_fotos  = "tb_imoveis_fotos";
	$file          = "imoveis_anuncios";
	$file_redirect = "imoveis_anuncios";

	
	// INSERIR ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "insertDb"){
		
		// Aplica as Datas
		$_data_criacao = date('Y-m-d H:i:s');
		$_data_edicao  = date('Y-m-d H:i:s');
		
		//Monta Url Amigável
		$postUrl = $_POST['nome']; include "includes/funcoes/funcao.Url.Amigavel.php";
		
		// Array Adicionais
		if (count($adicionais)>0)
			$adicionais = "#" . implode("#", $adicionais) . "#";
		else
			$adicionais = "";
			
		//Dados Preco 
		if(empty($preco)){
			$_formata_preco = 0;
		}else{
			$_formata_preco = str_replace(',','.',str_replace('.','',$preco));
		}
			
		//Dados Preco Condominio
		if(empty($preco_condominio)){
			$_formata_preco_condominio = 0;
		}else{
			$_formata_preco_condominio = str_replace(',','.',str_replace('.','',$preco_condominio));
		}
		
		//Dados Preco Iptu
		if(empty($preco_iptu)){
			$_formata_preco_iptu = 0;
		}else{
			$_formata_preco_iptu = str_replace(',','.',str_replace('.','',$preco_iptu));
		}
		
		//Executa Insert
		mysqli_query($link, "INSERT INTO ".$tabela."(
				data_criacao,
				data_edicao,
				id_ordem,
				url_amigavel,
				destaque,
				lancamento,
				integracao_chaves_na_mao,
				integracao_imovelweb,
				integracao_mercado_livre,
				integracao_olx_imoveis,
				integracao_vivareal,
				integracao_zap_imoveis,
				id_transacao,
				id_finalidade,
				id_tipo,
				id_corretor,
				referencia,
				nome,
				descricao,
				observacoes,
				adicionais,
				foto,
				video,
				preco,
				preco_iptu,
				preco_condominio,
				cep,
				endereco,
				numero,
				complemento,
				ponto_referencia,
				id_bairro,
				id_cidade,
				estado,
				latitude,
				longitude,
				google_maps,
				dependencias_quartos,
				dependencias_suites,
				dependencias_garagem,
				dependencias_banheiro,
				dependencias_closet,
				dependencias_salas,
				dependencias_despensa,
				dependencias_bar,
				dependencias_cozinha,
				dependencias_quarto_empregada,
				dependencias_escritorio,
				dependencias_area_servico,
				dependencias_lareira,
				dependencias_varanda,
				dependencias_lavanderia,
				tamanho_area_privativa,
				tamanho_area_total,
				tamanho_area_terreno,
				tamanho_area_construida,
				tamanho_area_comum,
				status,
				login_usuario
			)VALUES(
				'$_data_criacao',
				'$_data_edicao',
				'0',
				'$urlAmigavel',
				'$destaque',
				'$lancamento',
				'$integracao_chaves_na_mao',
				'$integracao_imovelweb',
				'$integracao_mercado_livre',
				'$integracao_olx_imoveis',
				'$integracao_vivareal',
				'$integracao_zap_imoveis',
				'$id_transacao',
				'$id_finalidade',
				'$id_tipo',
				'$id_corretor',
				'$referencia',
				'$nome',
				'$descricao',
				'$observacoes',
				'$adicionais',
				'',
				'$video',
				'$_formata_preco',
				'$_formata_preco_iptu',
				'$_formata_preco_condominio',
				'$cep',
				'$endereco',
				'$numero',
				'$complemento',
				'$ponto_referencia',
				'$id_bairro',
				'$id_cidade',
				'$estado',
				'$latitude',
				'$longitude',
				'$google_maps',
				'$dependencias_quartos',
				'$dependencias_suites',
				'$dependencias_garagem',
				'$dependencias_banheiro',
				'$dependencias_closet',
				'$dependencias_salas',
				'$dependencias_despensa',
				'$dependencias_bar',
				'$dependencias_cozinha',
				'$dependencias_quarto_empregada',
				'$dependencias_escritorio',
				'$dependencias_area_servico',
				'$dependencias_lareira',
				'$dependencias_varanda',
				'$dependencias_lavanderia',
				'$tamanho_area_privativa',
				'$tamanho_area_total',
				'$tamanho_area_terreno',
				'$tamanho_area_construida',
				'$tamanho_area_comum',
				'S',
				'$login_usuario_logado'
			)"
		);
		
		$id_recuperado = mysqli_insert_id($link);
		
		//Cria diretótio de imagem
		$dir = "../assets/uploads/".$tabela."/".$id_recuperado;
		$pasta = $dir."/";
		
		$postArquivo = "foto"; $acaoUpload = "uploadArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";

		// Mensagem após a ação
		$textMsg = "Pronto! registro foi criado."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// ATUALIZAR / EDITAR /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "updateDb"){
		
		// Aplica as Datas
		$_data_edicao  = date('Y-m-d H:i:s');
		
		//Monta Url Amigável
		$postUrl = $_POST['nome']; include "includes/funcoes/funcao.Url.Amigavel.php";
		
		// Array Adicionais
		if (count($adicionais)>0)
			$adicionais = "#" . implode("#", $adicionais) . "#";
		else
			$adicionais = "";
			
		//Dados Preco 
		if(empty($preco)){
			$_formata_preco = 0;
		}else{
			$_formata_preco = str_replace(',','.',str_replace('.','',$preco));
		}
			
		//Dados Preco Condominio
		if(empty($preco_condominio)){
			$_formata_preco_condominio = 0;
		}else{
			$_formata_preco_condominio = str_replace(',','.',str_replace('.','',$preco_condominio));
		}
		
		//Dados Preco Iptu
		if(empty($preco_iptu)){
			$_formata_preco_iptu = 0;
		}else{
			$_formata_preco_iptu = str_replace(',','.',str_replace('.','',$preco_iptu));
		}
		
		// Começa Update da Imagem
		$dir = "../assets/uploads/".$tabela."/".$id;
		$pasta = $dir."/";
		
		if($nova_foto == "S"){
			if(is_dir($dir)){
				if($foto != "none") {
					$postArquivo = "foto"; $acaoUpload = "updateArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";
					$foto_1 = $varArquivo;
				}
			}
			@unlink($dir."/".$foto_antiga);
		} else {
			$foto_1 = $foto_antiga;
		}
		
		//Executa Update
		mysqli_query($link, "UPDATE ".$tabela." SET 
			data_edicao = '$_data_edicao',
			url_amigavel = '$urlAmigavel',
			destaque = '$destaque',
			lancamento = '$lancamento',
			integracao_chaves_na_mao = '$integracao_chaves_na_mao',
			integracao_imovelweb = '$integracao_imovelweb',
			integracao_mercado_livre = '$integracao_mercado_livre',
			integracao_olx_imoveis = '$integracao_olx_imoveis',
			integracao_vivareal = '$integracao_vivareal',
			integracao_zap_imoveis = '$integracao_zap_imoveis',
			id_transacao = '$id_transacao',
			id_finalidade = '$id_finalidade',
			id_tipo = '$id_tipo',
			id_corretor = '$id_corretor',
			referencia = '$referencia',
			nome = '$nome',
			descricao = '$descricao',
			observacoes = '$observacoes',
			adicionais = '$adicionais',
			foto = '$foto_1',
			video = '$video',
			preco = '$_formata_preco',
			preco_iptu = '$_formata_preco_iptu',
			preco_condominio = '$_formata_preco_condominio',
			cep = '$cep',
			endereco = '$endereco',
			numero = '$numero',
			complemento = '$complemento',
			ponto_referencia = '$ponto_referencia',
			id_bairro = '$id_bairro',
			id_cidade = '$id_cidade',
			estado = '$estado',
			latitude = '$latitude',
			longitude = '$longitude',
			google_maps = '$google_maps',
			dependencias_quartos = '$dependencias_quartos',
			dependencias_suites = '$dependencias_suites',
			dependencias_garagem = '$dependencias_garagem',
			dependencias_banheiro = '$dependencias_banheiro',
			dependencias_closet = '$dependencias_closet',
			dependencias_salas = '$dependencias_salas',
			dependencias_despensa = '$dependencias_despensa',
			dependencias_bar = '$dependencias_bar',
			dependencias_cozinha = '$dependencias_cozinha',
			dependencias_quarto_empregada = '$dependencias_quarto_empregada',
			dependencias_escritorio = '$dependencias_escritorio',
			dependencias_area_servico = '$dependencias_area_servico',
			dependencias_lareira = '$dependencias_lareira',
			dependencias_varanda = '$dependencias_varanda',
			dependencias_lavanderia = '$dependencias_lavanderia',
			tamanho_area_privativa = '$tamanho_area_privativa',
			tamanho_area_total = '$tamanho_area_total',
			tamanho_area_terreno = '$tamanho_area_terreno',
			tamanho_area_construida = '$tamanho_area_construida',
			tamanho_area_comum = '$tamanho_area_comum',
			login_usuario = '$login_usuario_logado' 
			WHERE id='$id'"
		);
		
		// Mensagem após a ação
		$textMsg = "Pronto! registro alterado."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// MUDAR STATUS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "statusDb"){
		
		//Executa Update
		mysqli_query($link, "UPDATE ".$tabela." SET status='".$status."' WHERE id='".$id."'");
		
		// Mensagem após a ação
		$textMsg = "Pronto! status alterado."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// DELETAR REGISTRO //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "deleteDb"){
		
		//Executa Delete
		mysqli_query($link, "DELETE FROM ".$tabela." WHERE id='".$id."'");
		
		//Executa Delete Fotos
		mysqli_query($link, "DELETE FROM ".$tabela_fotos." WHERE id_registro='".$id."'");
		
		//Apaga o Diretório
		$dir = "../assets/uploads/".$tabela."/".$id."/";
		$dir1 = opendir($dir);
		while ($res =readdir($dir1)){
			if ($res!='' && $res!='.' && $res!='..'){
				$url = $dir."/".$res;
				@unlink($url);
			}
		}	
		@rmdir ($dir);
		
		// Mensagem após a ação
		$textMsg = "Pronto! registro excluido."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// DELETAR SELECIONADOS
	
	if($acao == "deletesDb"){
		
		// Lista o Diretorio
		$listas = implode("|", $listas);
		$lista = explode("|", $listas);
		$total = count($lista);
		for($i=0; $i<$total; $i++){
			
			// Executa o Delete
			mysqli_query($link, "DELETE FROM ".$tabela." WHERE id='".$lista[$i]."'");
			
			//Executa Delete Fotos
			mysqli_query($link, "DELETE FROM ".$tabela_fotos." WHERE id_registro='".$lista[$i]."'");
			
			// Apaga o Diretório
			$dir = "../assets/uploads/".$tabela."/".$lista[$i]."/";
			$dir1 = opendir($dir);
			while ($res =readdir($dir1)){
				if ($res!='' && $res!='.' && $res!='..'){
					$url = $dir."/".$res;
					@unlink($url);
				}
			}	
			@rmdir ($dir);

		}
		
		// Mensagem após a ação	
		$textMsg = "Pronto! registro excluido."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	//FORM DE CADASTRO E ALTERAR
	
	$form1 = "FORMULARIO";
	$sql   = mysqli_query($link, "SELECT * FROM ".$tabela." WHERE id='".$id."'");
	$dados = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
	<script>
		function Habilitar_Foto() 
		{
			nForm = document.forms['<?php echo $form1?>'];
			if(nForm.elements['nova_foto'].checked = true) 
			{
				nForm.elements['foto'].disabled = false; nForm.elements['foto'].className= "form-control";
			}
		}
		function Desabilitar_Foto() 
		{
			nForm.elements['foto'].disabled = true; nForm.elements['foto'].className = "form-control";
		}
	</script>
    
    <div class="br-mainpanel" id="cadastra">
		
		<div class="br-pageheader pd-y-15 pd-l-20">
			<nav class="breadcrumb pd-0 mg-0 tx-12">
				<a class="breadcrumb-item" href="index.php">Dashboard</a>
				<a class="breadcrumb-item" href="#"><?php echo $palavra;?></a>
				<span class="breadcrumb-item active"><?php echo (empty($id))?"Cadastrar":"Alterar";?> <?php echo $palavra;?></span>
			</nav>
		</div>
		
		<div class="col-md-12 pd-30 mg-b-0-force pd-b-10-force">
        	<div class="row">
            	<div class="col-md-9 text-left">
                    <h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
            			<i class="fa fa-pencil tx-yellow mg-r-10 mg-l-10"></i> <?php echo (empty($id))?"Cadastrar" : "Alterar";?> <?php echo $palavra;?>
                    </h4>
                    <p class="mg-b-0 pd-l-45 pd-r-45">
                        <?php 
							if(empty($_GET['show_form'])){
								echo "Para cadastrar um novo registro clique no botão ao lado e preencha corretamente o formulário!";
							}else{
								echo "Para editar o registro selecionado e preencha corretamente o formulário!";
							}
						?>
                    </p>
                </div>
                <div class="col-md-3 text-right mg-t-5">
                    <button 
                        class="btn btn-info pd-8" 
                        type="button" 
                        data-toggle="collapse" 
                        data-target="#form_cadastro" 
                        aria-expanded="false" 
                        aria-controls="form_cadastro"
                    >
                        <i class="fa fa-plus"></i> Novo Registro
                    </button>
                </div>
            </div>
        </div>
	
		<form 
            action="?pg=<?php echo $file?>" 
            method="POST" 
            enctype="multipart/form-data" 
            name="<?php echo $form1;?>" 
            autocomplete="off" 
            data-parsley-validate
        >
		
			<input name="acao" type="hidden" value="<?php echo (empty($id))? "insertDb" : "updateDb";?>">
            <input name="id" type="hidden" value="<?php echo $id;?>">
            <input name="foto_antiga" type="hidden" value="<?php echo $dados['foto'];?>">
			
			<div class="br-pagebody mg-mobile mg-t-0-force collapse <?php if($_GET['show_form']){ echo "show";}?>" id="form_cadastro">
			
				<?php echo $pos_acao_mensagem;?>
			
				 <div class="br-section-wrapper mg-t-0-force mg-b-50-force">
				 	<div class="row">
                        
                        <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-building tx-yellow mg-r-5"></i> DETALHES DO IMÓVEL
                            </h3>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Transação <span class="tx-danger">*</span></h6>
                            <select id="id_transacao" name="id_transacao" class="form-control" required>
                                <?php 
                                    $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE status='S' ORDER BY id ASC");
                                    while($dados5 = mysqli_fetch_array($sql5)){ 
                                ?>
                                <option value='<?php echo $dados5['id']?>' <?php echo ($dados['id_transacao']==$dados5['id'])?"selected":"";?>> 
                                    <?php echo $dados5['nome']?>
                                </option>
                                <?php  
                                    } 
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Finalidade <span class="tx-danger">*</span></h6>
                            <select id="id_finalidade" name="id_finalidade" class="form-control" required>
                                <?php 
                                    $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_finalidade WHERE status='S' ORDER BY id ASC");
                                    while($dados5 = mysqli_fetch_array($sql5)){ 
                                ?>
                                <option value='<?php echo $dados5['id']?>' <?php echo ($dados['id_finalidade']==$dados5['id'])?"selected":"";?>> 
                                    <?php echo $dados5['nome']?>
                                </option>
                                <?php  
                                    } 
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Finalidade <span class="tx-danger">*</span></h6>
                            <select id="id_tipo" name="id_tipo" class="form-control" required>
                                <?php 
                                    $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE status='S' ORDER BY nome");
                                    while($dados5 = mysqli_fetch_array($sql5)){ 
                                ?>
                                <option value='<?php echo $dados5['id']?>' <?php echo ($dados['id_tipo']==$dados5['id'])?"selected":"";?>> 
                                    <?php echo $dados5['nome']?>
                                </option>
                                <?php  
                                    } 
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-12"></div>
                    
                        <div class="col-md-8 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-user"></i> Corretor <span class="tx-danger">*</span>
                            </h6>
							<select id="id_corretor" name="id_corretor" class="form-control">
                                <?php 
                                    $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_corretores WHERE status='S' ORDER BY nome ASC");
                                    while($dados5 = mysqli_fetch_array($sql5)){ 
                                ?>
                                <option value='<?php echo $dados5['id']?>' <?php echo ($dados['id_corretor']==$dados5['id'])?"selected":"";?>> 
                                    <?php echo $dados5['nome']?>
                                </option>
                                <?php  
                                    } 
                                ?>
                            </select>
						</div>
                        
                        <div class="col-md-12"></div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Código de Referência <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="referencia" name="referencia" value="<?php echo $dados['referencia'];?>" class="form-control" required>
						</div>
                        
                        <div class="col-md-8 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Nome do Imóvel <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="nome" name="nome" value="<?php echo $dados['nome'];?>" class="form-control" required>
						</div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Valor do Imóvel 
                            </h6>
                            <input type="text" id="preco" name="preco" value="<?php echo number_format($dados['preco'], 2, ',', '.');?>" class="form-control" required>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Preço do Condomínio <span class="tx-warning">opcional</span>
                            </h6>
                            <input type="text" id="preco_condominio" name="preco_condominio" value="<?php echo number_format($dados['preco_condominio'], 2, ',', '.');?>" class="form-control">
                        </div>
                        
                         <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Preço do Iptu <span class="tx-warning">opcional</span>
                            </h6>
                            <input type="text" id="preco_iptu" name="preco_iptu" value="<?php echo number_format($dados['preco_iptu'], 2, ',', '.');?>" class="form-control">
                        </div>
                        
                        <div class="col-md-12 pd-10"></div>
                        
                         <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-map tx-yellow mg-r-5"></i> LOCALIZAÇÃO DO IMÓVEL
                            </h3>
                        </div>
                        
                        <div class="col-md-6 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cidade <span class="tx-danger">*</span>
                            </h6>
                            <select id="id_cidade" name="id_cidade" class="form-control" required>
                                <?php 
                                    $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE status='S' ORDER BY nome");
                                    while($dados5 = mysqli_fetch_array($sql5)){ 
                                ?>
                                <option value='<?php echo $dados5['id']?>' <?php echo ($dados['id_cidade']==$dados5['id'])?"selected":"";?>> 
                                    <?php echo $dados5['nome']?>
                                </option>
                                <?php  
                                    } 
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-6 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Bairro <span class="tx-danger">*</span>
                            </h6>
                            <select id="id_bairro" name="id_bairro" class="form-control" required>
                                <?php $_idBairro = $dados['id_bairro'];?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cep <span class="tx-danger">*</span>
                            </h6>
                            <input type="text" id="cep" name="cep" value="<?php echo isset($dados['cep']) && !empty($dados['cep']) ? $dados['cep'] : '88330000'; ?>" class="form-control" required>
                        </div>
                        
                        <div class="col-md-7 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Endereço
                            </h6>
                            <input type="text" id="endereco" name="endereco" value="<?php echo $dados['endereco']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-2 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Número
                            </h6>
                            <input type="text" id="numero" name="numero" value="<?php echo $dados['numero']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-5 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Complemento <span class="tx-warning">opcional</span>
                            </h6>
                            <input type="text" id="complemento" name="complemento" value="<?php echo $dados['complemento']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-5 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Ponto de Referência <span class="tx-warning">opcional</span>
                            </h6>
                            <input type="text" id="ponto_referencia" name="ponto_referencia" value="<?php echo $dados['ponto_referencia']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-2 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Estado
                            </h6>
                            <input type="text" id="estado" name="estado" value="<?php echo $dados['estado']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Latitude <span class="tx-warning">opcional</span>
                            </h6>
                            <input type="text" id="latitude" name="latitude" value="<?php echo $dados['latitude']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Longitude <span class="tx-warning">opcional</span>
                            </h6>
                            <input type="text" id="longitude" name="longitude" value="<?php echo $dados['longitude']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-12 pd-10"></div>
                        
                         <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-home tx-yellow mg-r-5"></i> DEPENDÊNCIAS
                            </h3>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Dormitórios
                            </h6>
                            <select id="dependencias_quartos" name="dependencias_quartos" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_quartos']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Suítes
                            </h6>
                            <select id="dependencias_suites" name="dependencias_suites" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_suites']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Garagem
                            </h6>
                            <select id="dependencias_garagem" name="dependencias_garagem" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_garagem']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Banheiro
                            </h6>
                            <select id="dependencias_banheiro" name="dependencias_banheiro" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_banheiro']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Closet
                            </h6>
                            <select id="dependencias_closet" name="dependencias_closet" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_closet']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Salas
                            </h6>
                            <select id="dependencias_salas" name="dependencias_salas" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_salas']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Despensa
                            </h6>
                            <select id="dependencias_despensa" name="dependencias_despensa" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_despensa']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Bar
                            </h6>
                            <select id="dependencias_bar" name="dependencias_bar" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_bar']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cozinha
                            </h6>
                            <select id="dependencias_cozinha" name="dependencias_cozinha" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_cozinha']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Quarto de Empregada
                            </h6>
                            <select id="dependencias_quarto_empregada" name="dependencias_quarto_empregada" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_quarto_empregada']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Escritório
                            </h6>
                            <select id="dependencias_escritorio" name="dependencias_escritorio" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_escritorio']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Área de Serviço
                            </h6>
                            <select id="dependencias_area_servico" name="dependencias_area_servico" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_area_servico']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Lareira
                            </h6>
                            <select id="dependencias_lareira" name="dependencias_lareira" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_lareira']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Varanda
                            </h6>
                            <select id="dependencias_varanda" name="dependencias_varanda" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_varanda']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Lavanderia
                            </h6>
                            <select id="dependencias_lavanderia" name="dependencias_lavanderia" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>' <?php echo ($dados['dependencias_lavanderia']==$_i)?"selected":"";?>>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                            </select>
                        </div>
                        
                        <div class="col-md-12 pd-10"></div>
                        
                         <div class="col-md-12" style="padding:0px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-file-text-o tx-yellow mg-r-5"></i> DESCRIÇÃO DO IMÓVEL
                            </h3>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30 mg-t-15-force">
							<textarea name="descricao"><?php  echo $dados['descricao'];?></textarea>
							<script>
								 CKEDITOR.replace( 'descricao', {
									filebrowserUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=file",
									filebrowserImageUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=image",		
								 });
								 CKEDITOR.config.height='300px';
						 	</script>
						</div>
                        
                        <div class="col-md-12 pd-10"></div>
                        
                         <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-map-o tx-yellow mg-r-5"></i> TAMANHO DA ÁREA
                            </h3>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Área Privativa (m²)
                            </h6>
                            <input type="text" id="tamanho_area_privativa" name="tamanho_area_privativa" value="<?php echo $dados['tamanho_area_privativa']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Área Total (m²)
                            </h6>
                            <input type="text" id="tamanho_area_total" name="tamanho_area_total" value="<?php echo $dados['tamanho_area_total']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Área Terreno (m²)
                            </h6>
                            <input type="text" id="tamanho_area_terreno" name="tamanho_area_terreno" value="<?php echo $dados['tamanho_area_terreno']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Área Construída (m²)
                            </h6>
                            <input type="text" id="tamanho_area_construida" name="tamanho_area_construida" value="<?php echo $dados['tamanho_area_construida']?>" class="form-control">
                        </div>
                        
                         <div class="col-md-3 col-xs-12 mg-b-20">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Área Comum (m²)
                            </h6>
                            <input type="text" id="tamanho_area_comum" name="tamanho_area_comum" value="<?php echo $dados['tamanho_area_comum']?>" class="form-control">
                        </div>
                        
                        <div class="col-md-12 pd-10"></div>
                        
                         <div class="col-md-12" style="padding:20px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-warning tx-yellow mg-r-5"></i> ADICIONAIS DO IMÓVEL <span class="tx-warning tx-15">OPCIONAL</span>
                            </h3>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
                            <div class="row">
                                <?php 
                                    $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_adicionais WHERE status='S' ORDER BY nome");
                                    while($dados5 = mysqli_fetch_array($sql5)){ 
                                ?>
                                <div class="col-md-3 tx-gray-800 mg-b-5">
                                    <input 
                                        name="adicionais[]" 
                                        type="checkbox" 
                                        value='<?php echo $dados5['id'];?>' <?php echo (strpos($dados['adicionais'], "#".$dados5['id']."#")!==false)?"checked=\"checked\"":""; ?> 
                                    > <?php echo $dados5['nome'];?>
                                </div>
                                <?php  
                                    } 
                                ?>
                            </div>
                        </div>
                        
                       
                        
                                                
                        <div class="col-md-12 pd-10"></div>
                        
                         <div class="col-md-12" style="padding:0px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-warning tx-yellow mg-r-5"></i> OBSERVAÇÕES <span class="tx-warning tx-15">OPCIONAL</span>
                            </h3>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30 mg-t-15-force">
							<textarea name="observacoes"><?php  echo $dados['observacoes'];?></textarea>
							<script>
								 CKEDITOR.replace( 'observacoes', {
									filebrowserUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=file",
									filebrowserImageUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=image",		
								 });
								 CKEDITOR.config.height='300px';
						 	</script>
						</div>
                        
                        <div class="col-md-12"></div>
                        
                         <div class="col-md-12" style="padding:15px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-youtube-play tx-yellow mg-r-5"></i> VÍDEO DO IMÓVEL <span class="tx-warning tx-15">OPCIONAL</span>
                            </h3>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-20">
                            <input type="text" id="video" name="video" value="<?php echo $dados['video']?>" class="form-control">
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> (copie e cole o link do youtube, exemplo: https://www.youtube.com/watch?v=<strong>oqzOcZ3DqZM</strong>) 
                        * somente oque está em negrito</div>
                        </div>
                        
                        <div class="col-md-12"></div>
                        
                         <div class="col-md-12" style="padding:15px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-map-marker tx-yellow mg-r-5"></i> GOOGLE MAPS <span class="tx-warning tx-15">OPCIONAL</span>
                            </h3>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
                            <textarea name="google_maps" id="google_maps" class="form-control" style="height:120px"><?php  echo $dados['google_maps'];?></textarea>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> (copie e cole o código do Google Maps) </div>
                        </div>
                        
                        <div class="col-md-12"></div>
                        
                         <div class="col-md-12" style="padding:15px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-photo tx-yellow mg-r-5"></i> FOTO DESTAQUE <span class="tx-danger tx-15">*</span>
                            </h3>
                        </div>
                        
                        <div class="col-md-10 col-xs-12 mg-b-30">
							<div class="row">
								<div class="col-md-2">
									<?php 
										if(empty($id)){
											echo "<img name='foto_1' src='".$_linkCompleto."/thumbnail.php?no_img=1&w=250px&h=250px&imagem=assets/uploads/sem-foto-admin.jpg' border='0' class='img-fluid'>";
										}else{
											if(!empty($dados['foto'])){
												echo "<img name='foto_1' src='".$_linkCompleto."/thumbnail.php?no_img=1&w=250px&h=250px&imagem=assets/uploads/$tabela/$id/$dados[foto]' border='0' class='img-fluid'>";
											} else {
												echo "<img name='foto_1' src='".$_linkCompleto."/thumbnail.php?no_img=1&w=250px&h=250px&imagem=assets/uploads/sem-foto-admin.jpg' border='0' class='img-fluid'>";
											}
										}
									?>
								</div>
								<div class="col-md-10 mg-t-10">
                                	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-15">
                                        <i class="fa fa-picture-o mg-r-2"></i> IMAGEM <span class="tx-warning">(800x800)</span>
                                    </h6> 
									<?php
										 $msgImg = "Todas as fotos devem ter o formato .jpg";
										 if(empty($id))
										{
									?>
                                    <input 
                                        type="file" 
                                        name="foto" 
                                        id="foto" 
                                        class="form-control" 
                                        onChange="document.images.foto_1.src=this.value" 
										onclick="javascript:alert('<?php echo $msgImg;?>');"
									>
									<?php } else {?>
									<div class="mg-b-5 tx-gray-800">
										<strong>Deseja trocar esta imagem?</strong>
									</div>
									<label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                        <input 
                                            type="radio" 
                                            name="nova_foto" 
                                            value="N" 
                                            checked="checked" 
                                            onClick="javascript:Desabilitar_Foto()"
                                        >
                                        <span>Não</span>
                                    </label>
									<label class="rdiobox tx-gray-800" style="display:inline-table !important">
                                        <input 
                                            type="radio" 
                                            name="nova_foto" 
                                            value="S" 
                                            onClick="javascript: Habilitar_Foto();"
                                        >
                                        <span>Sim</span>
                                    </label>
									<input 
                                        type="file" 
                                        name="foto" 
                                        class="form-control" 
                                        onChange="document.images.foto_1.src=this.value" 
                                        disabled="disabled" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php }?>
								</div>
							</div>
						</div>
                        
                        <div class="col-md-12"></div>
                        
                         <div class="col-md-12" style="padding:15px 15px; padding-bottom:5px">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-cube tx-yellow mg-r-5"></i> INTEGRAÇÃO COM PORTAIS <span class="tx-warning tx-15">OPCIONAL</span>
                            </h3>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <div class="row">
                                	<div class="col-md-7">
                                    	<img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/chaves-na-mao-logo.jpg' class="img-fluid">
                                    </div>
                                    <div class="col-md-5 mg-t-10">
                                    	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Integrar?</h6>
                                        <fieldset>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                            <input name='integracao_chaves_na_mao' type='radio' value='S' <?php echo ($dados['integracao_chaves_na_mao']=="S")?"checked":"";?>>
                                                <span>Sim</span>
                                            </label>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                            <input name='integracao_chaves_na_mao' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['integracao_chaves_na_mao']=="N"){echo "checked";}}?>>
                                                <span>Não</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <div class="row">
                                	<div class="col-md-7">
                                    	<img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/imovel-web-logo.jpg' class="img-fluid">
                                    </div>
                                    <div class="col-md-5 mg-t-10">
                                    	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Integrar?</h6>
                                        <fieldset>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                            <input name='integracao_imovelweb' type='radio' value='S' <?php echo ($dados['integracao_imovelweb']=="S")?"checked":"";?>>
                                                <span>Sim</span>
                                            </label>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                            <input name='integracao_imovelweb' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['integracao_imovelweb']=="N"){echo "checked";}}?>>
                                                <span>Não</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <div class="row">
                                	<div class="col-md-7">
                                    	<img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/mercado-livre-logo.jpg' class="img-fluid">
                                    </div>
                                    <div class="col-md-5 mg-t-10">
                                    	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Integrar?</h6>
                                        <fieldset>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                            <input name='integracao_mercado_livre' type='radio' value='S' <?php echo ($dados['integracao_mercado_livre']=="S")?"checked":"";?>>
                                                <span>Sim</span>
                                            </label>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                            <input name='integracao_mercado_livre' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['integracao_mercado_livre']=="N"){echo "checked";}}?>>
                                                <span>Não</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <div class="row">
                                	<div class="col-md-7">
                                    	<img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/olx-logo.jpg' class="img-fluid">
                                    </div>
                                    <div class="col-md-5 mg-t-10">
                                    	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Integrar?</h6>
                                        <fieldset>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                            <input name='integracao_olx_imoveis' type='radio' value='S' <?php echo ($dados['integracao_olx_imoveis']=="S")?"checked":"";?>>
                                                <span>Sim</span>
                                            </label>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                            <input name='integracao_olx_imoveis' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['integracao_olx_imoveis']=="N"){echo "checked";}}?>>
                                                <span>Não</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <div class="row">
                                	<div class="col-md-7">
                                    	<img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/viva-real-logo.jpg' class="img-fluid">
                                    </div>
                                    <div class="col-md-5 mg-t-10">
                                    	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Integrar?</h6>
                                        <fieldset>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                            <input name='integracao_vivareal' type='radio' value='S' <?php echo ($dados['integracao_vivareal']=="S")?"checked":"";?>>
                                                <span>Sim</span>
                                            </label>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                            <input name='integracao_vivareal' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['integracao_vivareal']=="N"){echo "checked";}}?>>
                                                <span>Não</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <div class="row">
                                	<div class="col-md-7">
                                    	<img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/zap-logo.jpg' class="img-fluid">
                                    </div>
                                    <div class="col-md-5 mg-t-10">
                                    	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Integrar?</h6>
                                        <fieldset>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                            <input name='integracao_zap_imoveis' type='radio' value='S' <?php echo ($dados['integracao_zap_imoveis']=="S")?"checked":"";?>>
                                                <span>Sim</span>
                                            </label>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                            <input name='integracao_zap_imoveis' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['integracao_zap_imoveis']=="N"){echo "checked";}}?>>
                                                <span>Não</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <div class="row">
                                	<div class="col-md-7">
                                    	<img src='<?php echo $_linkCompleto;?>/adm_gerencia/assets/img/df-imoveis-logo.jpg' class="img-fluid">
                                    </div>
                                    <div class="col-md-5 mg-t-10">
                                    	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Integrar?</h6>
                                        <fieldset>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                            <input name='integracao_df_imoveis' type='radio' value='S' <?php echo ($dados['integracao_df_imoveis']=="S")?"checked":"";?>>
                                                <span>Sim</span>
                                            </label>
                                            <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                            <input name='integracao_df_imoveis' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['integracao_df_imoveis']=="N"){echo "checked";}}?>>
                                                <span>Não</span>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>                     
                        
                        <div class="col-md-12 pd-10 mg-t-10"></div>
                        
                         <div class="col-md-12" style="padding:5px 15px;">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-hand-o-down tx-yellow mg-r-5"></i> FINALIZAÇÃO
                            </h3>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Deseja destacar este Imóvel?</h6>
                                <fieldset>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                    <input name='destaque' type='radio' value='S' <?php echo ($dados['destaque']=="S")?"checked":"";?>>
                                        <span>Sim</span>
                                    </label>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                    <input name='destaque' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['destaque']=="N"){echo "checked";}}?>>
                                        <span>Não</span>
                                    </label>
                                </fieldset>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-0 mg-t-15">
                            <div class="col-md-12 pd-15" style="background:#f1f1f1">
                                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Este Imóvel é Lançamento?</h6>
                                <fieldset>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                    <input name='lancamento' type='radio' value='S' <?php echo ($dados['lancamento']=="S")?"checked":"";?>>
                                        <span>Sim</span>
                                    </label>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important;">
                                    <input name='lancamento' type='radio' value='N' <?php if(empty($id)){ echo "checked"; }else{ if($dados['lancamento']=="N"){echo "checked";}}?>>
                                        <span>Não</span>
                                    </label>
                                </fieldset>
                            </div>
                        </div>
 
                        <div class="col-md-12 mg-t-20"></div>

						<div class="col-md-3 col-xs-12 mg-t-10">
							<button type="submit" class="btn btn-info btn-block" name='btgravar' style="width:170px">
                            	<i class='fa fa-floppy-o'></i> <?php echo (empty($id))?"Cadastrar" : "Alterar";?> Registro
                            </button>
						</div>
					</div>
				 </div>
			</div>		
		</form>
	</div>
    
	<?php
		$form2 = "FORMLISTA";
		
		if($_GET['filtro_referencia'] != null && $_GET['filtro_referencia'] != "") {
			$filtro_busca = " WHERE ( referencia like '%".$_GET['filtro_referencia']."%' )";
		}
		
		switch ($_GET['filtro_opcao']) {
			 case 1: $_aplica_opcao_filtro = " WHERE destaque='S' "; break;
			 case 2: $_aplica_opcao_filtro = " WHERE lancamento='S' "; break;
			 case 3: $_aplica_opcao_filtro = " WHERE integracao_chaves_na_mao='S' "; break;
			 case 4: $_aplica_opcao_filtro = " WHERE integracao_imovelweb ='S' "; break;
			 case 5: $_aplica_opcao_filtro = " WHERE integracao_mercado_livre='S' "; break;
			 case 6: $_aplica_opcao_filtro = " WHERE integracao_olx_imoveis='S' "; break;
			 case 7: $_aplica_opcao_filtro = " WHERE integracao_vivareal='S' "; break;
			 case 8: $_aplica_opcao_filtro = " WHERE integracao_zap_imoveis='S' "; break;
			 case 9: $_aplica_opcao_filtro = " WHERE integracao_df_imoveis='S' "; break;
			default: $_aplica_opcao_filtro = "";
		}
		
		$busca = "SELECT * FROM ".$tabela." ".$filtro_busca." ".$_aplica_opcao_filtro." ORDER BY id_ordem ASC, id DESC";
		
		//echo $_GET['filtro_opcao'] ."<br>";
		
		//echo $busca;
			
		$total_reg = "30";
		if(!$page){
			$page = "1";
		}
		$inicio = $page-1;
		$inicio = $inicio*$total_reg;
		$limite = mysqli_query($link, $busca." LIMIT ".$inicio.",".$total_reg);
		$todos  = mysqli_query($link, $busca);
		$tr = mysqli_num_rows($todos);
		$tp = ceil($tr / $total_reg);
	?>
	<div class="br-mainpanel mg-t-20">
    	
        <div class="col-md-12">
            <hr class="dashed mg-b-40 mg-l-20 mg-r-20">
        </div>

        <div class="col-md-12 pd-30 mg-b-0-force pd-b-10-force">
            <div class="row">
                <div class="col-md-5 text-left">
                    <h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
                        <i class="fa fa-list tx-yellow mg-r-10 mg-l-10"></i> Listagem de <?php echo $palavra;?>
                    </h4>
                    <p class="mg-b-0 pd-l-45 pd-r-45">
                        Foram encontrados <strong><?php echo $tr;?> registros</strong> cadastrados!
                    </p>
                </div>
                <div class="col-md-3 text-center mg-t-5">
                	<div class="row">
                    	<div class="col-md-12">
                            <?php
								$_LinkFiltroOpcao = $_linkCompletoAdmin.'/index.php?pg=imoveis_anuncios';
							?>
                            <select name="filtro_opcao" id="filtro_opcao" class="form-control" placeholder="Selecione um Filtro" onchange="parent.location = this.value;">
                            	<option>Selecione um Filtro</option>
                            	<option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=1" <?php echo ($_GET['filtro_opcao']==1)?"selected":"";?>>Em Destaque</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=2" <?php echo ($_GET['filtro_opcao']==2)?"selected":"";?>>Em Lançamento</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=3" <?php echo ($_GET['filtro_opcao']==3)?"selected":"";?>>Integrado no Chaves na Mão</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=4" <?php echo ($_GET['filtro_opcao']==4)?"selected":"";?>>Integrado no Imóvel Web</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=5" <?php echo ($_GET['filtro_opcao']==5)?"selected":"";?>>Integrado no Mercado Livre</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=6" <?php echo ($_GET['filtro_opcao']==6)?"selected":"";?>>Integrado na OLX</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=7" <?php echo ($_GET['filtro_opcao']==7)?"selected":"";?>>Integrado no Viva Real</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=8" <?php echo ($_GET['filtro_opcao']==8)?"selected":"";?>>Integrado no Zap Imóveis</option>
                                <option value="<?php echo $_LinkFiltroOpcao;?>&filtro_opcao=9" <?php echo ($_GET['filtro_opcao']==9)?"selected":"";?>>Integrado no DF Imóveis</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right mg-t-5">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="filtro_referencia" id="filtro_referencia" class="form-control" placeholder="Digite a referência">
                        </div>
                        <div class="col-md-4">
                            <button onclick="buscarReferencia()" class="btn btn-info btn-block"> <i class="fa fa-search"></i> Buscar</button>
                        </div>
                        
                        <script>
							function buscarReferencia(){
								if ($("#filtro_referencia").val()==""){
									alert("Por favor, insira a referência do imóvel!");
									$("#filtro_referencia").focus();
								}else{
									window.location.href = "<?php echo $_linkCompletoAdmin;?>/index.php?pg=imoveis_anuncios&filtro_referencia="+$("#filtro_referencia").val();
								}	
							}
						</script>
                        
                    </div>
                </div>
            </div>
        </div>
        
		
		<form action="?pg=<?php echo $file;?>" method="POST" name="<?php echo $form2;?>">
			<input name="acao" type="hidden" value="deletesDb">
		
			<div class="br-pagebody mg-mobile mg-t-15-force">
				<div class="br-section-wrapper">
					<div class="row">
						
						<div class="col-md-12 col-xs-12">
							<div class="row">
								<div class="col-md-1 oculta-mobile">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">ID</h6>
								</div>
                                <div class="col-md-2 oculta-mobile">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">IMAGEM</h6>
								</div>
								<div class="col-md-8 col-xs-12">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">DETALHES</h6>
								</div>
								<div class="col-md-1 oculta-mobile">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">AÇÕES</h6>
								</div>
							</div>
						</div>
						
						<div id="listagemItens">
							<ul class="ui-sortable">
								<?php 
									$i = 0; 
									while($dados = mysqli_fetch_array($limite)){ 
										if(($i%2) == 0) { 
											$bgcolor="#f1f1f1"; 
										} else { 
											$bgcolor="#e5e5e5"; 
										}
								?>
								<li id="widgetArray_<?php echo $dados['id'];?>" class="ui-sortable-handle">
									<div class="col-md-12 pd-20" style="background:<?php echo $bgcolor;?>">
											<div class="row tx-left middle-xs">
                                                <div class="col-md-1 tx-center">
                                                    <input id='check_sel' name='listas[]' type='checkbox' value='<?php echo $dados['id'];?>'>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <a 
                                                                href="<?php echo $_linkCompleto;?>/assets/uploads/<?php echo $tabela."/".$dados['id']."/".$dados['foto'];?>" 
                                                                style="display:block; width:auto; height:auto"
                                                                data-toggle="lightbox" 
                                                                data-gallery="example-gallery"
                                                            >
                                                                <img src='<?php echo $_linkCompleto;?>/thumbnail.php?w=220px&h=250px&imagem=assets/uploads/<?php echo $tabela;?>/<?php echo $dados['id'];?>/<?php echo $dados['foto'];?>' 
                                                                    border='0'
                                                                    class="img-fluid"
                                                                >
                                                            </a>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p class="tx-13 tx-bold tx-success mg-b-0" style="padding-bottom:2px;">
																		 <?php
                                                                            $query = mysqli_query($link, "SELECT count(*) as total from tb_imoveis_visitas WHERE id_registro='".$dados['id']."'");
                                                                            $resultado = mysqli_fetch_assoc($query);
                                                                            if($resultado['total']>1){
                                                                                $txt_visualizacoes = "visualizações";
                                                                            }else{
                                                                                $txt_visualizacoes = "visualização";
                                                                            }
                                                                            echo "<i class='fa fa-eye'></i> <strong>" . $resultado['total'] . "</strong> " . $txt_visualizacoes;
                                                                        ?>
                                                                    </p>
                                                                    <p class="tx-gray-800 tx-14 tx-left mg-b-0">
                                                                        <?php 
                                                                            $sql6   = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE id='$dados[id_transacao]'");
                                                                            $dados6 = mysqli_fetch_array($sql6);
                                                                            echo "<strong>" .$dados6['nome']. "</strong>";
																			
																			echo " / ";
																			
																			$sql7   = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE id='$dados[id_tipo]'");
                                                                            $dados7 = mysqli_fetch_array($sql7);
                                                                            echo "<strong>" .$dados7['nome']. "</strong>";
                                                                            
                                                                            echo " / ";
                                                                            
                                                                            $sql6   = mysqli_query($link, "SELECT * FROM tb_imoveis_finalidade WHERE id='$dados[id_finalidade]'");
                                                                            $dados6 = mysqli_fetch_array($sql6);
                                                                            echo "<strong>" .$dados6['nome']. "</strong>";
                                                                             
                                                                            echo " em (";
                                                                            
                                                                            $sql7   = mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE id='$dados[id_bairro]'");
                                                                            $dados7 = mysqli_fetch_array($sql7);
                                                                            echo $dados7['nome'];
                                                                            
                                                                            echo " / ";
                                                                            
                                                                            $sql6   = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE id='$dados[id_cidade]'");
                                                                            $dados6 = mysqli_fetch_array($sql6);
                                                                            echo $dados6['nome'];
                                                                            
                                                                            echo " / ";
                                                                            
                                                                            echo $dados['estado'];
                                                                            
                                                                            echo ")";
                                                                        ?>
                                                                    </p>
                                                                    <p class="tx-primary tx-14 tx-left mg-b-0">
                                                                        <strong>Referência: (<?php echo $dados['referencia'];?>) </strong>
                                                                    </p>
                                                                    <p class="tx-gray-800 tx-14 tx-left mg-b-0">
                                                                    	<strong><?php echo $dados['nome'];?></strong>
                                                                    </p>
                                                                    <p class="tx-bold tx-800 tx-18 tx-left mg-b-0 tx-danger">
                                                                        <strong>R$ <?php echo number_format($dados['preco'], 2, ',', '.');?></strong>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="icons-actions-listage">
                                                                        <ul>
																			<?php 
                                                                                if($dados['integracao_chaves_na_mao'] == "S"){
                                                                            ?>
                                                                            <li>
                                                                                <div class="tx-11 tx-bold tx-white mg-2" style="padding:2px 8px; background:#fe7823">
                                                                                    Chaves na Mão
                                                                                </div>
                                                                            </li>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            <?php 
                                                                                if($dados['integracao_imovelweb'] == "S"){
                                                                            ?>
                                                                            <li>
                                                                                <div class="tx-11 tx-bold mg-2" style="padding:2px 8px; background:#f15a2b; color:#000">
                                                                                    ImóvelWeb
                                                                                </div>
                                                                            </li>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            <?php 
                                                                                if($dados['integracao_mercado_livre'] == "S"){
                                                                            ?>
                                                                            <li>
                                                                                <div class="tx-11 tx-bold mg-2" style="padding:2px 8px; background:#e9cf30; color:#373a6f">
                                                                                    Mercado Livre
                                                                                </div>
                                                                            </li>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            <?php 
                                                                                if($dados['integracao_olx_imoveis'] == "S"){
                                                                            ?>
                                                                            <li>
                                                                                <div class="tx-11 tx-bold tx-white mg-2" style="padding:2px 8px; background:#6d0ad6;">
                                                                                    Olx
                                                                                </div>
                                                                            </li>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            <?php 
                                                                                if($dados['integracao_vivareal'] == "S"){
                                                                            ?>
                                                                            <li>
                                                                                <div class="tx-11 tx-bold mg-2" style="padding:2px 8px; background:#0f2749; color:#6fb43d">
                                                                                    Viva Real
                                                                                </div>
                                                                            </li>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            <?php 
                                                                                if($dados['integracao_zap_imoveis'] == "S"){
                                                                            ?>
                                                                            <li>
                                                                                <div class="tx-11 tx-bold tx-white mg-2" style="padding:2px 8px; background:#007ba7;">
                                                                                    Zap Imóveis
                                                                                </div>
                                                                            </li>
                                                                            <?php
                                                                                }
                                                                            ?>
                                                                            <?php 
                                                                                if($dados['integracao_df_imoveis'] == "S"){
                                                                            ?>
                                                                            <li>
                                                                                <div class="tx-11 tx-bold tx-white mg-2" style="padding:2px 8px; background:#03903e;">
                                                                                    DF Imóveis
                                                                                </div>
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
                                                </div>
                                                <div class="col-md-1 pd-5 tx-center">
                                                    <div class="icons-actions-listage">
                                                        <ul>
                                                            <li>
                                                                <a 
                                                                    data-toggle="tooltip" 
                                                                    data-placement="top"
                                                                    title="Ver / Enviar Fotos" 
                                                                    href="?pg=imoveis_fotos&id=<?php echo $dados['id'];?>&acao=verfotos"
                                                                >
                                                                    <i class="fa fa-camera" style="color:purple"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <?php 
                                                                    if($dados['status'] == "S"){
                                                                ?>
                                                                <a 
                                                                    data-toggle="tooltip" 
                                                                    data-placement="top" 
                                                                    title="Inativar no Site" 
                                                                    href="?pg=<?php echo $file;?>&acao=statusDb&id=<?php echo $dados['id'];?>&status=<?php echo ($dados['status']=="S")?"N":"S";?>"
                                                                >
                                                                    <i class="fa fa-heart" style="color:green"></i>
                                                                </a>
                                                                <?php 
                                                                    }else{ 
                                                                ?>
                                                                <a 
                                                                    data-toggle="tooltip" 
                                                                    data-placement="top" 
                                                                    title="Ativar no Site" 
                                                                    href="?pg=<?php echo $file;?>&acao=statusDb&id=<?php echo $dados['id'];?>&status=<?php echo ($dados['status']=="S")?"N":"S";?>"
                                                                >
                                                                    <i class="fa fa-heart" style="color:red"></i>
                                                                </a>
                                                                <?php 
                                                                    }
                                                                ?>
                                                            </li>
                                                            <li>
                                                                <a 
                                                                    data-toggle="tooltip" 
                                                                    data-placement="top" 
                                                                    title="Editar" 
                                                                    href="?pg=<?php echo $file;?>&acao=FORM&id=<?php echo $dados['id']?>&show_form=show"
                                                                >
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a 
                                                                    data-toggle="tooltip" 
                                                                    data-placement="top" 
                                                                    title="Apagar" 
                                                                    href="javascript:confirmaExclusao('?pg=<?php echo $file;?>&acao=deleteDb&id=<?php echo $dados['id']?>')"
                                                                >
                                                                    <i class="fa fa-trash" style="color:red"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
									</div>
								</li>
								<?php  
										$i++; 
									}
								?>
							</ul>
						</div>
						
						<div class="col-md-12">
							<div class="ht-80 d-flex align-items-center justify-content-center">
								<nav aria-label="Page navigation">
									<ul class="pagination pagination-basic mg-b-0">
										<?php 
											if($page > 1){
											$anterior = $page -1;
											$url = "?pg=".$pg."&acao=".$acao."&filtro_opcao=".$filtro_opcao."&page=".$anterior."#listagem";
												echo "<li class='page-item'><a href='".$url."' class='page-link'>«</a></li>";
											} else {
												echo "<li class='page-item'><a href='' class='page-link'>«</a></li>";
											}
										?>
										
										<?php  
											for($i=1; $i<$page; $i++)
											if($i>=$page-5)
												echo "<li class='page-item'><a href='?pg=".$pg."&acao=".$acao."&filtro_opcao=".$filtro_opcao."&page=".$i."#listagem' class='page-link'>".$i."</a></li>";
												echo "<li class='page-item active'><a href='' class='page-link'><b>".$page."</b></a></li>";
											for($i=$page+1; $i<=$tp; $i++)
											if($i<=$page+5)
												echo "<li class='page-item'><a href='?pg=".$pg."&acao=".$acao."&filtro_opcao=".$filtro_opcao."&page=".$i."#listagem' class='page-link'>".$i."</a></li>";
										?>
										
										<?php 
											if($tp > $page){
											$proxima = $page +1;
												$url = "?pg=".$pg."&acao=".$acao."&filtro_opcao=".$filtro_opcao."&page=".$proxima."#listagem";
												echo "<li class='page-item'><a href='".$url."' class='page-link'>»</a></li>";
											} else {
												echo "<li class='page-item'><a href='' class='page-link'>»</a></li>";
											}
										?>
									</ul>
								</nav>
							</div>
						</div>
					
						<div class="col-md-12 col-xs-12 col-centered">
							<div class="row row-centered">
								<div class="col-md-6 col-xs-12 col-centered mg-b-10 mg-t-15" align="center">
									<button class="btn btn-info btn-block" type="button" style="width:220px" onclick='SelectAll();' id="sel_todos">
                                    	<i class="fa fa-check-square-o"></i> Selecionar Todos
                                    </button>
								</div>
								<div class="col-md-6 col-xs-12 col-centered mg-b-10 mg-t-15" align="center">
									<button class="btn btn-info btn-block" type="button" style="width:220px" onclick="checkdeletetion();">
                                    	<i class="fa fa-trash"></i> Excluir Selecionados
                                    </button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			
			</form>
            
            <script>
				$("#id_cidade").change(function(){
					$("#id_bairro").empty();
					$.ajax({
						url: "estrutura/imoveis/ajaxBairros.php",
						data: {'id':$("#id_cidade").val()},
						contentType: "application/json; charset=utf-8",
						dataType: "json",
						success: function(data){
							if (data.subs.length>0){
								for (i=0; i<data.subs.length; i++){
									if (data.subs[i].id=="<?php echo $_idBairro; ?>")
										$("#id_bairro").append('<option selected="selected" value="' + data.subs[i].id + '">' + data.subs[i].nome + '</option>')
									else
										$("#id_bairro").append('<option value="' + data.subs[i].id + '">' + data.subs[i].nome + '</option>')
								}
							}
						}
				
					 });
				});
				$("#id_cidade").change();
			</script>
            <script>
    function gerarReferencia() {
        var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var numeros = '0123456789';
        var letra1 = letras[Math.floor(Math.random() * letras.length)];
        var letra2 = letras[Math.floor(Math.random() * letras.length)];
        var numero = '';
        for (var i = 0; i < 5; i++) {
            numero += numeros[Math.floor(Math.random() * numeros.length)];
        }
        document.getElementById('referencia').value = letra1 + letra2 + numero;
    }
    gerarReferencia();
</script>
<script>
    window.onload = function() {
        gerarReferencia();
    }
</script>