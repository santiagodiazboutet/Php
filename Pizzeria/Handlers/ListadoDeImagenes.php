<?php

/*6- (2 pts.) ListadoDeImagenes.php(por GET), debe recibir una opciòn para saber si muestra las fotos cargadas o
las borradas, se deben mostrar las fotos correctas.
*/

if (isset($_GET["tipo"]) )
{
    Pizzeria::listaImagenes($_GET["tipo"]);
}





?>