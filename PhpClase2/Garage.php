<?php
include "Auto.php";

class Garage{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos;

    public function __construct($razonSocial,$precio=0){
        $this->_razonsocial=$razonSocial;
        $this->_precioPorHora=$precio;
        $this->_autos=array();
    }
    public function MostrarGarage(){
        echo nl2br("\nRazon social: " . $this->_razonSocial);
        echo nl2br("\nPrecio por hora: " . $this->_precioPorHora . "\n");
        IF($this->_autos!=NULL){
            foreach($this->_autos as $auto){
                Auto::MostrarAuto($auto);

            }
        }else{
            echo nl2br("\nEl garage no tiene ningun auto");
        }
    }
    public function Equals($auto){
        foreach($this->_autos as $autos){
            if($auto->Equals($autos))
            {
                return true;
            }
        }
        return false;
    }

    public function Add ($auto){
        if(!$this->Equals($auto)){
            array_push($this->_autos,$auto);
        }else{
            echo nl2br("\nEste auto ya se encuentra en el garage");
        }

    }
    public function Remove ($auto){
        $i=0;
        foreach($this->_autos as $autos){
            $i++;
            if($auto->Equals($autos))
            {
                array_splice($this->_autos, $i);
                break;
            }
        }
    }
}
?>