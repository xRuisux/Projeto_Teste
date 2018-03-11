<?php

include_once 'config/core.php';

include_once 'config/db.php';
include_once 'objetos/usuario.php';
 
$database = new Database();
$db = $database->getConexao();
 
$usuario = new Usuario($db);
 
$termo_pesquisado=isset($_GET['s']) ? $_GET['s'] : '';
 
$pagina_titulo = "Você pesquisou por \"{$termo_pesquisado}\"";
include_once "layout_header.php";
 
$stmt = $usuario->pesquisar($termo_pesquisado, $usuarios_num, $usuarios_por_pagina);
 
$pagina_url="pesquisar.php?s={$termo_pesquisado}&";
 
$total_linhas=$usuario->visualizarTodosPesquisa($termo_pesquisado);
 
include_once "visualizar_template.php";
 
include_once "layout_footer.php";
?>