<?php
include "Pasajero.php";
class Vuelo {
private $_fecha;
private $_empresa;
private $_precio;
private $_listaDePasajeros;
private $_cantMaxima;
    public function __construct($empresa, $precio, $maxPasajeros=50){
        $this->_fecha=date("Y-m-d");
        $this->_empresa=$empresa;
        $this->_precio=$precio;
        $this->_cantMaxima=$maxPasajeros;
        $this->_listaDePasajeros=array();
    }
    public function getCantMaxima(){
        return $this->_cantMaxima;
    }
    public function getInfoVuelo(){
        $aux="Fecha: " . $this->_fecha . ". ";
        $aux.="Empresa: " . $this->_empresa . ". ";
        $aux.="Precio: " . $this->_precio . ". ";
        $aux.="Cantidad maxinma de pasajeros: " . $this->_canrMaxima . ". ";
        foreach($this->listaDePasajeros as $pasajero){
            $aux.=$pasajero->GetInfoPasajero();
        }
        return aux;
    }

    public function AgregarPasajero($pasaj){
        foreach($this->_listaDePasajeros as $pasajero){
            if($pasajero->Equals($pasaj)){
                if(count($this->_listaDePasajeros)<$this->_cantMaxima){
                    array_push($this->_listaDePasajeros,$pasaj);
                }else{
                    echo nl2br("\nEste Vuelo se encuentra lleno");
                }
            }else{
                echo nl2br("\nEste pasajero ya se encuentra en el vuelo");
            }
        }
    }


    }

?>