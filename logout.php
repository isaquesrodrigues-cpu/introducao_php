<?php
session_start();
session_unset(); // Para limpar as variaveis que guardamos na sessão
session_destroy(); //Destrói a sessão do SERVIDOR

header('Location: index.php');
exit;

?>