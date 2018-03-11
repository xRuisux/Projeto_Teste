<?php

echo "<form role='search' action='pesquisar.php'>";
    echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
        $item_pesquisado=isset($termo_pesquisado) ? "value='{$termo_pesquisado}'" : "";
        echo "<input type='text' class='form-control' placeholder='Pesquise por nome de usuario' name='s' id='srch-term' required {$item_pesquisado} />";
        echo "<div class='input-group-btn'>";
            echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
        echo "</div>";
    echo "</div>";
echo "</form>";
 
echo "<div class='right-button-margin'>";
    echo "<a href='cadastrar_usuario.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-plus'></span> Cadastrar Usuario";
    echo "</a>";
echo "</div>";
 
if($total_linhas>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Idade</th>";
            echo "<th>Email</th>";
            echo "<th>Ações</th>";
        echo "</tr>";
 
        while ($linhas = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($linhas);
 
            echo "<tr>";
                echo "<td>{$nome}</td>";
                echo "<td>{$idade}</td>";
                echo "<td>{$email}</td>"; 
 
                echo "<td>";
 
                    echo "<a href='vizualizar_um.php?id={$id}' class='btn btn-primary left-margin'>";
                        echo "<span class='glyphicon glyphicon-list'></span> Visualizar";
                    echo "</a>";
 
                    echo "<a href='editar_cadastro.php?id={$id}' class='btn btn-info left-margin'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Editar";
                    echo "</a>";

                    echo "<a delete-id='{$id}' class='btn btn-danger delete-object'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Deletar";
                    echo "</a>";
 
                echo "</td>";
 
        }
 
    echo "</table>";
 
    include_once 'paginacao.php';
}else{
    echo "<div class='alert alert-danger'>Usuarios não encontrados.</div>";
}
?>