<?php

$json = '{
    "categoria" : "Servicios/productos",
    "empresa" : "servicestechnology",
    "producto" : "Computadora"
}';

$data = json_decode($json);

echo $data->categoria;
echo "\n"
echo $data->empresa;
echo "\n"
echo $data->producto;

echo "\n"


?>