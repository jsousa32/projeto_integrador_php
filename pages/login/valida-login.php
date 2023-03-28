<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $ret = [
        'result' => 'OK',
    ];
    print json_encode($ret);
?>

<?php

$dados = file_get_contents("php://input");


if (isset($dados) && !empty($dados)) {
    
    $requisicao = json_decode($dados);

    $cpf = trim($requisicao->cpf);
    $senha = trim($requisicao->senha);

    # Protege contra ataques de SQL injection
    $cpf = mysqli_real_escape_string($connection, $cpf);
    $senha = mysqli_real_escape_string($connection, $senha);

    $sql = "SELECT * FROM pacientes WHERE cpf='$cpf' AND senha='$senha' LIMIT 1";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $row['idPaciente'];
            $_SESSION['nome'] = $row['nomeCompleto'];
            $_SESSION['nivel_acesso'] = $row['nivel_acesso'];
            $_SESSION['logado'] = true;
        }

        # Header do token que indica o tipo do token e o algoritmo utilizado
        $header = array(
            'alg' => 'HS256',
            'typ' =>  'JWT'
        );

        # Converte o array em um objeto do tipo JSON
        $header = json_encode($header);

        # Codifica utilizando a base64
        $header = base64_encode($header);

        # Define a duração do token no sistema usando o dia atual mais 7 dias
        $duracao = time() + (60 * 60 * 24 * 7);

        # Define o payload que é o corpo do JWT
        $payload = [
            'exp' => $duracao,
            'id' => $_SESSION['id'],
            'nome' => $_SESSION['nome']
        ];

        # Converte o array em um objeto do tipo JSON
        $payload = json_encode($payload);

        # Codifica utilizando a base64
        $payload = base64_encode($payload);

        # Define a chave secreta do sistema para gerar o token e para descriptografar o token
        $chave = "123456789";

        # Gera a chave
        $assinatura = hash_hmac('sha256', "$header.$payload", $chave, true);

        # Codifica utilizando a base64
        $assinatura = base64_encode($assinatura);

        # Define o token
        $token = "$header.$payload.$assinatura";

        # Imprime o token
        $info = [
            'msg' => 'Logado com sucesso!',
            'id' => $_SESSION['id'],
            'nome' => $_SESSION['nome'],
            'nivel_acesso' => $_SESSION['nivel_acesso'],
            'token' => $token
        ];
        http_response_code(200);
        echo json_encode($info);
    } else {
        $info = [
            'msg' => 'Usuário não existe ou dados inválidos!'
        ];
        http_response_code(400);
        echo json_encode($info);
    }
} else {
    $info = [
        'msg' => 'Usuário não existe ou dados inválidos!'
    ];
    http_response_code(400);
    echo json_encode($info);
}

?>