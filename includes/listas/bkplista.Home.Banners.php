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
    <a href="https://www.imoveisrcosta.com.br/imoveis/1/venda">
        <div class="banner_img_desktop">
            <img 
                src="https://www.imoveisrcosta.com.br/Cover11.webp" 
                class="img-fluid"
                alt="Seu novo endereço está aqui :)"
            >
        </div>
        <div class="banner_img_mobile">
            <img 
                src="https://www.imoveisrcosta.com.br/Cover11.webp" 
                class="img-fluid"
                alt="Seu novo endereço está aqui :)"
            >
        </div>
    </a> 
</div>
<?php
	} 
	}else{
?>
<div class="carousel-item active"> 
    <div class="banner_img_desktop">
        <img 
            src="https://www.imoveisrcosta.com.br/Cover11.webp" 
            class="d-block mx-auto img-fluid"
            alt="Banner Rotativo"
        >
    </div>
    <div class="banner_img_mobile">
        <img 
            src="https://www.imoveisrcosta.com.br/Cover11.webp" 
            class="d-block mx-auto img-fluid"
            alt="Banner Rotativo"
        >
    </div>
</div>
<?php
	}
?>