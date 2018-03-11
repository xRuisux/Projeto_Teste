<?php
if($_POST){
 
    include_once 'config/db.php';
    include_once 'objetos/usuario.php';
 
    $database = new Database();
    $db = $database->getConexao();

    $usuario = new Usuario($db);
     
    $usuario->id = $_POST['id'];

    if($usuario->deletar()){
        echo "Usuário deletado.";
    }else{
        echo "Não foi possível deletar o usuário.";
    }
}
?>