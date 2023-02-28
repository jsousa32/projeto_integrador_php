<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

?>

<?php

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $descricao = $_POST['descricao'];
    $composicao = $_POST['composicao'];
    $indicacao = $_POST['indicacao'];
    $qtd = $_POST['quantidade'];
    $unid = $_POST['unidade'];

    # Realiza uma busca no banco para verificar se já não existe um medicamento cadastrado com esse nome e fabricante
    $sql = "SELECT nome, fabricante, unidade FROM medicamentos WHERE (nome LIKE '%$nome%') AND (fabricante LIKE '%$fabricante%') AND (unidade LIKE '%$unid%')";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 0) {

        $sql = "INSERT INTO medicamentos (nome, fabricante, descricao, composicao, indicacao, qtd , unidade, created_at) 
    VALUES ('$nome', '$fabricante', '$descricao', '$composicao', '$indicacao', '$qtd', '$unid', NOW())";

        $result = (mysqli_query($connection, $sql));

        if ($result != 0) {
            $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Medicamento cadastrado com sucesso!</div>";
        }
    } else {
        $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Medicamento já cadastrado no banco de dados! Verifique a lista de medicamentos cadastrados.</div>";
    }
}
mysqli_close($connection);

header("Location: cadastrar-medicamento.php");
?>