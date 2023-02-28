<?php

    # Inclui o arquivo responsável pela configuração do sistema
    include_once '../../config/config.php';

    # Dados de acesso ao banco de dados
    $servidor = HOST;
    $usuario = USER;
    $senha = PASSWORD;
    $banco = DB;
    $porta = PORT;

    # Realiza a conexão com o banco de dados
    $connection = mysqli_connect($servidor, $usuario , $senha, $banco, $porta);

    # Testa se a conexão foi estabelecida com sucesso
    if (!$connection) {
        die("Houve um erro na conexão: " . mysqli_connect_error());
    }


?>