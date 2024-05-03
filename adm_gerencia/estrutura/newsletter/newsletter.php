<?php 
	// AÇÕES INICIAIS
	
	$acao = null;
	$pos_acao_mensagem = null;
	$id = null;
	$url = null;
	$dados = null;
	$page = null;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// TRANSFORMA VARIAVEIS EM GET E POST
	
	$variables=(strtoupper($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST; foreach ($variables as $k=> $v) $$k=$v;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// CONFIGURAÇÕES
	
	$palavra = "Newsletter";
	$tabela = "tb_newsletter";
	$file = "newsletter";
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	// DELETAR REGISTRO //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "deleteDb"){
		
		//Executa Delete
		mysqli_query($link, "DELETE FROM ".$tabela." WHERE id='".$id."'");
		
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
	
	<?php
		$form2 = "FORMLISTA";
		$busca = "SELECT * FROM ".$tabela." ORDER BY id DESC";			
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
    <div class="br-mainpanel">
	
		<div class="br-pageheader pd-y-15 pd-l-20">
			<nav class="breadcrumb pd-0 mg-0 tx-12">
				<a class="breadcrumb-item" href="index.php">Dashboard</a>
				<a class="breadcrumb-item" href="#">Newsletter</a>
				<span class="breadcrumb-item active">Baixas E-mails Cadastrados</span>
			</nav>
		</div>
		
		<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 mg-b-20-force">
			<h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
                <i class="fa fa-envelope tx-yellow mg-r-10 mg-l-10"></i> Listagem dos E-mails
            </h4>
			<p class="mg-b-0 pd-l-45 pd-r-45">
            	Foram encontrados <strong><?php echo $tr;?> registros</strong> no Banco de Dados!
            </p>
		</div>
		
		<form 
            action="?pg=<?php echo $file;?>" 
            method="POST" 
            name="<?php echo $form2;?>"
        >
			<input name="acao" type="hidden" value="deletesDb">
		
			<div class="br-pagebody mg-mobile mg-t-0-force">
			
				<?php echo $pos_acao_mensagem;?>
			
				 <div class="br-section-wrapper mg-t-30-force">
					<div class="row">
						
						<div class="col-md-12 col-xs-12">
							<div class="row">
								<div class="col-md-1 oculta-mobile">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">ID</h6>
								</div>
								<div class="col-md-3 col-xs-12">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">NOME</h6>
								</div>
								<div class="col-md-3 oculta-mobile">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">TELEFONE</h6>
								</div>
								<div class="col-md-4 oculta-mobile">
									<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5 tx-center mg-b-15">E-MAIL</h6>
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
									<div class="col-md-12" style="background:<?php echo $bgcolor;?>">
										<div class="row">
											<div class="col-md-1 col-xs-12 tx-gray-800 tx-bold tx-14 tx-center pd-5 box-list">
												<input id='check_sel' name='listas[]' type='checkbox' value='<?php echo $dados['id'];?>'>
											</div>
											<div class="col-md-3 col-xs-12 tx-gray-800 tx-14 tx-center pd-5 box-list">
												<strong><?php echo $dados['nome'];?></strong>
											
											</div>
											<div class="col-md-3 col-xs-12 tx-gray-800 tx-14 tx-center pd-5 box-list">
												<?php echo $dados['telefone'];?>
											</div>
											<div class="col-md-4 col-xs-12 tx-gray-800 tx-bold tx-14 tx-center pd-5 box-list">
												<?php echo $dados['email'];?>
											</div>
											<div class="col-md-1 col-xs-12 tx-gray-800 tx-bold tx-14 tx-center pd-5 box-list">
												<div class="icons-actions-listage">
													<ul>
														<li>
															<a 
                                                                data-toggle="tooltip" 
                                                                data-placement="top" 
                                                                title="Apagar" 
                                                                href="javascript:confirmaExclusao('?pg=<?php echo $file?>&acao=deleteDb&id=<?php echo "$dados[id]"?>')"
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
											$url = "?pg=".$pg."&acao=".$acao."&page=".$anterior."#listagem";
												echo "<li class='page-item'><a href='".$url."' class='page-link'>«</a></li>";
											} else {
												echo "<li class='page-item'><a href='' class='page-link'>«</a></li>";
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
								<?php
									if ($tr > 0){
								?>
                                <div class="col-md-4 col-xs-12 col-centered mg-b-10 mg-t-15" align="center">
									<button class="btn btn-info btn-block" type="button" style="width:220px" onclick='SelectAll();' id="sel_todos">
                                    	<i class="fa fa-check-square-o"></i> Selecionar Todos
                                    </button>
								</div>
								<div class="col-md-4 col-xs-12 col-centered mg-b-10 mg-t-15" align="center">
									<button class="btn btn-info btn-block" type="button" style="width:220px" onclick="checkdeletetion();">
                                    	<i class="fa fa-trash"></i> Excluir Selecionados
                                    </button>
								</div>
								<div class="col-md-4 col-xs-12 col-centered mg-b-10 mg-t-15" align="center">
									<a 
                                        href="javascript:window.location.href='includes/funcoes/funcao.Download.Emails.Newsletter.php'" 
                                        class="btn btn-info btn-block" 
                                        style="width:220px"
                                    >
										<i class="fa fa-download"></i> Exportar E-mails
									</a>
								</div>
                                <?php
									}
								?>
							</div>
						</div>
						
					</div>
				</div>
			
			</form>
