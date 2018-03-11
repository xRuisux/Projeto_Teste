<?php
class Database{
  
    private $host = "localhost";
    private $db_name = "projetobackend";
    private $username = "root";
    private $password = "";
    public $conn;
  
    public function getConexao(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Erro na conexao: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>