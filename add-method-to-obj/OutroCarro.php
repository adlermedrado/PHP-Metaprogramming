<?php
class Carro {
	public $modelo, $ano;
	private $functionArgs;
	public function __construct($modelo, $ano) {
		$this->modelo = $modelo;
		$this->ano = $ano;
	}
	public function ligar() {
		echo "Ligando o carro\n";
	}
	public function __call($method, $args) {
		if ($this->{$method} instanceof Closure) {
			return call_user_func_array ( $this->{$method}, $args );
		}
	}
}


$gpg = new gnupg();
$gpg -> addencryptkey("8660281B6051D071D94B5B230549F9DC851566DC");
$enc = $gpg -> encrypt("Texto Secreto");

$res = gnupg_init();
gnupg_adddecryptkey($res,"8660281B6051D071D94B5B230549F9DC851566DC",'senha');
$original = gnupg_decrypt($res,$enc);