<?php 


class ArchivosGen {
    function Upload($nombre,$ruta){
    $_FILES["file"]["name"]=ArchivosGen::cambiarNombre($_FILES["file"]["name"],$nombre);
    $destino = $ruta . $_FILES["file"]["name"];
    $uploadOk = TRUE;
    $tipoArchivo = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
    echo $tipoArchivo;
    if (file_exists($destino)) {
        echo "El archivo ya existe. Verifique!!!";
        if($ruta == "ImagenesDeLaPizza/"){
        ArchivosGen::toBackup($destino,"BackupPizzas/");}
        else if ($ruta == "ImagenesDeLaVenta/"){
            ArchivosGen::toBackup($destino,"BackupVentas/");
        }
    }
    if ($_FILES["file"]["size"] > 500000) {
        echo "El archivo es demasiado grande. Verifique!!!";
    }
    
    $esImagen = getimagesize($_FILES["file"]["tmp_name"]);
    
    if($esImagen === true) {//NO ES UNA IMAGEN
    
        if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
            && $tipoArchivo != "png") {
            echo "Solo son permitidas imagenes con extension JPG, JPEG, PNG o GIF.";
            $uploadOk = FALSE;
        }
    }
    
    if ($uploadOk === FALSE) {
    
        echo "<br/>NO SE PUDO SUBIR EL ARCHIVO.";
    
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $destino)) {
            echo "<br/>El archivo ". basename( $_FILES["file"]["name"]). " ha sido subido exitosamente.";
        } else {
            echo "<br/>Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
        }
    }
    
   //  ArchivosGen::marcaAgua($destino);
}    






public static function cambiarNombre($archivo,$nombre){
    $aux=explode(".", $archivo);
    
 
    $archivo=$nombre . "." .pathinfo($archivo, PATHINFO_EXTENSION);




    return $archivo;
}

public static function toBackup($archivo,$ruta){
    $aux=explode(".", $archivo);
    $aux2=explode("/",$aux[0]);
    $backup= $ruta . $aux2[sizeof($aux2)-1] . "." . $aux[sizeof($aux)-1] ;

    rename($archivo,$backup);

}
public static function toBackupFecha($archivo,$ruta){
    $aux=explode(".", $archivo);
    $aux2=explode("/",$aux[0]);
    $backup= $ruta . $aux2[sizeof($aux2)-1] . date("Y-m-d-H-i-s",) . "." . $aux[sizeof($aux)-1] ;

    rename($archivo,$backup);

}
public static function marcaAgua($img1){
    
    //$aux=end(explode(".",$img1));
    echo "hola";
    
           // $im = imagecreatefrompng($img1);
           
            $im = imagecreatefromjpeg($img1);
        
    
    $estampa = imagecreatefrompng("watermark.png");
    
    
    // Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
    $margen_dcho = 10;
    $margen_inf = 10;
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);
    
    // Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
    // ancho de la foto para calcular la posición de la estampa. 
    imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));
    
    // Imprimir y liberar memoria
    
    imagepng($im,$img1); 
    //imagedestroy($im);
    
}



}
?>