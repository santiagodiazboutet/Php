<?php

class Vehiculo{
    private $_patente;
    private $_ingreso;
    private $_importe;

    public function __construct($a1,$a2,$a3){

        $this->_patente=$a1;
        $this->_ingreso=$a2;
        $this->_importe=$a3;

    }




    public static function Leer(){
        $renglon;
        $arrayDeDatos=array();
        $retorno=array();
        $archivo=fopen("Vehiculo.txt","r");
        while(!feof($archivo)){
           // echo nl2br("\nHola\n");

            $renglon=fgets($archivo);
            if($renglon!=""){
                $arrayDeDatos=explode(",",$renglon);
                $vehiculo=new Vehiculo($arrayDeDatos[0],$arrayDeDatos[1],$arrayDeDatos[2]);
                
                array_push($retorno,$vehiculo);
            }
        }
        fclose($archivo);
        
        return $retorno;
    }

    public function Mostrar(){
        echo "Patente: $this->_patente Ingreso: $this->_ingreso Importe: $this->_importe <br>";

    }

    public static function Guardar($vehiculo){

        $archivo=fopen("Vehiculo2.txt","a");
       
        $renglon=implode(",", $vehiculo->toArray());
        $renglon.="\n";
        fwrite($archivo,$renglon);
        fclose($archivo);

    }
    public function toArray(){
        $retorno=array($this->_patente , $this->_ingreso , $this->_importe);
        return $retorno;

    }
}
?>