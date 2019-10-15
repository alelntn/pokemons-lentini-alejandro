<?php
$numero = $_POST["numero"];

$conexion = mysqli_connect("localhost", "root", "", "pokemons-lentini-alejandro");

	if(!$conexion){
		die("Error de conexion.");
	}

    include ("header.php");

    $modificarPokemon = "DELETE FROM pokemon WHERE numero = " . $numero . "";
	$resultado = mysqli_query($conexion, $modificarPokemon);

    if($resultado == TRUE){
        echo '<div class="w3-container w3-blue">Pokemon ha sido eliminado correctamente.</div>';
    }else {
        echo '<div class="w3-container w3-blue">Eliminación no realizada.</div>';
        }

    echo "</div></body></html>";   

?>