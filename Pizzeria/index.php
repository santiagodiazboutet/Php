<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilos.css">

    <title>Document</title>
</head>

<body>
<?php
/*A- (1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.*/
require_once "./Classes/Pizzeria.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        if(key($_POST)=='consultaPizza'){

            require_once 'Handlers/PizzaConsultar.php';
        }else if(key($_POST)=='altaVenta'){
            require_once 'Handlers/AltaVenta.php';
        }else
        if(key($_POST)=="pizzaCarga") {
            require_once 'Handlers/PizzaCarga.php';
         }
        break;
    case 'GET':
        if(key($_GET)=="pizzaCarga") {
        require_once 'Handlers/PizzaCarga.php';
        }  else if(key($_GET)=="listaImagenes") {
            require_once 'Handlers/ListadoDeImagenes.php';
        }      
    break;   
    case 'PUT':
            require_once 'Handlers/PizzaCargaPlus.php';
        break;
    case 'DELETE':
            require_once 'Handlers/BorrarPizza.php';
        break;
    default:
        # code...
        break;
}







?>
</body>

</html>