<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
#include_once '../../config/valida-acesso.php';

# Inclui o arquivo responsável por restringir o acesso de acordo com o nível do usuário
#include_once '../../config/restringe-acesso.php';

    $sql = "SELECT idPaciente, nomeCompleto, nomeMae, dataNascimento,cpf, codigo_sus, genero,endereco, telefone, email, nivel_acesso, created_at, updated_at FROM pacientes";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $info[] = $row;
        }
        echo json_encode($info);
        http_response_code(200);
    } else {
        http_response_code(404);
    }

    mysqli_close($connection);
