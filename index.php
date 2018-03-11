<?php

include_once 'config/core.php';
 
include_once 'config/db.php';
include_once 'objetos/usuario.php';

$database = new Database();
$db = $database->getConexao();
 
$usuario = new Usuario($db);

$pagina_titulo = "Visualizar Usuários";
include_once "layout_header.php";
 
$stmt = $usuario->visualizarTodos($usuarios_num, $usuarios_por_pagina);
 
$pagina_url = "index.php?";
 
$total_linhas=$usuario->contarTodos();
 
include_once "visualizar_template.php";
 
include_once "layout_footer.php";
?>