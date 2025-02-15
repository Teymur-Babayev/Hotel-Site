<?php
  $sql = mysqli_query($link, "SELECT * FROM tb_imoveis_anuncios WHERE status='S' ".$_condicao." ORDER BY ".$_ordenacao." LIMIT ".$_quantidade."");
  $total = mysqli_num_rows($sql);  
  if ($total > 0) { 
    // SE O TOTAL DE RESULTADOS FOR MENOR QUE 3 ELE EXIBE EM GRID, SE NÃO EXIBE CARROUSSEL
    if ($_carroussel_status == "1") {
      if ($total > 3) { 
        echo "<div class='owl-carousel owl-theme home-imoveis-destaques'>";
      } else {
        echo "<div class='row center-xs middle-xs'>";
      }
    } else {
      echo "<div class='row center-xs middle-xs'>";
    }
    
    for ($i = 0; $i < $total; $i++) { 
      $dados = mysqli_fetch_array($sql);
?>
<div class="<?php if ($_carroussel_status == "1") { if ($total > 3) { echo "item margin-bottom-10"; } else { echo "col-md-4 margin-bottom-30";} } else {  echo "col-md-4 margin-bottom-30";} ?>"> 
    <div class="col-md-12">
      <div class="row c-card-imovel padding-0">
          <div class="col-md-12 padding-0 img-effect">
                <a href="<?php echo $_linkCompleto;?>/imovel/<?php echo $dados['id'];?>/detalhes/<?php echo $dados['url_amigavel'];?>/referencia/<?php echo $dados['referencia'];?>">
                    <div class="grid_img">
                        <img 
                            src="<?php echo $_linkCompleto;?>/thumbnail.php?width=800px&height=650px&imagem=assets/uploads/tb_imoveis_anuncios/<?php echo $dados['id'];?>/<?php echo $dados['foto'];?>"
                             class="img-fluid" alt="<?php echo $dados['referencia'];?>"
                        >
                        
                      <div class="grid_img_mask"></div>
                        <div class="grid_img_mark"></div>
                        
                        <?php 
              if($dados['lancamento'] == "S"){
            ?>
                        <div class="ribbon-wrapper-green">
                          <div class="ribbon-green">OPORTUNIDADE</div>
                        </div>
                        <?php
              }
            ?>
                        
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
                                <h3 class="font-size-14 text-uppercase font-weight-800" style="min-height:55px">
                                   <a href="<?php echo $_linkCompleto;?>/imovel/<?php echo $dados['id'];?>/detalhes/<?php echo $dados['url_amigavel'];?>/referencia/<?php echo $dados['referencia'];?>">
                    <?php echo utf8_encode($dados['nome']);?>
                                    </a>
                                </h3>
                                <p class="font-size-14 line-height-18 margin-bottom-0 acessibilidade">
                                  <?php
                    // Cidade
                    $sql_Cidade   = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE id='".$dados['id_cidade']."'");
                    $dados_Cidade = mysqli_fetch_array($sql_Cidade);
                    $_cidade = utf8_encode($dados_Cidade['nome']);
                    
                    //Bairro
                    $sql_Bairro   = mysqli_query($link, "SELECT * FROM tb_imoveis_bairros WHERE id='".$dados['id_bairro']."'");
                    $dados_Bairro = mysqli_fetch_array($sql_Bairro);
                    $_bairro = utf8_encode($dados_Bairro['nome']);
                    
                    echo "<i class='fa fa-map-marker'></i> ".utf8_encode($dados['endereco']) ."  ".$dados['numero']."  ".$_bairro." - ".$_cidade." - ".$dados['estado'];
                  ?>
</p>
                            </div>
                            <div class="col-md-10 margin-bottom-10 margin-top-5">
                              <h3 class="font-size-20 font-color-secundaria text-uppercase font-weight-800">
                                  <?php
                    if(!empty($dados['preco'])){
                      echo " R$ " . number_format($dados['preco'], 2, ',', '.');
                    }else{
                      echo " Consulte ";
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
                                        $sql_Transacao  = mysqli_query($link, "SELECT * FROM tb_imoveis_transacao WHERE id='".$dados['id_transacao']."'");
                                        $dados_Transacao = mysqli_fetch_array($sql_Transacao);
                                        echo utf8_encode($dados_Transacao['nome']);
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-7 background-color-primaria border-radius-5 margin-5">
                              <p class="font-color-white font-size-13 line-height-14 padding-5 margin-0 text-uppercase">
                  <?php         
                    $sql_Tipos   = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE id='".$dados['id_tipo']."'");
                    $dados_Tipos = mysqli_fetch_array($sql_Tipos);
                    echo utf8_encode($dados_Tipos['nome']);
                  ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-15 margin-bottom-5">
                        <div class="row center-xs middle-xs">
                            <?php
                                if($dados['dependencias_quartos'] > 0){
                            ?>
                                <div class="col-md-3 col-3 text-align-center border-right-1px border-color-silver">
                                    <i class="fa fa-bed font-color-secundaria font-size-16"></i>
                                    <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0">
                    <?php echo $dados['dependencias_quartos'];?> <span class="font-size-13 font-weight-400">Dorm.</span>
                                    </p>
                                </div>
                            <?php
                                }
                            ?>
                            
                            <?php
                                if($dados['dependencias_suites'] > 0){
                            ?>
                                <div class="col-md-3 col-3 text-align-center border-right-1px border-color-silver">
                                    <i class="fa fa-bath font-color-secundaria font-size-16"></i>
                                    <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0">
                    <?php echo $dados['dependencias_suites'];?> <span class="font-size-13 font-weight-400">Suítes</span>
                                    </p> 
                                </div>
                            <?php
                                }
                            ?>
                            
                            <?php
                                if($dados['dependencias_garagem'] > 0){
                            ?>
                                <div class="col-md-3 col-3 text-align-center border-right-1px border-color-silver">
<i class="fa fa-car font-color-secundaria font-size-16"></i>
                                    <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0">
                    <?php echo $dados['dependencias_garagem'];?> <span class="font-size-13 font-weight-400">Vagas</span>
                                    </p> 
                                </div>
                            <?php
                                }
                            ?>
                            
                            <?php
                                if($dados['tamanho_area_total'] > 0){
                            ?>
                                <div class="col-md-3 col-3 text-align-center">
                                    <i class="fa fa-arrows-alt font-color-secundaria font-size-16"></i>
                                    <p class="font-size-14 line-height-18 font-weight-800 margin-bottom-0"><i class=""></i>

                    <?php echo $dados['tamanho_area_total'];?> <span class="font-size-13 font-weight-400">m²</span>
                                    </p>
                                </div>
                            <?php
                                }
                            ?>
                             
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
  } else {
?>
<div class="col-md-12 alert alert-warning margin-bottom-30 text-align-center">
    <p class="text-uppercase font-color-silver-dark font-size-13 font-weight-800 margin-bottom-0">
        Nenhum registro encontrado!
    </p>
</div>
<?php
  }
?>