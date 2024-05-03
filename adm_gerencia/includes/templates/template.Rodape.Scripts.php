<script src="<?php echo $_linkCompletoAdmin;?>/assets/js/jquery.maskedinput.js"></script>
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/js/jquery.maskMoney.min.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/js/funcoes.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/weather/ideaboxWeather.js"></script>
	
	<script>
		$(document).ready(function(){
		$('#wheather-example').ideaboxWeather({
			template	:"horizontal",
				themecolor	:"transparent",
				lang		:"pt",
				todaytext		:'Hoje',
				location		:'<?php echo preg_replace( '/[`^~\'´"]/', null, iconv('', 'ASCII//TRANSLIT', CIDADE));?>, BR',
				daycount	:1,
				metric		:'C',
				imgpath			:'assets/lib/weather/img/', //or http://openweathermap.org/img/w/
				radius		:false,
				days		:["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
				dayssmall	:["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]
		});	
	});	
	</script>
	
	<script>
		$(document).ready(function(){
			$('#listagemItens > ul').sortable({
				opacity: 0.6,
				cursor: 'move',
				update: function(){
					var order = $(this).sortable("serialize")+'&acao=ordenar&tabela=<?php echo $tabela;?>';
						$.get("includes/funcoes/funcao.Ordenacao.Registros.php", order, function(retorno){
						$("#array").html(retorno);
					});
				}
			});
		});
	</script>
		
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/popper.js/popper.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/moment/moment.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/peity/jquery.peity.js"></script>
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/chartist/chartist.js"></script>
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/d3/d3.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/rickshaw/rickshaw.min.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/highlightjs/highlight.pack.js"></script>
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/chart.js/Chart.js"></script>
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/lib/parsleyjs/parsley.js"></script>
		
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/js/bracket.js"></script>
	
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/js/chart.chartjs.js"></script>
		
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/js/ResizeSensor.js"></script>
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/js/dashboard.js"></script>
    <script>
      $(function(){
        'use strict'
        $(window).resize(function(){
          minimizeMenu();
        });
        minimizeMenu();
        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
		
	<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>			
	<script src="<?php echo $_linkCompletoAdmin;?>/assets/js/tradutor.js"></script>
	
	<script>
		window.setTimeout(function() {
			$("#alert-home").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
			});
		}, 5000);
		window.setTimeout(function() {
			$("#alert-paginas").fadeTo(500, 0).slideUp(500, function(){
					$(this).remove(); 
					window.location.href = "index.php?pg=<?php echo $file_redirect;?>";
			});
		}, 2000);
	</script>
	
	<script>
		$(function(){
			'use strict';
			$('#selectForm').parsley();
			$('#selectForm2').parsley();
		});
	</script>
    
    <script src="<?php echo $_linkCompletoAdmin;?>/assets/js/ekko-lightbox.min.js"></script> 
    <script>
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		});
	</script>
