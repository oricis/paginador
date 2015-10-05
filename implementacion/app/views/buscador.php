<?php

	if (isset($this->arr_datos) && $this->arr_datos && is_array($this->arr_datos)) {
		
		$arr_provincias    = (isset($this->arr_datos['provincias'])) ? $this->arr_datos['provincias'] : NULL;
		$arr_regiones 	   = (isset($this->arr_datos['regiones']))   ? $this->arr_datos['regiones']   : NULL;
		$botones_paginador = (isset($this->arr_datos['botones'])) 	 ? $this->arr_datos['botones']    : NULL;
		
		if ($botones_paginador) {
			//prob('views/buscador.php -> botones:'); dev($botones_paginador); die(); //traza
		}
		
		$seleccion_actual  = ($arr_regiones && isset($arr_regiones[0]['seleccionado'])) 
			? $arr_regiones[0]['seleccionado'] 
			: NULL;

		$options_provincias = ($arr_provincias) 
			? BuscadorComposer::getOptions($arr_provincias, $seleccion_actual) 
			: NULL;

		$resultados = ($arr_regiones) 
			? BuscadorComposer::getResultados($arr_regiones) 
			: NULL;

		//dev('Provincia seleccionada: ' . $seleccion_actual);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Buscador regiones</title>

	<style>

		body { 
			background: lightgray; 
		}

			.wrap { 
				background: white;
				margin: 5% 8%;
				padding: 5% 8%;
			}

			.resultados {
				background: lightblue;
				clear: both;
				margin: 32px auto;
				padding: 5% 10%;
			}

		input {
			float: right;
			text-align: center;
			width: 120px;
		}
		select {
			background: lightblue;
			float: left;
			
			width: 80%;
		}

		input, 
		select {
			border: 2px solid darkblue;
			border-radius: 5px;
			display: inline;
			font-size: 18px;
			height: 32px;
			margin: 20px 0;
		}
		
		.aviso {
			color: darkgrey;
			font-style: italic;
		}


		/***************/
		/*** Botones ***/

			footer { /* caja para los botones -> poner al centro */
				background: white;
				height: 200px;
				text-align: center;
				width: 100%;
			}
				.paginador {
					margin: 5% auto;
					padding: 20px 0;
					text-align: center;
				}
					
					.btn-actual {
						background: transparent !important;
						border-color: #E6BEBE !important;
					}
					.btn-paginador {
						background: #E6BEBE;
						border: 2px solid #700A0A;
						border-radius: 5px;
						color: #700A0A;
						display: inline-block;
						text-decoration: none;
						font-size: 18px;
						font-weight: bolder;
						margin: 12px 3px;
						padding: 8px 20px;
					}

	</style>
</head>
<body>

	<div class="wrap">
		<h1>Viendo regiones por provincia (datos ficticios)</h1>

		<form action="index.php">
			<select name="provincias" id="selector-provincias">

<?php
	if ($options_provincias)
		echo $options_provincias;
	else {
?>
				<option selected>No hay provincias registradas</option>
<?php
	}
?>
			</select>
			<input type="submit" value="Consultar">
		</form>

		<div class="resultados">
<?php

	if ($resultados)
		echo $resultados;

?>		
		</div>
		<footer>
<?php
	//
	// BOTONES DEL PAGINADOR
	// 
	if ($botones_paginador)
		echo $botones_paginador;
	
?>
		</footer>
	</div>

</body>
</html>

