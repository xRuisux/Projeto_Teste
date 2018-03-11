<?php

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1; 
 
$usuarios_por_pagina = 5;
 
$usuarios_num = ($usuarios_por_pagina * $pagina) - $usuarios_por_pagina;
?>