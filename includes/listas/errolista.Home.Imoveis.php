<?php if (!empty($dados)) { ?>
<div class="container">
    <div class="row">
        <?php foreach ($dados as $dado) { ?>
            <div class="col-md-6 col-6 text-center">
                <?php if ($dado['dependencias_garagem'] > 0) { ?>
                    <i class="fa fa-car font-color-secundaria font-size-16" aria-hidden="true"></i>
                    <span><?php echo $dado['dependencias_garagem']; ?> Vagas</span>
                <?php } ?>
                <?php if ($dado['tamanho_area_total'] > 0) { ?>
                    <i class="fa fa-arrows-alt font-color-secundaria font-size-16" aria-hidden="true"></i>
                    <span><?php echo $dado['tamanho_area_total'];?> m²</span>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php } else { ?>
<div class="alert alert-warning text-center">
    <p>Nenhum registro encontrado!</p>
</div>
<?php } ?>