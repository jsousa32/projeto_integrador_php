<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

?>

<?php

$nome = $_POST['nome'];
$dataNascimento = $_POST['dataNascimento'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$crm = $_POST['crm'];
$especialidade = $_POST['especialidade'];

$sql = "INSERT INTO medicos (nomeCompleto, dataNascimento, endereco, telefone, crm, especialidade, created_at) 
VALUES ('$nome','$dataNascimento','$endereco','$telefone','$crm','$especialidade',NOW())";

$result = mysqli_query($connection, $sql);

if ($result != 0) {
    $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Médico cadastrado com sucesso!</div>";
} else {
    $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Ocorreu um erro ao cadastrar o médico no sistema!</div>";
}

mysqli_close($connection);

header("Location: cadastro-medico.php");

?>