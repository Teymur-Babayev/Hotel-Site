<?php
	$sql = mysqli_query($link, "SELECT * FROM tb_imoveis_fotos WHERE ".$_condicao." ORDER BY ".$_ordenacao." LIMIT ".$_quantidade."");
	$total = mysqli_num_rows($sql);  
	if ($total>0) 
	{ 
		
		
		for ($i = 0; $i < $total; $i++) 
		{ 
		
		$dados = mysqli_fetch_array($sql);

?>
<div class="item"> 
    <div class="col-md-12">
    	<div class="row c-card-imovel padding-0">
        	<div class="col-md-12 padding-0 id-imovel-fotos img-effect">
                <div class="grid_img">
<img 
    src="<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=620px&imagem=assets/uploads/tb_imoveis_anuncios/<?php echo $_id_imovel ."/". $_imagem_imovel;?>"
    class="img-fluid"
    alt="Foto do imóvel"
    title="Foto do imóvel"
>
                    <div class="grid_img_mask"></div>
                    <div class="grid_img_mark"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	} 
	}else{
?>
<?php
	}
?>