<?php
require 'Carro.php';

$carro = new Carro ( 'Uno', '1995' );

$carro->ligar ();
$carro->createNewMethod ( 'buzinar', null, ' return "biii bii\n";' );
echo $carro->buzinar ( 1, 2 );

$carro->createNewMethod ( 'freiar', NULL, 'echo \'pisei no freio\';' );
$carro->freiar ();

?>