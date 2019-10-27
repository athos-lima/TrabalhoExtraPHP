<?php
require_once "Produto.php";
class DVD extends Produto implements Perecivel
{
	private $titulo;
	private $ano;	

	public function __construct($codigo, $preco, $titulo, $ano)
	{
		if(is_null($codigo) || is_null($preco) || is_null($titulo) || is_null($ano)){
			throw new InformacaoNulaException();
		}else{
		parent::__construct($codigo, $preco);
		$this->titulo = $titulo;
		$this->ano = $ano;
		}
	}
	public function getAno(){
		return $this->ano;
	}
	public function getTitulo(){
		return $this->titulo;
	}
	public function __toString(){
		return 	"Codigo: $this->codigo<br>
				Preço: $this->preco<br> 
				Titulo: $this->titulo<br>
				Ano: $this->ano";			
	}
?>