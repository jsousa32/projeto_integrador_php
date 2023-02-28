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
<html lang="en">
<?php include_once '../../parties/head.php' ?>
<?php include_once '../../parties/menu.php' ?>

<?php

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM medicamentos WHERE idMedicamento=$id";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $row['idMedicamento'];
            $nome = $row['nome'];
            $fabricante = $row['fabricante'];
            $descricao = $row['descricao'];
            $composicao = $row['composicao'];
            $indicacao = $row['indicacao'];
            $quantidade = $row['qtd'];
            $unidade = $row['unidade'];
        }
    } else {
        header('Location: ../adm/painel.php');
    }
}

?>

<body>
    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary">Adicionar itens no medicamento</div>
            <div class="card-body">
                <form action="processa-adicionar-itens.php" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>" disabled>
                            </div>
                            <div class="col-12">
                                <label for="Nome">Fabricante</label>
                                <input type="text" name="fabricante" class="form-control" value="<?php echo $fabricante ?>" disabled>
                            </div>
                            <div class="col-12">
                                <label for="Nome">Unidade</label>
                                <input type="text" name="unidade" class="form-control" value="<?php echo $unidade ?>" disabled>
                            </div>
                            <div class="col-6">
                                <label for="quantidade">Quantidade em estoque atualmente</label>
                                <input type="number" name="quantidade" class="form-control" value="<?php echo $quantidade ?>" disabled required>
                            </div>
                            <div class="col-6">
                                <label for="quantidade">Quantidade a ser adicionada</label>
                                <input type="number" name="novaQtd" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="adicionar">Adicionar itens ao medicamento</button>
                    <div class="text-center">
                        <a href="../adm/painel.php">Retornar ao painel</a>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_SESSION['info'])) {
                echo $_SESSION['info'];
                unset($_SESSION['info']);
            }
            ?>
        </div>
    </div>
</body>

</html>