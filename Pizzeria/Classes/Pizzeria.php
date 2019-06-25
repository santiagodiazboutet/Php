<?php

require_once "Pizza.php";
require_once "Venta.php";
require_once "./Otros/ArchivosGEN.php";
class Pizzeria
{



public static function Leer(){
    
    $arrayDeDatos=array();
    $retorno=array();
    $archivo=fopen("./archivos/Pizza.txt","r");
    while(!feof($archivo)){
       // echo nl2br("\nHola\n");

        $renglon=fgets($archivo);
        if($renglon!=""){
            $arrayDeDatos=explode(",",$renglon);
            if ($arrayDeDatos[0]!=""){
            $pizza=new Pizza($arrayDeDatos[0],$arrayDeDatos[1],$arrayDeDatos[2],$arrayDeDatos[3],$arrayDeDatos[4]);
            array_push($retorno,$pizza);

            }
        }
    }
    fclose($archivo);
    
    return $retorno;
}
/*
public function Mostrar(){
    echo "Patente: $this->_patente Ingreso: $this->_ingreso Importe: $this->_importe <br>";

}
*/

public static function AgregarPizza($sabor, $tipo, $precio, $cantidad){
    echo "ok";
    $lista=Pizzeria::Leer();
    $idpizza=Pizzeria::pizzaExistsID($lista,$tipo,$sabor);
    $renglon="";
    
    if($idpizza==-1){
        $id=Pizzeria::pizzaNextId($lista);
        $pizza=new Pizza($sabor,$tipo,$precio,$cantidad,$id);
        $archivo=fopen("./Archivos/Pizza.txt","a");
        $renglon.=implode(",", $pizza->toArray());
        $renglon.="\n";
        fwrite($archivo,$renglon);
        fclose($archivo);
        if($_FILES){
            $nombrearchivo=$sabor . $tipo;
            ArchivosGen::Upload($nombrearchivo, "ImagenesDeLaPizza/");
        }
    }
    else {
        echo "Esa pizza ya existe";
       
    }
    
}
public static function AgregarPizzaPlus($sabor, $tipo, $precio, $cantidad){
    echo "ok";
    $lista=Pizzeria::Leer();
    $idpizza=Pizzeria::pizzaExistsID($lista,$tipo,$sabor);
    $renglon="";
    
    if($idpizza==-1){
        $id=Pizzeria::pizzaNextId($lista);
        $pizza=new Pizza($sabor,$tipo,$precio,$cantidad,$id);
        $archivo=fopen("./Archivos/Pizza.txt","a");
        $renglon.=implode(",", $pizza->toArray());
        $renglon.="\n";
        fwrite($archivo,$renglon);
        fclose($archivo);
        
    }
    else {
        $archivo=fopen("./Archivos/Pizza.txt","w");

        foreach ($lista as $pizza) {

            if($pizza->get_id()==$idpizza){
                $pizza->set_cantidad($cantidad);
                $pizza->set_precio($precio);

            }
            $renglon.=implode(",", $pizza->toArray());

        }

        fwrite($archivo,$renglon);

        fclose($archivo);
       
    }
    if($_FILES){
            $nombrearchivo=$sabor . $tipo;
            ArchivosGen::Upload($nombrearchivo, "ImagenesDeLaPizza/");
        }
}




public static function PizzaDelete($sabor, $tipo){
    echo "ok";
    $lista=Pizzeria::Leer();
    $idpizza=Pizzeria::pizzaExistsID($lista,$tipo,$sabor);
    $renglon="";
    
    if($idpizza==-1){
        echo "Pizza a borrar no existe";
        
    }
    else {
        $archivo=fopen("./Archivos/Pizza.txt","w");

        foreach ($lista as $pizza) {

            if($pizza->get_id()==$idpizza){
                continue;

            }
            $renglon.=implode(",", $pizza->toArray());

        }

        fwrite($archivo,$renglon);
        fclose($archivo);
        $ficheros1  = scandir("ImagenesDeLaPizza/");
        var_dump($ficheros1);
        foreach ($ficheros1 as $fichero) {
            $var=explode(".",$fichero);
            $tiposabor=$sabor . $tipo;
            if($var[0]==$tiposabor){
                $archivo="ImagenesDeLaPizza/" . $fichero;
            ArchivosGen::toBackupFecha($archivo,"BackupPizza/");
                

            }


        }



    }
   
            
            /*$nombrearchivo=$sabor . $tipo;
            ArchivosGen::Upload($nombrearchivo, "ImagenesDeLaPizza/");*/
       
}

public static function listaImagenes($tipo){


    if($tipo=="borradas"){
        $ficheros1  = scandir("BackupPizza/");
        foreach ($ficheros1 as $fichero) {
            $var=explode(".",$fichero);
            if(end($var) != "jpg" && end($var) != "jpeg" && end($var) != "gif"
            && end($var) != "png") {
                continue;
            }
        
            $strHtml = "<img src= BackupPizza/" . $fichero . " alt=" . " border=3 height=120px width=160px></img>";
            echo $strHtml;


        }


    }else{
        $ficheros1  = scandir("ImagenesDeLaPizza/");
        foreach ($ficheros1 as $fichero) {
            $var=explode(".",$fichero);
            if(end($var) != "jpg" && end($var) != "jpeg" && end($var) != "gif"
            && end($var) != "png") {
                continue;
            }
            
            $strHtml = "<img src= ImagenesDeLaPizza/" . $fichero . " alt=" . " height=200px width=200px></img>";
            echo $strHtml;


        }



    }





}









public static function AltaVenta($sabor, $tipo, $cantidad, $mail, $archivo){

    $lista=Pizzeria::Leer();
    $idpizza=Pizzeria::pizzaExistsID($lista,$tipo,$sabor);
    echo $idpizza;
    
    
    if($idpizza!=-1){
        $archivo=fopen("./Archivos/Pizza.txt","w");
        foreach ($lista as $pizza) {
            

          
            if($pizza->get_id()==$idpizza&&$pizza->get_cantidad()>$cantidad){
                $pizza->set_cantidad($pizza->get_cantidad()-$cantidad);
            }
            $renglon=implode(",", $pizza->toArray());
            fwrite($archivo,$renglon);
        
        
       
        }
        fclose($archivo);

        $archivo=fopen("./Archivos/Venta.txt","a");            
        $renglon=implode(",", [$sabor, $tipo, $cantidad, $mail]);
        $renglon.="\n";
        fwrite($archivo,$renglon);
        fclose($archivo);
        if($_FILES){
        $datos=explode("@", $mail);
        $nombrearchivo=$sabor . $tipo . $datos[0] . date("Y-m-d H-i-s",);
        ArchivosGen::Upload($nombrearchivo, "ImagenesDeLaVenta/");
        }




        }
        



    }






public static function pizzaExistsID($pizzeria,$tipo,$sabor){
    $retorno=-1;

    foreach ($pizzeria as $pizzas) {
        if($pizzas->get_tipo()==$tipo && $pizzas->get_sabor()== $sabor){
            $retorno=$pizzas->get_id();
            break;
        }
    }
    return $retorno;
}

public static function pizzaNextId($listaPizza){
    $retorno=0;
    foreach ($listaPizza as $pizza) {
        $retorno=$pizza->get_id();
    }


    return $retorno+1;
}
public static function existeProducto($sabor,$tipo){
    $lista=Pizzeria::Leer();



    if(Pizzeria::pizzaExistsID($lista,$tipo,$sabor) != -1){
        echo "Hay";
    }
    else if(Pizzeria::pizzaExistsSabor($lista,$sabor)){
        echo "Existe pizza de ese sabor, pero con otro tipo";
    }
    else if(Pizzeria::pizzaExistsTipo($lista,$tipo)){
        echo "Existe pizza de ese tipo, pero con otro sabor";
    }
    else {
        echo "no hay";
    }


}
public static function pizzaExistsTipo($pizzeria,$tipo){
    $retorno=false;

    foreach ($pizzeria as $pizzas) {
        if($pizzas->get_tipo()== $tipo){
            $retorno=true;
            break;
        }
    }
    

    return $retorno;

}
public static function pizzaExistsSabor($pizzeria,$sabor){
    $retorno=false;

    foreach ($pizzeria as $pizzas) {
        if($pizzas->get_sabor()== $sabor){
            $retorno=true;
            break;
        }
    }
    

    return $retorno;

}

}


?>