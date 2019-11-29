<html>
<head>
</head>

<body>


<?php

Class Usuario
{
    private $pdo;
    public $msgErro = "";
    
    public function conectar($nome,$host,$usuario,$senha)
    {
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch(PDOException $e)
        {
            $msgErro = $e->getMessage();
        }

    }
    
    public function cadastrar($login,$senha)
    {

        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT ID FROM usuarios WHERE login = :e");
        $sql->bindValue(":e",$login);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false; //ja está cadastrado
        }
        else
        {
            //caso não, cadastra-lo
            $sql = $pdo->prepare("INSERT INTO usuarios(login,senha) VALUES (:l , :s)");
            $sql->bindValue(":l",$login);
            $sql->bindValue(":s",MD5($senha));
            $sql->execute();
            return true;//FOI CADASTRADO
        }
    }
    public function logar($login,$senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT ID from usuarios WHERE email = :e AND senha =:s");
        $sql->bindValue(":l",$login);
        $sql->bindValue(":s",MD5($senha));
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['ID'] = $dado['ID'];
            return true;
        }
    }
}


 ?>
</body>
</html>