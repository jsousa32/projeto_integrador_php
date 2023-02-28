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

<?php

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM medicos WHERE idMedico=$id";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $row['idMedico'];
            $nome = $row['nomeCompleto'];
            $dataNascimento = $row['dataNascimento'];
            $endereco = $row['endereco'];
            $telefone = $row['telefone'];
            $crm = $row['crm'];
            $especialidade = $row['especialidade'];
        }
    } else {
        header('Location: ../adm/painel.php');
    }
}

?>

<body>

    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary">Editar cadastro de Médico</div>
            <div class="card-body">
                <form action="processa-editar-medico.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="dataNascimento">Data de Nascimento</label>
                                <input type="date" name="dataNascimento" class="form-control" value="<?php echo $dataNascimento ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" class="form-control" value="<?php echo $endereco ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" class="form-control" value="<?php echo $telefone ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="crm">CRM</label>
                                <input type="text" name="crm" class="form-control" value="<?php echo $crm ?>" required>
                            </div>
                            <div class="col-8">
                                <label for="especialidade">Especialidade</label>
                                <select name="especialidade" class="form-select">
                                    <option value="">Selecione uma opção</option>
                                    <option value="Clinico Geral" <?php echo $especialidade == 'Clinico Geral' ? 'selected' : '' ?>>Clinico Geral</option>
                                    <option value="Cardiologista" <?php echo $especialidade == 'Cardiologista' ? 'selected' : '' ?>>Cardiologista</option>
                                    <option value="Oftalmologista" <?php echo $especialidade == 'Oftalmologista' ? 'selected' : '' ?>>Oftalmologista</option>
                                    <option value="Endocrinologista" <?php echo $especialidade == 'Endocrinologista' ? 'selected' : '' ?>>Endocrinologista</option>
                                    <option value="Residência Médica" <?php echo $especialidade == 'Residência Médica' ? 'selected' : '' ?>>Residência Médica</option>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block" name="atualizar">Atualizar dados</button>
                            <div class="text-center">
                                <a href="../adm/painel.php">Voltar ao painel</a>
                            </div>
                        </div>
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