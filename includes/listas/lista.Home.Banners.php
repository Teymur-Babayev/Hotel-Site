<?php
// URL da imagem do banner no seu servidor
$urlBanner = '/cache/Cover11.webp';

// Link para onde o banner deve redirecionar
$linkBanner = 'https://www.imoveisroberta.com.br/imoveis/1/';
?>

<div class="carousel-item active">
    <a href="<?php echo $linkBanner; ?>" loading="eager">
        <div class="banner_img_desktop" loading="eager">
            <img src="<?php echo $urlBanner; ?>" class="d-block mx-auto img-fluid" alt="Banner Rotativo" loading="eager">
        </div>
        <div class="banner_img_mobile">
            <img src="<?php echo $urlBanner; ?>" class="d-block mx-auto img-fluid" alt="Banner Rotativo" loading="eager">
        </div>
    </a>
</div>