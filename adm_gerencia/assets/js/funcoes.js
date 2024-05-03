 function confirmaExclusao(aURL) {
	if(confirm('Você tem certeza que deseja excluir?')) {
	location.href = aURL;
	}
}


// FUNCAO SELEIONA TODOS REGISTROS PRA EXCLUIR
cont321 = 0;
function SelectAll() { 
	for (var i=0; i<document.FORMLISTA.elements.length; i++){
	var x = document.FORMLISTA.elements[i];
    	if (x.id == 'check_sel') { 
	   		if (cont321 == 0){
	       	x.checked = true;
		   	} else {
        	x.checked = false;
			}
		} 
	}

	if (cont321 == 0){    
	var elem = document.getElementById("sel_todos");
	elem.value = "Desmarcar todos";
	cont321 = 1;
	} else {
	var elem = document.getElementById("sel_todos");
	elem.value = "Selecionar todos";
	cont321 = 0;
	}	  
}


// FUNCAO SELEIONA TODOS REGISTROS PRA EXCLUIR
function checkdeletetion(){
   if (!confirm("Você realmente deseja deletar este registro.") == false )
   FORMLISTA.submit();
}

function confirmaBloqueio(aURL) {
	if(confirm('Você tem certeza disso?')) {
	location.href = aURL;
	}
}


function mostrarSenha() {
  var tipo = document.getElementById("senha");
  if(tipo.type == "password"){
      tipo.type = "text";
  }else{
      tipo.type = "password";
  }
}

// MASCARA TELEFONE
jQuery("input#celular")
.mask("(99) 9?9999-9999")
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

// MASCARA WHATSAPP
jQuery("input#whatsapp")
.mask("(99) 9?9999-9999")
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

// MASCARA TELEFONE
jQuery("input#fax")
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

$('#data_nascimento').mask("99/99/9999", {placeholder: 'dd/mm/yyyy' });

$('#exp1_entrada').mask("99/99/9999", {placeholder: 'dd/mm/yyyy' });
$('#exp1_saida').mask("99/99/9999", {placeholder: 'dd/mm/yyyy' });
$('#exp2_entrada').mask("99/99/9999", {placeholder: 'dd/mm/yyyy' });
$('#exp2_saida').mask("99/99/9999", {placeholder: 'dd/mm/yyyy' });

$("#preco").maskMoney({prefix:'', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
$("#preco_condominio").maskMoney({prefix:'', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
$("#preco_iptu").maskMoney({prefix:'', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

// MASCARA CPF
jQuery("input#cpf_cnpjs")
.mask("999.999.999-99")
.focusout(function (event) {  
	var target, cpf, element;  
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	cpf = target.value.replace(/\D/g, '');
	element = $(target);  
	element.unmask();  
	if(cpf.length < 11) {  
		element.mask("999.999.999-99");  
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

// BUSCANDO ENDEREÇO ATRAVES DO CEP
 $("#cep").blur(function(){
 var cep = this.value.replace(/[^0-9]/, "");
 if(cep.length!=8){
 return false;
 }
 var url = "//viacep.com.br/ws/"+cep+"/json/";
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
		$('#n_convidados').val("");
		$('#q_convidados').val("");
 }


// FUNCAO DE EFEITO NAS FOTOS
function makevisible(cur,which){
	if (which==0){
	cur.filters.alpha.opacity=85;
	} else {
	cur.filters.alpha.opacity=100;
	}
}

// PESQUISA QUAL É O BROWSER
function Pesquisa(){
var Dados = null;
	try {
	// Firefox, Opera 8.0+, Safari
	Dados = new XMLHttpRequest();
	} catch (e) {
	//Internet Explorer
		try {
		Dados = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
		Dados = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
return Dados;
}

// FUNCAO MOSTRA ID
function MostraID(id, campo){
gE(campo).value = id;
}

// ABRE JANELA FOTO
var win = null;
	function NovaJanela(pagina,nome,w,h,scroll){
		LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
		TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
		settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
		win = window.open(pagina,nome,settings);
	}