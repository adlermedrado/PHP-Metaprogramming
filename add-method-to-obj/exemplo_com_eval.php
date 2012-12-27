<?php
require 'OutroCarro.php';

$carro = new Carro ( 'Uno', '1995' );

$carro->ligar ();

$str = '$carro->buzinar = function() {';
$str .= "echo \"fom fom \n\";";
$str .= "};";

eval ( $str );

$fun = function() {
	echo "faz alguma coisa";
}

$carro->algumaCoisa = $fun;


$carro->buzinar ();
$carro->freiar ();
$carro->algumaCoisa();

?>