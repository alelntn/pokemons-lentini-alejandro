<?php
$numero= $_GET["numero"];

$conexion = mysqli_connect("localhost", "root", "", "pokemons-lentini-alejandro");

	if(!$conexion){
		die("Error de conexion.");
	}

	$buscarPokemon = "SELECT * FROM pokemon where numero =" . $numero ;
	$resultado = mysqli_query($conexion, $buscarPokemon);
    $fila = mysqli_fetch_assoc($resultado);

	include_once("header.php");

?>

	<h3 class='w3-indigo w3-center'>MODIFICAR POKEMONES</h3><br><br>

	<form action="validarmodificar.php" method="post" enctype="multipart/form-data">		
		<img src="<?php echo $fila['imagen'];?>" class='imagenpokemon'><br><br>

		<label>Numero</label>
		<input type="text" name="numero" placeholder="Ingrese numero" value="<?php echo $fila['numero'];?>" readonly><br><br>

		<label>Nombre</label>
		<input type="text" name="nombre" placeholder="Ingrese nombre" value="<?php echo $fila['nombre'];?>"><br><br>

		<label>Tipo</label>
		<input type="text" name="tipo" placeholder="Ingrese tipo" value="<?php echo $fila['tipo'];?>"><br><br>

		<input type="submit" name="modificar" value="CONFIRMAR MODIFICACION" class='w3-button w3-round w3-blue'>
	</form>

	</div>

</body>
</html>
