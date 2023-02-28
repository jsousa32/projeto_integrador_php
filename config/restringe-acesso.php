<?php

# Restringe o acesso a determinadas páginas de acordo com o nível de acesso do usuário
if (($_SESSION['nivel_acesso']) != 2) {
    header('Location: ../adm/painel.php');
}
