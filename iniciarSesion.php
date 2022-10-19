<?php
    include("manto_usuarios.php");
    //$usuario = $_POST['usuario'];
    //$contrasena = $_POST['contrasena'];
    $usuario = "makigod";
    $contrasena = "prueba1";

    if(($usuario != "") and ($contrasena != "")){
            $resultado = usuarios::getLogin($usuario, $contrasena);
            
                header('Content-type: application/json; charset=utf-8');
                $json_string = json_encode($resultado);
                echo $json_string;
            
    }

?>