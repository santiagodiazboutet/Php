<?php
include "Auto.php";




$auto1=new Auto("Rojo",1500,"Ford","06/94");
$auto2=new Auto("Azul",1500,"Ford","06/94");
$auto3=new Auto("Verde",1500,"Renault","06/94");
$auto4=new Auto("Verde",8500,"Renault","06/94");
$auto5=new Auto("Azul",1500,"Chevrolet","06/94");


$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

echo Auto::Add($auto1,$auto2);



if($auto1->Equals($auto2)){
    echo nl2br("Auto 1 y 2 son iguales\n");
}
else{
    echo nl2br("Auto 1 y 2 son distintos\n");
}
if($auto1->Equals($auto5)){
    echo nl2br("Auto 1 y 5 son iguales\n");
}
else{
    echo nl2br("Auto 1 y 5 son distintos\n");
}
Auto::MostrarAuto($auto1);
Auto::MostrarAuto($auto3);
Auto::MostrarAuto($auto5);


?>