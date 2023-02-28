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

<?php

if (isset($_POST['remover'])) {
    $idMed = $_SESSION['id'];

    $sql = "SELECT qtd FROM medicamentos WHERE idMedicamento='$idMed'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $qtdAtual = $row['qtd'];
        }
    } else {
        $qtdAtual = 0;
    }

    $qtdDesejada = $_POST['novaQtd'];

    # Adiciona a quantidade desejada ao saldo atual
    if (($qtdAtual > 0) and ($qtdAtual >= $qtdDesejada)) {
        $novoSaldo = $qtdAtual - $qtdDesejada;

        # Atualiza a tabela com as novas quantidades
        $sql = "UPDATE medicamentos SET qtd='$novoSaldo' WHERE idMedicamento='$idMed'";

        $result = mysqli_query($connection, $sql);
    } else {
        $_SESSION['info'] = $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Erro! Solicitação maior que o estoque atual! Estoque atual: $qtdAtual itens desse medicamento</div>";
        header('Location: remover-itens-medicamento.php');
    }

    mysqli_close($connection);

    header('Location: listar-medicamentos.php');
} else {
    header('Location: ../adm/painel.php');
}

?>