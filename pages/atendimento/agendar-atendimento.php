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
            <div class="card-header bg-primary">Agendar Atendimento</div>
            <div class="card-body">
                <form action="processa-atendimento.php" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome completo do paciente</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $_SESSION['nome'] ?>" readonly>
                            </div>
                            <div class="col-4">
                                <label for="data">Data</label>
                                <input type="date" name="data" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="hora">Hora</label>
                                <input type="time" name="hora" class="form-control" min="08:00" max="17:00" required>
                            </div>
                            <div class="col-12">

                                <?php

                                $sql = "SELECT idMedico, nomeCompleto, especialidade FROM medicos ORDER BY nomeCompleto ASC";

                                $result = mysqli_query($connection, $sql);

                                ?>

                                <label for="medico">Escolha o médico desejado para o atendimento</label>
                                <select class="form-select" aria-label="medico" name="medico" required>
                                    <option selected>Clique aqui para selecionar</option>

                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <option value="<?php echo $row['idMedico'] ?>"><?php echo $row['nomeCompleto'] . " (" . $row['especialidade'] . ")" ?></option>

                                    <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="motivo">Motivo da consulta (opcional)</label>
                                <textarea class="form-control" name="motivo" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="agendar">Agendar atendimento</button>
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
            if (isset($_SESSION['comprovante'])) {
                echo $_SESSION['comprovante'];
                unset($_SESSION['comprovante']);
            }
            ?>
        </div>
    </div>

</body>

</html>