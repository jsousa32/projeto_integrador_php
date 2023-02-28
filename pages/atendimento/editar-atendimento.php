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

    $sql = "SELECT * FROM atendimentos WHERE idAtendimento='$id'";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['idAtendimento'] = $id;
            $nomepaciente = $row['nomePaciente'];
            $data = $row['data_atend'];
            $hora = $row['hora_atend'];
            $motivo = $row['motivo'];
            $medico_id = $row['medico_id'];
            $paciente_id = $row['paciente_id'];
        }
    } else {
        header('Location: ../adm/painel.php');
    }
}

?>

<body>

    <div class="container">
        <div class="card card-register mx-auto col-6 px-0">
            <div class="card-header bg-primary">Editar Atendimento</div>
            <div class="card-body">
                <form action="processa-editar-atendimento.php" method="POST">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-12">
                                <label for="Nome">Nome completo do paciente</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nomepaciente ?>">
                            </div>
                            <div class="col-4">
                                <label for="data">Data</label>
                                <input type="date" name="data" class="form-control" value="<?php echo $data ?>" required>
                            </div>
                            <div class="col-4">
                                <label for="hora">Hora</label>
                                <input type="time" name="hora" class="form-control" value="<?php echo $hora ?>" required>
                            </div>
                            <div class="col-12">

                                <?php

                                $sql = "SELECT idMedico, nomeCompleto, especialidade FROM medicos ORDER BY nomeCompleto ASC";

                                $resultBusca = mysqli_query($connection, $sql);

                                ?>

                                <label for="medico">Escolha o médico desejado para o atendimento</label>
                                <select class="form-select" aria-label="medico" name="medico" required>

                                    <?php

                                    $sql = "SELECT idMedico, nomeCompleto, especialidade FROM medicos WHERE idMedico='$medico_id'";

                                    $result = mysqli_query($connection, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) { ?>

                                            <option selected value="<?php echo $row['idMedico'] ?>"><?php echo $row['nomeCompleto'] . " (" . $row['especialidade'] . ")" ?></option>
                                        <?php
                                        }
                                    }


                                    if (mysqli_num_rows($resultBusca) > 0) {
                                        while ($row = mysqli_fetch_array($resultBusca)) {
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
                                <textarea class="form-control" name="motivo" rows="3"><?php echo $motivo ?></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" name="atualizar">Editar atendimento</button>
                    <div class="text-center">
                        <a href="../adm/painel.php">Retornar ao painel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>