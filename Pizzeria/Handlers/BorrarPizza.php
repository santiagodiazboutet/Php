<?php
parse_str(file_get_contents("php://input"), $_DELETE);
    Pizzeria::PizzaDelete($_DELETE["sabor"], $_DELETE["tipo"]);

?>