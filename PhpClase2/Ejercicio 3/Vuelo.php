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
        $aux=false;
        if(count($this->_listaDePasajeros)==0){
            array_push($this->_listaDePasajeros,$pasaj);
        }else{
            foreach($this->_listaDePasajeros as $pasajero){
                if($pasajero->Equals($pasaj)){
                    $aux=true;
                }
            }
            if(count($this->_listaDePasajeros) < $this->_cantMaxima && $aux!=true){
                    
                array_push($this->_listaDePasajeros,$pasaj);
            }
        }
    }

    public function MostrarVuelo(){
        echo nl2br("Fecha: " . $this->_fecha . "\n");
        echo nl2br("Empresa: " . $this->_empresa . "\n");
        echo nl2br("Precio: " . $this->_precio . "\n");
        echo nl2br("Cantidad maxinma de pasajeros: " . $this->_cantMaxima . "\n");
       foreach($this->_listaDePasajeros as $pasajero){
        Pasajero::MostrarPasajero($pasajero);
        }
    }

    public static function Add($vuelo1, $vuelo2){
        $acumulador=0;

        $aux=$vuelo1->_precio/5;
        foreach($vuelo1->_listaDePasajeros as $pasajero){
            if($pasajero->getEsPLus){
                $acumulador-=$aux;
            }
            $acumulador+=$vuelo1->_precio;
        }
        $aux=$vuelo2->_precio/5;
        foreach($vuelo2->_listaDePasajeros as $pasajero){
            if($pasajero->getEsPLus){
                $acumulador-=$aux;
            }
            $acumulador+=$vuelo2->_precio;
        }
        return $acumulador;
    }

    public static function Remove($vuelo1,$pasajero){
        $i=0;
        foreach($vuelo1->_listaDePasajeros as $Pasaje){
            
            if($Pasaje->Equals($pasajero))
            {
                unset($vuelo1->_listaDePasajeros[$i]);
                break;
            }
            $i++;
        }    
        return $vuelo1;
    }


}

?>