<?php
include "conexion.inc.php";
	session_start();
	$carnet = $_SESSION["ci"];
	$roles = $_SESSION["rol"];
	$color = $_POST["color"];
    $resultado = mysqli_query($con, "update usuario set id_color ='".$color."' where ci='".$carnet."'");
       
            
            $_SESSION['color'] = $color;

            switch($roles){
                case 1:
                    header('location: docente.php');
                break;
    
                case 2:
                header('location: estudiante.php');
                break;
    
                default:
        

    }


?>


