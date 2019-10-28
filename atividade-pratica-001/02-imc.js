function validar(campo) {
    let n = campo.value;

    if (n.length == 0 || isNaN(parseFloat(n))) {
        //erro
        window.alert("Informe o valor corretamente!");

        campo.value = "";
        campo.focus();
        return false;
    }

    //correto
    return true;
}
function calcular(){
    let peso = document.dados.peso.value
    let altura = document.dados.altura.value
    let altura1 = altura/100
    let IMC = peso / (altura1 * altura1) 
	let min = (altura1*altura1)*18.5
	let max = (altura1*altura1)*24.9

	if (IMC <18.5){
		document.dados.classificacao.value = "Subnutrição";
		document.dados.resultado.value = IMC.toFixed(2);
		document.dados.minideal.value = min.toFixed(2);
		document.dados.maxdeal.value = max.toFixed(2);
	}else if (IMC >=18.5 && IMC<=24.9){
		document.dados.classificacao.value = "Peso Saudável";
		document.dados.resultado.value = IMC.toFixed(2);
		
	}else if (IMC>=25 && IMC<=29.9){
        document.dados.classificacao.value = "Sobrepeso";
		document.dados.resultado.value = IMC.toFixed(2);
		document.dados.minideal.value = min.toFixed(2);
		document.dados.maxdeal.value = max.toFixed(2);
	}else if (IMC >=30 && IMC <=34.9){
        document.dados.classificacao.value = "Obesidade grau I";
		document.dados.resultado.value = IMC.toFixed(2);
		document.dados.minideal.value = min.toFixed(2);
		document.dados.maxdeal.value = max.toFixed(2);
	}else if (IMC >=35 && IMC <=39.9){
        document.dados.classificacao.value = "Obesidade grau II";
		document.dados.resultado.value = IMC.toFixed(2);
		document.dados.minideal.value = min.toFixed(2);
		document.dados.maxdeal.value = max.toFixed(2);
	}else{
        document.dados.classificacao.value = "Obesidade grau III";
		document.dados.resultado.value = IIMC.toFixed(2);
		document.dados.minideal.value = min.toFixed(2);
		document.dados.maxdeal.value = max.toFixed(2);
	}
	}
 
