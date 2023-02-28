<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include_once 'head.php' ?>

<body>
  <nav class="navbar navbar-expand-lg bg-light rounded" aria-label="menu">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
        <a class="navbar-brand col-lg-3 me-0"><?php echo TITLE_MENU ?></a>
        <ul class="navbar-nav col-lg-6 justify-content-lg-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../adm/painel.php">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pacientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Médicos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Medicamentos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../medicamentos/cadastrar-medicamento.php">Cadastrar medicamento</a></li>
              <li><a class="dropdown-item" href="../medicamentos/listar-medicamentos.php">Listar medicamentos</a></li>
              <li><a class="dropdown-item" href="../medicamentos/pesquisar-medicamento.php">Pesquisar medicamento</a></li>
              <li>Deletar medicamento</li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Atendimentos</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <div class="d-lg-flex col-lg-3 justify-content-lg-end">
          <button class="btn btn-primary">Sair</button>
        </div>
      </div>
    </div>
  </nav>

  <?php include_once 'scripts.php' ?>
</body>

</html>