<html>
<head>
</head>

<body>

<form action="formulario.php" method="POST">	
		Login<input type="text" placeholder="Login" name="loginlog"  /><br>
		Senha<input type="password" placeholder="Senha" name="senhalog"  /><br>
        <input type="submit"  value="Enviar" name="submit"/><br>
        <a href="cadastro.php">Cadastrar </a><br>
        <a href="redefinesenha.php">Alterar Senha</a><br>
</form>

<?php

session_start();
if (isset($_POST['conf']) ){
$_SESSION['logincad'] = $_POST['login'];
$_SESSION['senhacad'] = $_POST['senha'];
$_SESSION['conf'] = $_POST['conf'];
}

if (isset($_SESSION['erro']) ){
    if($_SESSION['erro']== 1){
        echo 'Senha errada';
    }elseif($_SESSION['erro']==2){
        echo 'É necessário o login para entrar';

    }else{
        echo 'Aconteceu algum erro';
    }

}
?>
</body>
</html>