<?php
    include('conect.php');
    if (!empty($_POST)) {
        $usuario = mysqli_real_escape_string($con, $_POST["Usuario"]);
        $pass = mysqli_real_escape_string($con, $_POST["Clave"]);
        $pass_encrip = sha1($pass);

        $consultaSql = "SELECT idUsuario FROM usuarios WHERE usuario = '$usuario' AND clave = '$pass_encrip'";
        
        // Ejecucion de la sentencia de sql
        $resultado = $con->query($consultaSql);
        $rows = $resultado->num_rows;
        if ($rows>0) {
            $row = $resultado-> fetch_assoc();
            $_SESSION['iduser'] = $row['idUsuario'];
            header('Location: usuarios.php');
        }
        else{
            echo "<script>
                    alert('Usuario o contraseña incorrecto')
                    windows.location = '../views/login.html'
                 </script>";
        }

    }
?>