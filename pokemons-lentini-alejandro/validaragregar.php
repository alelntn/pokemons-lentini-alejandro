<?php

$numero = $_POST["numero"];
$nombre = $_POST["nombre"];
$tipo = $_POST["tipo"];

include ("header.php");

if (empty ($numero)){
    die ("<div class='w3-container w3-blue'>Faltan datos. <a href='agregar.php'> Realizar nueva carga.</a></div>");
    }



$conexion = mysqli_connect("localhost", "root", "", "pokemons-lentini-alejandro");

	if(!$conexion){
		die("Error de conexion.");
	}

	$buscarPokemon = "SELECT * FROM pokemon where numero ='" . $numero . "' or nombre = '". $nombre ."'";
	$resultado = mysqli_query($conexion, $buscarPokemon);
        
    $count = mysqli_num_rows($resultado);
    $directorio="";
    if($count == 1){
        echo '<div class="w3-container w3-blue">Pokemon ya existente.<a href="agregar.php"> Volver a intentar carga.</a></div>';
    }else {
            if($_FILES["file"]["error"] > 0){
            echo "Error: " . $_FILES["file"]["error"] . "<br />";
            }   else{
                                        
                    if(file_exists("imagenes" . $_FILES["file"]["name"])){
                        echo $_FILES["file"]["name"] . " ya existe. ";
                        } else{
                            move_uploaded_file($_FILES["file"]["tmp_name"],
                            "recursos/imagenes/" . $_FILES["file"]["name"]);
                           $directorio = "recursos/imagenes/" . $_FILES["file"]["name"];                            
                            }
                }


        $query = "INSERT INTO pokemon (nombre, numero, tipo, imagen) VALUES
                    ('" . $nombre . "','" . $numero . "','" . $tipo . "','" . $directorio . "')";
    
        $insert = mysqli_query($conexion, $query);
    if($insert == TRUE){
        echo '<div class="w3-container w3-blue"><p>Pokemon Insertado Correctamente.</p></div><br>';
        echo '<div <div class="w3-container w3-blue"><a href="agregar.php"> Realizar nueva carga.</a></div>';
    }else {
        echo '<div class="w3-container w3-blue"><p>Error en la Carga de Pokemon</p></div>';
        }
    }

    echo "</div></body></html>";
?>


