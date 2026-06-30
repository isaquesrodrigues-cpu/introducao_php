<?php
session_start();


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel= "stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <h1>Login realizado com sucesso!</h1>
    <div class="msg msg-sucess">
        Bem-vindo,<?=  htmlspecialchars($_SESSION['usuario_nome']) ?>!
    </div>

    <a href= "logout.php" class="btn btn-primary" style="margin-top:20px;">Sair</a>

    </div>


</body>
</html>