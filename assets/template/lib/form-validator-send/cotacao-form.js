$("#cotacaoForm").validator().on("submit", function (event) {
	if (event.isDefaultPrevented()) {
		// handle the invalid form...
		formError_Cotacao();
		submitMSG_Cotacao(false, "Você preencheu todos os campos?");
	} else {
		// everything looks good!
		event.preventDefault();
		submitForm_Cotacao();
	}
});


function submitForm_Cotacao(){
	// Initiate Variables With Form Content
	var m_data = new FormData();
		m_data.append('nome_cotacao', $('#nome_cotacao').val());
		m_data.append('telefone_cotacao', $('#telefone_cotacao').val());
		m_data.append('email_cotacao', $('#email_cotacao').val());
		m_data.append('mensagem_cotacao', $('#mensagem_cotacao').val());
		m_data.append('email_recebe', $('#email_recebe').val());
		m_data.append('link_imovel', $('#link_imovel').val());
	$.ajax({
		url: "../../../../../includes/acoes/acao.Enviar.Cotacao.Pagina.php",
		data: m_data,
		processData: false,
		contentType: false,
		type: 'POST',
		success : function(text){
			if (text == "success"){
				formSuccess_Cotacao();
			} else {
				formError_Cotacao();
				submitMSG_Cotacao(false,text);
			}
		}
	});
}

function formSuccess_Cotacao(){
	$("#cotacaoForm")[0].reset();
	submitMSG(true, "Mensagem enviada com sucesso!");
}

function formError_Cotacao(){
	$("#cotacaoForm").removeClass().addClass('shake').one('shake webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass();
	});
}

function submitMSG_Cotacao(valid, msg){
	if(valid){
		var msgClasses = "alert alert-warning text-center font-color-silver-dark font-size-13 line-height-17 font-weight-800 margin-bottom-25";
		$("#cotacaoForm")[0].reset();
	} else {
		var msgClasses = "alert alert-warning text-center font-color-silver-dark font-size-13 line-height-17 font-weight-800 margin-bottom-25";
		$("#cotacaoForm")[0].reset();
	}
	$("#msgSubmit_Cotacao").removeClass().addClass(msgClasses).text(msg);
}