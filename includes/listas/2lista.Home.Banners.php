<?php
	$sql = mysqli_query($link, "SELECT * FROM tb_banners WHERE status='S' ORDER BY id_ordem ASC, id DESC");
	$total = mysqli_num_rows($sql);  
	if ($total>0) 
	{ 
		for ($i = 0; $i < $total; $i++) 
		{ 
			$dados = mysqli_fetch_array($sql);
			
			if (($i%100)==0) {
				$classe = "active"; 
			}else{ 
				$classe = "";
			}
?>
<div class="carousel-item <?php echo $classe;?>">
    <a href="<?php echo $dados['link_banner'];?>">
        <div class="banner_img_desktop">
            <img 
                src="https://imoveisrcosta.com.br/thumbnail%20copiar.webp" 
                class="img-fluid"
                alt="<?php echo utf8_encode($dados['nome']);?>"
            >
        </div>

    </a> 
</div>
<?php
	} 
	}else{
?>

</div>
<?php
	}
?>