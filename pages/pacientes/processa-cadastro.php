<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
#include_once '../../config/valida-acesso.php';

?>

<?php

$dados = file_get_contents("php://input");

if (isset($dados) && (!empty($dados))) {

    $requisicao = json_decode($dados);

    $nome = trim($requisicao->nome);
    $nomeMae = trim($requisicao->nomeMae);
    $dataNascimento = trim($requisicao->dataNascimento);
    $cpf = trim($requisicao->cpf);
    $cod_sus = trim($requisicao->cod_sus);
    $genero = trim($requisicao->genero);
    $endereco = trim($requisicao->endereco);
    $telefone = trim($requisicao->telefone);
    $email = trim($requisicao->email);
    $senha = trim($requisicao->senha);

    $sql = "INSERT INTO pacientes (nomeCompleto,nomeMae,dataNascimento,cpf,codigo_sus,genero,endereco,telefone,email,senha,created_at)
    VALUES ('$nome','$nomeMae','$dataNascimento','$cpf','$cod_sus','$genero','$endereco','$telefone','$email','$senha',NOW())";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $info = array(
            'nome' => $nome,
            'nomeMae' => $nomeMae,
            'dataNascimento' => $dataNascimento,
            'cpf' => $cpf,
            'cod_sus' => $cod_sus,
            'genero' => $genero,
            'endereco' => $endereco,
            'telefone' => $telefone,
            'email' => $email,
            'senha' => $senha,
        );
        http_response_code(200);
        echo json_encode($info);
    } else {
        $info = array('msg' => 'Erro! O paciente não foi cadastrado!');
        echo json_encode($info);
        http_response_code(400);
    }
}

#$nome = $_POST['nome'];
#$nomeMae = $_POST['nomeMae'];
#$dataNascimento = $_POST['dataNascimento'];
#$cpf = $_POST['cpf'];
#$cod_sus = $_POST['codigo_sus'];
#$genero = $_POST['genero'];
#$endereco = $_POST['endereco'];
#$telefone = $_POST['telefone'];
#$email = $_POST['email'];
#$senha = $_POST['senha'];

#$sql = "INSERT INTO pacientes (nomeCompleto,nomeMae,dataNascimento,cpf,codigo_sus,genero,endereco,telefone,email,senha,created_at)
#VALUES ('$nome','$nomeMae','$dataNascimento','$cpf','$cod_sus','$genero','$endereco','$telefone','$email','$senha',NOW())";

#$result = mysqli_query($connection, $sql);

#if ($result != 0) {
#    $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Paciente cadastrado com sucesso!</div>";
#} else {
#    $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Ocorreu um erro ao cadastrar o paciente no sistema!</div>";
#}

mysqli_close($connection);

#header("Location: cadastro-paciente.php");

?>