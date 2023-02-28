<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

# Inclui o arquivo responsável por restringir o acesso de acordo com o nível do usuário
include_once '../../config/restringe-acesso.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include_once '../../parties/head.php' ?>
<?php include_once '../../parties/menu.php' ?>

<body>
    <?php

    $sql = "SELECT idPaciente, nomeCompleto, nomeMae, dataNascimento,cpf, codigo_sus, genero,endereco, telefone, email, nivel_acesso, created_at, updated_at FROM pacientes";
    $result = mysqli_query($connection, $sql);

    ?>

    <h4 class="text-center">Listagem de pacientes cadastrados no sistema</h4>

    <?php

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Nome da Mãe</th>
        <th>Data de Nascimento</th>
        <th>CPF</th>
        <th>Código SUS</th>
        <th>Gênero</th>
        <th>Endereço</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Nível de Acesso</th>
        <th>Cadastrado em</th>
        <th>Atualizado em</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['idPaciente'] . "</td>";
            echo "<td>" . $row['nomeCompleto'] . "</td>";
            echo "<td>" . $row['nomeMae'] . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($row['dataNascimento'])) . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "<td>" . $row['codigo_sus'] . "</td>";
            echo "<td>" . $row['genero'] . "</td>";
            echo "<td>" . $row['endereco'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";

            if (($row['nivel_acesso']) == 2) {
                echo "<td>Administrador</td>";
            } else {
                echo "<td>Usuário Padrão</td>";
            }
            echo "<td>" . date('d/m/Y H:i', strtotime($row['created_at'])) . "</td>";
            echo "<td>" . date('d/m/Y H:i', strtotime($row['updated_at'])) . "</td>";
            echo "<td><a href='editar-paciente.php?id=$row[idPaciente]'>Editar</a></td></tr>";
            echo "<td><a href='processa-deletar-paciente.php?id=$row[idPaciente]'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='text-center'>Não há registros cadastrados no banco de dados!</div>";
    }

    mysqli_close($connection);

    ?>

    <div class="text-center">
        <a href="../adm/painel.php">Retornar ao painel</a>
    </div>
</body>

</html>