<?php 

var_dump($_POST);
if (isset($_GET["sabor"]) && isset( $_GET ["tipo"] ) && isset( $_GET ["cantidad"]) && isset($_GET ["precio"]))
{
    Pizzeria::agregarPizza($_GET["sabor"], $_GET["tipo"], $_GET["precio"], $_GET["cantidad"]);
}
if (isset($_POST["sabor"]) && isset( $_POST ["tipo"] ) && isset( $_POST ["cantidad"]) && isset($_POST ["precio"]))
{
    Pizzeria::agregarPizza($_POST["sabor"], $_POST["tipo"], $_POST["precio"], $_POST["cantidad"]);
}


?>