<html>
<head>
</head>

<body>


<?php

session_start();


if ( ($_SESSION['logincad'] == $loginlog) && ($_SESSION['senhacad'] == $senhalog) ){
    $_SESSION['logou']=1;
    echo 'Usuario logado';
    header('location: paineldecontrole.php');
}
else{
    $_SESSION['erro'] =1;
    header('location: projeto2.php');
}

 ?>
</body>
</html>