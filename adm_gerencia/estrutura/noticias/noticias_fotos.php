<?php 
	// AÇÕES INICIAIS
	$id = null;
	$acao = null;
	$id_ordem = null;
	$pos_acao_mensagem = null;
	$textMsg = null;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// TRANSFORMA VARIAVEIS EM GET E POST
	
	$variables=(strtoupper($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST; foreach ($variables as $k=> $v) $$k=$v;
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// CONFIGURAÇÕES
	
	$palavra      = "Fotos da Notícia"; //modificar somente essa linha
	$tabela       = "tb_noticias_fotos"; //modificar somente essa linha
	$tabela2      = "tb_noticias"; //modificar somente essa linha
	$file         = "noticias_fotos";
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//DADOS TABELA FOTOS
	
	$sql    = mysqli_query($link, "SELECT * FROM ".$tabela2." WHERE id='".$_GET["id"]."'");
	$dados2 = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	$id_tabela_foto = $dados2['id'];
	
	$caminho  = "../assets/uploads/".$tabela2."/".$id_do_registro."/";
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// INSERIR ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($acao == "insertDb"){
	
		//Pega o diretorio da pasta
		$id_do_registro = $_POST["id_registro"];
		$diretorio = "../assets/uploads/".$tabela2."/".$id_do_registro."/";
		
		// Faz Upload e grava no Db
		include "includes/funcoes/funcao.Upload.Fotos.Extras.php";
		
		// Termina envio e Redireciona
		$link_redirecionar = "?pg=$file&id=".$id_do_registro."&msg=ok&acao=verfotos";	
		echo "<meta http-equiv='refresh' content='0; URL=".$link_redirecionar."'>";
		
	} 
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// DELETAR SELECIONADOS
	
	if($acao == "deletesDb"){
		
		// Lista o Diretorio
		$id_do_registro = $_POST["id_registro"];
		$dir = "../assets/uploads/".$tabela2;
		$listas = implode("|", $listas);
		$lista = explode("|", $listas);
		$total = count($lista);
		for($i=0; $i<$total; $i++)
		{
			// Executa o Delete
			mysqli_query($link, "DELETE FROM $tabela WHERE foto='".$lista[$i]."'");	
			
			// Apaga o Diretório
			$url = $dir."/".$id_do_registro."/".$lista[$i];
			unlink($url);
		}	 
			
		// Mensagem após a ação
		$link_redirecionar = "?pg=$file&id=".$id_do_registro."&msg=no&acao=verfotos";	
		echo "<meta http-equiv='refresh' content='0; URL=".$link_redirecionar."'>";
		
	} 
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// INICIO DA ACAO FORM DE CADASTRO E ALTERAR
	
	if(empty($acao) OR $acao == "FORM"){
		$form1 = "FORMULARIO";
		
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

	<script>
        function FrmSend(){
            <?php echo $form1;?>.btgravar.value='Aguarde...';
            <?php echo $form1;?>.submit();
            <?php echo $form1;?>.btgravar.disabled=true;  
            return false;
        }
        function frmenviar(){
            FrmSend();
        }
        setTimeout('<?php echo $form1;?>.fotos.focus();', 300);
    </script>
	<style type="text/css">
        #oculto {
            display: none;
            margin-top: 30px;
        }
    </style>
    <script type="text/javascript">
        function showlayer(oculto){
            var myLayer = document.getElementById(oculto).style.display;
            if(myLayer=="none"){
                document.getElementById(oculto).style.display="none";
            } else { 
                document.getElementById(oculto).style.display="block";
            }
        }
    </script>

	<div class="br-mainpanel" id="cadastra">
		
		<div class="br-pageheader pd-y-15 pd-l-20">
			<nav class="breadcrumb pd-0 mg-0 tx-12">
				<a class="breadcrumb-item" href="index.php">Dashboard</a>
				<a class="breadcrumb-item" href="#">Fotos Extras</a>
				<span class="breadcrumb-item active"><?php echo $palavra;?></span>
			</nav>
		</div>
        
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 mg-b-20-force">
            <?php
				if(!empty($dados2['titulo'])){
			?>
            <h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
            	<i class="fa fa-list tx-yellow mg-r-10 mg-l-10"></i> <?php echo $dados2['titulo'];?> 
                <span class="tx-yellow tx-13 mg-l-5">(Fotos do Registro)</span>
            </h4>
            <?php
				}else{
			?>
            <h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
            	<i class="fa fa-list tx-yellow mg-r-10 mg-l-10"></i> Selecione a Notícia para editar
                <span class="tx-yellow tx-13 mg-l-5">(Fotos do Registro)</span>
            </h4>
            <?php
				}
			?>
			<p class="mg-b-0 pd-l-45 pd-r-45">
                Para <strong>enviar fotos extras</strong> preencha corretamente ao formulário abaixo:
            </p>
		</div>
		
		<form 
            action="?pg=<?php echo $file;?>" 
            method="post" 
            enctype="multipart/form-data" 
            name="<?php echo $form1;?>" 
            onsubmit="this.elements['btgravar'].disabled=true;" 
            autocomplete="off" 
            data-parsley-validate
        >
		
            <input name="acao" type="hidden" value="insertDb">
            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
            <input name="id_registro" type="hidden" value="<?php echo $id_tabela_foto;?>">
			
			<div class="br-pagebody mg-mobile mg-t-0-force">
			
				 <div class="br-section-wrapper mg-t-30-force">
				 	<div class="row">
                        
                        <?php
							if(empty($id)){
						?>
                        <div class="col-md-12 col-xs-12 mg-b-30">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Selecione o Registro</strong> <span class="tx-danger">*</span>
                            </h6>
                            <select name="pasta" class="form-control">
                                <option selected>Selecione um Registro</option>
                                <?php
									$sql   = mysqli_query($link, "SELECT * FROM ".$tabela2." where status='S' order by id desc");
									while ($dados = mysqli_fetch_array($sql)){
								?>
                                	<option value="<?php echo $dados['id'];?>"><?php echo $dados['titulo'];?></option>
                                <?php }?>
                            </select>
                        </div>
						<?php
                        	}else{
						?>
                        <input type="hidden" name="pasta" value="<?php echo $id;?>">
                        <?php
							 }
						?>
                         <div class="col-md-12 col-xs-12 mg-b-10">
                         	<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-5">
                            	Anexar Fotos</strong> <span class="tx-danger">*</span>
                            </h6>   
                            <input type="file" name="arquivo[]" multiple  class="form-control" required/>
                            <div class="alert alert-warning tx-11">
                                <strong class="d-block d-sm-inline-block-force"><i class="fa fa-warning"></i></strong> 
                                (Selecione várias imagens do seu computador e clique no botão abaixo)
                            </div>
                            <div id="oculto">
                                Aguarde enquanto seu Upload esta sendo realizado....
                            </div>
						</div>
                        
						<div class="col-md-3 col-xs-12 mg-t-10">
							<input type="hidden" name="f[action]" value="gravar">
                            <button 
                                type="button" 
                                class="btn btn-info btn-block" 
                                name='btgravar' 
                                onclick="frmenviar(); javascript:show('oculto')" 
                                style="width:170px"
                            >
                            	<i class='fa fa-floppy-o'></i> Enviar Arquivo
                            </button>
						</div>
					</div>
			</form>
    	</div>
    
    <?php
		}
	?>
    
	<?php
    	// INICIO DA ACAO VER FOTOS
		
		if($acao == "verfotos"){
			$form2 = "FORMLISTA";
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ?>
    
    <div class="br-mainpanel">
    
    	<div class="br-pageheader pd-y-15 pd-l-20">
			<nav class="breadcrumb pd-0 mg-0 tx-12">
				<a class="breadcrumb-item" href="index.php">Dashboard</a>
				<a class="breadcrumb-item" href="#">Fotos Extras</a>
				<span class="breadcrumb-item active"><?php echo $palavra;?></span>
			</nav>
		</div>
		
		<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 mg-b-20-force">
            <h4 class="tx-gray-800 mg-b-0 tx-20 tx-bold">
            	<i class="fa fa-list tx-yellow mg-r-10 mg-l-10"></i> <?php echo $dados2['titulo'];?> 
                <span class="tx-yellow tx-13 mg-l-5">(Notícia)</span>
            </h4>
			<p class="mg-b-0 pd-l-45 pd-r-45">
            	<?php
					$sql  = mysqli_query($link, "SELECT count(*) as total FROM ".$tabela." WHERE id_registro='".$id_tabela_foto."'");  
					$resultado = mysqli_fetch_assoc($sql);
				?>
                Foram encontrados <strong><?php echo $resultado['total'];?> fotos</strong> na pasta do Registro!
            </p>
		</div>
        
        <form 
            action="?pg=<?php echo $file;?>" 
            method="POST" 
            name="<?php echo $form2;?>"
        >
            
            <input name="acao" type="hidden" value="deletesDb">
            <input name="caminho" type="hidden" value="<?php echo $caminho;?>">
            <input name="id_registro" type="hidden" value="<?php echo $id_tabela_foto;?>">
                
            <div class="br-pagebody mg-mobile">
            
                <div class="br-section-wrapper">
                    <div class="row">
                        
                        <div class="col-md-12 col-xs-12">
                            <div class="row">
                                <div id="listagemItens" align="center">
                                    <ul class="row ui-sortable" align="center">
            
										<?php 
											$sql = mysqli_query($link, "SELECT * FROM ".$tabela." WHERE id_registro='".$id_tabela_foto."' ORDER BY id_ordem ASC, id DESC");
											while($dados = mysqli_fetch_array($sql)){
										?>
                                        <li id="widgetArray_<?php echo $dados['id'];?>" class="col-md-3 ui-sortable-handle">
                                            <div class="col-md-12 mg-b-25" align="center">
                                            <label id='check_sel'>
                                                <input id='check_sel' name='listas[]' type='checkbox' value='<?php echo $dados['foto'];?>' /> Selecionar
                                            </label>
                                            <img 
                                            	src='<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=600px&imagem=assets/uploads/<?php echo $tabela2;?>/<?php echo $id;?>/<?php echo $dados['foto'];?>' 
                                                border='0' 
                                                class='img-fluid'
                                            >
                                            </div>        
                                        </li>
                                        <?php 
											}
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-xs-12 col-centered">
                            <div class="row row-centered">
                                <?php
                                	if($resultado['total']>0){
								?>
                                <div class="col-md-4 col-xs-12 col-centered mg-b-10 mg-t-15" align="center">
                                    <a 
                                        href="?pg=<?php echo $file;?>&id=<?php echo $id;?>" 
                                        class="btn btn-info btn-block" 
                                        style="width:220px"
                                    >
                                    	<i class="fa fa-send"></i> Enviar Fotos
                                    </a>
                                </div>
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
                                <?php 
									}else{
								?>
                                <div class="col-md-12 col-xs-12 col-centered mg-t-15" align="center">
                                	<p><strong>Nenhuma foto adicional foi inserida até o momento!</strong></p>
                                </div>
                                <div class="col-md-12 col-xs-12 col-centered mg-b-10 mg-t-15" align="center">
                                    <a 
                                        href="?pg=<?php echo $file;?>&id=<?php echo $id;?>" 
                                        class="btn btn-info btn-block" 
                                        style="width:220px"
                                    >
                                    	<i class="fa fa-send"></i> Enviar Fotos
                                    </a>
                                </div> 
                                <?php }?>
                            </div>
                        </div>
        
                    </div>
                </div>
            
            </form>
            
			<?php
            	}
			?>
