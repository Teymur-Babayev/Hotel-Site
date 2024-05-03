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
	
	$palavra       = "Institucional";
	$tabela        = "tb_institucional";
	$file          = "institucional";
	$file_redirect = "institucional";
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// ATUALIZAR / EDITAR /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "updateDb"){
		
		// Aplica as Datas
		$_data_edicao  = date('Y-m-d H:i:s');
		
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
			data_edicao = '".$_data_edicao."',
			descricao = '".addslashes($descricao)."',
			missao = '".addslashes($missao)."',
			visao = '".addslashes($visao)."',
			valores = '".addslashes($valores)."',
			foto = '$foto_1',
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
            <input name="foto_antiga" type="hidden" value="<?php echo $dados['foto'];?>">
			
			<div class="br-pagebody mg-mobile mg-t-0-force">
			
				<?php echo $pos_acao_mensagem;?>
			
				 <div class="br-section-wrapper mg-t-30-force">
				 	<div class="row">

						<div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Página <span class="tx-danger">*</span></h6>
							<input type="text" id="nome" name="nome" value="<?php echo $dados['nome']?>" class="form-control" disabled>
						</div>
 
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Texto</h6>
							<textarea name="descricao"><?php  echo $dados['descricao'];?></textarea>
							<script>
								 CKEDITOR.replace( 'descricao', {
									filebrowserUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=file",
									filebrowserImageUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=image",		
								 });
								 CKEDITOR.config.height='400px';
						 	</script>
						</div>

						<div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Missão</h6>
							<textarea id="missao" name="missao" class="form-control" rows="5"><?php echo $dados['missao']?></textarea>
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Visão</h6>
							<textarea id="visao" name="visao" class="form-control" rows="5"><?php echo $dados['visao']?></textarea>
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Valores</h6>
							<textarea id="valores" name="valores" class="form-control" rows="5"><?php echo $dados['valores']?></textarea>
						</div>
                        
                        <div class="col-md-9 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">
                            	<i class="fa fa-picture-o mg-r-2"></i> IMAGEM <span class="tx-warning">(800x800)</span>
                            </h6>
							<div class="row">
								<div class="col-md-2">
									<?php 
										if(empty($id)){
											echo "<img name='foto_1' src='".$_linkCompleto."/thumbnail.php?no_img=1&w=100px&h=100px&imagem=assets/uploads/sem-foto-admin.jpg' border='0' class='img-fluid'>";
										}else{
											if(!empty($dados['foto'])){
												echo "<img name='foto_1' src='".$_linkCompleto."/thumbnail.php?no_img=1&w=100px&h=100px&imagem=assets/uploads/$tabela/$id/$dados[foto]' border='0' class='img-fluid'>";
											} else {
												echo "<img name='foto_1' src='".$_linkCompleto."/thumbnail.php?no_img=1&w=100px&h=100px&imagem=assets/uploads/sem-foto-admin.jpg' border='0' class='img-fluid'>";
											}
										}
									?>
								</div>
								<div class="col-md-10">
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

						<div class="col-md-3 col-xs-12 mg-t-10">
							<button type="submit" class="btn btn-info btn-block" name='btgravar' style="width:170px">
                            	<i class='fa fa-floppy-o'></i> <?php echo (empty($id))?"Cadastrar" : "Alterar";?> Registro
                            </button>
						</div>
					</div>
				 </div>	
		</form>
	