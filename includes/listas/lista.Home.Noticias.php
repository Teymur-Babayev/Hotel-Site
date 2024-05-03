<?php
	$sql = mysqli_query($link, "SELECT * FROM tb_noticias WHERE status='S' ".$_condicao." ORDER BY ".$_ordenacao." LIMIT ".$_quantidade."");
	$total = mysqli_num_rows($sql);  
	if ($total>0) 
	{ 
		// SE O TOTAL DE RESULTADOS FOR MENOR QUE 3 ELE EXIBE EM GRID, SE NÃO EXIBE CARROUSSEL
		if($_carroussel_status == "1"){
			if ($total>3) 
			{ 
				echo "<div class='owl-carousel owl-theme home-noticias'>";
			}else{
				echo "<div class='row'>";
			}
		}else{
			echo "<div class='row'>";
		}
		
		for ($i = 0; $i < $total; $i++) 
		{ 
		
		$dados = mysqli_fetch_array($sql);

?>
<div class="<?php if($_carroussel_status == "1"){ if ($total>3){ echo "item margin-bottom-10"; }else{ echo "col-md-4 margin-bottom-30";} }else{  echo "col-md-4 margin-bottom-30";}?>"> 
    <div class="col-md-12">
    	<div class="row c-card-imovel padding-0">
        	<div class="col-md-12 padding-0 img-effect">
                <a href="<?php echo $_linkCompleto;?>/noticia/<?php echo $dados['id'];?>/<?php echo $dados['url_amigavel'];?>" aria-label="Blog">
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
		echo "</div>";
	}else{
?>
<div class="col-md-12 alert alert-warning margin-bottom-30 text-align-center">
    <p class="text-uppercase font-color-silver-dark font-size-13 font-weight-800 margin-bottom-0">
        Nenhum registro encontrado!
    </p>
</div>
<?php
	}
?>