<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

?>

<?php

if (isset($_POST['atualizar'])) {
    $id = $_SESSION['id'];
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $crm = $_POST['crm'];
    $especialidade = $_POST['especialidade'];

    $sql = "UPDATE medicos SET nomeCompleto='$nome', dataNascimento='$dataNascimento', endereco='$endereco', telefone='$telefone', crm='$crm', especialidade='$especialidade' WHERE idMedico='$id'";

    $result = mysqli_query($connection, $sql);

    mysqli_close($connection);

    header('Location: listar-medicos.php');
} else {
    header('Location: ../adm/painel.php');
}

?>