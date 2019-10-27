<?php
require_once "Leite.php";
require_once "DVD.php";
include ("conexao.php");
date_default_timezone_set("America/Sao_Paulo");
header('Content-Type: application/json');
//Estoque de DVDs-ID-Preço-Titulo-Ano----------------------------------------------------------------------------------
$DVD1 = new DVD(1, 19.90, "Vingadores", 2019);
$DVD2 = new DVD(2, 10.90, "John Wick 3", 2019);
$DVD3 = new DVD(3, 13.30, "Bob Esponja o filme", 2004);
$DVD4 = new DVD(4, 12.20, "Fome de poder", 2016);
//Estoque de leites-ID-Preço-Marca---Volume-Data de validade-----------------------------------------------------------
$Leite1 = new Leite(5, 12, "Milk", 1000, "22/10/2019");
$Leite2 = new Leite(6, 13, "Desnataldo", 1000, "26/10/2019");
$Leite3 = new Leite(7, 14, "Ninhos", 1000, "26/10/2019");
$Leite4 = new Leite(8, 15, "OParmalate", 1000, "21/10/2019");
$Leite5 = new Leite(9, 16, "Itambem", 1000, "26/10/2019");
$Leite6 = new Leite(10, 17, "Toddy", 1000, "27/10/2019");
//Array do estoque-----------------------------------------------------------------------------------------------------
$estoque = array($DVD1->codigo => $DVD1,
	$DVD2->codigo => $DVD2,
	$DVD3->codigo => $DVD3,
	$DVD4->codigo => $DVD4,
	$Leite1->codigo => $Leite1,
	$Leite2->codigo => $Leite2,
	$Leite3->codigo => $Leite3,
	$Leite4->codigo => $Leite4,
	$Leite5->codigo => $Leite5,
	$Leite6->codigo => $Leite6);
//Printa filmes do estoque---------------------------------------------------------------------------------------------
for($i = 1; $i <= 4; $i++){
echo "FILME: $i<br>$estoque[$i]<br><hr>";
}
//Printa leites do estoque---------------------------------------------------------------------------------------------
$numero = 1;
for($i = 5; $i <= 10; $i++){
echo "LEITE: $numero<br>$estoque[$i]<br><hr>";
$numero++;
}
//Printa leites vencidos-----------------------------------------------------------------------------------------------
$mensagem = '';
$boolean1 = false;
for($i = 5; $i <= 10; $i++){
	if($estoque[$i]->estaVencido()){
		$mensagem .= $estoque[$i]->getMarca()."<br>"; 
		$boolean1 = true;
		}
}   if($boolean1){
		echo "Os seguintes leites estão vencidos: <br>$mensagem<br><hr>";
	}else{
		echo "Não há leites vencidos<br><hr>";
	}


//Printa DVDs correspondente ao ano digitado---------------------------------------------------------------------------
$anoDigitado = 1997;
$mensagemPegaAno = '';
$boolean = false;
for($i = 1; $i <= 4; $i++){
	if($estoque[$i]->getAno() == $anoDigitado){
		$mensagemPegaAno .= $estoque[$i]->getTitulo()."<br>";
		$boolean = true;
	}
}   if($boolean){
		echo "Os DVDs lançados em $anoDigitado são: <br>$mensagemPegaAno<br><hr>";
	}else{
		echo "Nenhum dos DVDs em estoque foi lançado no ano $anoDigitado<br><hr>";
	}
//Soma preço do produtos-----------------------------------------------------------------------------------------------
$somaTotalProdutos = null;
for($i = 1; $i <= 10; $i++){
	$somaTotalProdutos += $estoque[$i]->preco;
}
echo "A soma total do preço dos produtos em estoque é: $somaTotalProdutos<br>";
//Retornar JSON---------------------------------------------------------------------------------------------------------
public function JsonSerialize() {

		return[
			
				"Estoque" => $this -> estoque;

		];
	}
?>