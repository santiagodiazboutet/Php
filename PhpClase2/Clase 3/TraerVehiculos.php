<?php
include_once "Vehiculo.php";


 

$vehiculos=Vehiculo::Leer();

foreach($vehiculos as $vehiculo){
    $vehiculo->Mostrar();
}


?>