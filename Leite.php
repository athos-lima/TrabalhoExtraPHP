<?php
require_once "Perecivel.php";
require_once "Produto.php";
class Leite extends Produto implements Perecivel{
	private $marca;
	private $volume;
	private $dataValidade;

	public function estaVencido(){
		$dataHoje = date("d/m/Y");
		if($this->dataValidade >= $dataHoje){
			return false;
		}else{
			return true;
		}
	}

	public function __construct($codigo, $preco, $marca, $volume, $dataValidade){
		if(is_null($codigo) || is_null($preco) || is_null($marca) || is_null($volume) || is_null($dataValidade)){
			throw new InformacaoNulaException();
		}else{
		parent::__construct($codigo, $preco);
		$this->marca = $marca;
		$this->volume = $volume;
		$this->dataValidade = $dataValidade;
		}
	}
	public function getMarca(){
		return $this->marca;
	}
	public function getVolume(){
		return $this->volume;
	}
	public function getDataValidade(){
		return $this->dataValidade;
	}
	public function __toString(){
		return 	"Codigo: $this->codigo<br>
				Preço: $this->preco<br> 
				Marca: $this->marca<br>
				volume: $this->volume<br>
				Data de validade: $this->dataValidade";
	}
	//    public function serialize(){
    //    return json_encode(get_object_vars($this));
    //}
    
}
?>