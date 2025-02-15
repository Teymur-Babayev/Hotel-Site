<?php
$favoritos = isset($_COOKIE['favoritos']) ? json_decode($_COOKIE['favoritos'], true) : [];
// Executar consulta SQL
$sql = mysqli_query($link, "SELECT * FROM tb_imoveis_anuncios WHERE status='S' ".$_condicao." ORDER BY ".$_ordenacao." LIMIT ".$_quantidade."");
$total = mysqli_num_rows($sql);  

// Verificar se há resultados
if ($total > 0) { 
    // Verificar se deve exibir em grid ou carrossel
    if ($_carroussel_status == "1" && $total > 3) {
        echo "<div class='owl-carousel owl-theme home-imoveis-destaques'>";
    } else {
        echo "<div class='row center-xs middle-xs'>";
    }

    // Loop pelos resultados
    while ($dados = mysqli_fetch_array($sql)) { 
?>
<div class="<?php echo ($_carroussel_status == "1" && $total > 3) ? "item margin-bottom-10" : "col-md-4 margin-bottom-30"; ?>"> 
    <div class="col-md-12">
        <div class="row c-card-imovel padding-0">
            <div class="col-md-12 padding-0 img-effect">
                <!-- Ícone de favorito -->
                <i class='fa <?php echo $heartClass; ?> favorito-icon' onclick="handleFavoritoClick(event, <?php echo $dados['id']; ?>);"></i>
                <!-- Link para a página do imóvel -->
              <a href="<?php echo $_linkCompleto;?>/imovel/<?php echo createSlug($dados['nome']);?>">Nome do Imóvel</a>


                    <div class="grid_img">
                        <img 
    src="<?php echo $_linkCompleto;?>/thumbnail2.php?width=400&height=350&imagem=assets/uploads/tb_imoveis_anuncios/<?php echo $dados['id'];?>/<?php echo $dados['foto'];?>" 
    class="img-fluid" 
    alt="<?php echo utf8_encode($dados['nome']);?>" 
    title="Veja mais detalhes sobre <?php echo utf8_encode($dados['nome']);?>">
                                <div class="grid_img_mask"></div>
                                <div class="grid_img_mark"></div>
                                <?php if($dados['lancamento'] == "S"): ?>
                                    <div class="ribbon-wrapper-green">
                                        <div class="ribbon-green" style="text-transform: uppercase;">Oportunidade</div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 padding-15">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row center-xs middle-xs">
                                    <div class="col-md-10 margin-bottom-5 margin-top-5 cor_links">
                                        <p class="font-size-13 font-color-secundaria margin-bottom-5">
                                            Referência: <span class="font-weight-800"><?php echo $dados['referencia'];?></span>
                                        </p>
                                        <h3 class="font-size-14 text-uppercase font-weight-800" style="min-height:35px">
                                            <a href="<?php echo $_linkCompleto;?>/imovel/<?php echo $dados['id'];?>/detalhes/<?php echo $dados['url_amigavel'];?>/referencia/<?php echo $dados['referencia'];?>"><?php echo utf8_encode($dados['nome']);?></a>
                                        </h3>
                                        <p class="font-size-14 line-height-18 margin-bottom-0 acessibilidade">
                                            <?php
                                            // Cidade
                                            $cidade = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE id='".$dados['id_cidade']."'"));
                                            $_cidade = utf8_encode($cidade['nome']);
                                            //Bairro
                                            $bairro = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE id='".$dados['id_bairro']."'"));
                                            $_bairro = utf8_encode($bairro['nome']);
                                            echo "<i class='fa fa-map-marker'></i> ".utf8_encode($dados['endereco'])."  ".$dados['numero']."  ".$_bairro." - ".$_cidade." ".$dados['estado'];
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-10 margin-bottom-10 margin-top-5">
                                        <h3 class="font-size-20 font-color-secundaria text-uppercase font-weight-800">
                                          <?php
// Checar se o preço está disponível
if (!empty($dados['preco'])) {
    // Formatar o preço atual
    $preco_formatado = "R$ " . number_format($dados['preco'], 2, ',', '.');

    // Verificar se o preço anterior existe e é diferente do preço atual
    if (!empty($dados['novo_preco']) && $dados['novo_preco'] != $dados['preco']) {
        // Formatar o preço anterior
        $novo_preco_formatado = "R$ " . number_format($dados['novo_preco'], 2, ',', '.');

        // Exibir o preço anterior riscado e o preço atual
        echo "<s class='preco-antigo'>" . $novo_preco_formatado . "</s>";

        // Display the red Font Awesome icon if novo_preco is not empty
        if (!empty($dados['novo_preco'])) {
?>
            <span style="font-size: 24px;">&nbsp;<i class="fa fa-caret-down text-danger fa-caret-down-animada" aria-hidden="true"></i></span>
<?php
        }
    } else {
        // Display the red Font Awesome icon if novo_preco is not empty
        if (!empty($dados['novo_preco'])) {
?>
            <span style="font-size: 24px;">&nbsp;<i class="fa fa-angle-double-down text-danger" aria-hidden="true"></i></span>
<?php
        }
    }

    // Exibir o preço atual
    echo $preco_formatado;

} else {
    // Exibir mensagem padrão caso o preço não esteja definido
    echo "Consulte";
}
?>

                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row center-xs middle-xs">
                                    <div class="col-md-4 background-color-secundaria border-radius-5 margin-5">
                                        <p class="font-color-white font-size-13 line-height-14 padding-5 margin-0 text-uppercase">
                                            <?php
                                            $transacao = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE id='".$dados['id_transacao']."'"));
                                            echo utf8_encode($transacao['nome']);
                                            ?>
                                        </p>

                                    </div>
                                    <div class="col-md-7 background-color-primaria border-radius-5 margin-5">
                                        <p class="font-color-white font-size-13 line-height-14 padding-5 margin-0 text-uppercase">
                                            <?php
                                            $tipos = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE id='".$dados['id_tipo']."'"));
                                            echo utf8_encode($tipos['nome']);
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 margin-top-15 margin-bottom-5">
                                <div class="row center-xs middle-xs">
                                    <?php if($dados['dependencias_quartos'] > 0): ?>
                                        <div class="col-md-3 col-3 text-align-center border-right-1px border-color-silver">
                                            <i class="fa fa-bed font-color-secundaria font-size-16"></i>
                                            <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0"><?php echo $dados['dependencias_quartos'];?> <span class="font-size-13 font-weight-400">Dorm.</span></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($dados['dependencias_suites'] > 0): ?>
                                        <div class="col-md-3 col-3 text-align-center border-right-1px border-color-silver">
                                            <i class="fa fa-bath font-color-secundaria font-size-16"></i>
                                            <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0"><?php echo $dados['dependencias_suites'];?> <span class="font-size-13 font-weight-400">Suítes</span></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($dados['dependencias_garagem'] > 0): ?>
                                        <div class="col-md-3 col-3 text-align-center border-right-1px border-color-silver">
                                            <i class="fa fa-car font-color-secundaria font-size-16"></i>
                                            <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0"><?php echo $dados['dependencias_garagem'];?> <span class="font-size-13 font-weight-400">Vagas</span></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($dados['tamanho_area_total'] > 0): ?>
                                        <div class="col-md-3 col-3 text-align-center">
                                            <i class="fa fa-arrows-alt font-color-secundaria font-size-16"></i>
                                            <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0"><?php echo $dados['tamanho_area_total'];?> <span class="font-size-13 font-weight-400">m²</span></p>
                                        </div><p><br>


                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>


<div class="col-md-4 background-color-primaria border-radius-3 margin-3 d-md-none">
    <div class="row align-items-center" style="height: 50px;"> <!-- Define a altura fixa para a linha -->
        <div class="col text-center" style="display: flex; align-items: center; justify-content: center;">
           <a href="https://wa.me/5547992253742?text=Olá, estou interessado neste imóvel: <?php echo urlencode($_linkCompleto . "/imovel/" . $dados['id'] . "/detalhes/" . $dados['url_amigavel'] . "/referencia/" . $dados['referencia']); ?>" 
   style="color: white; text-decoration: none; height: 100%; display: flex; align-items: center; justify-content: center;" 
   target="_blank">
   <i class="fa fa-whatsapp" aria-hidden="true" style="margin-right: 8px;"></i>
<span style="text-transform: uppercase;">WhatsApp</span>
</a>
        </div>
        <div class="col-1" style="display: flex; align-items: center; justify-content: center; padding: 0;">
            <div style="border-left: 1px solid white; height: 30px; align-self: center;"></div> <!-- Ajuste o 'align-self' se necessário para centralizar o divisor -->
        </div>
        <div class="col text-center" style="display: flex; align-items: center; justify-content: center;">
            <a href="<?php echo $_linkCompleto;?>/imovel/<?php echo $dados['id'];?>/detalhes/<?php echo $dados['url_amigavel'];?>/referencia/<?php echo $dados['referencia'];?>" 
               style="color: white; text-decoration: none; height: 100%; display: flex; align-items: center; justify-content: center;">
               <i class="fa fa-plus" aria-hidden="true" style="margin-right: 8px;"></i>
<span style="text-transform: uppercase;">Detalhes</span>
            </a>
        </div>
    </div>
</div>   </div>
    </div>
</div>

          

<?php 
    } 
    echo "</div>";
} else {
?>
    <div class="col-md-12 alert alert-warning margin-bottom-30 text-align-center">
        <p class="text-uppercase font-color-silver-dark font-size-13 font-weight-800 margin-bottom-0">Nenhum registro encontrado!</p>
    </div>
<?php
}
?>
