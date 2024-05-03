$("#contactForm").validator().on("submit", function (event) {
	if (event.isDefaultPrevented()) {
		// handle the invalid form...
		formError();
		submitMSG(false, "Você preencheu o formulário corretamente?");
	} else {
		// everything looks good!
		event.preventDefault();
		submitForm();
	}
});


function submitForm(){
	// Initiate Variables With Form Content
	var m_data = new FormData();   
		m_data.append( 'nome', $('#nome').val());
		m_data.append( 'telefone', $('#telefone').val());
		m_data.append( 'email', $('#email').val());
		m_data.append( 'assunto', $('#assunto').val());
		m_data.append( 'mensagem', $('#mensagem').val());

	$.ajax({
		url: "includes/acoes/acao.Enviar.Contato.Pagina.php",
		data: m_data,
		processData: false,
		contentType: false,
		type: 'POST',
		success : function(text){
			if (text == "success"){
				formSuccess();
			} else {
				formError();
				submitMSG(false,text);
			}
		}
	});
}

function formSuccess(){
	$("#contactForm")[0].reset();
	submitMSG(true, "Mensagem enviada com sucesso!");
}

function formError(){
	$("#contactForm").removeClass().addClass('shake').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass();
	});
}

function submitMSG(valid, msg){
	if(valid){
		var msgClasses = "alert alert-warning text-center font-color-silver-dark font-size-13 line-height-17 font-weight-800 margin-bottom-15";
		$("#contactForm")[0].reset();
	} else {
		var msgClasses = "alert alert-warning text-center font-color-silver-dark font-size-13 line-height-17 font-weight-800 margin-bottom-15";
		$("#contactForm")[0].reset();
	}
	$("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}