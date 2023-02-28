<?php include_once '../../config/config.php' ?>
<?php include_once '../../config/valida-acesso.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once '../../parties/head.php' ?>

<body>

    <?php include_once '../../parties/menu.php' ?>

    <?php

    echo "<br>";
    echo "<p>Olá, seja bem vindo(a) $_SESSION[nome]!</p>";
    if (($_SESSION['nivel_acesso']) == 2) {
        echo "<p>Seu nível de acesso é de Administrador.</p>";
    } else {
        echo "<p>Seu nível de acesso é de usuário padrão.</p>";
    }
    ?>

    <ul>
        <li><a href="../login/logout.php">Sair do sistema</a></li>
    </ul>

    <h2>Pacientes</h2>
    <ul>
        <li><a href="../pacientes/cadastro-paciente.php">Cadastrar Paciente</a></li>
        <li><a href="../pacientes/listar-pacientes.php">Listar Pacientes</a></li>
        <li><a href="../pacientes/pesquisar-paciente.php">Pesquisar Paciente</a></li>
    </ul>

    <h2>Médicos</h2>
    <ul>
        <li><a href="../medicos/cadastro-medico.php">Cadastrar Médico</a></li>
        <li><a href="../medicos/listar-medicos.php">Listar Médicos</a></li>
        <li><a href="../medicos/pesquisar-medico.php">Pesquisar Médico</a></li>
    </ul>

    <h2>Medicamentos</h2>
    <ul>
        <li><a href="../medicamentos/cadastrar-medicamento.php">Cadastrar medicamento</a></li>
        <li><a href="../medicamentos/listar-medicamentos.php">Listar medicamentos</a></li>
        <li><a href="../medicamentos/pesquisar-medicamento.php">Pesquisar medicamento</a></li>
    </ul>

    <h2>Atendimento</h2>
    <ul>
        <li><a href="../atendimento/agendar-atendimento.php">Agendar atendimento</a></li>
        <li><a href="../atendimento/listar-atendimentos.php">Listar atendimentos</a></li>
    </ul>

    <?php include_once '../../parties/scripts.php' ?>
</body>

</html>