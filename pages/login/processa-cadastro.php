<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

?>

<?php

$nome = $_POST['nome'];
$nomeMae = $_POST['nomeMae'];
$dataNascimento = $_POST['dataNascimento'];
$cpf = $_POST['cpf'];
$cod_sus = $_POST['codigo_sus'];
$genero = $_POST['genero'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO pacientes (nomeCompleto,nomeMae,dataNascimento,cpf,codigo_sus,genero,endereco,telefone,email,senha,created_at)
VALUES ('$nome','$nomeMae','$dataNascimento','$cpf','$cod_sus','$genero','$endereco','$telefone','$email','$senha',NOW())";

$result = mysqli_query($connection, $sql);

if ($result != 0) {
    $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Cadastro realizado com sucesso!</div>";
} else {
    $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Ocorreu um erro ao cadastrar no sistema!</div>";
}

mysqli_close($connection);

header("Location: cadastro.php")

?>