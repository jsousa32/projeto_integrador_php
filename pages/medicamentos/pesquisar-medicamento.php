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
    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary text-light">Pesquisar Medicamento</div>
            <div class="card-body">
                <form action="processa-pesquisa.php" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="pesquisar">Pesquisar medicamento no sistema</label>
                                <input type="text" name="busca" class="form-control" placeholder="Digite o nome do medicamento que deseja pesquisar" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3 btn-block">Pesquisar</button>
                    <div class="text-center">
                        <a href="../adm/painel.php">Retornar ao painel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>