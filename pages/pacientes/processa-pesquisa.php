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

    <?php

    $pesquisar = $_POST['busca'];

    $sql = "SELECT idPaciente, nomeCompleto, nomeMae, dataNascimento, cpf, codigo_sus, genero, endereco, telefone, email, created_at, updated_at FROM pacientes
    WHERE nomeCompleto LIKE '%$pesquisar%' LIMIT 15";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            echo "ID:" . $row['idPaciente'] . "<br>";
            echo "Nome:" . $row['nomeCompleto'] . "<br>";
            echo "Nome da Mãe:" . $row['nomeMae'] . "<br>";
            echo "Data de Nascimento:" . date('d/m/Y', strtotime($row['dataNascimento'])) . "<br>";
            echo "CPF:" . $row['cpf'] . "<br>";
            echo "Código SUS:" . $row['codigo_sus'] . "<br>";
            echo "Gênero:" . $row['genero'] . "<br>";
            echo "Telefone:" . $row['endereco'] . "<br>";
            echo "Email:" . $row['email'] . "<br>";
            echo "Cadastrado em:" . date('d/m/Y H:i:s', strtotime($row['created_at'])) . "<br>";
            echo "Atualizado:" . date('d/m/Y H:i:s', strtotime($row['updated_at'])) . "<br>";
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