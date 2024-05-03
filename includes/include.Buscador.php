<div class="container-fluid background-color-secundaria padding-top-20 padding-bottom-20">
    <div class="container">
        <div class="row middle-xs">
            <div class="col-md-4 margin-bottom-5">
                <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Tipo de Imóvel</label>
                <select id="id_tipo" name="id_tipo" class="form-control" required>
                    <option value="0">TIPO</option>
                    <?php 
                    $sqlTipo = mysqli_query($link, "SELECT * FROM tb_imoveis_tipos WHERE status='S' ORDER BY nome");
                    while($dadosTipo = mysqli_fetch_array($sqlTipo)){ ?>
                    <option value='<?php echo $dadosTipo['id']?>'><?php echo utf8_encode($dadosTipo['nome']);?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 margin-bottom-5">
                <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Cidade</label>
                <select id="id_cidade" name="id_cidade" class="form-control" required>
                    <option value="0">CIDADE</option>
                    <?php 
                    $sqlCidade = mysqli_query($link, "SELECT * FROM tb_imoveis_cidades WHERE status='S' ORDER BY nome");
                    while($dadosCidade = mysqli_fetch_array($sqlCidade)){ ?>
                    <option value='<?php echo $dadosCidade['id']?>'><?php echo utf8_encode($dadosCidade['nome']);?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4 margin-bottom-5">
                <label class="font-color-secundaria font-weight-600 font-size-14 text-uppercase margin-bottom-0">Bairro</label>
                <select id="id_bairro" name="id_bairro" class="form-control" required>
                    <option value="0">BAIRRO</option>
                    <!-- Os bairros serão carregados aqui com base na cidade selecionada -->
                </select>
            </div>
            <!-- Campos Ocultos com valores predefinidos -->
            <input type="hidden" id="id_transacao" name="id_transacao" value="1">
            <input type="hidden" id="id_finalidade" name="id_finalidade" value="1">
            <input type="hidden" id="dependencias_quartos" name="dependencias_quartos" value="0">
            <input type="hidden" id="dependencias_suites" name="dependencias_suites" value="0">
            <input type="hidden" id="dependencias_banheiro" name="dependencias_banheiro" value="0">
            <input type="hidden" id="dependencias_garagem" name="dependencias_garagem" value="0">
            <input type="hidden" id="valor_minimo" name="valor_minimo" value="0">
            <input type="hidden" id="valor_maximo" name="valor_maximo" value="0">
            <div class="col-md-12 margin-top-10 text-align-center">
               <div class="col-md-12 margin-top-10 text-align-center">
             <center>   <button id="btnBuscar" class="botoes-primaria-to-white border-0 d-block" style="width:250px; cursor:pointer" onclick="buscarImovelDetalhado()">
                    <i class="fa fa-search"></i> MOSTRAR TODOS IMÓVEIS
                </button></center>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var campos = document.querySelectorAll('#id_tipo, #id_cidade, #id_bairro');
    campos.forEach(function(campo) {
        campo.addEventListener('change', function() {
            document.getElementById('btnBuscar').innerHTML = '<i class="fa fa-search"></i> BUSCAR';
        });
    });
});
</script>