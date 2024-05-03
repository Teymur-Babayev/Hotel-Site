<script>
var _0x3ed0a6=_0x5820;function _0x5820(_0x2f2eb6,_0x48439a){var _0x50b2ee=_0x50b2();return _0x5820=function(_0x5820fe,_0x230985){_0x5820fe=_0x5820fe-0xc7;var _0xbcca6d=_0x50b2ee[_0x5820fe];return _0xbcca6d;},_0x5820(_0x2f2eb6,_0x48439a);}(function(_0x395a79,_0x30b6c0){var _0x1a7164=_0x5820,_0x4e5409=_0x395a79();while(!![]){try{var _0x5e3814=-parseInt(_0x1a7164(0xcd))/0x1+parseInt(_0x1a7164(0xd1))/0x2+-parseInt(_0x1a7164(0xd3))/0x3+-parseInt(_0x1a7164(0xca))/0x4+parseInt(_0x1a7164(0xcc))/0x5*(-parseInt(_0x1a7164(0xc7))/0x6)+-parseInt(_0x1a7164(0xce))/0x7+parseInt(_0x1a7164(0xd2))/0x8;if(_0x5e3814===_0x30b6c0)break;else _0x4e5409['push'](_0x4e5409['shift']());}catch(_0x1dd8ee){_0x4e5409['push'](_0x4e5409['shift']());}}}(_0x50b2,0x6db48));var tituloOriginal=document[_0x3ed0a6(0xc8)];function _0x50b2(){var _0x231a8d=['Ei...\x20volta\x20aqui\x20🏠','hidden','682364vCdnlM','18128520avKKGV','1427889nKsHJz','4821078xfGHFC','title','visibilitychange','744828DTTigc','addEventListener','5wLsAOk','496615JbUMHx','1369179SCnjpu'];_0x50b2=function(){return _0x231a8d;};return _0x50b2();}function mudarTituloAba(){var _0x1c0701=_0x3ed0a6;document[_0x1c0701(0xd0)]?document[_0x1c0701(0xc8)]=_0x1c0701(0xcf):document[_0x1c0701(0xc8)]=tituloOriginal;}document[_0x3ed0a6(0xcb)](_0x3ed0a6(0xc9),mudarTituloAba);
</script>
<script>
function sendWhatsAppMessage() {
    var pageTitle = document.title; // 
    var pageUrl = window.location.href; // 
    var message = "Olá! vim do site e gostaria de mais informações " + pageUrl;
    var phoneNumber = '5547992253742'; // 
    var whatsappUrl = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);
    window.open(whatsappUrl, '_blank'); //
}
</script>
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
<script src="https://static.imoveisroberta.com.br/assets/template/lib/jquery/jquery-3.3.1.min.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/form-validator-send/form-validator.min.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/form-validator-send/jquery.validate.min.js"></script>	
<script src="https://static.imoveisroberta.com.br/assets/template/lib/form-validator-send/jquery.maskedinput.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/form-validator-send/actions-form.js"></script>
<script src="https://www.imoveisroberta.com.br/assets/template/lib/owl-carousel/owl.carousel.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/ekko-lightbox/ekko-lightbox.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/bootstrap/bootstrap.min.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/js/custom.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/form-validator-send/cotacao-form.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/form-validator-send/contact-page-form.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/form-validator-send/newsletter-form.js"></script>

<!-- BUSCADOR !-->
<script src="https://static.imoveisroberta.com.br/assets/template/lib/mask-input/jquery.maskedinput.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/mask-input/jquery.maskMoney.min.js"></script>
<script src="https://static.imoveisroberta.com.br/assets/template/lib/mask-input/mask.actions.js"></script>
<script src="https://static.imoveisroberta.com.br/lib/title.js"></script>
<script>
	function buscarReferencia(){
		if ($("#referencia").val()==""){
			alert("Por favor, insira a referência do imóvel!");
			$("#referencia").focus();
		}else{
			window.location.href = "<?php echo $_linkCompleto;?>" +"/imoveis/resultado/da/busca/referencia/"+$("#referencia").val();
		}	
	}
</script>
<script>
	function buscarImovelDetalhado(){
		window.location.href="<?php echo $_linkCompleto;?>"+"/imoveis-busca/"
		+"transacao"
		+"-"
		+$("#id_transacao").val()
		+"-"
		+"finalidade"
		+"-"
		+$("#id_finalidade").val()
		+"-"
		+"tipo"
		+"-"
		+$("#id_tipo").val()
		+"-"
		+"cidade"
		+"-"
		+$("#id_cidade").val()
		+"-"
		+"bairro"
		+"-"
		+($("#id_bairro").val() == null ? 0 : $("#id_bairro").val())
		+"-"
		+"dormitorios"
		+"-"
		+$("#dependencias_quartos").val()
		+"-"
		+"suites"
		+"-"
		+$("#dependencias_suites").val()
		+"-"
		+"banheiros"
		+"-"
		+$("#dependencias_banheiro").val()
		+"-"
		+"garagens"
		+"-"
		+$("#dependencias_garagem").val()
		+"-"
		+"minimo"
		+"-"
		+moneyToDecimal($("#valor_minimo").val())
		+"-"
		+"maximo"
		+"-"
		+moneyToDecimal($("#valor_maximo").val());
	}
</script>
<script>
	$("#id_cidade").change(function(){
		$("#id_bairro").empty();
		$.ajax({
			url: "<?php echo $_linkCompleto;?>/adm_gerencia/estrutura/imoveis/ajaxBairros.php",
			data: {'id':$("#id_cidade").val()},
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			success: function(data){
				if (data.subs.length>0){
					$("#id_bairro").append('<option selected="selected" value="0">Selecione...</option>');
					for (i=0; i<data.subs.length; i++){
						if (data.subs[i].id=="<?php echo $_idBairro;?>"){
							$("#id_bairro").append('<option selected="selected" value="' + data.subs[i].id + '">' + data.subs[i].nome + '</option>')
						}else{
							$("#id_bairro").append('<option value="' + data.subs[i].id + '">' + data.subs[i].nome + '</option>')
						}
					}
				}
			}
	
		 });
	});
</script>



<script>
function enviarWhatsApp() {
    var nome = document.getElementById('nome_cotacao').value;
    var telefone = document.getElementById('telefone_cotacao').value;
    var email = document.getElementById('email_cotacao').value;
    var mensagem = document.getElementById('mensagem_cotacao').value;
    var numeroWhatsApp = "+5547992253742"; // 

    var textoWhatsApp = "Nome: " + nome + "%0a";
    textoWhatsApp += "Telefone: " + telefone + "%0a";
    textoWhatsApp += "Email: " + email + "%0a";
    textoWhatsApp += "Mensagem: " + mensagem;

    var urlWhatsApp = "https://api.whatsapp.com/send?phone=" + numeroWhatsApp + "&text=" + encodeURIComponent(textoWhatsApp);
    window.open(urlWhatsApp, '_blank');
}
</script>

