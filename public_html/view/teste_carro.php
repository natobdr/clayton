<?php

$_SESSION["current"] = $_SERVER['PHP_SELF'];       
$menu = $_SESSION["current"];

//echo $menu;
//$string="$menu";
//$string=explode("/", $string);
//echo"$string[3]";//Este

function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
//$menu = "localhost/manutencao_automoveis/view/cadastro_carro.php";
$text = $menu;
$exploded = multiexplode(array("/","_"),$text);
echo $exploded[3];

//if (strpos($menu, "teste")) { echo "current"; }
?>
