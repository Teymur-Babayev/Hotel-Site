$("#newsletterForm").validator().on("submit", function (event) {
	if (event.isDefaultPrevented()) {
		// handle the invalid form...
		formError_Newsletter();
		submitMSG_Newsletter(false, "Você preencheu todos os campos corretamente?");
	} else {
		// everything looks good!
		event.preventDefault();
		submitForm_News();
	}
});


function submitForm_News(){
	// Initiate Variables With Form Content
	var m_data = new FormData();
		m_data.append('nome_news', $('#nome_news').val());
		m_data.append('telefone_news', $('#telefone_news').val());
		m_data.append('email_news', $('#email_news').val());

	$.ajax({
		url: "includes/acoes/acao.Gravar.Newsletter.php",
		data: m_data,
		processData: false,
		contentType: false,
		type: 'POST',
		success : function(text){
			if (text == "success"){
				formSuccess_Newsletter();
			} else {
				formError_Newsletter();
				submitMSG_Newsletter(false,text);
			}
		}
	});
}

function formSuccess_Newsletter(){
	$("#newsletterForm")[0].reset();
	submitMSG(true, "Mensagem enviada com sucesso!");
}

function formError_Newsletter(){
	$("#newsletterForm").removeClass().addClass('shake').one('shake webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).removeClass();
	});
}

function submitMSG_Newsletter(valid, msg){
	if(valid){
		var msgClasses = "alert alert-warning text-center font-color-silver-dark font-size-13 line-height-17 font-weight-800 margin-bottom-25";
		$("#newsletterForm")[0].reset();
	} else {
		var msgClasses = "alert alert-warning text-center font-color-silver-dark font-size-13 line-height-17 font-weight-800 margin-bottom-25";
		$("#newsletterForm")[0].reset();
	}
	$("#msgSubmit_Newsletter").removeClass().addClass(msgClasses).text(msg);
}