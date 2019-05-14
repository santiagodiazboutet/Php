<?php
include "Pasajero.php";


$pasajero1=new Pasajero("Perez","Juan","22212",true);
$pasajero2=new Pasajero("Romina","Hernandez","1233345",false);

echo nl2br($pasajero1->GetInfoPasajero() . "\n");
echo nl2br($pasajero2->GetInfoPasajero() . "\n");

Pasajero::MostrarPasajero($pasajero1);











?>