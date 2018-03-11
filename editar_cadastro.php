<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: Faltando ID.');
 
include_once 'config/db.php';
include_once 'objetos/usuario.php';
 
$database = new Database();
$db = $database->getConexao();
 
$usuario = new Usuario($db);
 
$usuario->id = $id;
 
$usuario->visualizaUm();
 
?>

<?php 

$pagina_titulo = "Editar Usuario";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Visualizar Usuarios</a>";
echo "</div>";

 ?> 

<?php 
if($_POST){
 
    $usuario->nome = $_POST['nome'];
    $usuario->idade = $_POST['idade'];
    $usuario->email = $_POST['email'];
 
    if($usuario->Editar()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Usuario atualizado.";
        echo "</div>";
    }
 
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Não foi possivel atulizar o usuario.";
        echo "</div>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' value='<?php echo $usuario->nome; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Idade</td>
            <td><input type='text' name='idade' value='<?php echo $usuario->idade; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' value='<?php echo $usuario->email; ?>' class='form-control' /></td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Editar</button>
            </td>
        </tr>
 
    </table>
</form>

<?php

include_once "layout_footer.php";
?>