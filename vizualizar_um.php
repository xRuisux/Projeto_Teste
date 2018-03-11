<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: faltando ID.');
 
include_once 'config/db.php';
include_once 'objetos/usuario.php';

$database = new Database();
$db = $database->getConexao();
 
$usuario = new Usuario($db);

$usuario->id = $id;
 
$usuario->visualizaUm();

$pagina_titulo = "Visualização de um usuario";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> Visualizar Usuarios";
    echo "</a>";
echo "</div>";

echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>{$usuario->nome}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Idade</td>";
        echo "<td>{$usuario->idade}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Email</td>";
        echo "<td>{$usuario->email}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Foto</td>";
        echo "<td>";
            echo $usuario->foto ? "<img src='uploads/{$usuario->foto}' style='width:300px;' />" : "Imagem não encontrada.";
        echo "</td>";
    echo "</tr>";
 
echo "</table>";
 
include_once "layout_footer.php";
?>