<?php


/*2- (2pt.) PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo
Helados.txt, retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.*/

if(isset($_POST["tipo"])&&isset($_POST["sabor"])){

Pizzeria::existeProducto($_POST["sabor"],$_POST["tipo"]);

}





?>