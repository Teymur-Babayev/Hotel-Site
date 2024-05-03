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
    <a href="https://www.imoveisroberta.com.br/imoveis/1/vendapagina">
        <div class="banner_img_desktop">
           <img 
    src="https://static.imoveisroberta.com.br/img/Cover11.webp" 
    class="img-fluid" 
    loading="eager" 
    importance="high"
    alt="Seu novo endereço está aqui :)"
    style="width: 100%; height: auto;"
>
        </div>
        <div class="banner_img_mobile">
           <img 
    src="https://static.imoveisroberta.com.br/img/Cover11.webp" 
    class="img-fluid" 
    loading="eager" 
    importance="high"
    alt="Seu novo endereço está aqui :)"
    style="width: 100%; height: auto;"
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
    src="https://static.imoveisroberta.com.br/img/Cover11.webp" 
    class="img-fluid" 
    loading="eager" 
    importance="high"
    alt="Seu novo endereço está aqui :)"
    style="width: 100%; height: auto;"
>
    </div>
    <div class="banner_img_mobile">
        <img 
            src="https://static.imoveisroberta.com.br/img/Cover11.webp" 
            class="d-block mx-auto img-fluid" loading="eager" importance="high"
            alt="Banner Rotativo"
        >
    </div>
</div>
<?php
	}
?>