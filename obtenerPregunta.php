<?php
include ("manto_usuarios.php");
$correo = htmlspecialchars($_POST['correo'], ENT_QUOTES);

if($correo != ""){
    $resultado = usuarios::getPregunta($usuario);
            
    header('Content-type: application/json; charset=utf-8');
    $json_string = json_encode($resultado);
    echo $json_string;
}

?>