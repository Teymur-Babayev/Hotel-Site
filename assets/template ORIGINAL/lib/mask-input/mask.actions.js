$("#valor_minimo").maskMoney({showSymbol:false, thousands:'.', decimal:',', symbolStay: false, allowZero: true, precision: 2, });
$("#valor_maximo").maskMoney({showSymbol:false, thousands:'.', decimal:',', symbolStay: false, allowZero: true, precision: 2, });

$("#valor").maskMoney({showSymbol:false, thousands:'.', decimal:',', symbolStay: false, allowZero: true, precision: 2, });

function moneyToDecimal(value){
	var dec = 0.00;
	
	try{
		dec = parseFloat(value.replace(".","").replace(".","").replace(".","").replace(",","."));
	}catch(err){}
	
	return dec;
}