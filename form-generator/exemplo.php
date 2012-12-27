<?php
require 'Empresa.php';

$empresa = new Empresa ();

?>
<html>
<head>
<title>Exemplo - Form Generator</title>
</head>
<body id="formGenerator">
	<form action="" method="post" accept-charset="utf-8">
<?=$empresa->parse();  ?>
	  </form>
</body>
</html>