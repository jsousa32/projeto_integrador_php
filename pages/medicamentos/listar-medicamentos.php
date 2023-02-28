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

    $sql = "SELECT * from medicamentos";
    $result = mysqli_query($connection, $sql);

    ?>

    <h4 class="text-center">Listagem de medicamentos cadastrados no sistema</h1>

        <?php

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='table-responsive'>
        <table class='table table-striped table-sm'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Fabricante</th>
                <th>Descrição</th>
                <th>Composição</th>
                <th>Indicação</th>
                <th>Quantidade</th>
                <th>Unidade</th>
                <th>Cadastrado em</th>
                <th>Atualizado em</th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['idMedicamento'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['fabricante'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['composicao'] . "</td>";
                echo "<td>" . $row['indicacao'] . "</td>";
                echo "<td>" . $row['qtd'] . "</td>";
                echo "<td>" . $row['unidade'] . "</td>";
                echo "<td>" . date('d/m/Y H:i', strtotime($row['created_at'])) . "</td>";
                echo "<td>" . date('d/m/Y H:i', strtotime($row['updated_at'])) . "</td>";
                if (($_SESSION['nivel_acesso']) == 2) {
                    echo "<td><a href='editar-medicamento.php?id=$row[idMedicamento]'>Editar</td></tr>";
                    echo "<td><a href='processa-deletar-medicamento.php?id=$row[idMedicamento]'>Excluir</td></tr>";
                    echo "<td><a href='adicionar-itens-medicamento.php?id=$row[idMedicamento]'>Adicionar items</a></td>";
                    echo "<td><a href='remover-itens-medicamento.php?id=$row[idMedicamento]'>Remover items</a></td>";
                }
            }
            echo "</table>";
        } else {
            echo "<div class='text-center'>Não há registros cadastrados no banco de dados!</div>";
        }
        mysqli_close($connection);

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