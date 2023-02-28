<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

?>

<?php

if (isset($_POST['agendar'])) {
    $paciente_id = $_SESSION['id'];
    $nomePaciente = $_POST['nome'];
    $data =  $_POST['data'];
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

            # Senão existir nenhum agendamento desse paciente realiza o agendamento no sistema
            $sql = "INSERT INTO atendimentos (nomePaciente, data_atend, hora_atend, motivo, medico_id, paciente_id, created_at) VALUES ('$nomePaciente','$data','$hora','$motivo','$medico_id','$paciente_id', NOW())";
            $result = mysqli_query($connection, $sql);
            if ($result != 0) {
                $_SESSION['info'] = "<div class='alert alert-success text-center' role='alert'>Atendimento agendado com sucesso!</div>";
                $_SESSION['comprovante'] = "<div class='alert alert-warning text-center' role='alert'>Visualizar <a href='gerar-comprovante.php' class='alert-link' target='_blank'>comprovante</a></div>";
                header('Location: agendar-atendimento.php');
            }
        } else {
            $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Erro! Você já possui um atendimento nessa data e hora marcada! Tente novamente</div>";
            header('Location: agendar-atendimento.php');
        }
    } else {
        $_SESSION['info'] = "<div class='alert alert-danger text-center' role='alert'>Erro! Existe um agendamento marcado com essa data, horário e médico! Tente novamente</div>";
        header('Location: agendar-atendimento.php');
    }
} else {
    header('Location: ../adm/painel.php');
}

mysqli_close($connection);

# Cria váriaveis de sessão para gerar o relatório PDF na outra página
$_SESSION['nomePaciente'] = $nomePaciente;
$_SESSION['medicoId'] = $medico_id;
$_SESSION['data'] = $data;
$_SESSION['hora'] = $hora;
$_SESSION['motivo'] = $motivo;

?>