<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
# include_once '../../config/valida-acesso.php';


    # Faz a consulta no banco de todos os medicamentos
    $sql = "SELECT * from medicamentos";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $info[] = $row;
        }
        http_response_code(200);
        echo json_encode($info);
    }else{
        http_response_code(404);
        echo json_encode($info);
    }
