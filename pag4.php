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

	$lista4 = "";
	foreach ($xml->compra4 as $compra4) {
		$lista4 .= "<div class='checkbox'>
		  				<label>$compra4</label>
					 </div>";
	}
	$xml = simplexml_load_file('datos.xml');
	

	if( isset($_POST['enviar4']) ){
		$xml->addChild('compra4', $_POST['nueva4']);
		file_put_contents("datos.xml", $xml->asXML());
	}
	if( isset($_POST['k']) ){
		$num = (integer)$_POST['k'];
		unset( $xml->compra4[ $num ] );
		file_put_contents("datos.xml", $xml->asXML());
	}

	$lista4 = "";
	$k = 0;
	foreach( $xml->compra4 as $compra4 ){
		$lista4 .= "<form method='POST' action='pag4.php'>
						<div class='checkbox'>
			  				<label class='resultado'>$compra4</label>
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
<body style="background-color:#a6e4f6;">

	<header>
		<h1 class="nombre">Ronaldo</h1>
		
	</header>

	<div class="compras">
			<?= $lista4 ?>
		</div>

	<form method="POST" action="pag4.php">
		<div id="nueva">
			<input type="text" style="background:#2cacbc" name="nueva4" class="texto">
			<input type="submit" style="background:#2cacbc" name="enviar4" value="+" class="listo">
		</div>
	</form>

	
	<nav>
		<div>
			<a href="index.php"><img class="icono" src="img/E4.png"></a>
		</div>
		<div>
			<a href="pag2.php"><img class="icono" src="img/M4.png"></a>
		</div>
		<div>
			<a href="pag3.php"><img class="icono" src="img/B4.png"></a>
		</div>
		<div>
			<a href="pag4.php"><img class="icono" src="img/R4.png"></a>
		</div>
	</nav>

</body>
</html>