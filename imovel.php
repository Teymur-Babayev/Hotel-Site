<?php
// Arquivos de Configuração
include_once("adm_gerencia/includes/Conexao.php");

// Verifica se a conexão é segura ou não
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";


$frase1 = [
    "Conheça este incrível imóvel em",
    "Descubra seu próximo lar em",
    "Venha morar no melhor de",
    "Aproveite esta oportunidade única em",
    "Imagine-se vivendo em",
    "Explore a exclusividade de morar em",
    "Realize seu sonho com este imóvel em",
    "Sua chance de morar em",
    "Excelente opção para viver em",
    "Ideal para quem busca conforto em",
    "Perfeito para sua família em",
    "A melhor escolha em",
    "Viva com estilo e comodidade em",
    "Oportunidade imperdível em",
    "Conforto e estilo esperam por você em",
    "Um excelente local para se viver: ",
    "O lugar ideal para sua família em",
    "Descubra a beleza de morar em",
    "Garanta seu novo lar em",
    "Seu próximo destino é morar em"
];

// Frases para a segunda parte da descrição
$frase2 = [
    "Agende uma visita e surpreenda-se.",
    "Entre em contato para mais informações.",
    "Visite e faça sua oferta.",
    "Não perca esta chance única.",
    "Marque uma visita e conheça seu novo lar.",
    "Fale conosco e saiba mais.",
    "Confira de perto essa oportunidade.",
    "Descubra mais sobre este imóvel.",
    "Realize uma visita sem compromisso.",
    "Faça sua proposta agora mesmo.",
    "Explore todas as possibilidades deste lugar.",
    "Converse com um de nossos corretores.",
    "Não deixe esta oportunidade passar.",
    "Venha conhecer e se apaixonar.",
    "Aproveite esta chance de ouro.",
    "Consulte-nos para obter detalhes.",
    "Verifique pessoalmente suas vantagens.",
    "Ligue e agende sua visita!",
    "Esperamos seu contato para mais detalhes.",
    "Deixe-se encantar por este local."
];



    // Seleção aleatória de frases
    $selecionaFrase1 = $frase1[array_rand($frase1)];
    $selecionaFrase2 = $frase2[array_rand($frase2)];

	

$meta_description = $_nome_imovel . ". $selecionaFrase1	." . $_endereco_completo_formatado . ". " . $_tipo . " para " . $_transacao . " por apenas " . $_preco_imovel . ",  " . $selecionaFrase2;


// Monta o URL completo
$fullUrl = $scheme . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Captura o nome amigável da URL
$nomeUrlAmigavel = isset($_GET['nomeAmigavel']) ? $_GET['nomeAmigavel'] : '';
$meta_description_file = "meta_descriptions/{$nomeUrlAmigavel}.txt";

if (!empty($nomeUrlAmigavel)) {
    if (file_exists($meta_description_file)) {
        $meta_description = file_get_contents($meta_description_file);
    } else {
        // Garanta que as variáveis estão definidas e capturadas corretamente antes de gerar a meta description
        $selecionaFrase1 = $frase1[array_rand($frase1)];
        $selecionaFrase2 = $frase2[array_rand($frase2)];
        
        // Aqui, você concatena as variáveis com as frases selecionadas
        $meta_description = "{$_nome_imovel}. {$selecionaFrase1}. {$_endereco_completo_formatado}. {$_tipo} para {$_transacao} por apenas {$_preco_imovel}, {$selecionaFrase2}";

        // Grava a meta description no arquivo
        file_put_contents($meta_description_file, $meta_description);
    }
}

if (!empty($nomeUrlAmigavel)) {
    // Consulta Base Imóveis com nome amigável
    $_sqlImovel = mysqli_query($link, "SELECT * FROM tb_imoveis_anuncios WHERE url_amigavel='" . mysqli_real_escape_string($link, $nomeUrlAmigavel) . "'");
    $_dadosImovel = mysqli_fetch_array($_sqlImovel, MYSQLI_ASSOC);

    if (!$_dadosImovel) {
        // Define o cabeçalho HTTP para 404 Not Found
        header("HTTP/1.1 404 Not Found");

        // Redireciona para a página de erro 404 personalizada
        header("Location: https://www.imoveisroberta.com.br/");
        exit; // Interrompe a execução do script
    } 

}
	
	// Consulta Base Transacao
	$_sqlTransacao   = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE id='".$_dadosImovel['id_transacao']."'");
	$_dadosTransacao = mysqli_fetch_array($_sqlTransacao, MYSQLI_ASSOC);
	
	$_id_transacao = $_dadosTransacao['id'];
	
	// Consulta Base Finalidade
	$_sqlFinalidade   = mysqli_query($link, "SELECT * FROM tb_imoveis_finalidade WHERE id='".$_dadosImovel['id_finalidade']."'");
	$_dadosFinalidade = mysqli_fetch_array($_sqlFinalidade, MYSQLI_ASSOC);
	
	$_id_finalidade = $_dadosFinalidade['id'];
	
	// Consulta Base Tipos
	$_sqlTipo   = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE id='".$_dadosImovel['id_tipo']."'");
	$_dadosTipo = mysqli_fetch_array($_sqlTipo, MYSQLI_ASSOC);
	
	$_id_tipo = $_dadosTipo['id'];
	
	// Consulta Base Cidades
	$_sqlCidade   = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE id='".$_dadosImovel['id_cidade']."'");
	$_dadosCidade = mysqli_fetch_array($_sqlCidade, MYSQLI_ASSOC);
	
	$_id_cidade = $_dadosCidade['id'];
	
	// Consulta Base Bairros
	$_sqlBairro   = mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE id='".$_dadosImovel['id_bairro']."'");
	$_dadosBairro = mysqli_fetch_array($_sqlBairro, MYSQLI_ASSOC);
	
	$_id_bairro = $_dadosBairro['id'];


	

// Coleta informações
$_nome_imovel = utf8_encode($_dadosImovel['nome']); // Certifique-se que está em UTF-8
$_bairro_imovel = utf8_encode($_dadosBairro['nome']); // Nome do bairro
$_cidade_imovel = utf8_encode($_dadosCidade['nome']); // Nome da cidade


// Criando frases para as keywords
$_keywords = [
    mb_strtolower($_nome_imovel, 'UTF-8'),
    "imóvel à venda no bairro " . mb_strtolower($_bairro_imovel, 'UTF-8'),
    "imóvel à venda na cidade " . mb_strtolower($_cidade_imovel, 'UTF-8'),
    "casa à venda em " . mb_strtolower($_cidade_imovel, 'UTF-8') . " " . mb_strtolower($_bairro_imovel, 'UTF-8'),
    "apartamento à venda em " . mb_strtolower($_bairro_imovel, 'UTF-8') . " " . mb_strtolower($_cidade_imovel, 'UTF-8'),
    "residencia à venda em " . mb_strtolower($_bairro_imovel, 'UTF-8') . " " . mb_strtolower($_cidade_imovel, 'UTF-8'),
    "imóvel à venda em " . mb_strtolower($_bairro_imovel, 'UTF-8') . " " . mb_strtolower($_cidade_imovel, 'UTF-8')
];

// Junta todas as frases em uma string única, separada por vírgulas
$_keywords_string = implode(", ", $_keywords);

// Codifica para HTML, garantindo correta exibição de caracteres especiais
$_keywords_html = htmlspecialchars($_keywords_string, ENT_QUOTES, 'UTF-8');

// Agora esta string pode ser usada na meta tag
define('META_SITE_KEYWORDS', $_keywords_html);	

	
	// Consulta Base Corretores
	$_sqlCorretores   = mysqli_query($link, "SELECT * FROM tb_imoveis_corretores WHERE id='".$_dadosImovel['id_corretor']."'");
	$_dadosCorretores = mysqli_fetch_array($_sqlCorretores, MYSQLI_ASSOC);
	
	$_id_corretor = $_dadosCorretores['id'];
	$_foto_corretor = $_dadosCorretores['foto'];
$_nome_corretor = utf8_encode($_dadosCorretores['nome']);
	$_creci_corretor = $_dadosCorretores['creci'];
	$_telefone_corretor = $_dadosCorretores['telefone'];
	$_celular_corretor = $_dadosCorretores['celular'];
	$_email_corretor = $_dadosCorretores['email'];
	
	// Dados do Imóvel
	$_transacao  = utf8_encode($_dadosTransacao['nome']);
	$_finalidade = utf8_encode($_dadosFinalidade['nome']);
	$_tipo       = utf8_encode($_dadosTipo['nome']);
	
	// Dados do Imóvel
	$_transacao  = utf8_encode($_dadosTransacao['nome']);
	$_finalidade = utf8_encode($_dadosFinalidade['nome']);
	$_tipo       = utf8_encode($_dadosTipo['nome']);
	
	$_id_imovel = $_dadosImovel['id'];
	
	$_referencia_imovel = utf8_encode($_dadosImovel['referencia']);
	$_nome_imovel = utf8_encode($_dadosImovel['nome']);
	
	$_imagem_imovel = $_dadosImovel['foto'];
	
	if(!empty($_dadosImovel['preco'])){
		$_preco_imovel = "R$ " . number_format($_dadosImovel['preco'], 2, ',', '.');
	}else{
		$_preco_imovel = "Consulte";
	}
	
	$_endereco_completo  = $_dadosImovel['endereco']."".$_dadosImovel['numero']." ".$_dadosBairro['nome'].", ".$_dadosCidade['nome']." ";
	$_endereco_completo .= $_dadosImovel['estado'];
	$_endereco_completo_formatado = utf8_encode($_endereco_completo);
	
	
	// Verifica se o usuário já visualizou o imóvel e grava a mesma no banco
	$ip_usuario  = $_SERVER["REMOTE_ADDR"];
	$id_registro = $_dadosImovel['id'];
	$data_atual  = date("Y-m-d H:i:s");
	
	$sql       = mysqli_query($link, "SELECT * FROM tb_imoveis_visitas WHERE ip='$ip_usuario' AND id_registro LIKE ('$_id_imovel')");  
	$resultado = mysqli_num_rows($sql);
	if($resultado == 0)
	{
		mysqli_query($link, "INSERT INTO tb_imoveis_visitas (ip, id_registro, data)VALUES('$ip_usuario','$_id_imovel','$data_atual')");
	}
	

// Dados Seo / Meta Tags
define('META_SITE_NAME', utf8_encode(NOME));
define('META_SITE_DESCRIPTION', $_nome_imovel. ' no '. $_endereco_completo_formatado. '. '. $_tipo. ' para '. $_transacao. ' por apenas '. $_preco_imovel. '. Entre em contato e agende uma visita.');
define('META_SITE_TITLE', mb_convert_case($_nome_imovel, MB_CASE_TITLE, "UTF-8"));
define('META_SITE_KEYWORDS', htmlspecialchars(implode(", ", $_keywords), ENT_QUOTES, 'UTF-8'));



	if(empty($_dadosImovel['foto'])){
		define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/template/img/img_compartilhamento.png');
	}else{
		define('META_SITE_IMAGE', $_linkCompleto.'/thumbnail.php?w=330px&h=330px&imagem=assets/uploads/tb_imoveis_anuncios/'.$_id_imovel.'/'.$_imagem_imovel);
	}
	
	define('META_SITE_LINK', $baseURL . '/imovel/' . $_dadosImovel['url_amigavel']);

?>
<!doctype html>
<html lang="pt">
<head>
<?php include "includes/include.Html.Headi.php";?>

    <style>
        .grid_img {
            position: relative;
            display: inline-block; 
        }

        .grid_img_watermark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://static.imoveisroberta.com.br/marcadagua.webp') center center / contain no-repeat;
            opacity: 0.4;
            pointer-events: none; 
            display: none; 
        }

        .grid_img:hover .grid_img_watermark {
            display: block; 
        }
    </style>
              <style>
        .butao {
            display: flex;
            justify-content: center;
            margin: 0;
        }

        .social-buttons {
            display: flex;
            flex-direction: column;
            gap: 50px;
        }

        .social-button {
            background-color: #037084;
            border: none;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: flex;
            align-items: center; 
        }
    </style>
<style>
#iconeFavorito.verde { color: green; }
#iconeFavorito.vermelho { color: red; }
#mensagemFavorito.vermelho { color: red; }
.vermelho { color: red; }
</style>
<style>
.mobile-break {
    display: inline; 
}

@media (max-width: 768px) { 
    .mobile-break {
        display: block; 
    }
}
</style>
<style>
    #valor_maximo, #valor_minimo {
        height: 39px; 
    }
</style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TS38FZKJ');</script>
<!-- End Google Tag Manager -->
</head>

<body>
<noscript><img height="1" width="1" alt="fbb" style="display:none"
  src="https://www.facebook.com/tr?id=745016227318705&ev=PageView&noscript=1"
/></noscript>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TS38FZKJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
s<div id="menu-accessibility">
	<?php include "includes/include.Painel.Acessibilidade.php";?>
</div>

<header>
	<?php include "includes/include.Top.Menu.php";?>
</header>

<section class="margin-content-section">
	<?php include "includes/include.BuscadorImovel.php";?>
</section>

<section class="background-color-white padding-top-70 padding-bottom-70" id="pagina-impressao">
	<div class="container">
    	<div class="row">
            <div class="col-md-12 text-align-center margin-bottom-20">
            	<h1 class="font-color-primaria font-weight-400 font-size-25 text-uppercase">
    <i class="fa fa-building-o font-color-secundaria"></i>
    <?php echo $_tipo; ?> à <?php echo $_transacao; ?>
    <span class="font-weight-800 font-color-secundaria mobile-break">
        no <?php echo $_endereco_completo_formatado; ?>
    </span>
</h1>
            </div>
        </div>
    	<div class="row text-align-left">
        	<div class="col-md-7">
                <div class="row">
                	<div class="col-md-12">
                    	<div class="owl-carousel owl-theme imoveis-fotos">
							<div class="item"> 
                                <div class="col-md-12">
                                    <div class="row c-card-imovel padding-0">
                                        <div class="col-md-12 padding-0 id-imovel-fotos img-effect">
                                            <div class="grid_img"> 
<div class="grid_img_watermark"></div>
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
								$_id_noticia = $_id_imovel;
								$_condicao   = "id_registro='".$_id_imovel."'";
								$_ordenacao  = "id_ordem ASC, id ASC";
								$_quantidade = "100"; 
								include "includes/listas/lista.Imoveis.Fotos.php";
							?>
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-align-center margin-top-10 margin-bottom-0">
                    	<div class="row">
          

                            <div class="col-md-6 margin-top-10 margin-bottom-10">
								<div class="row">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
			<div class="col-md-5">
            	<div class="col-md-12 c-card-detalhes" style="min-height:431px">
                	<div class="row">
                        <div class="col-md-12">
<?php
    // Referencia
    echo "<p class='font-weight-800 font-size-15 line-height-15 font-color-secundaria margin-bottom-5 acessibilidade'>";
    echo $_referencia_imovel;
    echo "</p>";

    // Nome com tag h1 mas usando classes de h3
// Define o título do imóvel com formatação de título
$_nome_imovel_formatado = mb_convert_case($_nome_imovel, MB_CASE_TITLE, "UTF-8");

// Exibe o nome do imóvel formatado dentro de uma tag h1 com classes específicas
echo "<h2 class='font-weight-800 font-size-18 text-uppercase line-height-28 font-color-silver-dark margin-bottom-15 h3'>" . $_nome_imovel_formatado . "</h2>";
?>
<span id="botaoFavorito" onclick="adicionarAosFavoritos(<?php echo $_id_imovel; ?>)" style="cursor: pointer; user-select: none;">
    <i id="iconeFavorito"></i> <span id="textoFavorito"></span>
</span>
<div id="mensagemFavorito" style="color: green; display: none; margin-top: 5px;"></div> <!-- Mensagem de feedback --><br><p>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 background-color-secundaria border-radius-5 margin-5">
                                    <p class="font-color-white font-size-13 line-height-14 padding-5 margin-0 text-uppercase">
                                        <?php echo $_transacao;?>
                                    </p>
                                </div>
                                <div class="col-md-6 background-color-primaria border-radius-5 margin-5">
                                    <p class="font-color-white font-size-13 line-height-14 padding-5 margin-0 text-uppercase">
                                        <?php echo $_tipo;?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 margin-top-20">
                            <?php
                                // Endereço
                                echo "<p class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0'>";
                               echo "LOCALIZAÇÃO";
echo "</p>";
echo "<p class='font-size-15 line-height-20 font-color-silver-dark margin-bottom-0 font-weight-600 acessibilidade'>";
echo "<i class='fas fa-map-marker-alt'></i>";
                                echo $_endereco_completo_formatado;
                                echo "</p>";
								
								// Ponto de Referência
								if(!empty($_dadosImovel['ponto_referencia'])){
									echo "<p class='font-size-14 line-height-22 font-color-silver-dark margin-bottom-0 acessibilidade'>";
									echo "(próximo ao " .utf8_encode($_dadosImovel['ponto_referencia']). ")";
									echo "</p>";
								}
								
								//Cep
								if(!empty($_dadosImovel['cep'])){
									echo "<p class='font-size-14 line-height-22 font-color-silver-dark margin-bottom-0 acessibilidade'>";
                                	echo "CEP: " .$_dadosImovel['cep'];
									echo "</p>";
								}
                            ?>
                        </div>
                        <div class="col-md-12 margin-top-20">
                            <?php
                                // Preço
                                echo "<p class='font-weight-800 font-size-28 line-height-28 font-color-secundaria margin-bottom-20'>";
                                echo $_preco_imovel;
                                echo "</p>";
                                
                                //Preço Iptu
                                if(!empty($_dadosImovel['preco_iptu'])){
                                    $_preco_iptu  = "<p class='font-weight-500 font-size-14 line-height-15 font-color-silver-dark margin-bottom-5 acessibilidade'>";
                                    $_preco_iptu .= "Iptu: ";
                                    $_preco_iptu .= "<span class='font-weight-800 font-size-15 font-color-secundaria acessibilidade'>";
                                    $_preco_iptu .= "R$ " . number_format($_dadosImovel['preco_iptu'], 2, ',', '.');
                                    $_preco_iptu .= "</span>";
                                    $_preco_iptu .= "</p>";
                                    echo $_preco_iptu;
                                }
                                
                                // Preço Condominio
                                if(!empty($_dadosImovel['preco_condominio'])){
                                    $_preco_condominio  = "<p class='font-weight-500 font-size-14 line-height-15 font-color-silver-dark margin-bottom-5 acessibilidade'>";
                                    $_preco_condominio .= "Condomínio: ";
                                    $_preco_condominio .= "<span class='font-weight-800 font-size-15 font-color-secundaria acessibilidade'>";
                                    $_preco_condominio .= "R$ " . number_format($_dadosImovel['preco_condominio'], 2, ',', '.');
                                    $_preco_condominio .= "</span>";
                                    $_preco_condominio .= "</p>";
                                    echo $_preco_condominio;
                                }
                            ?>
                        </div>
                        <div class="col-md-12 margin-top-20 text-align-left">
			 			
    <div class="butao">
       <button class="social-button" onclick="shareWhatsApp()"> <i class="fa fa-whatsapp"></i> </button><span style="visibility: hidden;">....</span>
        <button class="social-button" onclick="shareFacebook()"> <i class="fa fa-facebook"></i></button><span style="visibility: hidden;">....</span>
         <button class="social-button" onclick="copyInstagramLink()"><i class="fa fa-instagram"></i><span style="visibility: hidden;">..</span>  <i class="fa fa-twitter"></i><span style="visibility: hidden;">...</span><i class="fa fa-ellipsis-v"></i> </button>
   

    </div><center><small>COMPARTILHE ESSE IMÓVEL </small></center><div class="addthis_inline_share_toolbox"><center></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 background-color-secundaria padding-20 margin-bottom-30">
                    <div class="row middle-xs">



<?php
// Configuração do número de WhatsApp
$numeroWhatsApp = "+5547992253742";  // Substitua pelo seu número de telefone completo
$linkPaginaAtual = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Isto pega o link da página atual
$mensagemWhatsApp = "Olá, vim através do link: " . $linkPaginaAtual . " e gostaria de mais informações."; // Mensagem personalizada com o link da página

echo "<div class='col-md-12'>";
echo "<a href='https://api.whatsapp.com/send?phone=" . $numeroWhatsApp . "&text=" . urlencode($mensagemWhatsApp) . "' class='botoes-primaria-to-secundaria d-block line-height-15' style='width:100%; padding:16px !important; text-align: center;' target='_blank'>";
echo "<i class='fa fa-whatsapp margin-right-3'></i> ENTRAR EM CONTATO";
echo "</a>";
echo "</div>";
?>

                    </div>
                </div>
            </div>
        </div> 
        <div class="row margin-top-5">
        	<div class="col-md-12">
            	<div class="col-md-12 c-card-detalhes-dependencias">
                	<div class="row" id="dependencias_imoveis">
                    
                        <div class="col-md-12 margin-bottom-10 margin-top-5 text-align-left" style="background:transparent !important">
                        	<h2 class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0' style="text-transform: uppercase;">
    Detalhes do Imóvel
</h2>
                        </div>
						
						<?php
							if($_dadosImovel['dependencias_quartos'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-bed font-color-secundaria font-size-17"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_quartos'];?> <span class="font-size-14 font-weight-400 acessibilidade">Dormitórios</span>
								</p>
							</div>
						<?php
							}
						?>
						
						<?php
							if($_dadosImovel['dependencias_suites'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-bath font-color-secundaria font-size-17"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_suites'];?> <span class="font-size-14 font-weight-400 acessibilidade">Suítes</span>
								</p> 
							</div>
						<?php
							}
						?>
						
						<?php
							if($_dadosImovel['dependencias_garagem'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-car font-color-secundaria font-size-17"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_garagem'];?> <span class="font-size-14 font-weight-400 acessibilidade">Vagas</span>
								</p> 
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_banheiro'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_banheiro icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_banheiro'];?> <span class="font-size-14 font-weight-400 acessibilidade">Banheiros</span>
								</p> 
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_closet'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_closet icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_closet'];?> <span class="font-size-14 font-weight-400 acessibilidade">Closet</span>
								</p> 
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_salas'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_sala icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_salas'];?> <span class="font-size-14 font-weight-400 acessibilidade">Salas</span>
								</p> 
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_despensa'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_despensa icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_despensa'];?> <span class="font-size-14 font-weight-400 acessibilidade">Despensa</span>
								</p> 
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_bar'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_bar icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_bar'];?> <span class="font-size-14 font-weight-400 acessibilidade">Bar</span>
								</p> 
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_cozinha'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_cozinha icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_cozinha'];?> <span class="font-size-14 font-weight-400 acessibilidade">Cozinha</span>
								</p> 
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_quarto_empregada'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-bed font-color-secundaria font-size-17"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_quarto_empregada'];?> <span class="font-size-14 font-weight-400 acessibilidade">Dorm. Serviço</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_escritorio'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_escritorio icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_escritorio'];?> <span class="font-size-14 font-weight-400 acessibilidade">Escritório</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_area_servico'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_area_servico icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_area_servico'];?> <span class="font-size-14 font-weight-400 acessibilidade">Área/ Serviço</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_lareira'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_lareira icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_lareira'];?> <span class="font-size-14 font-weight-400 acessibilidade">Lareira</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_varanda'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_varanda icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_varanda'];?> <span class="font-size-14 font-weight-400 acessibilidade">Varanda</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['dependencias_lavanderia'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<div class="icone_lavanderia icones_imoveis"></div>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['dependencias_lavanderia'];?> <span class="font-size-14 font-weight-400 acessibilidade">Lavanderia</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <div class="col-md-12 margin-bottom-10 margin-top-15 text-align-left" style="background:transparent !important">
                        	<h2 class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0' style="text-transform: uppercase;">
    Tamanho das Áreas
</h2>
                        </div>

						<?php
							if($_dadosImovel['tamanho_area_privativa'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-arrows-alt font-color-secundaria font-size-16"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['tamanho_area_privativa'];?> m² <span class="font-size-12 font-weight-400 margin-left-2 acessibilidade">(privativa)</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['tamanho_area_total'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-arrows-alt font-color-secundaria font-size-16"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['tamanho_area_total'];?> m² <span class="font-size-12 font-weight-400 margin-left-2 acessibilidade">(total)</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['tamanho_area_terreno'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-arrows-alt font-color-secundaria font-size-16"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['tamanho_area_terreno'];?> m² <span class="font-size-12 font-weight-400 margin-left-2 acessibilidade">(terreno)</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['tamanho_area_construida'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-arrows-alt font-color-secundaria font-size-16"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['tamanho_area_construida'];?> m² <span class="font-size-12 font-weight-400 margin-left-2 acessibilidade">(construída)</span>
								</p>
							</div>
						<?php
							}
						?>
                        
                        <?php
							if($_dadosImovel['tamanho_area_comum'] > 0){
						?>
							<div class="col-md-2 col-6 text-align-center border_dependencias_areas padding-top-15 padding-bottom-10">
								<i class="fa fa-arrows-alt font-color-secundaria font-size-16"></i>
								<p class="font-size-15 line-height-18 font-weight-800 margin-bottom-0 acessibilidade">
									<?php echo $_dadosImovel['tamanho_area_comum'];?> m² <span class="font-size-12 font-weight-400 margin-left-2 acessibilidade">(comum)</span>
								</p>
							</div>
						<?php
							}
						?>
                    
                    </div>
                </div>
           </div>
        </div>
        <div class="row margin-top-35">
        	<div class="col-md-4">
            	<div class="col-md-12 background-color-primaria margin-bottom-0 padding-35">
                	<div class="row">
                    	<div class="col-md-12 text-align-center">
                        	<i class="fa fa-envelope-o font-color-white font-size-50 margin-bottom-15"></i>
                            <h2 class="font-color-secundaria font-size-14 line-height-18 font-weight-800 margin-bottom-0 text-uppercase acessibilidade">
                            	Agende uma visita com um de nossos corretores!
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 background-color-secundaria margin-bottom-30 padding-35">
                	<div class="row">
                        <div class="col-md-12">
                        	<form id="cotacaoForm" data-toggle="validator" class="shake" onsubmit="enviarWhatsApp(); return false;">
                                <div class="row text-left">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls"> 
                                                <input 
                                                    type="text"  
                                                    class="form-control font-weight-400"
                                                    id="nome_cotacao" 
                                                    placeholder="Nome (*)"
                                                    required data-error="* Insira seu Nome"
                                                >
                                                <div class="help-block with-errors font-color-white"></div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input 
                                                    type="tel" 
                                                    class="form-control font-weight-400"
                                                    id="telefone_cotacao" 
                                                    placeholder="Telefone (*)"
                                                    required data-error="* Insira seu Telefone"
                                                >
                                                <div class="help-block with-errors font-color-white"></div> 
                                            </div>
                                        </div>
                                    </div>
                                   <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input 
                                                    type="email" 
                                                    class="form-control font-weight-400" 
                                                    id="email_cotacao" 
                                                    placeholder="E-mail (*)"
                                                    required data-error="* Insira seu Email"
                                                >
                                                <div class="help-block with-errors font-color-white"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 input-message">
                                        <div class="form-group">
                                            <div class="controls"> 
                                                <?php
													$_mensagem_email = "Olá, estou interessado no imóvel " .$_nome_imovel. ", "; 
													$_mensagem_email .= "com a referência " .$_referencia_imovel. ", que encontra-se localizado na ";
													$_mensagem_email .= $_endereco_completo_formatado;
													$_mensagem_email .= " que está disponível para ". $_transacao. " em seu portal.";
												?>
                                                
                                                <textarea 
                                                    id="mensagem_cotacao" 
                                                    name="mensagem_cotacao" 
                                                    rows="9" 
                                                    class="form-control font-weight-400 line-height-18 padding-15" 
                                                    placeholder="Mensagem"
                                                ><?php echo $_mensagem_email;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 margin-top-5">
                                        <div id="msgSubmit_Cotacao" class="hidden"></div> 
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-12 text-align-center margin-top-5 form-btn margin-bottom-0 text-uppercase">    
                                        <?php
											if(!empty($_dadosCorretores['email'])){
												$_Quem_Recebe = $_dadosCorretores['email'];
											}else{
												$_Quem_Recebe = EMAIL;
											}
										?>
                                        <input type="hidden" id="email_recebe" name="email_recebe" value="<?php echo $_Quem_Recebe;?>">
                                        <input type="hidden" id="link_imovel" name="link_imovel" value="<?php echo META_SITE_LINK;?>">
                                        <button type="submit" id="submit" class="botoes-primaria-to-white border-0">
                                            Enviar Solicitação
                                        </button>  
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            	<?php
					if(!empty($_dadosImovel['adicionais'])){
				?>
                <div class="col-md-12 c-card-detalhes margin-bottom-35">
                	<div class="row">
                    	<div class="col-md-12 margin-bottom-10">
                        	<p class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0'>
                        		<h2 class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0' style="text-transform: uppercase;">
    Diferenciais
</h2>
                        	</p>
                        </div>
                    </div>
                    <div class="row">
                    	<?php
							$_tags = explode("#", $_dadosImovel['adicionais']);
							
							$_ids = array();
							
							if (count($_tags)>0){
								for ($_i=1; $_i<count($_tags)-1; $_i++)
								
								$_ids[count($_ids)] = "id = '" . $_tags[$_i] . "'";
								$_where = implode(" or ", $_ids);
								
								$sql5 = mysqli_query($link, "SELECT * FROM tb_imoveis_adicionais WHERE status='S' AND (" . $_where . ") order by id");
								while($dados5=mysqli_fetch_array($sql5)){
						?>
						<div class="col-md-3">
                            <p class="font-size-14 font-color-silver-dark margin-0 acessibilidade">
                                <i class="fa fa-check-square-o font-color-secundaria"></i> <?php echo utf8_encode($dados5['nome']);?>
                            </p>
						</div>        
						<?php 
								} 
							}
						?>
                    </div>
                </div>
                <?php
					}
				?>
                <?php
					if(!empty($_dadosImovel['descricao'])){
				?>
                <div class="col-md-12 c-card-detalhes padding-bottom-10 margin-bottom-35">
                	<div class="row">
                    	<div class="col-md-12">
                        	<p class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0'>
                        		<h2 class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0' style="text-transform: uppercase;">
    Descrição do Imóvel
</h2>
                        	</p>
                            <p class="font-color-silver-dark font-size-14 line-height-20 margin-top-15 margin-bottom-0 cor_links acessibilidade">
								<?php 
                                    $texto = utf8_encode($_dadosImovel['descricao']); 
                                    $texto = str_replace("</p>","<br><br>",$texto); 
                                    $texto = strip_tags($texto,'<br><br><strong></strong><b></b><a></a>'); 
									$texto = str_replace("<a ","<a target='_blank' ",$texto); 
                                    $texto = str_replace("\n","",$texto);
                                    echo $texto;
                                ?>

<?php
// Configuração do número de WhatsApp
$numeroWhatsApp = "+5547992253742";  // Substitua pelo seu número de telefone completo
$linkPaginaAtual = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Isto pega o link da página atual
$mensagemWhatsApp = "Olá, vim através do link: " . $linkPaginaAtual . " e gostaria de mais informações."; // Mensagem personalizada com o link da página

echo "<div class='col-md-12'>";
echo "<a href='https://api.whatsapp.com/send?phone=" . $numeroWhatsApp . "&text=" . urlencode($mensagemWhatsApp) . "' class='botoes-primaria-to-secundaria d-block line-height-15' style='width:100%; padding:16px !important; text-align: center;' target='_blank'>";
echo "<i class='fa fa-whatsapp margin-right-3'></i> ENTRAR EM CONTATO";
echo "</a>";
echo "</div>";
?>                            </p>
                        </div>
                    </div>
                </div>
                <?php
					}
				?>
                <?php
					if(!empty($_dadosImovel['observacoes'])){
				?>
                <div class="col-md-12 c-card-detalhes padding-bottom-10">
                	<div class="row">
                    	<div class="col-md-12">
                        	<p class='font-weight-800 font-size-15 line-height-19 font-color-secundaria margin-bottom-0'>
                        		OBSERVAÇÕES
                        	</p>
                            <p class="font-color-silver-dark font-size-14 line-height-20 margin-top-10 margin-bottom-0 cor_links acessibilidade">
								<?php 
                                    $texto = utf8_encode($_dadosImovel['observacoes']); 
                                    $texto = str_replace("</p>","<br><br>",$texto); 
                                    $texto = strip_tags($texto,'<br><br><strong></strong><b></b><a></a>'); 
									$texto = str_replace("<a ","<a target='_blank' ",$texto); 
                                    $texto = str_replace("\n","",$texto);
                                    echo $texto;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
					}
				?>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12 text-align-center margin-top-40">
                <p>
                    <a href="javascript:window.history.back()" class="botoes-primaria-to-secundaria text-uppercase">
                       <i class="fa fa-arrow-left"></i> Voltar a página Anterior
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="background-color-silver-light padding-top-70 padding-bottom-60">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 text-align-center margin-bottom-20">
            	<h3 class="font-color-primaria font-weight-400 font-size-25 text-uppercase text-align-center">
                	<i class="fa fa-building-o font-color-secundaria"></i> Imóveis <span class="font-weight-800 font-color-secundaria">Relacionados</span>
                </h3>
            </div>
            <div class="col-md-12">
				<?php 
					$_carroussel_status = 1;
					$_condicao   = "AND id!='".$_id_imovel."' AND id_transacao='".$_id_transacao."' AND id_cidade='".$_id_cidade."'";
					//$_condicao   = "AND id!='".$_id_imovel."' AND id_transacao='".$_id_transacao."'";
					$_ordenacao  = "data_edicao DESC";
					$_quantidade = "6"; 
					include "includes/listas/lista.Home.Imoveis3.php";
				?>
            </div>
        </div>
    </div>
</section>

<footer>
     <script>
        function shareWhatsApp() {
            var text = "Olha esse imóvel que eu encontrei";
            var url = encodeURIComponent(window.location.href);
            window.open('https://api.whatsapp.com/send?text=' + text + '%20' + url);
        }

        function shareFacebook() {
            var text = "Olha esse imóvel que eu encontrei";
            var url = encodeURIComponent(window.location.href);
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + url + '&quote=' + text);
        }

        function copyInstagramLink() {
            var text = "Olha esse imóvel que eu encontrei: " + window.location.href;
            navigator.clipboard.writeText(text)
                .then(function() {
                    alert('Link copiado!');
                })
                .catch(function() {
                    alert('Erro ao copiar o link.');
                });
        }
    </script>

	<?php include "includes/include.Footer.php";?>

</footer>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    atualizarEstadoFavorito(<?php echo $_id_imovel; ?>);
});

function isFavorito(idImovel) {
    var favoritos = getCookie("favoritos");
    return favoritos ? JSON.parse(favoritos).includes(idImovel) : false;
}

function adicionarAosFavoritos(idImovel) {
    var favoritos = getCookie("favoritos");
    favoritos = favoritos ? JSON.parse(favoritos) : [];
    var index = favoritos.indexOf(idImovel);

    if (index === -1) {
        favoritos.push(idImovel);
        alert("Imóvel adicionado aos favoritos, verifique o ícone de estrela no topo do site para verificar seus favoritos.");
    } else {
        favoritos.splice(index, 1);
        alert("Imóvel removido dos favoritos!");
    }
    
    setCookie("favoritos", JSON.stringify(favoritos), 365);
    atualizarEstadoFavorito(idImovel);
}

function setCookie(nome, valor, dias) {
    var data = new Date();
    data.setTime(data.getTime() + (dias * 24 * 60 * 60 * 1000));
    var expires = "expires=" + data.toUTCString();
    document.cookie = nome + "=" + valor + ";expires=" + expires + ";path=/";
}

function getCookie(nome) {
    var name = nome + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function atualizarEstadoFavorito(idImovel) {
    var icone = document.getElementById('iconeFavorito');
    var texto = document.getElementById('textoFavorito');

    if (isFavorito(idImovel)) {
        icone.className = 'fa fa-heart'; // 
        texto.textContent = ' Remover dos Favoritos';
    } else {
        icone.className = 'fa fa-heart-o'; // 
        texto.textContent = ' Adicionar aos Favoritos';
    }
}
</script>
<script>
function adicionarAosFavoritos(idImovel) {
    var favoritos = getCookie("favoritos");
    favoritos = favoritos ? JSON.parse(favoritos) : [];
    var index = favoritos.indexOf(idImovel);
    var mensagemElemento = document.getElementById('mensagemFavorito'); // 

    if (index === -1) {
        favoritos.push(idImovel);
        mensagemElemento.textContent = "Imóvel adicionado aos favoritos.";
        mensagemElemento.className = ""; // 
        mensagemElemento.style.color = "green"; // 
    } else {
        favoritos.splice(index, 1);
        mensagemElemento.textContent = "Imóvel removido dos favoritos!";
        mensagemElemento.className = "vermelho"; // 
        mensagemElemento.style.color = "red"; // 
    }

    setCookie("favoritos", JSON.stringify(favoritos), 365);
    atualizarEstadoFavorito(idImovel);

    mensagemElemento.style.display = "block";
    setTimeout(function() {
        mensagemElemento.style.display = "none";
    }, 1500);  // 
}

function atualizarEstadoFavorito(idImovel) {
    var icone = document.getElementById('iconeFavorito');
    var texto = document.getElementById('textoFavorito');

    if (isFavorito(idImovel)) {
        icone.className = 'fa fa-heart vermelho'; // 
        texto.textContent = ' Remover dos Favoritos';
    } else {
        icone.className = 'fa fa-heart-o verde'; // 
        texto.textContent = ' Adicionar aos Favoritos';
    }
}
</script>
<?php include "includes/include.Footer.Scripts.php";?>
</body>
</html>