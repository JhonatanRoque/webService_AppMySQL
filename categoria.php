<?php
class Categoria {

    public static function guardar_Categoria($idCat, $nomCategoria, $estadoCategoria){
        include("connection_db.php");
        $query = "INSERT INTO  tb_categoria (id_cat, nom_categoria, estado_categoria)
                                VALUES (?, ?, ?)";
        try{    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($idCat, $nomCategoria, $estadoCategoria));
          $count = $comando->rowCount();
         //echo $count;
          if($count > 0){
              return 1;
          }else{
              return 0;
          }
        } catch (PDOException $e) {
            return -1;
        }                        
    }

    public static function eliminar_Categoria($idCat) {
        include("connection_db.php");
        $query = "DELETE FROM tb_categoria WHERE id_cat = ?";
        try{    
          $link=conexion();    
          $comando = $link->prepare($query);
          $comando->execute(array($idCat));
          $count = $comando->rowCount();
         //echo $count;
          if($count > 0){
              return 1;
          }else{
              return 0;
          }
        } catch (PDOException $e) {
            return -1;
        }                        
    }

    public static function obtenerCategorias() {
        include("connection_db.php");
        
        $query = "SELECT * FROM tb_categoria";

        try {
            $link=conexion();    
            $comando = $link->prepare($query);
            // Ejecutar sentencia preparada
            $comando->execute();
            
            $rows_array = array();
            while($result = $comando->fetch(PDO::FETCH_ASSOC))
                {
                                       
                     $array [] = array('idCategoria' => $result['id_cat'], 'nombreCategoria' => $result['nom_categoria'], 'estadoCategoria' => $result['estado_categoria']);
                    
                }
                
                //array_map("utf8_encode", $array);
  	            header('Content-type: application/json; charset=utf-8');
  	            return print_r(json_encode($array), JSON_UNESCAPED_UNICODE);
  	           
        } catch (PDOException $e) {
            return false;
        }
        
    }
    
    //by Tec. Francisco Abarca 
    //Modificado por: Tec. Francisco Abarca
    //Fecha modificación: 08/10/2022 11:30 am
}
?>