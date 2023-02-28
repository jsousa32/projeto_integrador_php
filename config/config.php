<?php
# Define e força que todas as páginas relacionadas ao sistema use o UTF-8
header('Content-Type: charset=utf-8');

# Define a data e hora para o padrão brasileiro
$timezone = new DateTimeZone('America/Sao_Paulo');

# Define o ínicio de uma sessão em todo o sistema
session_start();

# Define um título principal para todo o sistema
define("TITLE", "Sistema de Posto de saúde");

# Define um nome para o menu da aplicação
define("TITLE_MENU", "Postinho Online");

# Define as informações de configuração do banco de dados
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DB", "postosaudeDB");
define("PORT", "8889");
