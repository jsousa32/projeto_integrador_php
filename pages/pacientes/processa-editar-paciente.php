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
    $nomeMae = $_POST['nomeMae'];
    $dataNascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $cod_sus = $_POST['codigo_sus'];
    $genero = $_POST['genero'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $sql = "UPDATE pacientes SET nomeCompleto='$nome', nomeMae='$nomeMae', dataNascimento='$dataNascimento', cpf='$cpf', codigo_sus='$cod_sus', genero='$genero', endereco='$endereco', telefone='$telefone', email='$email', senha='$senha', nivel_acesso='$nivel_acesso' WHERE idPaciente='$id'";

    $result = mysqli_query($connection, $sql);

    mysqli_close($connection);

    header("Location: listar-pacientes.php");
} else {
    header("Location: ../../adm/painel.php");
}
