<?php include_once './config/config.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once './parties/head.php' ?>

<body>
    <div class="vh-100 d-flex justify-content-center align-items-center ">
        <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
            <h2 class="text-center mb-4 text-primary"><?php echo TITLE ?></h2>
            <form action="./pages/login/valida-login.php" method="POST">
                <div class="mb-3">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control border border-primary" name="cpf-login">
                </div>
                <div class="mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control border border-primary" name="senha-login">
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Entrar</button>
                </div>
            </form>
            <div class="mt-3">
                <p class="mb-0  text-center">Não é cadastrado? <a href="./pages/login/cadastro.php" class="text-primary fw-bold">Cadastre-se aqui</a></p>
            </div>

            <?php
            if (isset($_SESSION['info'])) {
                echo $_SESSION['info'];
                unset($_SESSION['info']);
            }
            ?>
        </div>
    </div>

    <?php include_once './parties/scripts.php' ?>
</body>

</html>