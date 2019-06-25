<?php
/*4- (2 pts.)PizzaCargaPlus.php: (por PUT)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de
unidades). Se guardan los datos en en el archivo de texto Pizza.txt, tomando un id autoincremental como
identificador .Si el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.*/


parse_str(file_get_contents("php://input"), $_PUT);
    Pizzeria::agregarPizzaPlus($_PUT['sabor'], $_PUT['tipo'], $_PUT['precio'], $_PUT['cantidad']);




?>