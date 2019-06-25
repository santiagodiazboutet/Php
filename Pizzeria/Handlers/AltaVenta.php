<?php
/*3-
a- (2 pts.) AltaVenta.php: (por POST)se recibe el email del usuario y el sabor,tipo y cantidad ,si el ítem existe en
Pizza.txt, y hay stock guardar en el archivo de texto Venta.txt todos los datos y descontar la cantidad vendida .
b- (1 pt) completar el alta con imagen de la venta , guardando la imagen con el tipo+sabor+mail(solo usuario
hasta el @) y fecha de la venta en la carpeta /ImagenesDeLaVenta.
c- (1 pt)completar el alta con imagen de la pizza, guardando la imagen con el tipo y el sabor como nombre en la
carpeta /ImagenesDePizzas.*/
if (isset($_POST["sabor"]) && isset( $_POST ["tipo"] ) && isset( $_POST ["cantidad"]) && isset($_POST ["mail"]))
{
    echo "hola";
    Pizzeria::AltaVenta($_POST["sabor"], $_POST["tipo"], $_POST["cantidad"], $_POST["mail"] ,$_FILES);
    

}








?>