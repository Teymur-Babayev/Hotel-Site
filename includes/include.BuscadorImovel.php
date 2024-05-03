<div class="container-fluid background-color-secundaria padding-top-20 padding-bottom-20">
    <div class="container">

            
            <div class="col-md-2 margin-bottom-10 margin-top-10 text-align-left">

            </div>
          <center>  <div class="col-md-4 text-align-right margin-bottom-10 margin-top-10 link_busca_detalhada">
                <p class="font-size-16 font-color-white margin-bottom-0 text-uppercase font-weight-800 margin-left-10 margin-right-10">
                    <a href="javascript:void(0)" data-toggle="collapse" data-target="#busca_detalhada" aria-controls="busca_detalhada">
                                        <button class="botoes-primaria-to-white border-0 d-block" style="width:100%; cursor:pointer">
                    <i class="fa fa-filter"></i>  FILTRAR IMÓVEL
                </button>
                    </a></center>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid background-color-primaria padding-top-40 padding-bottom-35 collapse" id="busca_detalhada">
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
                <div class="row">
                                        <input type="hidden" id="id_transacao" name="id_transacao" value="1">

                        
            
                    <div class="col-md-4 margin-bottom-5">
                        <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Finalidade</label>
                        <select id="id_finalidade" name="id_finalidade" class="form-control" required>
                            <option value="0">Selecione...</option>
                            <?php 
                            $sql5 = mysqli_query($link, "SELECT * FROM tb_imoveis_finalidade WHERE status='S' ORDER BY id");
                            while($dados5 = mysqli_fetch_array($sql5)){ ?>
                                <option value='<?php echo $dados5['id']?>'><?php echo utf8_encode($dados5['nome']);?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 margin-bottom-5">
                        <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Tipo de Imóvel</label>
                        <select id="id_tipo" name="id_tipo" class="form-control" required>
                        	<option value="0"> 
                                Selecione...
                            </option>
                            <?php 
                                $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE status='S' ORDER BY nome");
                                while($dados5 = mysqli_fetch_array($sql5)){ 
                            ?>
                            <option value='<?php echo $dados5['id']?>'> 
                                <?php echo utf8_encode($dados5['nome']);?>
                            </option>
                            <?php  
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 margin-bottom-5">
                        <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Cidade</label>
                        <select id="id_cidade" name="id_cidade" class="form-control" required>
                        	<option value="0"> 
                                Selecione...
                            </option>
                            <?php 
                                $sql5  = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE status='S' ORDER BY nome");
                                while($dados5 = mysqli_fetch_array($sql5)){ 
                            ?>
                            <option value='<?php echo $dados5['id']?>'> 
                                <?php echo utf8_encode($dados5['nome'])?>
                            </option>
                            <?php  
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 margin-bottom-5">
                        <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Bairro</label>
                        <select id="id_bairro" name="id_bairro" class="form-control" required>
                            <option value="0"> 
                                Selecione...
                            </option>
							<?php $_idBairro = $dados5['id_bairro'];?>
                        </select>
                    </div>
                    <div class="col-md-2 margin-bottom-5">
                    	<label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Dormitórios</label>
                        <select id="dependencias_quartos" name="dependencias_quartos" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>'>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="col-md-2 margin-bottom-5">
                    	<label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Suítes</label>
                        <select id="dependencias_suites" name="dependencias_suites" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>'>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="col-md-2 margin-bottom-5">
                    	<label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Banheiros</label>
                        <select id="dependencias_banheiro" name="dependencias_banheiro" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>'>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="col-md-2 margin-bottom-5">
                    	<label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Garagens</label>
                        <select id="dependencias_garagem" name="dependencias_garagem" class="form-control" required>
                            <?php
                                $_quantidade = 16;
                                for ($_i = 0; $_i < $_quantidade; $_i++) {
                            ?>
                            <option value='<?php echo $_i;?>'>
								<?php echo $_i;?>
                            </option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="col-md-2 margin-bottom-5">
                        <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Valor Mínimo</label>
                        <input type="text" id="valor_minimo" name="valor_minimo" class="form-control" placeholder="0,00" value="0,00">
                    </div>
                    <div class="col-md-2 margin-bottom-5">
                        <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Valor Máximo</label>
                        <input type="text" id="valor_maximo" name="valor_maximo" class="form-control" placeholder="0,00" value="0,00">
                    </div>
                    <div class="col-md-4 margin-top-25 margin-bottom-5 text-align-center">
                        <button class="botoes-secundaria-to-white border-0 d-block" onclick="buscarImovelDetalhado()" style="width:100%; cursor:pointer">
                            <i class="fa fa-search"></i> Buscar Imóveis
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>