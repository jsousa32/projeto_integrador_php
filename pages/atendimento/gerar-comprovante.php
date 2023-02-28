<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
include_once '../../config/valida-acesso.php';

# Inclui o autoloader do DOMPDF
require_once '../../utils/dompdf/autoload.inc.php';

# Inclui o autoloader do DOMPDF
use Dompdf\Dompdf;

require_once '../../utils/dompdf/autoload.inc.php';

# Instanciar a classe dompdf
$dompdf = new Dompdf();

# Faz uma consulta para encontrar o nome do médico responsável pelo atendimento
$sql = "SELECT nomeCompleto FROM medicos WHERE idMedico='$_SESSION[medicoId]'";
$result = mysqli_query($connection, $sql);
if ($row = mysqli_fetch_array($result)) {
    $_SESSION['nomeMedico'] = $row['nomeCompleto'];
}

# Corpo da página HTML que será utilizada no PDF
$dompdf->loadHtml('
    <h1>Comprovante de Agendamento</h1>
    <hr>
    <p>Este é um comprovante de agendamento de atendimento em nossa unidade de saúde.</p>
    <p>Nome do paciente: ' . $_SESSION['nomePaciente'] . '</p>
    <p>Nome do médico: ' . $_SESSION['nomeMedico'] . '</p>
    <p>Data: ' . date('d/m/Y', strtotime($_SESSION['data'])) . ' </p>
    <p>Horário: ' . date('H:i', strtotime($_SESSION['hora'])) . ' </p>
    <p>Motivo do atendimento: ' . $_SESSION['motivo'] . '</p>
    <p>Esse documento comprova que recebemos a sua solicitação de agendamento de atendimento e registramos em nosso banco de dados.</p>
    <p>Portanto, o seu atendimento está agendado com sucesso.</p>
    <p>Favor comparecer a unidade na data e hora marcada.</p>
');

# Renderiza o pdf de acordo com o código HTML
$dompdf->render();

# Gera o arquivo pdf do comprovante, forçando o usuário a fazer o download do arquivo
$dompdf->stream('comprovante-agendamento.pdf', array(
    "Attachment" => false
));

unset($_SESSION['nomePaciente']);
unset($_SESSION['medicoId']);
unset($_SESSION['nomeMedico']);
unset($_SESSION['data']);
unset($_SESSION['hora']);
unset($_SESSION['motivo']);
