<?php
require 'traitGenMetodo.php';
class Carro {
	
	use genMetodo;
	private $modelo, $ano;
	public function __construct($modelo, $ano) {
		$this->modelo = $modelo;
		$this->ano = $ano;
		$this->functionArgs = null;
	}
	public function ligar() {
		echo "Ligando o carro\n";
	}
}
