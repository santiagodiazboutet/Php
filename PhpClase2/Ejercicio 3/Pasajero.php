<?php
class Pasajero{
    private $_apellido;
    private $_nombre;
    private $_dni;
    private $_esPlus;

    public function __construct($apellido, $nombre, $dni , $esPlus){
        $this->_apellido=$apellido;
        $this->_nombre=$nombre;
        $this->_dni=$dni;
        $this->_esPlus=$esPlus;
    }

    public function Equals($pasajero){
        if($this->_dni==$pasajero->_dni){
            return true;
        }
        return false;
    }

    public function GetInfoPasajero(){
        $aux="Apellido: " . $this->_apellido . ". ";
        $aux.="Nombre: " . $this->_nombre . ". ";
        $aux.="DNI: " . $this->_dni . ". ";
        $aux.="Es cliente plus : " . $this->_esPlus . ". ";
        return $aux;
    }

    public static function MostrarPasajero($Pasajero){

        echo nl2br("Apellido: " . $Pasajero->_apellido . "\n");
        echo nl2br("Nombre: " . $Pasajero->_nombre . "\n");
        echo nl2br("Dni: " . $Pasajero->_dni . "\n");
        echo nl2br("Es cliente plus : " . $Pasajero->_esPlus . "\n");

    }
    public function getEsPLus(){
        return $this->esPlus;

    }
}
?>