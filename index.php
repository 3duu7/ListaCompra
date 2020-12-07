<?php

if( ! file_exists('datos.xml') ){

		$xml = new DOMdocument('1.0','UTF-8');
		$raiz = $xml->createElement('datos');
		$raiz = $xml->appendChild($raiz);
		$xml->formatOutput = true;
		$xml->saveXML();
		$xml->save('datos.xml');

		$xml = simplexml_load_file('datos.xml');

		file_put_contents("datos.xml", $xml->asXML());
	}
	$xml = simplexml_load_file('datos.xml');

	$lista = "";
	foreach ($xml->compra as $compra) {
		$lista .= "<div class='checkbox'>
		  				<label >$compra</label>
					 </div>";
	}
	$xml = simplexml_load_file('datos.xml');


	if( isset($_POST['enviar']) ){
		$xml->addChild('compra', $_POST['nueva']);
		file_put_contents("datos.xml", $xml->asXML());
	}
	if( isset($_POST['k']) ){
		$num = (integer)$_POST['k'];
		unset( $xml->compra[ $num ] );
		file_put_contents("datos.xml", $xml->asXML());
	}

	$lista = "";
	$k = 0;
	foreach( $xml->compra as $compra ){
		$lista .= "<form method='POST' action='index.php'>
						<div class='checkbox'>
			  				<label class='resultado'>$compra</label>
			  				<input class='listo' type='hidden' name='k' value='".$k++."'>
			  				<input class='listo' type='submit' value='x'>
						</div>
					 </form>";
	}




?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css"   href="estilos.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body style="background-color:#BDD1E5;">

	<header>
		<h1 class="nombre">EDU</h1>
		
	</header>

	<div class="compras">
			<?= $lista ?>
	</div>

	<form method="POST" action="index.php">
		<div id="nueva">
			<input  type="text" style="background:#3c8cc4"  name="nueva" class="texto">
			<input type="submit" style="background:#3c8cc4"  name="enviar" value="+" class="listo" >
		</div>
	</form>

	<nav>
		<div onclick="color('#14d424')">
			<a href="index.php"><img class="icono" src="img/E.png"></a>
		</div>
		<div>
			<a href="pag2.php"><img class="icono" src="img/M.png"></a>
		</div>
		<div>
			<a href="pag3.php"><img class="icono" src="img/B.png"></a>
		</div>
		<div>
			<a href="pag4.php"><img class="icono" src="img/R.png"></a>
		</div>
	</nav>

</body>
</html>