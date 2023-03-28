<?php

# Inclui o arquivo responsável pela configuração do sistema
include_once '../../config/config.php';

# Inclui o arquivo responsável com as informações e a conexão do banco
include_once '../../database/connection.php';

# Inclui o arquivo responsável por restringir o acesso dos usuários ao sistema
# include_once '../../config/valida-acesso.php';

?>

<?php

# Recebe os dados vindo do front
$dados = file_get_contents("php://input");

# Verifica se os dados existem e se não estão vazios
if (isset($dados) && (!empty($dados))) {

    # transforma o objeto json em uma string
    $requisicao = json_decode($dados);

    # remove os espaços desnecessários
    $nome = trim($requisicao->nome);
    $fabricante = trim($requisicao->fabricante);
    $descricao = trim($requisicao->descricao);
    $composicao = trim($requisicao->composicao);
    $indicacao = trim($requisicao->indicacao);
    $qtd = trim($requisicao->qtd);
    $unid = trim($requisicao->unidade);

    # Realiza uma busca no banco para verificar se já não existe um medicamento cadastrado com esse nome e fabricante
    $sql = "SELECT nome, fabricante, unidade FROM medicamentos WHERE (nome LIKE '%$nome%') AND (fabricante LIKE '%$fabricante%') AND (unidade LIKE '%$unid%')";
    $result = mysqli_query($connection, $sql);

    # senão existir o medicamento cadastrado, então ele procede para o cadastro..
    if (mysqli_num_rows($result) == 0) {

        $sql = "INSERT INTO medicamentos (nome, fabricante, descricao, composicao, indicacao, qtd , unidade, created_at) 
    VALUES ('$nome', '$fabricante', '$descricao', '$composicao', '$indicacao', '$qtd', '$unid', NOW())";
        $result = (mysqli_query($connection, $sql));

        # se cadastrou retorna um json para o front
        if ($result) {
            $info = array(
                'nome' => $nome,
                'fabricante' => $fabricante,
                'descricao' => $descricao,
                'composicao' => $composicao,
                'indicacao' => $indicacao,
                'qtd' => $qtd,
                'unidade' => $unid,
            );
            http_response_code(200);
            echo json_encode($info);
        }
        #senão cadastrou retorna um json avisando sobre o erro
    } else {
        $info = array('msg' => 'Erro! O medicamento não foi cadastrado!');
        http_response_code(400);
        echo json_encode($info);
    }
} else {
    $info = array('msg' => 'Erro! Dados inválidos ou ausentes!');
    http_response_code(400);
    echo json_encode($info);
}

mysqli_close($connection);

?>