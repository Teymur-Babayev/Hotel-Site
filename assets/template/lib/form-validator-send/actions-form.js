// MASCARA TELEFONE

jQuery("input#telefone")
.mask("(99) 9999-9999?9")
.focusout(function (event) {  
	var target, phone, element;  
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	phone = target.value.replace(/\D/g, '');
	element = $(target);  
	element.unmask();  
	if(phone.length > 10) {  
		element.mask("(99) 9?9999-9999");  
	} else {  
		element.mask("(99) 9?9999-9999");  
	}  
});

jQuery("input#telefone_cotacao")
.mask("(99) 9999-9999?9")
.focusout(function (event) {  
	var target, phone, element;  
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	phone = target.value.replace(/\D/g, '');
	element = $(target);  
	element.unmask();  
	if(phone.length > 10) {  
		element.mask("(99) 9?9999-9999");  
	} else {  
		element.mask("(99) 9?9999-9999");  
	}  
});

// MASCARA CNPJ
jQuery("input#cnpj")
.mask("99.999.999/9999-99")
.focusout(function (event) {  
	var target, cpf, element;  
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	cpf = target.value.replace(/\D/g, '');
	element = $(target);  
	element.unmask();  
	if(cpf.length > 11) {  
		element.mask("99.999.999/9999-99");  
	} else {  
		element.mask("99.999.999/9999-99");  
	}  
});

// MASCARA CPF
jQuery("input#cep")
.mask("99999-999")
.focusout(function (event) {  
	var target, cep, element;  
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	cep = target.value.replace(/\D/g, '');
	element = $(target);  
	element.unmask();  
	if(cep.length > 8) {  
		element.mask("99999-999");  
	} else {  
		element.mask("99999-999");  
	}  
});

jQuery("input#cep_f")
.mask("99999-999")
.focusout(function (event) {  
	var target, cep, element;  
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	cep = target.value.replace(/\D/g, '');
	element = $(target);  
	element.unmask();  
	if(cep.length > 8) {  
		element.mask("99999-999");  
	} else {  
		element.mask("99999-999");  
	}  
});

// BUSCANDO ENDEREÇO ATRAVES DO CEP
 $("#cep").blur(function(){
 var cep = this.value.replace(/[^0-9]/, "");
 if(cep.length!=8){
 return false;
 }
 var url = "http://viacep.com.br/ws/"+cep+"/json/";
 $.getJSON(url, function(dadosRetorno){
 try{
 $("#endereco").val(dadosRetorno.logradouro);
 $("#bairro").val(dadosRetorno.bairro);
 $("#cidade").val(dadosRetorno.localidade);
 $("#estado").val(dadosRetorno.uf);
 }catch(ex){}
 });
 });

 
 $(document).ready(function(){function add(){if($(this).val()==''){$(this).val($(this).attr('placeholder')).addClass('placeholder');}}function remove(){if($(this).val()==$(this).attr('placeholder')){$(this).val('').removeClass('placeholder');}}if(!('placeholder'in $('<input>')[0])){$('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add);$('form').submit(function(){$(this).find('input[placeholder], textarea[placeholder]').each(remove);});}});
 
 function limpar()
 {
	 	$('#nome').val("");
		$('#email').val("");
		$('#telefone').val("");
		$('#assunto').val("");
		$('#mensagem').val("");
 }