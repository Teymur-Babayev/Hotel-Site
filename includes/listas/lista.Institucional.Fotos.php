<?php
	$sql = mysqli_query($link, "SELECT * FROM tb_institucional_fotos WHERE ".$_condicao." ORDER BY ".$_ordenacao." LIMIT ".$_quantidade."");
	$total = mysqli_num_rows($sql);  
	if ($total>0) 
	{ 
		
		echo "<section class='background-color-white padding-top-70 padding-bottom-50'>";
		echo "<div class='container'>";
    	echo "<div class='row'>";
        echo "<div class='col-md-12'>";
		
		// SE O TOTAL DE RESULTADOS FOR MENOR QUE 3 ELE EXIBE EM GRID, SE NÃO EXIBE CARROUSSEL
		if($_carroussel_status == "1"){
			if ($total>4) 
			{ 
				echo "<div class='owl-carousel owl-theme institucional-fotos'>";
			}else{
				echo "<div class='row center-xs middle-xs'>";
			}
		}else{
			echo "<div class='row center-xs middle-xs'>";
		}
		
		for ($i = 0; $i < $total; $i++) 
		{ 
		
		$dados = mysqli_fetch_array($sql);

?>
<div class="<?php if($_carroussel_status == "1"){ if ($total>4){ echo "item margin-bottom-10"; }else{ echo "col-md-3 margin-bottom-30";} }else{  echo "col-md-3 margin-bottom-30";}?>"> 
    <div class="col-md-12">
    	<div class="row c-card-imovel padding-0">
        	<div class="col-md-12 padding-0 img-effect">
                <a 
                    href="<?php echo $_linkCompleto;?>/assets/uploads/tb_institucional/1/<?php echo $dados['foto'];?>" 
                    data-toggle="lightbox" 
                    data-gallery="example-gallery"
                >
                    <img 
                        src="<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=650px&imagem=assets/uploads/tb_institucional/1/<?php echo $dados['foto'];?>"
                        class="img-fluid"
                        alt="Institucional
			title="Institucional"
                    >
                </a>
            </div>
        </div>
    </div>
</div>
<?php
	} 
		echo "</div>";
		
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</section>";
	}else{
?>
<?php
	}
?>