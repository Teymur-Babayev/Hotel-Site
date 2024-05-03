<div class="br-header">
		<div class="br-header-left">
			<div class="navicon-left hidden-md-down">
				<a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a>
			</div>
			<div class="navicon-left hidden-lg-up">
				<a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a>
			</div>
			<div class="input-group hidden-xs-down wd-170 transition" style="display:none">
				<input id="searchbox" type="text" class="form-control" placeholder="Search">
				<span class="input-group-btn">
					<button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</div>
			
		<div class="br-header-right">
			<nav class="nav">
				<div class="dropdown">
					<a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
						<i class="icon ion-android-globe tx-24"></i>
						<span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-header pd-0-force">
						<div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200 wd-130-force">
							<label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Idiomas</label>
						</div>

						<div class="media-list wd-125-force">
							<?php include "includes/templates/template.Painel.Topo.Idiomas.php";?>
						</div>
					</div>
				</div>
				
				<div class="dropdown">
					<a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
						<img src="assets/img/usuarios/perfil.png" class="wd-32 rounded-circle" alt="">
						<span class="square-10 bg-success"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-header wd-120">
						<ul class="list-unstyled user-profile-nav">
                        	<li><a href="index.php?pg=usuarios"><i class="icon ion-android-people"></i> Usu rios</a></li>
							<li><a href="index.php?pg=configuracao"><i class="icon ion-ios-gear"></i> Configura  o</a></li>
                            <li><a href="index.php?pg=estatisticas"><i class="icon ion-stats-bars"></i> Estat sticas</a></li>
							<li><a href="logout.php"><i class="icon ion-power"></i> Sair do Painel</a></li>
						</ul>
					</div>
				</div>
			</nav>
			
			<div class="navicon-right">
				<a href="https://www.imoveisroberta.com.br/adm_gerencia/index.php?pg=imoveis_anuncios" class="pos-relative">
					<i class="icon ion-plus-circled"></i>
				</a>
			</div>
		</div>
	</div>
