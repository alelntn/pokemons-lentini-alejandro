<!DOCTYPE HTML>
    <html>  
    <body>
    <?php
        include ('header.php');
    
        $nombre = ' ';

        if(isset($_COOKIE['login'])){    
        $nombre = $_COOKIE['login'];
        }

        if(isset($_POST['submit'])){
        $nombre = $_POST["usuario"];
        $pass = $_POST["pass"];

        $conexion = mysqli_connect("localhost", "root", "", "pokemons-lentini-alejandro");

        $query = "SELECT * FROM USUARIO WHERE USUARIO = '" . $nombre . "'";
        $resultado = mysqli_query($conexion, $query);
    
        if($row = mysqli_fetch_assoc($resultado)){
        if($row["password"] == $pass){
            session_start();
	        $_SESSION['user'] = true;
            setcookie('login',$nombre,time()+1000);
	        header("Location:index.php");
	        exit();
        }else{
            echo '<div>Contraseña ingresada es incorrecta. Vuelva a <a href="login.php">intentarlo</a></div>';
        }
    }else{
        echo '<div>Usuario ingresado es incorrecto. Vuelva a <a href="login.php">intentarlo</a></div>';
    }
    
    }

    ?>
    <div class="w3-card-4 w3-display-middle">
        <div class="w3-container w3-indigo">
            <h2 class="w3-center">Iniciar sesión</h2>  
        </div><br> 
    <form action="login.php" method="post" class="w3-container">
             
        <label class="w3-text-blue"><b>Usuario</b></label>
        <input class="w3-input w3-border" type="text" name="usuario" placeholder="Usuario" required>

        <label class="w3-text-blue"><b>Password</b></label>
        <input class="w3-input w3-border" type="password" name="pass" placeholder="Contraseña" required><br>

        <button class="w3-btn w3-blue w3-border" type="submit" name="submit">Iniciar</button>
                
    </form>

    <p class="w3-center w3-text-indigo"><a href="registrarse.php">Crear una cuenta</a></p>
</div>
</body>
</html> 