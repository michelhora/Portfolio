<?php 
    require_once 'formulario.php';
    $u = new Usuario;
?>

<html>
<head>
</head>

<body>
<?php
if(isset($_POST['login']))
{
    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha1']);
    $confirmarSenha = addslashes($_POST['senha2']);
    if(!empty($login) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("meubanco","localhost","root","");
        if($u->msgErro == "")//se está tudo ok
        {
            if($senha == $confirmarSenha)
            {
             if ($u->cadastrar($login,$senha))
             {
                 ?>
                 <div id="msg-erro">
               Cadastrado com sucesso!
                 </div>
                <?php
             }
             else
             {
                ?>
                <div id="msg-erro">
               Usuário já cadastrado!
                </div>
               <?php
             }
            }
            else
            {
                ?>
                <div id="msg-erro">
              Senhas não coincidem
                </div>
               <?php
            }
        }
    
    else
    {
        ?>
        <div id="msg-erro">
            <?php echo "Erro:" .$u->msgErro; ?>
        </div>
        <?php
    }
    
    }
    else
    {
        ?>
                <div id="msg-erro">
               Preencha todos os campos
                </div>
                <?php
    }
}
?>
<form method="POST">
		Login: <input type="text" placeholder="Login" name="login"  /><br>
        Senha: <input type="password" placeholder="Senha"name="senha1" id="senha1"  /><br>
        Repita a senha: <input type="password" placeholder="Senha" name="senha2" id="senha2" /><br>
        <input type="submit"  value="Enviar" name="enviar" /><br>
</body>
<style>
div.msg-erro{
    width: 420px;
    margin: 10px;
    padding: 10px;
    background-color: rgba(50,205,50,.3);
    border: 1px solid rgb(34,139,34);
}
div#msg-sucesso{
    width: 420px;
    margin: 10px;
    padding: 10px;
    background-color: rgba(250,128,114,.3);
    border: 1px solid rgb(165,42,42);
    

}
</style>

</html>