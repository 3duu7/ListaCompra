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

	$lista3 = "";
	foreach ($xml->compra3 as $compra3) {
		$lista3 .= "<div class='checkbox'>
		  				<label>$compra3</label>
					 </div>";
	}
	$xml = simplexml_load_file('datos.xml');
	

	if( isset($_POST['enviar3']) ){
		$xml->addChild('compra3', $_POST['nueva3']);
		file_put_contents("datos.xml", $xml->asXML());
	}
	if( isset($_POST['k']) ){
		$num = (integer)$_POST['k'];
		unset( $xml->compra3[ $num ] );
		file_put_contents("datos.xml", $xml->asXML());
	}

	$lista3 = "";
	$k = 0;
	foreach( $xml->compra3 as $compra3 ){
		$lista3 .= "<form method='POST' action='pag3.php'>
						<div class='checkbox'>
			  				<label class='resultado'>$compra3</label>
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
<body style="background-color:#fd8d8d;">

	<header>
		<h1 class="nombre">Batistuta</h1>	
		
	</header>

	<div class="compras">
			<?= $lista3 ?>
		</div>

	<form method="POST" action="pag3.php">
		<div id="nueva">
			<input type="text" style="background:#e41504" name="nueva3" class="texto">
			<input type="submit" style="background:#e41504" name="enviar3" value="+" class="listo">
		</div>
	</form>
	
	<nav>
		<div>
			<a href="index.php"><img class="icono" src="img/E3.png"></a>
		</div>
		<div>
			<a href="pag2.php"><img class="icono" src="img/M3.png"></a>
		</div>
		<div>
			<a href="pag3.php"><img class="icono" src="img/B3.png"></a>
		</div>
		<div>
			<a href="pag4.php"><img class="icono" src="img/R3.png"></a>
		</div>
	</nav>

</body>
</html>