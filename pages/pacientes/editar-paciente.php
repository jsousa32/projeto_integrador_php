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

    $sql = "SELECT * FROM pacientes WHERE idPaciente=$id";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['id'] = $row['idPaciente'];
            $nome = $row['nomeCompleto'];
            $nomeMae = $row['nomeMae'];
            $dataNascimento = $row['dataNascimento'];
            $cpf = $row['cpf'];
            $cod_sus = $row['codigo_sus'];
            $genero = $row['genero'];
            $endereco = $row['endereco'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $senha = $row['senha'];
            $nivel_acesso = $row['nivel_acesso'];
        }
    } else {
        header('Location: ../adm/painel.php');
    }
}
?>

<body>

    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary">Editar cadastro de Paciente</div>
            <div class="card-body">
                <form action="processa-editar-paciente.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>" required>
                            </div>
                            <div class="col-12">
                                <label for="NomeMae">Nome Completo da Mãe</label>
                                <input type="text" name="nomeMae" class="form-control" value="<?php echo $nomeMae ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="dataNascimento">Data de Nascimento</label>
                                <input type="date" name="dataNascimento" class="form-control" value="<?php echo $dataNascimento ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" class="form-control" value="<?php echo $cpf ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="codigoSUS">Código SUS</label>
                                <input type="text" name="codigo_sus" class="form-control" value="<?php echo $cod_sus ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="genero">Gênero</label>
                                <select name="genero" class="form-control" required>
                                    <option value="">Selecione o gênero</option>
                                    <option value="Feminino" <?php echo $genero == 'Feminino' ? 'selected' : '' ?>>Feminino</option>
                                    <option value="Masculino" <?php echo $genero == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="endereco">Endereço Completo</label>
                                <input type="text" name="endereco" class="form-control" value="<?php echo $endereco ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" value="<?php echo $telefone ?>" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email ?>" placeholder="seuemail@email.com">
                            </div>
                            <div class="col-6">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" class="form-control" value="<?php echo $senha ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="nivel_acesso">Nível de Acesso</label>
                                <select name="nivel_acesso" class="form-control" required>
                                    <option value="">Selecione o perfil</option>
                                    <option value="2" <?php echo $nivel_acesso == 2 ? 'selected' : '' ?>>Administrador</option>
                                    <option value="1" <?php echo $nivel_acesso == 1 ? 'selected' : '' ?>>Usuário Padrão</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="atualizar">Atualizar dados</button>
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