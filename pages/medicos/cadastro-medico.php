<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema sem estar logado
include_once '../../config/valida-acesso.php';

# Inclui o arquivo responsável por restringir o acesso de acordo com o nível do usuário
include_once '../../config/restringe-acesso.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include_once '../../parties/head.php' ?>
<?php include_once '../../parties/menu.php' ?>

<body>

    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary">Cadastro de Médico</div>
            <div class="card-body">
                <form action="processa-cadastro.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome Completo</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="dataNascimento">Data de Nascimento</label>
                                <input type="date" name="dataNascimento" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="crm">CRM</label>
                                <input type="text" name="crm" class="form-control" required>
                            </div>
                            <div class="col-8">
                                <label for="especialidade">Especialidade</label>
                                <select name="especialidade" class="form-select">
                                    <option value="">Selecione uma opção</option>
                                    <option value="Clinico Geral">Clinico Geral</option>
                                    <option value="Cardiologista">Cardiologista</option>
                                    <option value="Oftalmologista">Oftalmologista</option>
                                    <option value="Endocrinologista">Endocrinologista</option>
                                    <option value="Residência Médica">Residência Médica</option>
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block">Cadastrar</button>
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