<?php
include_once "Vehiculo.php";


 

$vehiculos=array(new Vehiculo("MFJ223","HOY",2000),
                    new Vehiculo("CIS432","MAÑANA",5000),
                    new Vehiculo("IUE234","HOY",400));


foreach($vehiculos as $vehiculo){
    Vehiculo::Guardar($vehiculo);
}

?>