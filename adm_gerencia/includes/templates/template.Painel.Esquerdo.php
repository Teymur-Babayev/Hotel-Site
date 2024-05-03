<div class="br-logo">
		<a href="index.php" class="notranslate"><span>[</span>Painel<span class="logo-G-yellow"></span><span>]</span></a>
	</div>
	<div class="br-sideleft overflow-y-auto">
		<label class="sidebar-label pd-x-15 mg-t-25 mg-b-15 tx-info op-9">Menu de Navegação</label>
		<div class="br-sideleft-menu">
			
            <a 
                href="index.php" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]==""?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-home"></i>
					<span class="menu-item-label">Principal</span>
				</div>
			</a>
            
           
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="imoveis_corretores"?"active":"");?>
				<?php echo (@ $_GET["pg"]=="imoveis_transacao"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="imoveis_finalidade"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="imoveis_tipos"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="imoveis_cidades"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="imoveis_bairros"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="imoveis_adicionais"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="imoveis_anuncios"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="imoveis_fotos"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-building"></i>
					<span class="menu-item-label">Anúncios / Imóveis</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=imoveis_transacao" class="nav-link pd-l-42">Ativar / Inativar Transação</a></li>
                <!--
                <li class="nav-item"><a href="index.php?pg=imoveis_finalidade" class="nav-link pd-l-42">Cadastrar Finalidades</a></li>
                <li class="nav-item"><a href="index.php?pg=imoveis_tipos" class="nav-link pd-l-42">Cadastrar Tipos</a></li>
                -->
                <li class="nav-item"><a href="index.php?pg=imoveis_cidades" class="nav-link pd-l-42">Cadastrar Cidades</a></li>
                <li class="nav-item"><a href="index.php?pg=imoveis_bairros" class="nav-link pd-l-42">Cadastrar Bairros</a></li>
                <li class="nav-item"><a href="index.php?pg=imoveis_adicionais" class="nav-link pd-l-42">Cadastrar Adicionais</a></li>
                <li class="nav-item"><a href="index.php?pg=imoveis_anuncios" class="nav-link pd-l-42">Cadastrar Imóveis</a></li>
                <li class="nav-item"><a href="index.php?pg=imoveis_corretores" class="nav-link pd-l-42">Cadastrar Corretores</a></li>
			</ul>
            
           
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="integracao"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-cube"></i>
					<span class="menu-item-label">Integração / Portais</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=integracao" class="nav-link pd-l-42">Ver Dados de Integração</a></li>
			</ul>
            
            <!--
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="atualizacao"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-download"></i>
					<span class="menu-item-label">Atualização do Site</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=atualizacao" class="nav-link pd-l-42">Verificar Atualização</a></li>
			</ul>
            -->
            
            
            <a 
                href="logout.php" 
                class="br-menu-link"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-power-off"></i>
					<span class="menu-item-label">Sair do Painel</span>
				</div>
			</a>
			
		</div>
		
		<?php 
			$status_Painel_Esquerdo_Estatisticas = "none !important"; 
			include "includes/templates/template.Painel.Esquerdo.Estatisticas.php";
		?>

	</div>
