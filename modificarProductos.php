<?php
include ("main_class.php");
//$codigo = $_POST['id_prod'];
//$nombre = htmlspecialchars($_POST["nom_prod"], ENT_QUOTES);
//$descripcion = htmlspecialchars($_POST["des_prod"],ENT_QUOTES);
//$stock = $_POST["stock"];
//$precio = htmlspecialchars($_POST["precio"],ENT_QUOTES);
//$unidadMedida = htmlspecialchars($_POST['uni_medida'], ENT_QUOTES);
//$estado = $_POST["estado_prod"];
//$categoria = $_POST["categoria"];

$codigo = 1;
$nombre = "celular";
$descripcion = "A 10s, 2GB RAM";
$stock = 15;
$precio = 200;
$unidadMedida = "U";
$estado = 1;
$categoria = 100;

if (($codigo!="") and
    ($nombre != "") and
    ($descripcion!="") and 
    ($stock!="") and 
    ($precio!="") and 
    ($unidadMedida!="") and
    ($estado!="") and 
    ($categoria!="")) {

        $resultado = MantenimientoProductos::modificar_Productos($codigo, $nombre, $descripcion, $stock, $precio, $unidadMedida, $estado, $categoria);

        if ($resultado==1) {
            header('Content-type: application/json; charset=utf-8');
            $json_string = json_encode(array("estado" => 1,"mensaje" => "Registro modificado correctamente."));
            echo $json_string;
            //echo "Registro guardado...";
        } else {
            header('Content-type: application/json; charset=utf-8');
            $json_string = json_encode(array("estado" => 2,"mensaje" => "No se ha modificado nada."));
            echo $json_string;
        }
}

?>