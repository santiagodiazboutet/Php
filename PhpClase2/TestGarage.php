<?php
require "Garage.php";

$auto1=new Auto("Rojo",1500,"Ford","06/94");
$auto2=new Auto("Azul",1500,"Ford","06/94");
$auto3=new Auto("Verde",1500,"Renault","06/94");
$auto4=new Auto("Verde",8500,"Renault","06/94");
$auto5=new Auto("Azul",1500,"Chevrolet","06/94");

$Garage1=new Garage("Garage de la monaaaa");
$Garage2=new Garage ("Garage del monooo", 30);
$Garage1->MostrarGarage();
$Garage2->MostrarGarage();
$Garage1->Add($auto1);
$Garage1->Add($auto1);
$Garage1->Add($auto3);
$Garage1->MostrarGarage();
$Garage1->Remove($auto1);
$Garage1->MostrarGarage();







?>