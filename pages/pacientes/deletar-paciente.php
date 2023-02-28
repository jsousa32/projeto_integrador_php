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
    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary text-light">Excluir paciente</div>
            <div class="card-body">
                <form action="processa-deletar-paciente.php" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="excluir">Deletar paciente do banco de dados</label>
                                <input type="text" name="excluir" class="form-control" placeholder="Digite o ID do paciente" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 btn-block" onclick="return confirm('Deseja realmente excluir o paciente?')">Excluir</button>
                    <div class="text-center">
                        <a href="../adm/painel.php" class="btn btn-primary mt-3 btn-block">Retornar ao painel</a>
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