<html>
<head>
</head>

<body>

<form  action="projeto2.php" method="POST" onsubmit= "coincideSenha(this); return false;">
		Login: <input type="text" placeholder="Login" name="login"  /><br>
        Senha: <input type="password" placeholder="Senha"name="senha" id="senha1"  /><br>
        Repita a senha: <input type="password" placeholder="Senha" name="conf" id="senha2" /><br>
        <input type="submit"  value="Enviar" name="enviar" /><br>
</body>















<script>
function coincideSenha(frm){
	var senha1 = document.getElementById("senha1").value;
	var senha2 = document.getElementById("senha2").value;


    if(senha1.length < 6 || senha2.lenght < 6){
        alert("Senha menor que 6 digitos.");
        return false;
        }

	if(senha1 == senha2){
    alert("Senhas coincidem");
    alert("Usuário criado com sucesso!");
    frm.submit();
	}
	else {
	alert("Senhas não coincidem");
    return false;
	}		
}
 
</script>
</html>