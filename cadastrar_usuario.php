<?php

include_once 'config/db.php';
include_once 'objetos/usuario.php';

$database = new Database();
$db = $database->getConexao();
 
$usuario = new Usuario($db);

$pagina_titulo = "Cadastrar usuario";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Visualizar Usuarios</a>";
echo "</div>";
 
if($_POST){
 
    $usuario->nome = $_POST['nome'];
    $usuario->idade = $_POST['idade'];
    $usuario->email = $_POST['email']; 
    if(filter_var($usuario->email, FILTER_VALIDATE_EMAIL) != false){
        $usuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT) ;
        $foto=!empty($_FILES["image"]["name"])
            ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
        $usuario->foto = $foto;

        if($usuario->cadastrar()){

            echo "<div class='alert alert-success'>Usuário cadastrado com sucesso.</div>";
            echo $usuario->uploadFoto();
        }

    }
    
 
    else{
        echo "<div class='alert alert-danger'>Não foi possivel cadastrar o usuário.</div>";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Idade</td>
            <td><input type='text' name='idade' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control' /></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input type='password' name='senha' class='form-control' /></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input type="file" name="image" /></td>
        </tr>
            
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </td>
        </tr>
 
    </table>
</form>

<?php
include_once "layout_footer.php";
?>