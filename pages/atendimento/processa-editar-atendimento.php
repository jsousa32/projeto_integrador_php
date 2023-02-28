<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

?>

<?php

if (isset($_POST['atualizar'])) {
    $idAtendimento = $_SESSION['idAtendimento'];
    $nomePaciente = $_POST['nome'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $medico_id = $_POST['medico'];
    $motivo = $_POST['motivo'];

    # Verificar se já existe no banco de dados um registro de consulta de data/hora/medico

    $sql = "SELECT data_atend, hora_atend, medico_id FROM atendimentos WHERE (data_atend LIKE '%$data%') AND (hora_atend LIKE '%$hora%') AND (medico_id LIKE '%$medico_id%')";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 0) {

        # senao existir, verifica se o paciente já não possui um outro horário agendado nesse dia independente do médico
        $sql = "SELECT data_atend, hora_atend, paciente_id FROM atendimentos WHERE (data_atend LIKE '%$data%') AND (hora_atend LIKE '%$hora%') AND (paciente_id LIKE '%$paciente_id%')";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) == 0) {
            $sql = "UPDATE atendimentos SET nomePaciente='$nomePaciente', data_atend='$data', hora_atend='$hora', motivo='$motivo', medico_id='$medico_id' WHERE idAtendimento='$idAtendimento'";

            $result = mysqli_query($connection, $sql);
            if ($result != 0) {
                $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Atendimento atualizado com sucesso!</div>";
                header('Location: listar-atendimentos.php');
            }
        } else {
            $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Erro! Você já possui um atendimento nessa data e hora marcada! Tente novamente</div>";
            header('Location: listar-atendimentos.php');
        }
    } else {
        $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Erro! Existe um agendamento marcado com essa data, horário e médico! Tente novamente</div>";
        header('Location: listar-atendimentos.php');
    }

    mysqli_close($connection);
} else {
    header('Location: ../adm/painel.php');
}

?>