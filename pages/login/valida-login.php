<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include_once '../../parties/head.php' ?>

<body>

    <?php

    if (isset($_POST['cpf-login']) && isset($_POST['senha-login'])) {

        if (strlen($_POST['cpf-login']) == 0) {
            $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Campo CPF deve ser preenchido!</div>";
            header('Location: ../../index.php');
        } else if (strlen($_POST['senha-login']) == 0) {
            $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Campo senha deve ser preenchido!</div>";
            header('Location: ../../index.php');
        } else {

            $cpf = mysqli_real_escape_string($connection, $_POST['cpf-login']);
            $senha = mysqli_real_escape_string($connection, $_POST['senha-login']);

            $sql = "SELECT * FROM pacientes WHERE cpf='$cpf' AND senha='$senha' LIMIT 1";

            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION['id'] = $row['idPaciente'];
                    $_SESSION['nome'] = $row['nomeCompleto'];
                    $_SESSION['nivel_acesso'] = $row['nivel_acesso'];
                    $_SESSION['logado'] = true;
                }
                header('Location: ../adm/painel.php');
            } else {
                $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>CPF ou senha incorretos!</div>";
                header('Location: ../../index.php');
            }
        }
    }

    ?>
</body>

</html>