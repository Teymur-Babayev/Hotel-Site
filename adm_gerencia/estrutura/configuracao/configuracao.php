<?php
	// AÇÕES INICIAIS
	
	$acao = null;
	$id = 1;
	$pos_acao_mensagem = null;
	$dados = null;
	
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// TRANSFORMA VARIAVEIS EM GET E POST
	
	$variables=(strtoupper($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST; foreach ($variables as $k=> $v) $$k=$v;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// CONFIGURAÇÕES
	
	$palavra       = "Configuração";
	$tabela        = "tb_configuracao";
	$file          = "configuracao";
	$file_redirect = "configuracao";


	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// ATUALIZAR / EDITAR /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "updateDb"){
		
		// Aplica as Datas
		$_data_edicao  = date('Y-m-d H:i:s');
		
		// Começa Update da Imagem
		$dir = "../assets/uploads/".$tabela."/".$id;
		$pasta = $dir."/";
		
		if($nova_logo_topo == "S"){
			if(is_dir($dir)){
				if($logo_topo != "none") {
					$postArquivo = "logo_topo"; $acaoUpload = "updateArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";
					$logo_topo_1 = $varArquivo;
				}
			}
			@unlink($dir."/".$logo_topo_antiga);
		} else {
			$logo_topo_1 = $logo_topo_antiga;
		}
		
		if($nova_logo_rodape == "S"){
			if(is_dir($dir)){
				if($logo_rodape != "none") {
					$postArquivo = "logo_rodape"; $acaoUpload = "updateArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";
					$logo_rodape_1 = $varArquivo;
				}
			}
			@unlink($dir."/".$logo_rodape_antiga);
		} else {
			$logo_rodape_1 = $logo_rodape_antiga;
		}
		
		if($nova_logo_fotos == "S"){
			if(is_dir($dir)){
				if($logo_fotos != "none") {
					$postArquivo = "logo_fotos"; $acaoUpload = "updateArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";
					$logo_fotos_1 = $varArquivo;
				}
			}
			@unlink($dir."/".$logo_fotos_antiga);
		} else {
			$logo_fotos_1 = $logo_fotos_antiga;
		}
		
		if($nova_favicon_site == "S"){
			if(is_dir($dir)){
				if($favicon_site != "none") {
					$postArquivo = "favicon_site"; $acaoUpload = "updateArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";
					$favicon_site_1 = $varArquivo;
				}
			}
			@unlink($dir."/".$favicon_site_antiga);
		} else {
			$favicon_site_1 = $favicon_site_antiga;
		}
		
		if($nova_img_compartilhamento == "S"){
			if(is_dir($dir)){
				if($img_compartilhamento != "none") {
					$postArquivo = "img_compartilhamento"; $acaoUpload = "updateArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";
					$img_compartilhamento_1 = $varArquivo;
				}
			}
			@unlink($dir."/".$img_compartilhamento_antiga);
		} else {
			$img_compartilhamento_1 = $img_compartilhamento_antiga;
		}

		//Executa Update
		mysqli_query($link, "UPDATE ".$tabela." SET 
			data_edicao = '".$_data_edicao."',
			nome = '".addslashes($nome)."',
			creci = '".addslashes($creci)."',
			endereco = '".addslashes($endereco)."',
			numero = '".addslashes($numero)."',
			complemento = '".addslashes($complemento)."',
			bairro = '".addslashes($bairro)."',
			cidade = '".addslashes($cidade)."',
			estado = '".addslashes($estado)."',
			cep = '".addslashes($cep)."',
			telefone = '".addslashes($telefone)."',
			celular = '".addslashes($celular)."',
			email = '".addslashes($email)."',
			email_recebe_contato = '".addslashes($email_recebe_contato)."',
			cor_primaria = '".addslashes($cor_primaria)."',
			cor_secundaria = '".addslashes($cor_secundaria)."',
			logo_topo = '$logo_topo_1',
			logo_rodape = '$logo_rodape_1',
			logo_fotos = '$logo_fotos_1',
			favicon_site = '$favicon_site_1',
			qtd_destaques = '".addslashes($qtd_destaques)."',
			qtd_recentes = '".addslashes($qtd_recentes)."',
			img_compartilhamento = '$img_compartilhamento_1',
			link_facebook = '".addslashes($link_facebook)."',
			link_linkedin = '".addslashes($link_linkedin)."',
			link_instagram = '".addslashes($link_instagram)."',
			link_twitter = '".addslashes($link_twitter)."',						 
			server_email_porta = '".addslashes($server_email_porta)."',	
			server_email_host = '".addslashes($server_email_host)."',	
			server_email_usuario = '".addslashes($server_email_usuario)."',	
			server_email_senha = '".addslashes($server_email_senha)."',	
			key_google_analytics = '".addslashes($key_google_analytics)."',
			key_google_maps = '".addslashes($key_google_maps)."',
			meta_keywords = '".addslashes($meta_keywords)."',
			login_usuario = '$login_usuario_logado' 
			WHERE id='".$id."'"
		);
		
		// Mensagem após a ação
		$textMsg = "Pronto! registro alterado."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//FORM DE CADASTRO E ALTERAR
	
	$form1 = "FORMULARIO";
	$sql   = mysqli_query($link, "SELECT * FROM ".$tabela." WHERE id='".$id."'");
	$dados = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
	<script>
		function Habilitar_Logo() 
		{
			nForm = document.forms['<?php echo $form1?>'];
			if(nForm.elements['nova_logo_topo'].checked = true) 
			{
				nForm.elements['logo_topo'].disabled = false; nForm.elements['logo_topo'].className= "form-control";
			}
		}
		function Desabilitar_Logo() 
		{
			nForm.elements['logo_topo'].disabled = true; nForm.elements['logo_topo'].className = "form-control";
		}
	</script>
    
    <script>
		function Habilitar_Logo2() 
		{
			nForm = document.forms['<?php echo $form1?>'];
			if(nForm.elements['nova_logo_rodape'].checked = true) 
			{
				nForm.elements['logo_rodape'].disabled = false; nForm.elements['logo_rodape'].className= "form-control";
			}
		}
		function Desabilitar_Logo2() 
		{
			nForm.elements['logo_rodape'].disabled = true; nForm.elements['logo_rodape'].className = "form-control";
		}
	</script>
    
    <script>
		function Habilitar_Logo3() 
		{
			nForm = document.forms['<?php echo $form1?>'];
			if(nForm.elements['nova_logo_fotos'].checked = true) 
			{
				nForm.elements['logo_fotos'].disabled = false; nForm.elements['logo_fotos'].className= "form-control";
			}
		}
		function Desabilitar_Logo3() 
		{
			nForm.elements['logo_fotos'].disabled = true; nForm.elements['logo_fotos'].className = "form-control";
		}
	</script>
    
    <script>
		function Habilitar_Favicon() 
		{
			nForm = document.forms['<?php echo $form1?>'];
			if(nForm.elements['nova_favicon_site'].checked = true) 
			{
				nForm.elements['favicon_site'].disabled = false; nForm.elements['favicon_site'].className= "form-control";
			}
		}
		function Desabilitar_Favicon() 
		{
			nForm.elements['favicon_site'].disabled = true; nForm.elements['favicon_site'].className = "form-control";
		}
	</script>
    
    <script>
		function Habilitar_Compartilhamento() 
		{
			nForm = document.forms['<?php echo $form1?>'];
			if(nForm.elements['nova_img_compartilhamento'].checked = true) 
			{
				nForm.elements['img_compartilhamento'].disabled = false; nForm.elements['img_compartilhamento'].className= "form-control";
			}
		}
		function Desabilitar_Compartilhamento() 
		{
			nForm.elements['img_compartilhamento'].disabled = true; nForm.elements['img_compartilhamento'].className = "form-control";
		}
	</script>

    <div class="br-mainpanel" id="cadastra">
		
		<div class="br-pageheader pd-y-15 pd-l-20">
			<nav class="breadcrumb pd-0 mg-0 tx-12">
				<a class="breadcrumb-item" href="index.php">Dashboard</a>
				<a class="breadcrumb-item" href="#"><?php echo $palavra;?></a>
				<span class="breadcrumb-item active">Editar <?php echo $palavra;?></span>
			</nav>
		</div>
		
		<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 mg-b-20-force">
			<h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
                <i class="fa fa-pencil tx-yellow mg-r-10 mg-l-10"></i> <?php echo (empty($id))?"Cadastrar" : "Alterar";?> <?php echo $palavra;?>
            </h4>
			<p class="mg-b-0 pd-l-45 pd-r-45">
            	Para alterar os dados do <strong>registro</strong> preencha corretamente ao formulário:
            </p>
		</div>
	
		<form 
            action="?pg=<?php echo $file?>" 
            method="POST" 
            enctype="multipart/form-data" 
            name="<?php echo $form1;?>" 
            autocomplete="off" 
            data-parsley-validate
        >
		
			<input name="acao" type="hidden" value="updateDb">
            <input name="id" type="hidden" value="<?php echo $id;?>">
            <input name="logo_topo_antiga" type="hidden" value="<?php echo $dados['logo_topo'];?>">
            <input name="logo_rodape_antiga" type="hidden" value="<?php echo $dados['logo_rodape'];?>">
            <input name="logo_fotos_antiga" type="hidden" value="<?php echo $dados['logo_fotos'];?>">
            <input name="favicon_site_antiga" type="hidden" value="<?php echo $dados['favicon_site'];?>">
            <input name="img_compartilhamento_antiga" type="hidden" value="<?php echo $dados['img_compartilhamento'];?>">
			
			<div class="br-pagebody mg-mobile mg-t-0-force">
			
				<?php echo $pos_acao_mensagem;?>
			
				 <div class="br-section-wrapper mg-t-30-force">
				 	<div class="row">

						<div class="col-md-8 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Nome <span class="tx-danger">*</span></h6>
							<input type="text" id="nome" name="nome" value="<?php echo $dados['nome'];?>" class="form-control" required>
						</div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Creci</h6>
							<input type="text" id="creci" name="creci" value="<?php echo $dados['creci'];?>" class="form-control">
						</div>
                        
                        <div class="col-md-12 mg-b-10"></div>
                        
                        <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-comments-o tx-yellow mg-r-5"></i> DADOS PARA CONTATO
                            </h3>
                        </div>
                        
                        <div class="col-md-6 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-phone"></i> Telefone <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="telefone" name="telefone" value="<?php echo $dados['telefone'];?>" class="form-control" required>
						</div>
                        
						<div class="col-md-6 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-mobile"></i> <i class="fa fa-whatsapp"></i> Celular
                            </h6>
							<input type="text" id="celular" name="celular" value="<?php echo $dados['celular'];?>" class="form-control">
						</div>
                        
						<div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-envelope"></i> Email que aparece no Site <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="email" name="email" value="<?php echo $dados['email'];?>" class="form-control" required>
						</div>
                       
                        
						<div class="col-md-12 col-xs-12 mg-b-10">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-envelope"></i> Email de recebimento do Contato <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="email_recebe_contato" name="email_recebe_contato" value="<?php echo $dados['email_recebe_contato'];?>" class="form-control" required>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> 
                                Este email ira receber os dados do formulário de contato do site.
                            </div>
						</div>
                        
                        <div class="col-md-12 mg-b-10"></div>
                        
                        <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-paint-brush tx-yellow mg-r-5"></i> PERSONALIZAÇÃO DO SITE
                            </h3>
                        </div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Qtd de Imóveis em Destaque (Home) <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="qtd_destaques" name="qtd_destaques" value="<?php echo $dados['qtd_destaques'];?>" class="form-control" required>
						</div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Qtd de Imóveis Recentes (Home) <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="qtd_recentes" name="qtd_recentes" value="<?php echo $dados['qtd_recentes'];?>" class="form-control" required>
						</div>
                        
                        <div class="col-md-12"></div>
                        
                        <div class="col-md-6 col-xs-12 mg-b-40">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cor do Layout (Primária) <span class="tx-danger">*</span>
                            </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        id="color_picker_1" 
                                        pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" 
                                        value="<?php echo $dados['cor_primaria']?>" 
                                        class="form-control" 
                                        style="padding:0; height:60px"
                                    >
                                </div>
                                <div class="col-md-6"> 
                                    <input 
                                        id="cor_primaria" 
                                        name="cor_primaria" 
                                        type="text" 
                                        pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" 
                                        value="<?php echo $dados['cor_primaria']?>" 
                                        class="form-control" 
                                        style="margin-top:10px"
                                    >
                                    </input>
                                </div>
                            </div>
						</div>
                        
                        <div class="col-md-6 col-xs-12 mg-b-40">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cor do Layout (Secundária) <span class="tx-danger">*</span>
                            </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <input 
                                        type="color" 
                                        id="color_picker_2" 
                                        pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" 
                                        value="<?php echo $dados['cor_secundaria']?>" 
                                        class="form-control" 
                                        style="padding:0; height:60px"
                                    >
                                </div>
                                <div class="col-md-6"> 
                                    <input 
                                        id="cor_secundaria" 
                                        name="cor_secundaria" 
                                        type="text" 
                                        pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" 
                                        value="<?php echo $dados['cor_secundaria']?>" 
                                        class="form-control" 
                                        style="margin-top:10px"
                                    >
                                    </input>
                                </div>
                            </div>
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-40">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Logomarca (Topo)
                            </h6>
                            <div class="row">
                                <div class="col-md-3 mg-t-10">
                                    <?php 
                                        if(empty($id)){
                                            echo "Sem logo cadastrada";
                                        }else{
                                            if(!empty($dados['logo_topo'])){
                                                echo "<img name='logo_topo_1' src='".$_linkCompleto."/assets/uploads/$tabela/$dados[id]/$dados[logo_topo]' border='0' class='img-fluid' style='padding:27px 20px; background:#e9ecef; border:solid 1px #d9d9d9'>";
                                            } else {
                                                echo "Sem logo cadastrada";
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                         $msgImg = "Todas as fotos devem ter o formato .PNG";
                                         if(empty($id))
                                        {
                                    ?>
                                    <input 
                                        type="file" 
                                        name="logo_topo" 
                                        id="logo_topo" 
                                        class="form-control" 
                                        onChange="document.images.logo_topo_1.src=this.value" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php } else {?>
                                    <div class="mg-b-5 tx-gray-800">
                                        <strong>Deseja trocar essa Logomarca?</strong>
                                    </div>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                        <input 
                                            type="radio" 
                                            name="nova_logo_topo" 
                                            value="N" 
                                            checked="checked" 
                                            onClick="javascript:Desabilitar_Logo()"
                                        >
                                        <span>Não</span>
                                    </label>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important">
                                        <input 
                                            type="radio" 
                                            name="nova_logo_topo" 
                                            value="S" 
                                            onClick="javascript: Habilitar_Logo();"
                                        >
                                        <span>Sim</span>
                                    </label>
                                    <input 
                                        type="file" 
                                        name="logo_topo" 
                                        class="form-control" 
                                        onChange="document.images.logo_topo_1.src=this.value" 
                                        disabled="disabled" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-40">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Logomarca (Rodapé)
                            </h6>
                            <div class="row">
                                <div class="col-md-3 mg-t-10">
                                    <?php 
                                        if(empty($id)){
                                            echo "Sem logo cadastrada";
                                        }else{
                                            if(!empty($dados['logo_rodape'])){
                                                echo "<img name='logo_rodape_1' src='".$_linkCompleto."/assets/uploads/$tabela/$dados[id]/$dados[logo_rodape]' border='0' class='img-fluid' style='padding:27px 20px; background:#e9ecef; border:solid 1px #d9d9d9'>";
                                            } else {
                                                echo "Sem logo cadastrada";
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                         $msgImg = "Todas as fotos devem ter o formato .PNG";
                                         if(empty($id))
                                        {
                                    ?>
                                    <input 
                                        type="file" 
                                        name="logo_rodape" 
                                        id="logo_rodape" 
                                        class="form-control" 
                                        onChange="document.images.logo_rodape_1.src=this.value" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php } else {?>
                                    <div class="mg-b-5 tx-gray-800">
                                        <strong>Deseja trocar essa Logomarca?</strong>
                                    </div>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                        <input 
                                            type="radio" 
                                            name="nova_logo_rodape" 
                                            value="N" 
                                            checked="checked" 
                                            onClick="javascript:Desabilitar_Logo2()"
                                        >
                                        <span>Não</span>
                                    </label>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important">
                                        <input 
                                            type="radio" 
                                            name="nova_logo_rodape" 
                                            value="S" 
                                            onClick="javascript: Habilitar_Logo2();"
                                        >
                                        <span>Sim</span>
                                    </label>
                                    <input 
                                        type="file" 
                                        name="logo_rodape" 
                                        class="form-control" 
                                        onChange="document.images.logo_rodape_1.src=this.value" 
                                        disabled="disabled" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-40">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Logomarca Fotos (Marca d'água)
                            </h6>
                            <div class="row">
                                <div class="col-md-3 mg-t-10">
                                    <?php 
                                        if(empty($id)){
                                            echo "Sem logo cadastrada";
                                        }else{
                                            if(!empty($dados['logo_fotos'])){
                                                echo "<img name='logo_fotos_1' src='".$_linkCompleto."/assets/uploads/$tabela/$dados[id]/$dados[logo_fotos]' border='0' class='img-fluid' style='padding:27px 20px; background:#e9ecef; border:solid 1px #d9d9d9'>";
                                            } else {
                                                echo "Sem logo cadastrada";
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                         $msgImg = "Todas as fotos devem ter o formato .PNG";
                                         if(empty($id))
                                        {
                                    ?>
                                    <input 
                                        type="file" 
                                        name="logo_fotos" 
                                        id="logo_fotos" 
                                        class="form-control" 
                                        onChange="document.images.logo_fotos_1.src=this.value" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php } else {?>
                                    <div class="mg-b-5 tx-gray-800">
                                        <strong>Deseja trocar essa Logomarca?</strong>
                                    </div>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                        <input 
                                            type="radio" 
                                            name="nova_logo_fotos" 
                                            value="N" 
                                            checked="checked" 
                                            onClick="javascript:Desabilitar_Logo3()"
                                        >
                                        <span>Não</span>
                                    </label>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important">
                                        <input 
                                            type="radio" 
                                            name="nova_logo_fotos" 
                                            value="S" 
                                            onClick="javascript: Habilitar_Logo3();"
                                        >
                                        <span>Sim</span>
                                    </label>
                                    <input 
                                        type="file" 
                                        name="logo_fotos" 
                                        class="form-control" 
                                        onChange="document.images.logo_fotos_1.src=this.value" 
                                        disabled="disabled" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-40">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Favicon
                            </h6>
                            <div class="row">
                                <div class="col-md-3 mg-t-10">
                                    <?php 
                                        if(empty($id)){
                                            echo "Sem favicon cadastrado";
                                        }else{
                                            if(!empty($dados['favicon_site'])){
                                                echo "<div style='padding:15px 20px; background:#e9ecef; border:solid 1px #d9d9d9; width:100%; text-align:center' align='center'><img name='favicon_site_1' src='".$_linkCompleto."/assets/uploads/$tabela/$dados[id]/$dados[favicon_site]' border='0' class='img-fluid'></div>";
                                            } else {
                                                echo "Sem favicon cadastrado";
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                         $msgImg = "Todas as fotos devem ter o formato .PNG";
                                         if(empty($id))
                                        {
                                    ?>
                                    <input 
                                        type="file" 
                                        name="favicon_site" 
                                        id="favicon_site" 
                                        class="form-control" 
                                        onChange="document.images.favicon_site_1.src=this.value" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php } else {?>
                                    <div class="mg-b-5 tx-gray-800">
                                        <strong>Deseja trocar esse Favicon?</strong>
                                    </div>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                        <input 
                                            type="radio" 
                                            name="nova_favicon_site" 
                                            value="N" 
                                            checked="checked" 
                                            onClick="javascript:Desabilitar_Favicon()"
                                        >
                                        <span>Não</span>
                                    </label>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important">
                                        <input 
                                            type="radio" 
                                            name="nova_favicon_site" 
                                            value="S" 
                                            onClick="javascript: Habilitar_Favicon();"
                                        >
                                        <span>Sim</span>
                                    </label>
                                    <input 
                                        type="file" 
                                        name="favicon_site" 
                                        class="form-control" 
                                        onChange="document.images.favicon_site_1.src=this.value" 
                                        disabled="disabled" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-40">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Imagem (Compartilhamento)
                            </h6>
                            <div class="row">
                                <div class="col-md-3 mg-t-10">
                                    <?php 
                                        if(empty($id)){
                                            echo "Sem imagem cadastrada";
                                        }else{
                                            if(!empty($dados['img_compartilhamento'])){
                                                echo "<img name='img_compartilhamento_1' src='".$_linkCompleto."/assets/uploads/$tabela/$dados[id]/$dados[img_compartilhamento]' border='0' class='img-fluid' style='padding:10px; background:#e9ecef; border:solid 1px #d9d9d9'>";
                                            } else {
                                                echo "Sem imagem cadastrada";
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="col-md-9">
                                    <?php
                                         $msgImg = "Todas as fotos devem ter o formato .PNG";
                                         if(empty($id))
                                        {
                                    ?>
                                    <input 
                                        type="file" 
                                        name="img_compartilhamento" 
                                        id="img_compartilhamento" 
                                        class="form-control" 
                                        onChange="document.images.img_compartilhamento_1.src=this.value" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php } else {?>
                                    <div class="mg-b-5 tx-gray-800">
                                        <strong>Deseja trocar essa Imagem?</strong>
                                    </div>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important; padding-right:15px">
                                        <input 
                                            type="radio" 
                                            name="nova_img_compartilhamento" 
                                            value="N" 
                                            checked="checked" 
                                            onClick="javascript:Desabilitar_Compartilhamento()"
                                        >
                                        <span>Não</span>
                                    </label>
                                    <label class="rdiobox tx-gray-800" style="display:inline-table !important">
                                        <input 
                                            type="radio" 
                                            name="nova_img_compartilhamento" 
                                            value="S" 
                                            onClick="javascript: Habilitar_Compartilhamento();"
                                        >
                                        <span>Sim</span>
                                    </label>
                                    <input 
                                        type="file" 
                                        name="img_compartilhamento" 
                                        class="form-control" 
                                        onChange="document.images.img_compartilhamento_1.src=this.value" 
                                        disabled="disabled" 
                                        onclick="javascript:alert('<?php echo $msgImg;?>');"
                                    >
                                    <?php }?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mg-b-10"></div>

                        <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-map-o tx-yellow mg-r-5"></i> DADOS DE LOCALIZAÇÃO
                            </h3>
                        </div>
                        
                        <div class="col-md-3 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cep <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="cep" name="cep" value="<?php echo $dados['cep'];?>" class="form-control" required>
						</div>
                        
						<div class="col-md-7 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Endereço
                            </h6>
							<input type="text" id="endereco" name="endereco" value="<?php echo $dados['endereco'];?>" class="form-control">
						</div>
                        
						<div class="col-md-2 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Número
                            </h6>
							<input type="text" id="numero" name="numero" value="<?php echo $dados['numero'];?>" class="form-control">
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Complemento
                            </h6>
							<input type="text" id="complemento" name="complemento" value="<?php echo $dados['complemento'];?>" class="form-control">
						</div>
                        
						<div class="col-md-4 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Bairro
                            </h6>
							<input type="text" id="bairro" name="bairro" value="<?php echo $dados['bairro'];?>" class="form-control">
						</div>
                        
						<div class="col-md-4 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cidade
                            </h6>
							<input type="text" id="cidade" name="cidade" value="<?php echo $dados['cidade'];?>" class="form-control">
						</div>
                        
						<div class="col-md-4 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Estado
                            </h6>
							<input type="text" id="estado" name="estado" value="<?php echo $dados['estado'];?>" class="form-control">
						</div>
                        
                        <div class="col-md-12 mg-b-10"></div>
                        
                        <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-share-square tx-yellow mg-r-5"></i> REDES SOCIAIS
                            </h3>
                        </div>
                        
						<div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-facebook-square"></i> Link Facebook
                            </h6>
							<input type="text" id="link_facebook" name="link_facebook" value="<?php echo $dados['link_facebook'];?>" class="form-control">
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-youtube-play"></i> Link Youtube
                            </h6>
							<input type="text" id="link_linkedin" name="link_linkedin" value="<?php echo $dados['link_linkedin'];?>" class="form-control">
						</div>
                        
						<div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-instagram"></i> Link Instagram
                            </h6>
							<input type="text" id="link_instagram" name="link_instagram" value="<?php echo $dados['link_instagram'];?>" class="form-control">
						</div>
                        
						<div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	<i class="fa fa-twitter-square"></i> Link Twitter
                            </h6>
							<input type="text" id="link_twitter" name="link_twitter" value="<?php echo $dados['link_twitter'];?>" class="form-control">
						</div>
                        
                        <div class="col-md-12 mg-b-10"></div>
                        
                        <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-server tx-yellow mg-r-5"></i> SERVIDOR SMTP
                            </h3>
                        </div>
                        
                        <div class="col-md-10 col-xs-12 mg-b-20">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Host <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="server_email_host" name="server_email_host" value="<?php echo $dados['server_email_host'];?>" class="form-control" required>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> ex: mail.seusite.com.br
                            </div>
						</div>
                        
                        <div class="col-md-2 col-xs-12 mg-b-20">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Porta <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="server_email_porta" name="server_email_porta" value="<?php echo $dados['server_email_porta'];?>" class="form-control" required>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> ex: 587
                            </div>
						</div>
                        
                        <div class="col-md-8 col-xs-12 mg-b-20">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Conta de E-mail do Domínio <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="server_email_usuario" name="server_email_usuario" value="<?php echo $dados['server_email_usuario'];?>" class="form-control" required>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> ex: contato@seusite.com.br
                            </div>
						</div>
                        
                        <div class="col-md-4 col-xs-12 mg-b-20">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Senha do E-mail <span class="tx-danger">*</span>
                            </h6>
							<input type="password" id="server_email_senha" name="server_email_senha" value="<?php echo $dados['server_email_senha'];?>" class="form-control" required>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> Senha cadastrada para o email
                            </div>
						</div>
                        
                        <div class="col-md-12 mg-b-0"></div>
                        
                        <div class="col-md-12" style="padding:30px 15px; padding-top:0">
                        	<h3 class="mg-b-0 tx-20 tx-bold">
                                <i class="fa fa-star-o tx-yellow mg-r-5"></i> ADICIONAIS
                            </h3>
                        </div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-10">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Google Analytics <span class="tx-warning">(opcional)</span>
                            </h6>
                            <textarea id="key_google_analytics" name="key_google_analytics" class="form-control" style="height:330px"><?php echo $dados['key_google_analytics'];?></textarea>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong>
                                Insira o seu código gerado no Google Analytics. (obs: link completo, não somente a ID)
                            </div>
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-20">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Google Maps (Key) <span class="tx-warning">opcional</span>
                            </h6>
							<input type="text" id="key_google_maps" name="key_google_maps" value="<?php echo $dados['key_google_maps'];?>" class="form-control">
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong>
                                Insira a sua KEY gerada no Google Maps. (exemplo: AIzaSyByNSi-Q9T_B7aXnfWiri_03BaZ3RvE9eI)
                            </div>
						</div>
                        
                         <div class="col-md-12 col-xs-12 mg-b-10">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Meta Keywords <span class="tx-warning">(opcional)</span>
                            </h6>
                            <textarea id="meta_keywords" name="meta_keywords" class="form-control" style="height:150px"><?php echo $dados['meta_keywords'];?></textarea>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong>
                                Insira as palavras chaves para o seu site (separadas por vírgula)
                            </div>
						</div>
                        
                        
						<div class="col-md-3 col-xs-12 mg-t-10">
							<button type="submit" class="btn btn-info btn-block" name='btgravar' style="width:170px">
                            	<i class='fa fa-floppy-o'></i> <?php echo (empty($id))?"Cadastrar" : "Alterar";?> Registro
                            </button>
						</div>
					</div>
				 </div>
					
		</form>
        
        <script>
			$('#color_picker_1').on('change', function() {
				$('#cor_primaria').val(this.value);
			});
			$('#hexcolor_1').on('change', function() {
			  $('#cor_primaria').val(this.value);
			});
			$('#color_picker_2').on('change', function() {
				$('#cor_secundaria').val(this.value);
			});
			$('#hexcolor_2').on('change', function() {
			  $('#cor_secundaria').val(this.value);
			});
		</script>

    
    