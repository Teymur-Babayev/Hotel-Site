<div style="display:<?php echo $status_Painel_Esquerdo_Estatisticas;?>">
	<label class="sidebar-label pd-x-15 mg-t-20 mg-b-15 tx-info op-9">Estatísticas de Visitas</label>
			<div class="info-list">
				<div class="d-flex align-items-center justify-content-between pd-x-15">
					<div>
						<p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Nesta Hora</p>
						<h5 class="tx-lato tx-white tx-bold mg-b-0"><?php echo $total_visitas_hora;?> <span class="tx-13 tx-normal">Acessos</span></h5>
					</div>
					<span class="peity-bar" data-peity='{ "fill": ["#336490"], "height": 35, "width": 60 }'>8,6,5,9,8,4,9,3,5,9</span>
				</div>
	
				<div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
					<div>
						<p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Neste Dia</p>
						<h5 class="tx-lato tx-white tx-bold mg-b-0"><?php echo $total_visitas_hoje;?> <span class="tx-13 tx-normal">Acessos</span></h5>
					</div>
					<span class="peity-bar" data-peity='{ "fill": ["#1C7973"], "height": 35, "width": 60 }'>4,3,5,7,12,10,4,5,11,7</span>
				</div>
	
				<div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
					<div>
						<p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Nesta Semana</p>
						<h5 class="tx-lato tx-white tx-bold mg-b-0"><?php echo $total_visitas_semana;?> <span class="tx-13 tx-normal">Acessos</span></h5>
					</div>
					<span class="peity-bar" data-peity='{ "fill": ["#8E4246"], "height": 35, "width": 60 }'>1,2,1,3,2,10,4,12,7</span>
				</div>
	
				<div class="d-flex align-items-center justify-content-between pd-x-15 mg-t-20">
					<div>
						<p class="tx-10 tx-roboto tx-uppercase tx-spacing-1 tx-white op-3 mg-b-2 space-nowrap">Desde a criação</p>
						<h5 class="tx-lato tx-white tx-bold mg-b-0"><?php echo $total_visitas;?> <span class="tx-13 tx-normal">Acessos</span></h5>
					</div>
					<span class="peity-bar" data-peity='{ "fill": ["#9C7846"], "height": 35, "width": 60 }'>3,12,7,9,2,3,4,5,2</span>
				</div>
			</div>
		</div>