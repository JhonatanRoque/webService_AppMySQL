<?php
    include("manto_usuarios.php");

    //Recibir variables;
    $nombres = "Makima";
    $apellidos = "Shoto";
    $correo = "makigod@gmail.com";
    $usuario = "makigod";
    $clave = "prueba1";
    $tipo = 1;
    $estado = 1;
    $pregunta = "¿IDE prefereido?";
    $respuesta = "vim";

    if(($nombres != "") and ($apellidos != "") and ($correo != "") and 
        ($usuario != "") and ($clave != "") and ($tipo != "") and
        ($estado != "") and ($pregunta != "") and ($respuesta != "")){
            
            $resultado = usuarios::setUser($nombres, $apellidos, $correo, $usuario, $clave, $tipo, $estado, $pregunta, $respuesta);

            if($resultado == 1){
                header('Content-type: application/json; charset=utf-8');
                $json_string = json_encode(array("estado" => 1, "mensaje" => "¡Cuenta creada con exito!"));
                echo $json_string;
            }else if ($respuesta == 2){
                header('Content-type: application/json; charset=utf-8');
                $json_string = json_encode(array("estado" => 2, "mensaje" => "¡No se pudo crear la cuenta!"));
                echo $json_string;
            }else { 
                header('Content-type: application/json; charset=utf-8');
                $json_string = json_encode(array("estado" => 3, "mensaje" => $resultado));
                echo $json_string;
            }

    }
?>