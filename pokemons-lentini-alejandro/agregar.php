<?php

include_once("header.php");
		
		echo "
		<h3 class='w3-indigo w3-center'>Agregar Pokemones</h3>
		
		<form action='validaragregar.php' method='post' enctype='multipart/form-data'>
			<p>INSERTE POKEMON</p>
			<label>Numero</label>
			<input type='text' name='numero' placeholder='Ingrese numero'><br><br>

			<label>Nombre</label>
			<input type='text' name='nombre' placeholder='Ingrese nombre'><br><br>

			<label>Tipo</label>					
					<select name='tipo' id='tipo'>
						<option value='Sin Tipo'>Ingrese tipo   </option>
						<option value='Planta'>Planta</option>
						<option value='Fuego'>Fuego</option>
						<option value='Agua'>Agua</option>
						<option value='Bicho'>Bicho</option>
						<option value='Tierra'>Tierra</option>
						<option value='Veneno'>Veneno</option>
					</select>
					

			<br><br>

			<input type='file' name='file' class='w3-round w3-button w3-blue'><br><br>

			<input type='submit' name='agregar' value='AGREGAR' class='w3-button w3-round w3-blue'>
		</form>


		</div>
	</body>
</html>		"

?>