<html>
<head>
</head>

<body>


<?php

session_start();

$login = $_POST['login'];
$senha = MD5($_POST['senha1']);
$connect = mysqli_connect('localhost','root','','meubanco');
$query_select = "SELECT login FROM usuarios WHERE login = '".$login."'";
$selectid = sprintf("SELECT id FROM usuarios");                                                    
$insere_usuario = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
$checaid = mysqli_query($connect,$selectid);
$linha = mysqli_fetch_assoc($checaid);
$total = mysqli_num_rows($checaid);
$result_usuario = "SELECT * FROM usuarios WHERE login = '$login' && senha = '$senha' LIMIT 1";
$resultado_usuario = mysqli_query($connect, $result_usuario);
$resultado = mysqli_fetch_assoc($resultado_usuario);
echo $resultado;


  


 ?>
</body>
</html>