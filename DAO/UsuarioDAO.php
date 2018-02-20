<?php

require_once ROOT_PATH . "/Util/Conexao.php";

class UsuarioDAO {
    
    public static $instance;
    
    private function __contruct(){}

    public static function getInstance()
    {
        if(!isset(self::$instance))
            self::$instance = new UsuarioDAO();

        return self::$instance;
    }

    public function Inserir(Usuario $usuario)
    {
        $pdo = Conexao::getInstance();

        try{
           $stmt = $pdo->prepare( 'INSERT INTO contatos (nome, email, celular) VALUES (:nome, :email, :celular)' );
        $stmt->execute( array(
            ':nome' => 'Ricardo Arrigoni',
            ':email' => 'ricardo@gmail.com',
            ':celular' => '8599999999'
        )); 

        echo $stmt->rowCount(); 
        } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();

        }
    }

    public function Update($nome, $id)
    {
        try{
            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare( 'UPDATE contatos SET nome = :nome WHERE id = :id' );
            $stmt->execute( array( 
                ':id' => $id,
                ':nome' => $nome
            ) );
            
            echo $stmt->rowCount();
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
    
        }
    }

    public function Delete(Usuario $usuario)
    {
        $id = 1;
        try{
            $pdo = Conexao::getInstance();

            $stmt = $pdo->prepare( 'DELETE FROM contatos WHERE id = :id' );
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo $stmt->rowCount();
        } catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function Select()
    {
        $pdo = Conexao::getInstance();

        $consulta = $pdo->query( 'SELECT * FROM contatos;' );

        while( $linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['nome']} <br/>";
        }
    }
}

?>