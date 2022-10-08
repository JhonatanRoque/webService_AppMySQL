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
    
    //by Tec. Francisco Abarca 
    //Modificado por: Tec. Francisco Abarca
    //Fecha modificación: 07/10/2022 07:40 pm
}
?>