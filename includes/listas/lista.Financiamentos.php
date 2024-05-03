<?php
	$sql = mysqli_query($link, "SELECT * FROM tb_financiadores WHERE status='S' ORDER BY id_ordem ASC, id DESC");
	$total = mysqli_num_rows($sql);  
	if ($total>0) 
	{ 
		
		for ($i = 0; $i < $total; $i++) 
		{ 
		
		$dados = mysqli_fetch_array($sql);

?>
<div class="col-md-4 text-align-center margin-bottom-30"> 
    <div class="row">
        <div class="col-md-12 img-effect">
            <a href="<?php echo $dados['link_financiamento'];?>" target="_blank">
                <img 
                    src="<?php echo $_linkCompleto;?>/thumbnail.php?w=500px&h=300px&imagem=assets/uploads/tb_financiadores/<?php echo $dados['id'];?>/<?php echo $dados['foto'];?>"
                    class="img-fluid"
                    alt="<?php echo utf8_encode($dados['nome']);?>"
                >
            </a>
        </div>
    </div>
</div>
<?php
	} 
	}else{
?>
<div class="col-md-12">
	<div class="col-md-12 alert alert-warning margin-bottom-30 text-align-center">
        <p class="text-uppercase font-color-silver-dark font-size-13 font-weight-800 margin-bottom-0">
            Nenhum registro encontrado!
        </p>
    </div>
</div>
<?php
	}
?>