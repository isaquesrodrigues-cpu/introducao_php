<?php
session_start();
require 'config.php';

$nome = trim($_POST['nome']??'');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if (empty($nome) || empty($email) || empty($senha)) {
    header('Location: cadastro.html');
    exit;
}

$stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ? LIMIT 1");
$stmt ->bind_param("s",$email);
$stmt-> execute();

$resultado = $stmt->get_result();

if($resultado->fetch_assoc()) {
    $stmt->close();
    header('Location:cadastro.html');
    exit;
}

$stmt ->close();
$hash = password_hash($senha,PASSWORD_DEFAULT);

$stmt = $conexao->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (?,?,?)" );
$stmt->blind + param("sss",$nome, $email, $hash);
$stmt->execute();

$stmt->close();

header("Location:index.html");
exit;

?>