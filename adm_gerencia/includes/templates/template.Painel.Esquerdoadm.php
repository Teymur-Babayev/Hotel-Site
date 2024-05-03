<div class="br-logo">
		<a href="index.php" class="notranslate"><span>[</span>adm<span class="logo-G-yellow">G</span>erencia<span>]</span></a>
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
                <?php echo (@ $_GET["pg"]=="banners_rotativos"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-desktop"></i>
					<span class="menu-item-label">Banners Rotativos</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=banners_rotativos" class="nav-link pd-l-42">Cadastrar Banner</a></li>
			</ul>
            
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="institucional"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="institucional_fotos"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-file-text"></i>
					<span class="menu-item-label">Institucional</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=institucional" class="nav-link pd-l-42">Editar Página</a></li>
                <li class="nav-item"><a href="index.php?pg=institucional_fotos&id=1&acao=verfotos" class="nav-link pd-l-42">Enviar Fotos</a></li>
			</ul>
            
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
                <?php echo (@ $_GET["pg"]=="financiadores"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-calculator"></i>
					<span class="menu-item-label">Financiadores</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=financiadores" class="nav-link pd-l-42">Cadastrar Financiador</a></li>
			</ul>
            
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="noticias"?"active":"");?>
                <?php echo (@ $_GET["pg"]=="noticias_fotos"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-newspaper-o"></i>
					<span class="menu-item-label">Notícias</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=noticias" class="nav-link pd-l-42">Cadastrar Notícia</a></li>
			</ul>
            
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="newsletter"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-envelope"></i>
					<span class="menu-item-label">Newsletter</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=newsletter" class="nav-link pd-l-42">Ver e Baixar E-mails</a></li>
			</ul>
            
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="usuarios"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-user"></i>
					<span class="menu-item-label">Usuários</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=usuarios" class="nav-link pd-l-42">Cadastrar Usuário</a></li>
			</ul>
            
            <a 
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="configuracao"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-gears"></i>
					<span class="menu-item-label">Configuração</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=configuracao" class="nav-link pd-l-42">Editar Configuração</a></li>
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
                href="#" 
                class="br-menu-link 
                <?php echo (@ $_GET["pg"]=="estatisticas"?"active":"");?>"
            >
				<div class="br-menu-item">
					<i class="menu-item-icon fa fa-pie-chart"></i>
					<span class="menu-item-label">Estatisticas</span>
					<i class="menu-item-arrow fa fa-angle-down"></i>
				</div>
			</a>
			<ul class="br-menu-sub nav flex-column">
				<li class="nav-item"><a href="index.php?pg=estatisticas" class="nav-link pd-l-42">Ver Estatisticas</a></li>
			</ul>
            
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
