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

    $sql = "SELECT idAtendimento, nomePaciente, medico_id , data_atend , hora_atend , motivo, a.created_at , a.updated_at , m.nomeCompleto 
    FROM atendimentos a, medicos m WHERE a.medico_id = m.idMedico";

    $result = mysqli_query($connection, $sql);

    ?>

    <h4 class="text-center">Listagem de atendimentos cadastrados no sistema</h4>

    <?php

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>
        <tr>
        <th>ID</th>
        <th>Nome do paciente</th>
        <th>Nome do médico</th>
        <th>Data de atendimento</th>
        <th>Horário de atendimento</th>
        <th>Motivo do atendimento</th>
        <th>Cadastrado em</th>
        <th>Atualizado em</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . $row['idAtendimento'] . "</td>";
            echo "<td>" . $row['nomePaciente'] . "</td>";
            echo "<td>" . $row['nomeCompleto'] . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($row['data_atend'])) . "</td>";
            echo "<td>" . date('H:i', strtotime($row['hora_atend'])) . "</td>";
            echo "<td>" . $row['motivo'] . "</td>";
            echo "<td>" . date('d/m/Y H:i', strtotime($row['created_at'])) . "</td>";
            echo "<td>" . date('d/m/Y H:i', strtotime($row['updated_at'])) . "</td>";
            echo "<td><a href='editar-atendimento.php?id=$row[idAtendimento]'>Editar</a></td></tr>";
            echo "<td><a href='processa-deletar-atendimento.php?id=$row[idAtendimento]'>Excluir</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='text-center'>Não há registros cadastrados no banco de dados!</div>";
    }

    mysqli_close($connection);

    ?>

    <?php
    if (isset($_SESSION['info'])) {
        echo $_SESSION['info'];
        unset($_SESSION['info']);
    }
    ?>

    <div class="text-center">
        <a href="../adm/painel.php">Retornar ao painel</a>
    </div>

</body>

</html>