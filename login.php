<?php
session_start(); //Inicia a sessão (Ex.:Cookies)
require 'config.php';   //Carrega a conexão com o banco 

echo "<pres>";
var_dump($_POST);
echo "</pre>";

$email = trim($_POST['email']?? ''); // Crio uma variável chamada $email dentro de login.php que recebe o valor do campo name='email' lá do formulario HTML. A função trim() é para remover espaços em branco.E o uso de ?? é para o caso do campo do formulario ter vindo vazio
$senha = $_POST['senha'] ??'';

if (empty($email) || empty($senha)) {
    header('Location: index.html');
    exit;
}

$stmt = $conexao ->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = ? LIMIT 1");
$stmt ->bind_param("s",$email);
$stmt->execute();

$resultado = $stmt -> get_result();
$usuario = $resultado -> fetch_assoc();

$stmt ->close();

if (!$usuario || !password_verify($senha,$usuario ['senha'])){
header("Location: index.html");
exit;

}

$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nome'] = $usuario['nome'];

header('Location: Bem vindo');
exit;

?>