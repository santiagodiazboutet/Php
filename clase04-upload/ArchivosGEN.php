<?php 


class ArchivosGen {

public static function cambiarNombre($archivo,$nombre){
    $aux=explode(".", $archivo);
    
 
    $archivo=$nombre . "." . $aux[sizeof($aux)-1];




    return $archivo;
}

public static function toBackup($archivo){
    
    $aux=explode(".", $archivo);
    $aux2=explode("/",$aux[0]);
    $backup= "backup/" . $aux2[sizeof($aux2)-1] . date("y-m-d H-i-s",time()) . "." . $aux[sizeof($aux)-1] ;

    rename($archivo,$backup);

}
public static function marcaAgua($img1){
    
    $aux=end(explode(".",$img1));
    
    switch ($aux) {
        case "png":
            $im = imagecreatefrompng($img1);
            break;
        case "jpg":
            $im = imagecreatefromjpeg($img1);
            break;
        default:
            
            break;
    }
    
    $estampa = imagecreatefrompng("wtrmark.png");
    
    
    // Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
    $margen_dcho = 0;
    $margen_inf = 0;
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);
    
    // Copiar la imagen de la estampa sobre nuestra foto usando los índices de márgen y el
    // ancho de la foto para calcular la posición de la estampa. 
    imagecopy($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa));
    
    // Imprimir y liberar memoria
    header('Content-type: image/png');
    imagepng($im);
    imagepng($im,$img1); 
    //imagedestroy($im);
    
}



}
?>