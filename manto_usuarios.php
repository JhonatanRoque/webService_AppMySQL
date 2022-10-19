<?php

    class usuarios{
        
    //Metodo para consultar si existe una cuenta con dicho usuario y contraseña
    public static function getLogin($email, $clave){
    include("connection_db.php");
    
    // Consulta de la tabla usuarios para verificar email existentes.
    $query = "SELECT * FROM tb_usuario WHERE usuario = ? and clave = ?";
    try {    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($email,$clave));
          $row = $comando->fetch(PDO::FETCH_ASSOC);
          $filasAfectadas = $comando->rowCount();
          if( $filasAfectadas > 0){
            return $row;
          }
          $mensaje = "No existe ningun usuario con dichas credenciales";
          return $mensaje;

        } catch (PDOException $e) {
            return -1;
        }
        
    }
        
    //Metodo para registrar usuarios
    public static function setUser($nombres, $apellidos, $correo, $usuario, $clave, $tipo, $estado, $pregunta, $respuesta){
        include ("connection_db.php");
        $query = "INSERT INTO tb_usuario (nombre, apellido, correo, usuario, clave, tipo, estado, pregunta, respuesta)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        try{
            $CheckUser = usuarios::checkUserName($usuario);
            if($CheckUser == 1){
                $mensaje = "Nombre de usuario no diponible, escoja otro.";
                return $mensaje;
            }
            $CheckUserEmail = usuarios::checkUserEmail($correo);
            if($CheckUserEmail == 1){
                $mensaje = "Correo electrónico en uso, utilice otro.";
                return $mensaje;
            }
            

            $comando = $link -> prepare ($query);
            $comando -> execute (array($nombres, $apellidos, $correo, $usuario, $clave, $tipo, $estado, $pregunta, $respuesta));
            $row = $comando -> rowCount();
            if($row > 0){
                return 1;
            }else{
                return 2;
            }
        }catch(PDOException $e){
            return $e;
        }

    }

    //Metodo para comprobar si ya existe un usuario con dicho nombre
    private static function checkUserName($usuario){
        $query = "SELECT usuario FROM tb_usuario WHERE usuario = ?";
        try{
            $link = conexion();
            $comando = $link -> prepare ($query);
            $comando -> execute (array($usuario));
            $row = $comando -> rowCount();
            if($row > 0){
                //significa que encontro una cuenta que ya tiene ese nombre de usuario
                //No permite crear cuenta si esto sucede
                return 1;
            }else{
                //No encontro ninguna cuenta con dicho nickname
                //puede continuar con el registro 
                return 0;
            }
        }catch(PDOException $e){
            return $e;
        }
    }
      //Metodo para comprobar si ya existe un usuario con dicho correo
      private static function checkUserEmail($correo){
        $query = "SELECT correo FROM tb_usuario WHERE correo = ?";
        try{
            $link = conexion();
            $comando = $link -> prepare ($query);
            $comando -> execute (array($correo));
            $row = $comando -> rowCount();
            if($row > 0){
                //significa que encontro una cuenta que ya tiene ese nombre de usuario
                //No permite crear cuenta si esto sucede
                return 1;
            }else{
                //No encontro ninguna cuenta con dicho nickname
                //puede continuar con el registro 
                return 0;
            }
        }catch(PDOException $e){
            return $e;
        }
    }
        
        
    }
    //by Tec. Francisco Abarca 
    //Modificado por: Tec. Francisco Abarca
    //Fecha modificación: 18/10/2022 08:20 pm

?>