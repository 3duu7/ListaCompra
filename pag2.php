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

	$lista2 = "";
	foreach ($xml->compra2 as $compra2) {
		$lista2 .= "<div class='checkbox'>
		  				<label>$compra2</label>
					 </div>";
	}
	$xml = simplexml_load_file('datos.xml');
	

	if( isset($_POST['enviar2']) ){
		$xml->addChild('compra2', $_POST['nueva2']);
		file_put_contents("datos.xml", $xml->asXML());
	}
	if( isset($_POST['k']) ){
		$num = (integer)$_POST['k'];
		unset( $xml->compra2[ $num ] );
		file_put_contents("datos.xml", $xml->asXML());
	}

	$lista2 = "";
	$k = 0;
	foreach( $xml->compra2 as $compra2 ){
		$lista2 .= "<form method='POST' action='pag2.php'>
						<div class='checkbox'>
			  				<label class='resultado'>$compra2</label>
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
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color:#a3f4a4;">

	<header>
		<h1 class="nombre">Miguel Angel</h1>
		
	</header>

	<div class="compras">
			<?= $lista2 ?>
		</div>

	<form method="POST" action="pag2.php">
		<div id="nueva">
			<input type="text" style="background:#14d424" name="nueva2" class="texto">
			<input type="submit" style="background:#14d424" name="enviar2" value="+" class="listo">
		</div>
	</form>

	<nav>
		<div>
			<a href="index.php"><img class="icono" src="img/E2.png"></a>
		</div>
		<div>
			<a href="pag2.php"><img class="icono" src="img/M2.png"></a>
		</div>
		<div>
			<a href="pag3.php"><img class="icono" src="img/B2.png"></a>
		</div>
		<div>
			<a href="pag4.php"><img class="icono" src="img/R2.png"></a>
		</div>
	</nav>
	
</body>
</html>