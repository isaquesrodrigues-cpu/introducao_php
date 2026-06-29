<?php
session_start(); //Inicia a sessão (Ex.:Cookies)
require 'config.php';   //Carrega a conexão com o banco 

$email = trim($_POST['email']?? ''); // Crio uma variável chamada $email dentro de login.php que recebe o valor do campo name='email' lá do formulario HTML. A função trim() é para remover espaços em branco.E o uso de ?? é para o caso do campo do formulario ter vindo vazio
$senha = $_POST['senha'] ??'';

if (empty($email) || empty($senha)) {
    header('Location: index.html');
    exit;
}

?>