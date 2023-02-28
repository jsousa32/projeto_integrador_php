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

    <h4 class="text-center">Busca por medicamentos</h4>

    <?php

    $pesquisar = $_POST['busca'];

    $sql = "SELECT * FROM medicamentos WHERE nome lIKE '%$pesquisar%' LIMIT 15";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<h6>Medicamentos encontrados em nosso estoque</h6>";

        while ($row = mysqli_fetch_array($result)) {
            echo "Nome: " . $row['nome'] . "<br>";
            echo "Fabricante: " . $row['fabricante'] . "<br>";
            echo "Descrição: " . $row['descricao'] . "<br>";
            echo "Composição: " . $row['composicao'] . "<br>";
            echo "Indicação: " . $row['indicacao'] . "<br>";
            echo "Quantidade: " . $row['qtd'] . "<br>";
            echo "Unidade: " . $row['unidade'] . "<br>";
            echo "Cadastrado em: " . date('d/m/Y H:i:s', strtotime($row['created_at'])) . "<br>";
            echo "Atualizado em: " . date('d/m/Y H:i:s',  strtotime($row['updated_at'])) . "<br>";
            echo "<a href='solicitar-medicamento.php?id=$row[idMedicamento]'>Solicitar este medicamento</a>";
            echo "<hr>";
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