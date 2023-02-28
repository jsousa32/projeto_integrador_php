<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<body>

    <?php

    $idExcluir = $_POST['excluir'];

    $sql = "DELETE FROM atendimentos WHERE idAtendimento='$idExcluir'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_affected_rows($connection)) {
        $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Atendimento deletado com sucesso!</div>";
    } else {
        $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>ID inexistente ou digitado de forma incorreta!</div>";
    }

    mysqli_close($connection);

    header('Location: deletar-atendimento.php');

    ?>

</body>

</html>