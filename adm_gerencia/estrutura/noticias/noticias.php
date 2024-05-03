<?php
	// A��ES INICIAIS
	
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
	
	// CONFIGURA��ES
	
	$palavra       = "Not�cias";
	$tabela        = "tb_noticias";
	$file          = "noticias";
	$file_redirect = "noticias";

	
	// INSERIR ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "insertDb"){
		
		// Aplica as Datas
		$_data_criacao = date('Y-m-d H:i:s');
		$_data_edicao  = date('Y-m-d H:i:s');
		
		//Monta Url Amig�vel
		$postUrl = $_POST['titulo']; include "includes/funcoes/funcao.Url.Amigavel.php";
		
		//Executa Insert
		mysqli_query($link, "INSERT INTO ".$tabela."(
				id_ordem,
				data_criacao,
				data_edicao,
				url_amigavel,
				titulo,
				subtitulo,
				texto,
				creditos,
				foto,
				status,
				login_usuario
			)VALUES(
				'0',
				'".$_data_criacao."',
				'".$_data_edicao."',
				'$urlAmigavel',
				'".addslashes($titulo)."',
				'".addslashes($subtitulo)."',
				'".addslashes($texto)."',
				'".addslashes($creditos)."',
				'',
				'S',
				'$login_usuario_logado'
			)"
		);
		
		$id_recuperado = mysqli_insert_id($link);
		
		//Cria diret�tio de imagem
		$dir = "../assets/uploads/".$tabela."/".$id_recuperado;
		$pasta = $dir."/";
		
		$postArquivo = "foto"; $acaoUpload = "uploadArquivo"; include "includes/funcoes/funcao.Upload.Arquivo.Images.php";

		// Mensagem ap�s a a��o
		$textMsg = "Pronto! registro foi criado."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// ATUALIZAR / EDITAR /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "updateDb"){
		
		// Aplica as Datas
		$_data_edicao  = date('Y-m-d H:i:s');
		
		//Monta Url Amig�vel
		$postUrl = $_POST['titulo']; include "includes/funcoes/funcao.Url.Amigavel.php";
		
		// Come�a Update da Imagem
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
			url_amigavel = '$urlAmigavel',
			titulo = '".addslashes($titulo)."',
			subtitulo = '".addslashes($subtitulo)."',
			texto = '".addslashes($texto)."',
			creditos = '".addslashes($creditos)."',
			foto = '$foto_1',
			login_usuario = '$login_usuario_logado' 
			WHERE id='".$id."'"
		);
		
		// Mensagem ap�s a a��o
		$textMsg = "Pronto! registro alterado."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// MUDAR STATUS //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "statusDb"){
		
		//Executa Update
		mysqli_query($link, "UPDATE ".$tabela." SET status='".$status."' WHERE id='".$id."'");
		
		// Mensagem ap�s a a��o
		$textMsg = "Pronto! status alterado."; include "includes/funcoes/funcao.Mensagens.Pos.Acoes.php";
		
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// DELETAR REGISTRO //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "deleteDb"){
		
		//Executa Delete
		mysqli_query($link, "DELETE FROM ".$tabela." WHERE id='".$id."'");
		
		//Apaga o Diret�rio
		$dir = "../assets/uploads/".$tabela."/".$id."/";
		$dir1 = opendir($dir);
		while ($res =readdir($dir1)){
			if ($res!='' && $res!='.' && $res!='..'){
				$url = $dir."/".$res;
				@unlink($url);
			}
		}	
		@rmdir ($dir);
		
		// Mensagem ap�s a a��o
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
			
			// Apaga o Diret�rio
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
		
		// Mensagem ap�s a a��o	
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
								echo "Para cadastrar um novo registro clique no bot�o ao lado e preencha corretamente o formul�rio!";
							}else{
								echo "Para editar o registro selecionado e preencha corretamente o formul�rio!";
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
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	T�tulo da Not�cia <span class="tx-danger">*</span>
                            </h6>
							<input type="text" id="titulo" name="titulo" value="<?php echo $dados['titulo']?>" class="form-control" required>
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Subtitulo <span class="tx-warning">opcional</span>
                            </h6>
							<textarea id="subtitulo" name="subtitulo" class="form-control" rows="4"><?php echo $dados['subtitulo']?></textarea>
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">Texto</h6>
							<textarea name="texto"><?php  echo $dados['texto'];?></textarea>
							<script>
								 CKEDITOR.replace( 'texto', {
									filebrowserUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=file",
									filebrowserImageUploadUrl: "<?php echo $_linkCompletoAdmin;?>/assets/ckeditor/ajaxfile.php?type=image",		
								 });
								 CKEDITOR.config.height='400px';
						 	</script>
						</div>
                        
                        <div class="col-md-12 col-xs-12 mg-b-30">
							<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Cr�ditos / Fonte <span class="tx-warning">opcional</span>
                            </h6>
							<input type="text" id="creditos" name="creditos" value="<?php echo $dados['creditos']?>" class="form-control">
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
								<div class="col-md-10 mg-t-20">
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
                                        <span>N�o</span>
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
			</div>		
		</form>
	</div>
    
	<?php
		$form2 = "FORMLISTA";
		$busca = "SELECT * FROM ".$tabela." ORDER BY id_ordem ASC, id DESC";			
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
    
		<div class="pd-x-20 pd-sm-x-30 pd-b-0-force mg-b-0-force">
			<h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
            	<i class="fa fa-list tx-yellow mg-r-10 mg-l-10"></i> Listagem de <?php echo $palavra;?>
            </h4>
			<p class="mg-b-0 pd-l-45 pd-r-45">
            	Foram encontrados <strong><?php echo $tr;?> registros</strong> no Banco de Dados!
            </p>
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
								<div class="col-md-7 col-xs-12">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">DETALHES</h6>
								</div>
                                <div class="col-md-2 col-xs-12 oculta-mobile">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">IMAGEM</h6>
								</div>
								<div class="col-md-2">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">A��ES</h6>
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
									<div class="col-md-12" style="background:<?php echo $bgcolor;?>">
										<div class="row">
											<div class="col-md-1 col-xs-12 tx-gray-800 tx-bold tx-14 tx-center pd-15 box-list mg-t-10">
                                                <input id='check_sel' name='listas[]' type='checkbox' value='<?php echo $dados['id'];?>'>
											</div> 
											<div class="col-md-7 col-xs-12 tx-gray-800 tx-14 tx-center pd-15 box-list mg-t-10">	
												<strong><?php echo $dados['titulo'];?></strong>
                                                <br>
                                                <span class="tx-12">
													Postada em <strong><?php echo date("d/m/Y H:i:s", strtotime($dados['data_criacao']));?></strong> por <?php echo $dados['login_usuario'];?>
                                                </span>
                                            </div> 
											<div class="col-md-2 col-xs-12 tx-gray-800 tx-bold tx-14 tx-center pd-15 box-list">
												<a 
													href="<?php echo $_linkCompleto;?>/assets/uploads/<?php echo $tabela."/".$dados['id']."/".$dados['foto'];?>" 
													style="display:block; width:auto; height:auto"
                                                    data-toggle="lightbox" 
                                					data-gallery="example-gallery"
												>
													<img 
														src='<?php echo $_linkCompleto;?>/thumbnail.php?no_img=1&w=80px&h=70px&imagem=assets/uploads/<?php echo $tabela."/".$dados['id']."/".$dados['foto'];?>' 
														border='0' 
														height='72'
													>
												</a>
											</div>
											<div class="col-md-2 col-xs-12 tx-gray-800 tx-bold tx-14 tx-center pd-15 box-list mg-t-10">
												<div class="icons-actions-listage">
													<ul> 
                                                        <li>
                                                        	<a 
                                                                data-toggle="tooltip" 
                                                                data-placement="top"
                                                                title="Ver / Enviar Fotos" 
                                                                href="?pg=<?php echo $file;?>_fotos&id=<?php echo $dados['id'];?>&acao=verfotos"
                                                            >
                                                            	<i class="fa fa-camera" style="color:purple"></i>
                                                            </a>
                                                        </li>
                                                        <li>
															<?php 
                                                                if($dados['status'] == "S"){
                                                            ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Inativar" href="?pg=<?php echo $file;?>&acao=statusDb&id=<?php echo $dados['id'];?>&status=<?php echo ($dados['status']=="S")?"N":"S";?>">
                                                                <i class="fa fa-heart" style="color:green"></i>
                                                            </a>
                                                            <?php } else { ?>
                                                            <a data-toggle="tooltip" data-placement="top" title="Ativar" href="?pg=<?php echo $file;?>&acao=statusDb&id=<?php echo $dados['id'];?>&status=<?php echo ($dados['status']=="S")?"N":"S";?>">
                                                                <i class="fa fa-heart" style="color:red"></i>
                                                            </a>
                                                            <?php  }?>
                                                        </li>
														<li>
															<a data-toggle="tooltip" data-placement="top" title="Editar" href="?pg=<?php echo $file;?>&acao=FORM&id=<?php echo $dados['id']?>&show_form=show">
																<i class="fa fa-pencil"></i>
															</a>
														</li>
                                                        <li>
															<a data-toggle="tooltip" data-placement="top" title="Apagar" href="javascript:confirmaExclusao('?pg=<?php echo $file;?>&acao=deleteDb&id=<?php echo $dados['id']?>')">
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
											$url = "?pg=".$pg."&acao=".$acao."&page=".$anterior."#listagem";
												echo "<li class='page-item'><a href='".$url."' class='page-link'>�</a></li>";
											} else {
												echo "<li class='page-item'><a href='' class='page-link'>�</a></li>";
											}
										?>
										
										<?php  
											for($i=1; $i<$page; $i++)
											if($i>=$page-5)
												echo "<li class='page-item'><a href='?pg=".$pg."&acao=".$acao."&page=".$i."#listagem' class='page-link'>".$i."</a></li>";
												echo "<li class='page-item active'><a href='' class='page-link'><b>".$page."</b></a></li>";
											for($i=$page+1; $i<=$tp; $i++)
											if($i<=$page+5)
												echo "<li class='page-item'><a href='?pg=".$pg."&acao=".$acao."&page=".$i."#listagem' class='page-link'>".$i."</a></li>";
										?>
										
										<?php 
											if($tp > $page){
											$proxima = $page +1;
												$url = "?pg=".$pg."&acao=".$acao."&page=".$proxima."#listagem";
												echo "<li class='page-item'><a href='".$url."' class='page-link'>�</a></li>";
											} else {
												echo "<li class='page-item'><a href='' class='page-link'>�</a></li>";
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
            