<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "sistema_usuarios";

$conexao = new mysqli($servidor,$usuario,$senha,$banco);

if ($conexao->connect_error) {
    die("Erro de conexão" . $conexao->connect_error);
}

echo "<pre>";
var_dump();
var_dump();
echo"</pre>";

?>