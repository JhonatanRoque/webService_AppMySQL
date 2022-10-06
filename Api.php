<?php 

	
	//database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'id19645168_root');
	define('DB_PASS', 'Jonath@n2211');
	define('DB_NAME', 'id19645168_bd_inventario');
	
	//connecting to database and getting the connection object
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	//Checking if any error occured while connecting
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

	//include("connection_db.php");
	//$conn=conexion();  
	
	//creating a query
	$stmt = $conn->prepare("SELECT codigo, descripcion, precio,  FROM tb_articulos;");
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($codigo, $descripcion, $precio, $imagen);
	
	$products = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['codigo'] = $codigo; 
		$temp['descripcion'] = $descripcion; 
		$temp['precio'] = $precio; 
		array_push($products, $temp);
		
			$datos[] = array_map("utf8_encode", $temp);
  	        header('Content-type: application/json; charset=utf-8');
	}
	
	
	//$datos = array();
    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
	
	//displaying the result in json format 
	//echo json_encode($products);
	
?>	