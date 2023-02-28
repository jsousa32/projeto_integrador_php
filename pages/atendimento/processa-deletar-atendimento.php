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

    if (!empty($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "DELETE FROM atendimentos WHERE idAtendimento='$id'";

        $result = mysqli_query($connection, $sql);
    }

    mysqli_close($connection);

    header('Location: listar-atendimentos.php');

    ?>

</body>

</html>