<?php
    include('conect.php');
    if(isset($_POST['registrar'])){
        $nombre = mysqli_real_escape_string($con, $_POST['Name']);
        $correo = mysqli_real_escape_string($con, $_POST['Email']);
        $usuario = mysqli_real_escape_string($con, $_POST['Nickname']);
        $contraseña = mysqli_real_escape_string($con, $_POST['Contraseña']);
        
        //Clave encriptada
        $claveEncripada = sha1($contraseña);

        //Hacer una consulta para validar si el ususario ya existe
        $consultaUsuario = "SELECT idUsuario FROM usuarios WHERE usuario = '$usuario' ";

        //Consulta en DB
        $continuar = $con -> query($consultaUsuario);

        //Recorrido por las filas
        $filas = $continuar -> num_rows;

        //validacion de registros //Codigo Js
        if ($filas > 0){
            echo "<script>
                    alert('El usurio ya existe')
                    window.location = '../views/register.html'
                 </script>";
        }
        else {
            //insertar el usuario
            $nuevoUsuario = "INSERT INTO usuarios (nombre , correo, usuario, clave) VALUES ('$nombre', '$correo', '$usuario', '$claveEncripada')";
            $continuarUsuario = $con -> query($nuevoUsuario);

            if ($continuarUsuario > 0){
                echo "<script>
                    alert('Usuario registrado con exito')
                    window.location = '../views/login.html  '
                    
                 </script>";
            }
            else {
                echo "<script>
                    alert('Error a registrarse')
                    window.location = '../views/register.html'
                 </script>";
            }
        }
    }
?>