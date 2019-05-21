<?php
include "Producto.php";

class Container{
    private $Tamaño;
    public $kilos;
    private $arrayProductos;

    function __construct($tam, $kilo){
        $this->Tamaño=$tam;
        $this->kilos=$kilo;
        
        

    }
    public function getKilo(){
        return $this->kilos;
    }
    public function getTamaño(){
        return $this->Tamaño;
    }
    private function setKilos($kilo){
        $this->kilos=$kilo;
    }
    private function setTamaño($Tam){
        $this->Tamaño=$Tam;
    }

    public function mostrar(){
     
    }



}
?>