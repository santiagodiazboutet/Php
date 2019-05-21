<?php

class Producto{
    private $id;
    private $nombre;
    private $importador;
    private $paisOrigen;
    private $kilos;

    public function __constructor($tam=1000, $kilo=0){
        $this->Tamaño=$tam;
        $this->kilos=$kilo;
        print($this->Tamaño);

    }
    public function getKilo(){
        return $this->kilos;
    }
    public function getTamaño(){
        return $this->Tamaño;
    }

}





?>