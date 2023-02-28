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
<?php include_once '../../parties/head.php' ?>
<?php include_once '../../parties/menu.php' ?>

<body>

    <h4 class="text-center">Busca por médicos</h4>

    <?php

    $pesquisar = $_POST['busca'];

    $sql = "SELECT * FROM medicos WHERE nomeCompleto LIKE '%$pesquisar%' LIMIT 15";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<h6>Médicos encontrados em nosso sistema</h6>";

        while ($row = mysqli_fetch_array($result)) {
            echo "ID:" . $row['idMedico'] . "<br>";
            echo "Nome:" . $row['nomeCompleto'] . "<br>";
            echo "Data de Nascimento:" . date('d/m/Y', strtotime($row['dataNascimento'])) . "<br>";
            echo "Endereço:" . $row['endereco'] . "<br>";
            echo "Telefone:" . $row['telefone'] . "<br>";
            echo "CRM:" . $row['crm'] . "<br>";
            echo "Especialidade:" . $row['especialidade'] . "<br>";
            echo "Cadastrado em:" . date('d/m/Y H:i:s', strtotime($row['created_at'])) . "<br>";
            echo "Atualizado em:" . date('d/m/Y H:i:s', strtotime($row['updated_at'])) . "<br>";
        }
    } else {
        echo "<div class='text-center'>Não foram encontrados registros no banco de dados!</div>";
    }

    ?>

    <div class="text-center">
        <a href="../adm/painel.php">Retornar ao painel</a>
    </div>

</body>

</html>