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
            <div class="card-header bg-primary">Editar Medicamento</div>
            <div class="card-body">
                <form action="processa-editar-medicamento.php" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="fabricante">Fabricante</label>
                                <select name="fabricante" class="form-select" required>
                                    <option value="">Selecione um fabricante</option>
                                    <option value="Bayern" <?php echo $fabricante == 'Bayern' ? 'selected' : '' ?>>Bayern</option>
                                    <option value="Eurofarma" <?php echo $fabricante == 'Eurofarma' ? 'selected' : '' ?>>Eurofarma</option>
                                    <option value="Takeda" <?php echo $fabricante == 'Takeda' ? 'selected' : '' ?>>Takeda</option>
                                    <option value="Sanofi" <?php echo $fabricante == 'Sanofi' ? 'selected' : '' ?>>Sanofi</option>
                                    <option value="Libbs" <?php echo $fabricante == 'Libbs' ? 'selected' : '' ?>>Libbs</option>
                                    <option value="Neoquimica" <?php echo $fabricante == 'Neo Química' ? 'selected' : '' ?>>Neo Química</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="descricao">Descricao</label>
                                <textarea class="form-control" name="descricao" rows="3" required><?php echo $descricao ?></textarea>
                            </div>
                            <div class="col-12">
                                <label for="composicao">Composição</label>
                                <input type="text" name="composicao" class="form-control" value="<?php echo $composicao ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="indicacao">Indicação</label>
                                <input type="text" name="indicacao" class="form-control" value="<?php echo $indicacao ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" name="quantidade" class="form-control" value="<?php echo $quantidade ?>" disabled>
                            </div>
                            <div class="col-4">
                                <label for="unidade">Unidade</label>
                                <select name="unidade" class="form-control" required>
                                    <option value="">Selecione a unidade</option>
                                    <option value="Caixa" <?php echo $unidade == 'Caixa' ? 'selected' : '' ?>>Caixa</option>
                                    <option value="Kg" <?php echo $unidade == 'Kg' ? 'selected' : '' ?>>Kg</option>
                                    <option value="Ml" <?php echo $unidade == 'Ml' ? 'selected' : '' ?>>Ml</option>
                                    <option value="L" <?php echo $unidade == 'L' ? 'selected' : '' ?>>Litro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="atualizar">Atualizar medicamento</button>
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