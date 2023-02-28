<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include_once '../../parties/head.php' ?>

<body>

    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary">Cadastro</div>
            <div class="card-body">
                <form action="processa-cadastro.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label for="NomeMae">Nome Completo da Mãe</label>
                                <input type="text" name="nomeMae" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="dataNascimento">Data de Nascimento</label>
                                <input type="date" name="dataNascimento" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="codigoSUS">Código SUS</label>
                                <input type="text" name="codigo_sus" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="genero">Gênero</label>
                                <select name="genero" class="form-select" required>
                                    <option value="">Selecione o gênero</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="endereco">Endereço Completo</label>
                                <input type="text" name="endereco" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="seuemail@email.com">
                            </div>
                            <div class="col-6">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block text-center">Cadastrar</button>
                    <div class="text-center">
                        <a href="../../index.php">Voltar a área de login</a>
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