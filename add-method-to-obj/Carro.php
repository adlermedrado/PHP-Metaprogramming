<?php
class Carro {
	private $modelo, $ano, $functionArgs;
	public function __construct($modelo, $ano) {
		$this->modelo = $modelo;
		$this->ano = $ano;
		$this->functionArgs = null;
	}
	public function ligar() {
		echo "Ligando o carro\n";
	}
	public function createNewMethod($name, $args, $code) {
		if ((! is_null ( $args )) && (sizeof ( $args ) == 0)) {
			array_walk ( $args, function ($value) {
				
				if (empty ( $this->functionArgs )) {
					$this->functionArgs .= '$' . $value;
				} else {
					$this->functionArgs .= ',$' . $value;
				}
			} );
		}
		
		$functionDefinition = '$this->{$name} = function (' . $this->functionArgs . ')';
		$functionDefinition .= '{' . $code . '};';
		
		eval ( $functionDefinition );
		$this->functionArgs = null;
	}
	public function __call($method, $args) {
		if ($this->{$method} instanceof Closure) {
			return call_user_func_array ( $this->{$method}, $args );
		} else {
			return parent::__call ( $method, $args );
		}
	}
}
