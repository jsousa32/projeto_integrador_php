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

    $sql = "SELECT * FROM medicos";

    $result = mysqli_query($connection, $sql);

    ?>

    <h4 class="text-center">Listagem de medicos cadastrados no sistema</h4>

    <?php

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>
            <tr>
            <td>ID</td>
            <td>Nome</td>
            <td>Data de Nascimento</td>
            <td>Endereço</td>
            <td>Telefone</td>
            <td>CRM</td>
            <td>Especialidade</td>
            <td>Cadastrado em</td>
            <td>Atualizado em</td></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['idMedico'] . "</td>";
            echo "<td>" . $row['nomeCompleto'] . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($row['dataNascimento'])) . "</td>";
            echo "<td>" . $row['endereco'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['crm'] . "</td>";
            echo "<td>" . $row['especialidade'] . "</td>";
            echo "<td>" . date('d/m/Y H:i', strtotime($row['created_at'])) . "</td>";
            echo "<td>" . date('d/m/Y H:i', strtotime($row['updated_at'])) . "</td>";
            echo "<td><a href='editar-medico.php?id=$row[idMedico]'>Editar</td></tr>";
            echo "<td><a href='processa-deletar-medico.php?id=$row[idMedico]'>Excluir</td></tr>";
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