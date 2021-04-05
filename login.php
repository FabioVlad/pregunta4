<?php
include "conexion.inc.php";
  session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: docente.php');
            break;

            case 2:
                header('location: estudiante.php');
            break;

            default:
        }
    }

  if(isset($_POST['username']) && isset($_POST['password'])){
        $usuario = $_POST["username"];
        $contrasena = $_POST["password"];
        $resultado = mysqli_query($con, "select * from usuario where usuario='".$usuario."' and contrasena='".$contrasena."'");
        $row = mysqli_fetch_array($resultado);
        //$resultado = mysqli_query($con, "select * from usuario where usuario=".$usuario." and contrasena=".$contrasena);
        //echo $resultado;
        //$fila = mysqli_fetch_array($resultado);

        //echo $fila;

        if($row == true){
            // validar rol
            $rol = $row[3];
            $ci = $row[0];
            $color = $row[4];
            $_SESSION['rol'] = $rol;
            $_SESSION['ci'] = $ci;
            $_SESSION['color'] = $color;

            switch($_SESSION['rol']){
                case 1:
                    header('location: docente.php');
                break;
    
                case 2:
                header('location: estudiante.php');
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo "El usuario o contraseña son incorrectos";
        }

    }


?>


