<?php
echo "<ul class=\"pagination\">";
 
if($pagina>1){
    echo "<li><a href='{$pagina_url}' title='Vá para primeira pagina.'>";
        echo "Primeira Pagina";
    echo "</a></li>";
}

$total_paginas = ceil($total_linhas / $usuarios_por_pagina);
 
$range = 2;
 
$numero_inicial = $pagina - $range;
$limite_numero = ($pagina + $range)  + 1;
 
for ($x=$numero_inicial; $x<$limite_numero; $x++) {
 
    if (($x > 0) && ($x <= $total_paginas)) {
 
        if ($x == $pagina) {
            echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
        }else {
            echo "<li><a href='{$pagina_url}pagina=$x'>$x</a></li>";
        }
    }
}
 
if($pagina<$total_paginas){
    echo "<li><a href='" .$pagina_url . "pagina={$total_paginas}' title='Last page is {$total_paginas}.'>";
        echo "Ultima Pagina";
    echo "</a></li>";
}
 
echo "</ul>";
?>