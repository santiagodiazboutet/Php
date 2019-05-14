<?php
require "Vuelo.php";


$pasajero1=new Pasajero("Perez","Juan","22212",true);
$pasajero2=new Pasajero("Romina","Hernandez","1233345",false);
$pasajero3=new Pasajero("Maria","Lobos","4334443",false);
$pasajero4=new Pasajero("Johan Sebastian","Mastropiero","1233346",true);

$vuelo1=new Vuelo("Aerolineas",1500,3);
$vuelo1->AgregarPasajero($pasajero1);
$vuelo1->AgregarPasajero($pasajero2);
$vuelo1->AgregarPasajero($pasajero3);
$vuelo1->AgregarPasajero($pasajero4);


$vuelo1->MostrarVuelo();
$vuelo1=Vuelo::Remove($vuelo1,$pasajero1);
$vuelo1->MostrarVuelo();







?>