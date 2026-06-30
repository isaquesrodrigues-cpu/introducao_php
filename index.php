<?php


if(!empty($_SESSION['usuario_id'])) {
    header(('Location:bem vindo.php'));
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Sistema de Usuários</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="card">
    <h1>Entrar no sistema</h1>

    <form id="form-login" action="login.php" method="POST">

      <div class="form-group">
        <label for="email">Usuário (e-mail)</label>
        <input type="text" id="email" name="email" placeholder="seu@email.com">
      </div>

      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="••••••••">
      </div>

      <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

    <a href="cadastro.html" class="btn btn-secondary">Cadastrar</a>

    <div id="msg" class="msg hidden"></div>
  </div>

  <script>

    document.getElementById('form-login').addEventListener('submit', function (e) {
      const email = document.getElementById('email').value.trim();
      const senha = document.getElementById('senha').value;

      if (!email || !senha) {
        e.preventDefault(); // impede o envio do formulário
        mostrarMsg('error', 'Preencha usuário e senha.');
      }
    });

    function mostrarMsg(tipo, texto) {
      const el = document.getElementById('msg');
      el.className = 'msg msg-' + tipo;
      el.textContent = texto;
      el.classList.remove('hidden');
    }

    (function () {
      const params = new URLSearchParams(window.location.search);
      const status = params.get('status');

      const mensagens = {
        'cadastro_ok': ['success', 'Cadastro realizado com sucesso! Faça login.'],
        'credenciais': ['error', 'E-mail ou senha incorretos.'],
        'campos_vazios': ['error', 'Preencha usuário e senha.'],
      };

      if (status && mensagens[status]) {
        mostrarMsg(mensagens[status][0], mensagens[status][1]);
      }
    })();
  </script>

</body>

</html>