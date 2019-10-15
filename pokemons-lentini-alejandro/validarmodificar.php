<?php
$numero = $_POST["numero"];
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];

$conexion = mysqli_connect("localhost", "root", "", "pokemons-lentini-alejandro");

	if(!$conexion){
		die("Error de conexion.");
	}

    include ("header.php");

    $modificarPokemon = "UPDATE pokemon SET nombre = '". $nombre ."', tipo = '" . $tipo . "' WHERE numero = " . $numero . "";
	$resultado = mysqli_query($conexion, $modificarPokemon);

    if($resultado == TRUE){
        echo '<div class="w3-container w3-blue">Pokemon ha sido modificado correctamente.</div>';
    }else {
        echo '<div class="w3-container w3-blue">Modificación no realizada.</div>';
        }

    echo "</div></body></html>"    

?>