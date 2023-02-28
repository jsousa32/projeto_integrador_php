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

<body>
    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary">Cadastro de Medicamentos</div>
            <div class="card-body">
                <form action="processa-cadastro.php" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome</label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label for="fabricante">Fabricante</label>
                                <select name="fabricante" aria-label="fornecedor" class="form-select" required>
                                    <option selected>Selecione um fabricante</option>
                                    <option value="Bayern">Bayern</option>
                                    <option value="Eurofarma">Eurofarma</option>
                                    <option value="Takeda">Takeda</option>
                                    <option value="Sanofi">Sanofi</option>
                                    <option value="Libbs">Libbs</option>
                                    <option value="Neoquimica">Neo Química</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="descricao">Descricao</label>
                                <textarea class="form-control" name="descricao" rows="3" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="composicao">Composição</label>
                                <input type="text" name="composicao" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label for="indicacao">Indicação</label>
                                <input type="text" name="indicacao" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" name="quantidade" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="unidade">Unidade</label>
                                <select name="unidade" class="form-select" required>
                                    <option value="">Selecione a unidade</option>
                                    <option value="Caixa">Caixa</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Ml">Ml</option>
                                    <option value="L">Litro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="cadastrar">Cadastrar</button>
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