 <?php
class Usuario{
 
    private $conn;
    private $nome_tabela = "usuario";
 
    public $id;
    public $nome;
    public $idade;
    public $email;
    public $senha;
    public $foto;
 
    public function __construct($db){
        $this->conn = $db;
    }

    function cadastrar(){

        $query = "INSERT INTO " . $this->nome_tabela . "
                    SET nome=:nome, idade=:idade, email=:email, senha=:senha, foto=:foto";
 
        $stmt = $this->conn->prepare($query);

        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->idade=htmlspecialchars(strip_tags($this->idade));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->senha=htmlspecialchars(strip_tags($this->senha));
        $this->foto=htmlspecialchars(strip_tags($this->foto));
 

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":foto", $this->foto);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function visualizarTodos($usuarios_num, $usuarios_por_pagina){
 
        $query = "SELECT
                id, nome, email, idade
            FROM
                " . $this->nome_tabela . "
            ORDER BY
                nome ASC
            LIMIT
                {$usuarios_num}, {$usuarios_por_pagina}";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

    public function contarTodos(){
 
        $query = "SELECT id FROM " . $this->nome_tabela . "";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        $num = $stmt->rowCount();
 
        return $num;
    }

    function visualizaUm(){
 
        $query = "SELECT nome, idade, email, senha, foto FROM " . $this->nome_tabela . " WHERE id = ?
            LIMIT 0,1";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
 
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);
 
        $this->nome = $linha['nome'];
        $this->idade = $linha['idade'];
        $this->email = $linha['email'];
        $this->senha = $linha['senha'];
        $this->foto = $linha['foto'];

    }

    function editar(){
 
        $query = "UPDATE " . $this->nome_tabela . " SET nome = :nome, idade = :idade, email = :email, senha = :senha WHERE id = :id";
 
        $stmt = $this->conn->prepare($query);
 
        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->idade=htmlspecialchars(strip_tags($this->idade));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->senha=htmlspecialchars(strip_tags(password_hash($this->senha, PASSWORD_DEFAULT)));
        $this->id=htmlspecialchars(strip_tags($this->id));


        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id', $this->id);
 
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function deletar(){

        $query = "DELETE FROM " . $this->nome_tabela . " WHERE id = ?";
     
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,  $this->id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function pesquisar($termo_pesquisado, $usuarios_num, $usuarios_por_pagina){
 
        $query = "SELECT id, nome, idade, email FROM $this->nome_tabela WHERE nome LIKE ? OR email LIKE ? ORDER BY nome ASC LIMIT ?, ?";
 
        $stmt = $this->conn->prepare( $query );
 
        $termo_pesquisado = "%{$termo_pesquisado}%";
        $stmt->bindParam(1, $termo_pesquisado);
        $stmt->bindParam(2, $termo_pesquisado);
        $stmt->bindParam(3, $usuarios_num, PDO::PARAM_INT);
        $stmt->bindParam(4, $usuarios_por_pagina, PDO::PARAM_INT);
 
        $stmt->execute();
 
        return $stmt;
    }
 
    public function visualizarTodosPesquisa($termo_pesquisado){
 
        $query = "SELECT COUNT(*) as total_linhas FROM " . $this->nome_tabela . " WHERE nome LIKE ?";
 
        $stmt = $this->conn->prepare( $query );
 
        $termo_pesquisado = "%{$termo_pesquisado}%";
        $stmt->bindParam(1, $termo_pesquisado);
 
        $stmt->execute();
        $linha = $stmt->fetch(PDO::FETCH_ASSOC);
 
        return $linha['total_linhas'];
    }

    function uploadFoto(){
 
        $mensagem="";
 
        if($this->foto){
 
            $diretorio = "uploads/";
            $arquivo = $diretorio . $this->foto;
            $arquivo_tipo = pathinfo($arquivo, PATHINFO_EXTENSION);
 
            $mensagem_upload_erro="";
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            
            if($check!==false){
            }else{
                $mensagem_upload_erro.="<div>Submitted file is not an image.</div>";
            }

            $tipos_permitidos=array("jpg", "jpeg", "png", "gif");

            if(!in_array($arquivo_tipo, $tipos_permitidos)){
                $mensagem_upload_erro.="<div>Só JPG, JPEG, PNG, GIF files são permitidos.</div>";
            }
 
            if(file_exists($arquivo)){
                $mensagem_upload_erro.="<div>Imagem já existente, tente mudar o nome.</div>";
            }
 
            if($_FILES['image']['size'] > (1024000)){
                $mensagem_upload_erro.="<div>A imagem tem que ter menos de 1MB.</div>";
            }
 
            if(!is_dir($diretorio)){
                mkdir($diretorio, 0777, true);
            }

            if(empty($mensagem_upload_erro)){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $arquivo)){
                }else{
                    $mensagem.="<div class='alert alert-danger'>";
                        $mensagem.="<div>Não disponivel upload na foto.</div>";
                        $mensagem.="<div>Atualize o registro para fazer upload da foto.</div>";
                    $mensagem.="</div>";
                }
            }else{

                $mensagem.="<div class='alert alert-danger'>";
                    $mensagem.="{$mensagem_upload_erro}";
                    $mensagem.="<div>Atualize o registro para fazer upload da foto.</div>";
                $mensagem.="</div>";
            }
        }
 
        return $mensagem;
    }   
}
?>