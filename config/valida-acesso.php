<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Restringe o acesso ao sistema pois o usuário é obrigado a fazer login
if (!isset($_SESSION['logado'])) {
    $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>É necessário fazer login para acessar o sistema!</div>";
    header('Location: ../../index.php');
}
