<!DOCTYPE HTML>
<html>
<body>
   <?php
    include ('header.php');
    if(isset($_POST["submit"])){
    $nombre = $_POST["usuario"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
        
    $conexion = mysqli_connect("localhost", "root", "", "pokemons-lentini-alejandro");

    $buscarUsuario = "SELECT * FROM USUARIO WHERE USUARIO='" . $nombre . "'";
    $resultado = mysqli_query($conexion, $buscarUsuario);
        
    $count = mysqli_num_rows($resultado);
        
    if($count == 1){
        echo '<div>Usuario ya utilizado.<a href="registrarse.php"> Volver a intentarlo</a></div>';
    }else {
        $query = "INSERT INTO USUARIO (usuario, email, password) VALUES ('" . $nombre . "','" . $email . "','" . $pass . "')";
    
        $insert = mysqli_query($conexion, $query);
    if($insert == TRUE){
        echo '<div>Registro completado exitosamente.<a href="login.php"> Iniciá sesión</a></div>';
    }else {
        echo '<div>Registro fallido.</div>';
        }
        }
    }

?>

    <div class="w3-card-4 w3-display-middle">        
        
        <form action="registrarse.php" method="post" class="w3-container">
            <h2 class="w3-center w3-text-blue">Registracion</h2>       
         <div>
              <input type="text" class="w3-input w3-border" name="usuario" placeholder="Usuario" required>
         </div><br>
         <div>
            <input type="email" class="w3-input w3-border" name="email" placeholder="E-mail" required>
         </div><br>
         <div>
            <input type="password" class="w3-input w3-border" name="pass" placeholder="Contraseña" required>
         </div><br>
         <div>
            <button type="submit" class="w3-input w3-border w3-blue" name="submit">Registrarse</button>
         </div>
               
    </form>
    <p class="w3-center w3-text-indigo"><a href="login.php">Volver</a></p>
</div>
    
</body>
</html> 