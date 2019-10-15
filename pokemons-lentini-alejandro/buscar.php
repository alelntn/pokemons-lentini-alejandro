<?php

include_once("header.php");
include_once("botones.php");

		echo "<h3 class='w3-indigo w3-center'>Pokemones</h3>";

	
	$nombre = $_POST["nombre"];

	$conexion = mysqli_connect("localhost", "root", "", "pokemons-lentini-alejandro");

	if(!$conexion){
	die("Error de conexion.");
	}

	$buscarPokemon = "SELECT * FROM pokemon where nombre like '%". $nombre ."%' or tipo like '%" .$nombre . "%' order by numero asc";

	$resultado = mysqli_query($conexion, $buscarPokemon);

	$count = mysqli_num_rows($resultado);

    if($count == 0){
    	$buscarTodos = "SELECT * FROM pokemon order by numero asc";

		$resultado = mysqli_query($conexion, $buscarTodos);
		echo "<p class='w3-red w3-center'>Pokemon no encontrado</p> ";
        echo "<table class='w3-table'>";	
				while($pokemon = mysqli_fetch_assoc($resultado)) {
					echo "<tr>
							<td><img class='imagenpokemon' src='". $pokemon["imagen"] . "'></td>						
							<td><p class='w3-blue-grey'>Numero: ". $pokemon["numero"] . " </p>
							<p>Nombre: ". $pokemon["nombre"] . " </p>
							<p>Tipo: ". $pokemon["tipo"] . " </p></td>
							<td><button type='button' class='w3-button w3-round w3-blue'><a href='modificar.php?numero=" . $pokemon["numero"] . "'>MODIFICAR</a></button>
							<button type='button' class='w3-button w3-round w3-blue'><a href='eliminar.php?numero=" . $pokemon["numero"] . "'>ELIMINAR</a></button></td>
						  	</tr>			  
						";
				}			
		echo "</table>";

    }else {
		echo "<table class='w3-table'>";	
				while($pokemon = mysqli_fetch_assoc($resultado)) {
					echo "<tr>
							<td><img class='imagenpokemon' src='". $pokemon["imagen"] . "'></td>						
							<td><p class='w3-blue-grey'>Numero: ". $pokemon["numero"] . " </p>
							<p>Nombre: ". $pokemon["nombre"] . " </p>
							<p>Tipo: ". $pokemon["tipo"] . " </p></td>
							<td><button type='button' class='w3-button w3-round w3-blue'><a href='modificar.php?numero=" . $pokemon["numero"] . "'>MODIFICAR</a></button>
							<button type='button' class='w3-button w3-round w3-blue'><a href='eliminar.php?numero=" . $pokemon["numero"] . "'>ELIMINAR</a></button></td>
						  	</tr>			  
						";
				}			
		echo "</table>";
		}
	

echo"
	</div>			
	</body>
</html>";


?>