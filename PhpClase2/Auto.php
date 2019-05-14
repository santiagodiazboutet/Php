<?php

class Auto {
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($color, $precio, $marca, $fecha){
        $this->_color=$color;
        $this->_precio=$precio;
        $this->_marca=$marca;
        $this->_fecha=$fecha;
    }


    public function AgregarImpuestos($agregar){
        $this->_precio+=$agregar;
        
    }

    public static function MostrarAuto ($autito){
        echo nl2br("Marca: " . $autito->_marca . "\n");
        echo nl2br("Precio: " . $autito->_precio . "\n");
        echo nl2br("Color: " . $autito->_color . "\n");
        echo nl2br("Fecha: " . $autito->_fecha . "\n\n");
    }

    public function Equals ($auto2){
        return $auto2->_marca==$this->_marca;
    }

    public static function Add ($auto, $auto2){
        if($auto->Equals($auto2) && $auto->_color==$auto2->_color){
            return ($auto->_precio+$auto2->_precio);

        }
        return 0;

    }


}








?>