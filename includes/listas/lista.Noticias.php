<?php
	$_sqlAdd = null;
	$_getAdd = null;
	
	$_ord = "order by id_ordem ASC, id DESC";
	$_case = "";
	
	if (isset($_GET['busca'])){
		$busca = $_GET['busca'];
	}else{
		$busca = '';
	}
	
	if ($busca!=""){
		
		$_whereTag = " nome LIKE '%" . $busca . "%'";
		
		$_sqlAdd  = " p.url_amigavel LIKE '%" . str_replace('-', ' ', $busca) . "%'";
		$_sqlAdd .= " or p.titulo LIKE '%" . str_replace('-', ' ', $busca) . "%'";
		$_sqlAdd .= " or p.subtitulo LIKE '%" . str_replace('-', ' ', $busca) . "%'";
		$_sqlAdd .= " or p.texto LIKE '%" . str_replace('-', ' ', $busca) . "%'";
		
		$_getAdd = "/resultado/da/busca/" . $_GET["busca"];

		$_array = explode(" ", str_replace(array(",","&","%","-","_",".","?","/","\\","(",")"), "", $busca));

		if (count($_array)>1){
			for ($_i=0; $_i<count($_array); $_i++){
				$_whereTag .= " nome LIKE '%" . $_array[$_i] . "%'";
				
				$_sqlAdd .= " or p.url_amigavel LIKE '%" . $_array[$_i] . "%'";
				$_sqlAdd .= " or p.titulo LIKE '%" . $_array[$_i] . "%'";
				$_sqlAdd .= " or p.subtitulo LIKE '%" . $_array[$_i] . "%'";
				$_sqlAdd .= " or p.texto LIKE '%" . $_array[$_i] . "%'";
			}
		}
		
		$_sqlAdd = " and (" . $_sqlAdd . ") ";
		
		$_ord = "order by p.id desc";
	}

	$_pagina = @$_GET["pagina"]>0 ? @$_GET["pagina"] : 1;
	$_limiteListagem = 9; // quantidade de registros por p?gina
	$_limitePaginas = 10; // limite de p?ginas na pagina??o
	
	$_sqlWhere = " WHERE p.status='S' " . $_sqlAdd . " " . $_ord ;
	$_sql = "SELECT p.* FROM tb_noticias p";
	$_sql .= $_sqlWhere . " LIMIT " .  ( $_limiteListagem*($_pagina-1)) . "," .  $_limiteListagem;
	$_query = mysqli_query($link, $_sql);
	
	$_encontrados = mysqli_num_rows($_query); //quantidade de registros encontrador, por ex: ultima p?gina s? mostra 3
	
	$_queryTotal = mysqli_fetch_array(mysqli_query($link, "SELECT COUNT(*) As total_records FROM tb_noticias p " . $_sqlWhere));
	$_total = $_queryTotal['total_records'];
	$_totalPaginas = ceil($_total / $_limiteListagem) < 0 ? 1 : ceil($_total / $_limiteListagem);
	$_linkAdd = "/noticias" . $_getAdd;
	
	if ($_encontrados>0) {

		for ($_i = 0; $_i < $_encontrados; $_i++) {
			$dados= mysqli_fetch_array($_query);
		
?>
<div class="col-md-4 margin-bottom-30">
    <div class="col-md-12">
    	<div class="row c-card-imovel padding-0">
        	<div class="col-md-12 padding-0 img-effect">
                <a href="<?php echo $_linkCompleto;?>/noticia/<?php echo $dados['id'];?>/<?php echo $dados['url_amigavel'];?>">
                    <img 
                        src="<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=650px&imagem=assets/uploads/tb_noticias/<?php echo $dados['id'];?>/<?php echo $dados['foto'];?>"
                        class="img-fluid"
                        alt="<?php echo utf8_encode($dados['titulo']);?>"
                    >
                </a>
            </div>
            <div class="col-md-12 padding-15">
            	<div class="row">
                    <div class="col-md-12">
                    	<div class="row center-xs middle-xs">
                        	<div class="col-md-10 margin-bottom-0 margin-top-5 cor_links">
                            	<p class="font-color-secundaria font-size-13 margin-bottom-10">
                                	Postada em <strong><?php echo date("d/m/Y", strtotime($dados['data_edicao']));?></strong>
                                </p>
                                <h3 class="font-size-14 text-uppercase font-weight-800" style="min-height:50px">
                                	 <a href="<?php echo $_linkCompleto;?>/noticia/<?php echo $dados['id'];?>/<?php echo $dados['url_amigavel'];?>">
										<?php echo utf8_encode($dados['titulo']);?>
                                    </a>
                                </h3>
                            </div>
                           	<div class="col-md-10 margin-bottom-10 margin-top-5 cor_links">
                                <p class="font-size-14 line-height-18 margin-bottom-0 acessibilidade">
                                	<?php 
										$texto = utf8_encode($dados['texto']); 
										$texto = strip_tags($texto,'');
										$texto = str_replace("\n","",$texto);
										echo substr($texto, 0, 257) . " ...";
									?>
                                </p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	} 
		echo "<div class='col-md-12 margin-top-15 margin-bottom-5'>";
        include "includes/listas/lista.Paginacao.php";
        echo "</div>";
	}else{
?>
<div class="col-md-12">
	<div class="col-md-12 alert alert-warning margin-bottom-30 text-align-center">
        <p class="text-uppercase font-color-silver-dark font-size-13 font-weight-800 margin-bottom-0">
            Nenhum registro encontrado!
        </p>
    </div>
</div>
<?php
	}
?>