competidores = []
var contador = 0
function validar(campo, alerta){
  
  let n = campo.value;
    
    if(contador>=6){
      alert("Só é possivel adicionar 6 competidores!")
      document.getElementById("adicionar").disabled = "true";
      return false
    }

    if(n.length == 0 ){
		// Erro
		//Exibir alerta
		document.getElementById(alerta).style.display = "block";

		//reporta o campo invalido
		campo.classList.add("is-invalid")

		//Finalizar
		campo.value = ""
		campo.focus();
		return false;
	}
	//Certo
	document.getElementById(alerta).style.display = "none";
	campo.classList.remove("is-invalid");
	campo.classList.add("is-valid")
	return true

}
function sortTable() {
    competidores.sort((a,b) => parseFloat(a.tempo) - parseFloat(b.tempo));
    
    competidores.map((competidor,index) =>{
      if(index == 0){
        competidor.resultado = "Vencedor(a) !";
      }
      competidor.posicaofinal = index + 1;
    });
    competidores.forEach(element => {
    
      linha = document.createElement('tr');
	    linha.insertCell(0).innerHTML = element.posicaofinal;
	    linha.insertCell(1).innerHTML = element.pos;
      linha.insertCell(2).innerHTML = element.competidor;
      linha.insertCell(3).innerHTML = element.tempo;
      linha.insertCell(4).innerHTML = element.resultado;
      document.getElementById("tabelaresultado1").appendChild(linha);
       
    });

    document.getElementById("tabelaresultado").style.display = "table"
    document.getElementById("tabela").style.display = "none" 
    document.getElementById("resultado").disabled = "true";
}
 
   


function processar(idTabela){
    let n1 = document.dados.nome;
    let n2 = document.dados.tempo;
    let n3 = document.dados.posicao;

    if(validar(n1,"alerta1") & validar(n2, "alerta2") & validar(n3, "alerta3")){
      let posicao = document.getElementsByName('posicao')[0].value;
      let nome = document.getElementsByName('nome')[0].value;
      let tempo = document.getElementsByName('tempo')[0].value;
      
      linha= document.createElement('tr');
	    linha.insertCell(0).innerHTML = posicao;
	    linha.insertCell(1).innerHTML = nome;
      linha.insertCell(2).innerHTML = tempo;
      document.getElementById(idTabela).appendChild(linha);
      contador ++;

      

      competidores.push({
        competidor: nome,
        pos: posicao,
        tempo: tempo,
        resultado: "",
        posicaofinal: "",
      }) 
      document.getElementsByName('posicao')[0].value="";
      document.getElementsByName('nome')[0].value="";
      document.getElementsByName('tempo')[0].value="";
    }
}
