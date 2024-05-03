<?php
	// Arquivos de Configuração
	include "../../../adm_gerencia/includes/Conexao.php";
	
	// Define que o arquivo terá a codificação de saída no formato CSS
	header("Content-type: text/css");
	
	if(empty(LOGO_FOTOS)){
		define('MARCA_D_AGUA', $_linkCompleto.'/assets/template/img/marca-dagua.png');
	}else{
		define('MARCA_D_AGUA', $_linkCompleto.'/assets/uploads/tb_configuracao/1/'.LOGO_FOTOS);
	}
	
	// Converte a cor para Icones
	$_pega_cor_secundaria     = COR_SECUNDARIA;
	$_converte_cor_secundaria = str_replace("#","",$_pega_cor_secundaria);
	$_cor_secundaria_convertida = $_converte_cor_secundaria;
?>

<style>
	.img-marca-dagua{
		max-width:150px;
		max-height:70px	
	}
	
	.grid_img{
		position:relative;
	}
	.grid_img_mask{
		position:absolute; 
		width:100%; 
		height:100%;
		border-radius:5px; 
		left:0; 
		top:0;
		z-index:991;
		background:url("../img/mascara-fotos.png") center center no-repeat;
		opacity:0
	}
	.grid_img_mark{
		position:absolute;
		width:90%;
		height:90%;
		right:5%;
		bottom:5%;
		z-index:992;
		background:url('<?php echo MARCA_D_AGUA;?>') right bottom no-repeat;
		background-size:120px auto;
		opacity:0.4
	}
	
	a,
	a:link,
	a:active,
	a:visited{
		color:<?php echo COR_PRIMARIA;?>;
	}
	
	.cor_links,
	.cor_links a,
	.cor_links a:link,
	.cor_links a:active,
	.cor_links a:visited,
	.cor_links a:focus{
		color:<?php echo COR_PRIMARIA;?>;
	}
	
	.cor_links a:hover{
		color:<?php echo COR_SECUNDARIA;?>
	}
	
	.cor_links_categorias a:hover{
		color:<?php echo COR_PRIMARIA;?> !important
	}
	
	.cor_links_topo a:hover{
		color:<?php echo COR_SECUNDARIA;?>
	}
	
	label[for="wa_toggle"]{
		background: <?php echo COR_SECUNDARIA;?> url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'%3E%3Cpath fill='%23ffffff' d='M532 386.2c27.5-27.1 44-61.1 44-98.2 0-80-76.5-146.1-176.2-157.9C368.3 72.5 294.3 32 208 32 93.1 32 0 103.6 0 192c0 37 16.5 71 44 98.2-15.3 30.7-37.3 54.5-37.7 54.9-6.3 6.7-8.1 16.5-4.4 25 3.6 8.5 12 14 21.2 14 53.5 0 96.7-20.2 125.2-38.8 9.2 2.1 18.7 3.7 28.4 4.9C208.1 407.6 281.8 448 368 448c20.8 0 40.8-2.4 59.8-6.8C456.3 459.7 499.4 480 553 480c9.2 0 17.5-5.5 21.2-14 3.6-8.5 1.9-18.3-4.4-25-.4-.3-22.5-24.1-37.8-54.8zm-392.8-92.3L122.1 305c-14.1 9.1-28.5 16.3-43.1 21.4 2.7-4.7 5.4-9.7 8-14.8l15.5-31.1L77.7 256C64.2 242.6 48 220.7 48 192c0-60.7 73.3-112 160-112s160 51.3 160 112-73.3 112-160 112c-16.5 0-33-1.9-49-5.6l-19.8-4.5zM498.3 352l-24.7 24.4 15.5 31.1c2.6 5.1 5.3 10.1 8 14.8-14.6-5.1-29-12.3-43.1-21.4l-17.1-11.1-19.9 4.6c-16 3.7-32.5 5.6-49 5.6-54 0-102.2-20.1-131.3-49.7C338 339.5 416 272.9 416 192c0-3.4-.4-6.7-.7-10C479.7 196.5 528 238.8 528 288c0 28.7-16.2 50.6-29.7 64z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center / 50%; 
		box-shadow: 0 0 2px rgb(50 50 50 / 40%); 
		z-index:999
	}
	
	.wa_head{
		background:<?php echo COR_PRIMARIA;?> !important; 
		color:<?php echo COR_SECUNDARIA;?> !important
	}
	
	#menu-accessibility .chBut {
		background: <?php echo COR_SECUNDARIA;?>; 
		border-color: <?php echo COR_SECUNDARIA;?>;
	}
	
	.chBody a:hover{
		color:<?php echo COR_SECUNDARIA;?> !important
	}
	
	.navbar-nav .nav-link {
		color:<?php echo COR_PRIMARIA;?>;
	}
	
	.navbar-nav .nav-link:hover{
		color:<?php echo COR_SECUNDARIA;?>;
	}
	
	.nav-link_i{
		color:<?php echo COR_SECUNDARIA;?>
	}
	.navbar-nav .nav-link:hover{
		color:<?php echo COR_SECUNDARIA;?>;
	}
	
	.dropdown-item:focus, .dropdown-item:hover {
		background:<?php echo COR_PRIMARIA;?>;
	}
	
	.menu-social-top > li > a,
	.menu-social-top > li > a:link,
	.menu-social-top > li > a:active,
	.menu-social-top > li > a:visited,
	.menu-social-top > li > a:focus{
		color:<?php echo COR_SECUNDARIA;?>;
	}
	
	.menu-social-bottom > li > a,
	.menu-social-bottom > li > a:link,
	.menu-social-bottom > li > a:active,
	.menu-social-bottom > li > a:visited,
	.menu-social-bottom > li > a:focus{
		background:<?php echo COR_SECUNDARIA;?>;
	}
	
	.menu-social-bottom > li > a:hover{
		color:<?php echo COR_PRIMARIA;?>;
	}
	
	.botoes-primaria-to-white,
	.botoes-primaria-to-white a,
	.botoes-primaria-to-white a:link,
	.botoes-primaria-to-white a:active,
	.botoes-primaria-to-white a:visited{
		background:<?php echo COR_PRIMARIA;?>;
		color:#fff !important;
	}
	
	.botoes-primaria-to-white:hover,
	.botoes-primaria-to-white a:hover{
		color:<?php echo COR_PRIMARIA;?> !important
	}
	
	.botoes-primaria-to-secundaria,
	.botoes-primaria-to-secundaria a,
	.botoes-primaria-to-secundaria a:link,
	.botoes-primaria-to-secundaria a:active,
	.botoes-primaria-to-secundaria a:visited{
		background:<?php echo COR_SECUNDARIA;?>;
	}
	
	.botoes-primaria-to-secundaria:hover,
	.botoes-primaria-to-secundaria a:hover{
		background:<?php echo COR_PRIMARIA;?>;
		color:<?php echo COR_SECUNDARIA;?> !important
	}
	
	.botoes-secundaria-to-white,
	.botoes-secundaria-to-white a,
	.botoes-secundaria-to-white a:link,
	.botoes-secundaria-to-white a:active,
	.botoes-secundaria-to-white a:visited{
		background:<?php echo COR_SECUNDARIA;?>;
		color:#fff !important;
	}
	
	.botoes-secundaria-to-white:hover,
	.botoes-secundaria-to-white a:hover{
		color:<?php echo COR_SECUNDARIA;?> !important
	}
	
	.botoes-secundaria-to-primaria,
	.botoes-secundaria-to-primaria a,
	.botoes-secundaria-to-primaria a:link,
	.botoes-secundaria-to-primaria a:active,
	.botoes-secundaria-to-primaria a:visited{
		background:<?php echo COR_PRIMARIA;?>;
		color:<?php echo COR_SECUNDARIA;?> !important;
	}
	
	.botoes-secundaria-to-primaria:hover,
	.botoes-secundaria-to-primaria a:hover{
		background:<?php echo COR_SECUNDARIA;?>;
	}
	
	.page-link:hover {
		background-color: <?php echo COR_PRIMARIA;?>;
		border-color: <?php echo COR_PRIMARIA;?>;
		color:<?php echo COR_SECUNDARIA;?> !important
	}
	
	.page-item > .page-link:hover > span > i{
		color:<?php echo COR_SECUNDARIA;?>
	}
	
	.page-item.active .page-link {
		background-color: <?php echo COR_SECUNDARIA;?>;
		border-color: <?php echo COR_SECUNDARIA;?>;
	}
	
	.page-link:hover {
		color:<?php echo COR_SECUNDARIA;?> !important
	}
	
	.albuns_content_absolute_quantidade{
		background:<?php echo COR_SECUNDARIA;?>;
	}
	
	.albuns_content_absolute_botao{
		border-color: <?php echo COR_SECUNDARIA;?> !important;
	}
	
	.font-color-primaria{
		color:<?php echo COR_PRIMARIA;?> !important;
	}
	.font-color-secundaria{
		color:<?php echo COR_SECUNDARIA;?> !important;
	}
	
	.border-color-primaria{
		border-color:<?php echo COR_PRIMARIA;?> !important
	}
	.border-color-secundaria{
		border-color:<?php echo COR_SECUNDARIA;?> !important
	}
	
	.background-color-primaria{
		background:<?php echo COR_PRIMARIA;?> !important
	}
	.background-color-secundaria{
		background:<?php echo COR_SECUNDARIA;?> !important
	}
	
	.owl-theme .owl-nav .owl-prev:hover,
	.owl-theme .owl-nav .owl-next:hover{
		background:<?php echo COR_PRIMARIA;?> !important;
		color:<?php echo COR_SECUNDARIA;?> !important;
	}
	
	.owl-theme .owl-nav .owl-prev,
	.owl-theme .owl-nav .owl-next{
		background:<?php echo COR_SECUNDARIA;?> !important;
	}
	
	.icones_imoveis{
		width:20px;
		height:20px;
		margin:0px;
		padding:0px;
		display:inline-block
	}
	
	.icone_banheiro{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M368 48c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16H16C7.2 0 0 7.2 0 16v16c0 8.8 7.2 16 16 16h16v156.7C11.8 214.8 0 226.9 0 240c0 67.2 34.6 126.2 86.8 160.5l-21.4 70.2C59.1 491.2 74.5 512 96 512h192c21.5 0 36.9-20.8 30.6-41.3l-21.4-70.2C349.4 366.2 384 307.2 384 240c0-13.1-11.8-25.2-32-35.3V48h16zM80 72c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H88c-4.4 0-8-3.6-8-8V72zm112 200c-77.1 0-139.6-14.3-139.6-32s62.5-32 139.6-32 139.6 14.3 139.6 32-62.5 32-139.6 32z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_closet{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M631.2 96.5L436.5 0C416.4 27.8 371.9 47.2 320 47.2S223.6 27.8 203.5 0L8.8 96.5c-7.9 4-11.1 13.6-7.2 21.5l57.2 114.5c4 7.9 13.6 11.1 21.5 7.2l56.6-27.7c10.6-5.2 23 2.5 23 14.4V480c0 17.7 14.3 32 32 32h256c17.7 0 32-14.3 32-32V226.3c0-11.8 12.4-19.6 23-14.4l56.6 27.7c7.9 4 17.5.8 21.5-7.2L638.3 118c4-7.9.8-17.6-7.1-21.5z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_sala{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M160 224v64h320v-64c0-35.3 28.7-64 64-64h32c0-53-43-96-96-96H160c-53 0-96 43-96 96h32c35.3 0 64 28.7 64 64zm416-32h-32c-17.7 0-32 14.3-32 32v96H128v-96c0-17.7-14.3-32-32-32H64c-35.3 0-64 28.7-64 64 0 23.6 13 44 32 55.1V432c0 8.8 7.2 16 16 16h64c8.8 0 16-7.2 16-16v-16h384v16c0 8.8 7.2 16 16 16h64c8.8 0 16-7.2 16-16V311.1c19-11.1 32-31.5 32-55.1 0-35.3-28.7-64-64-64z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_despensa{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M624 448H512V50.8C512 22.78 490.47 0 464 0H175.99c-26.47 0-48 22.78-48 50.8V448H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h608c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zM415.99 288c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32c.01 17.67-14.32 32-32 32z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_bar{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M639.4 433.6c-8.4-20.4-31.8-30.1-52.2-21.6l-22.1 9.2-38.7-101.9c47.9-35 64.8-100.3 34.5-152.8L474.3 16c-8-13.9-25.1-19.7-40-13.6L320 49.8 205.7 2.4c-14.9-6.2-32-.3-40 13.6L79.1 166.5C48.9 219 65.7 284.3 113.6 319.2L74.9 421.1l-22.1-9.2c-20.4-8.5-43.7 1.2-52.2 21.6-1.7 4.1.2 8.8 4.3 10.5l162.3 67.4c4.1 1.7 8.7-.2 10.4-4.3 8.4-20.4-1.2-43.8-21.6-52.3l-22.1-9.2L173.3 342c4.4.5 8.8 1.3 13.1 1.3 51.7 0 99.4-33.1 113.4-85.3l20.2-75.4 20.2 75.4c14 52.2 61.7 85.3 113.4 85.3 4.3 0 8.7-.8 13.1-1.3L506 445.6l-22.1 9.2c-20.4 8.5-30.1 31.9-21.6 52.3 1.7 4.1 6.4 6 10.4 4.3L635.1 444c4-1.7 6-6.3 4.3-10.4zM275.9 162.1l-112.1-46.5 36.5-63.4 94.5 39.2-18.9 70.7zm88.2 0l-18.9-70.7 94.5-39.2 36.5 63.4-112.1 46.5z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_cozinha{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M207.9 15.2c.8 4.7 16.1 94.5 16.1 128.8 0 52.3-27.8 89.6-68.9 104.6L168 486.7c.7 13.7-10.2 25.3-24 25.3H80c-13.7 0-24.7-11.5-24-25.3l12.9-238.1C27.7 233.6 0 196.2 0 144 0 109.6 15.3 19.9 16.1 15.2 19.3-5.1 61.4-5.4 64 16.3v141.2c1.3 3.4 15.1 3.2 16 0 1.4-25.3 7.9-139.2 8-141.8 3.3-20.8 44.7-20.8 47.9 0 .2 2.7 6.6 116.5 8 141.8.9 3.2 14.8 3.4 16 0V16.3c2.6-21.6 44.8-21.4 48-1.1zm119.2 285.7l-15 185.1c-1.2 14 9.9 26 23.9 26h56c13.3 0 24-10.7 24-24V24c0-13.2-10.7-24-24-24-82.5 0-221.4 178.5-64.9 300.9z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_escritorio{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M272,288H208a16,16,0,0,1-16-16V208a16,16,0,0,1,16-16h64a16,16,0,0,1,16,16v37.12C299.11,232.24,315,224,332.8,224H469.74l6.65-7.53A16.51,16.51,0,0,0,480,207a16.31,16.31,0,0,0-4.75-10.61L416,144V48a16,16,0,0,0-16-16H368a16,16,0,0,0-16,16V87.3L263.5,8.92C258,4,247.45,0,240.05,0s-17.93,4-23.47,8.92L4.78,196.42A16.15,16.15,0,0,0,0,207a16.4,16.4,0,0,0,3.55,9.39L22.34,237.7A16.22,16.22,0,0,0,33,242.48,16.51,16.51,0,0,0,42.34,239L64,219.88V384a32,32,0,0,0,32,32H272ZM629.33,448H592V288c0-17.67-12.89-32-28.8-32H332.8c-15.91,0-28.8,14.33-28.8,32V448H266.67A10.67,10.67,0,0,0,256,458.67v10.66A42.82,42.82,0,0,0,298.6,512H597.4A42.82,42.82,0,0,0,640,469.33V458.67A10.67,10.67,0,0,0,629.33,448ZM544,448H352V304H544Z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_area_servico{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M32,416a96,96,0,0,0,96,96H384a96,96,0,0,0,96-96V384H32ZM496,288H400V256h64a16,16,0,0,0,16-16V224a16,16,0,0,0-16-16H384a32,32,0,0,0-32,32v48H288V96a32,32,0,0,1,64,0v16a16,16,0,0,0,16,16h32a16,16,0,0,0,16-16V96A96.16,96.16,0,0,0,300.87,1.86C255.29,10.71,224,53.36,224,99.79V288H160V240a32,32,0,0,0-32-32H48a16,16,0,0,0-16,16v16a16,16,0,0,0,16,16h64v32H16A16,16,0,0,0,0,304v32a16,16,0,0,0,16,16H496a16,16,0,0,0,16-16V304A16,16,0,0,0,496,288Z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_lareira{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M323.56 51.2c-20.8 19.3-39.58 39.59-56.22 59.97C240.08 73.62 206.28 35.53 168 0 69.74 91.17 0 209.96 0 281.6 0 408.85 100.29 512 224 512s224-103.15 224-230.4c0-53.27-51.98-163.14-124.44-230.4zm-19.47 340.65C282.43 407.01 255.72 416 226.86 416 154.71 416 96 368.26 96 290.75c0-38.61 24.31-72.63 72.79-130.75 6.93 7.98 98.83 125.34 98.83 125.34l58.63-66.88c4.14 6.85 7.91 13.55 11.27 19.97 27.35 52.19 15.81 118.97-33.43 153.42z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}

	.icone_varanda{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M494.2 221.9l-59.8-40.5 13.7-71c2.6-13.2-1.6-26.8-11.1-36.4-9.6-9.5-23.2-13.7-36.2-11.1l-70.9 13.7-40.4-59.9c-15.1-22.3-51.9-22.3-67 0l-40.4 59.9-70.8-13.7C98 60.4 84.5 64.5 75 74.1c-9.5 9.6-13.7 23.1-11.1 36.3l13.7 71-59.8 40.5C6.6 229.5 0 242 0 255.5s6.7 26 17.8 33.5l59.8 40.5-13.7 71c-2.6 13.2 1.6 26.8 11.1 36.3 9.5 9.5 22.9 13.7 36.3 11.1l70.8-13.7 40.4 59.9C230 505.3 242.6 512 256 512s26-6.7 33.5-17.8l40.4-59.9 70.9 13.7c13.4 2.7 26.8-1.6 36.3-11.1 9.5-9.5 13.6-23.1 11.1-36.3l-13.7-71 59.8-40.5c11.1-7.5 17.8-20.1 17.8-33.5-.1-13.6-6.7-26.1-17.9-33.7zm-112.9 85.6l17.6 91.2-91-17.6L256 458l-51.9-77-90.9 17.6 17.6-91.2-76.8-52 76.8-52-17.6-91.2 91 17.6L256 53l51.9 76.9 91-17.6-17.6 91.1 76.8 52-76.8 52.1zM256 152c-57.3 0-104 46.7-104 104s46.7 104 104 104 104-46.7 104-104-46.7-104-104-104zm0 160c-30.9 0-56-25.1-56-56s25.1-56 56-56 56 25.1 56 56-25.1 56-56 56z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.icone_lavanderia{
		background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cpath fill='%23<?php echo $_cor_secundaria_convertida;?>' d='M416,192a95.42,95.42,0,0,1-30.94,70.21A95.8,95.8,0,0,1,352,448H160a96,96,0,0,1,0-192h88.91A95.3,95.3,0,0,1,224,192H96A96,96,0,0,0,0,288V416a96,96,0,0,0,96,96H416a96,96,0,0,0,96-96V288A96,96,0,0,0,416,192Zm-96,64a64,64,0,1,0-64-64A64,64,0,0,0,320,256ZM208,96a48,48,0,1,0-48-48A48,48,0,0,0,208,96ZM384,64a32,32,0,1,0-32-32A32,32,0,0,0,384,64ZM160,288a64,64,0,0,0,0,128H352a64,64,0,0,0,0-128Z'%3E%3C/path%3E%3C/svg%3E") no-repeat center center; 
	}
	
	.ribbon-wrapper-green {
	  width: 155px;
	  height: 155px;
	  overflow: hidden;
	  position: absolute;
	  top: -5px;
	  right: -5px;
	}
	
	.ribbon-green {
	  font-size: 12px;
	  color: #FFF !important;
	  text-align: center;
	  -webkit-transform: rotate(45deg);
	  -moz-transform:    rotate(45deg);
	  -ms-transform:     rotate(45deg);
	  -o-transform:      rotate(45deg);
	  position: relative;
	  padding: 4px 0;
	  left: 40px;
	  top: 28px;
	  width: 145px;
	  background-color: <?php echo COR_SECUNDARIA;?> !important;
	  color: #FFF;
	}
	
	.ribbon-green:before, .ribbon-green:after {
	  content: "";
	  border-top:   3px solid transparent;   
	  border-left:  3px solid transparent;
	  border-right: 3px solid transparent;
	  position:absolute;
	  bottom: -3px;
	}
	
	.ribbon-green:before {
	  left: 0;
	}
	.ribbon-green:after {
	  right: 0;
	}
	
</style>