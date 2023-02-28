<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
          
# Sistema de Posto de Saúde

### Descrição do projeto

Esse projeto se refere a disciplina de projeto integrador ministrada no curso de Sistemas de Informação do Centro Universitário de Itajubá.
O objetivo deste projeto é a criação de um sistema online onde é possível o gerenciamento e o controle dos serviços disponibilizados pelos postos de saúde locais (Itajubá-MG), facilitando assim, o acesso tanto da população local como dos funcionários das unidades de saúde.

### Tecnologias utilizadas

<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="40" height="40"/> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" width="40" height="40"/> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" width="40" height="40"/>

### Como fazer funcionar

<ol>
  <li>Baixar o projeto</li>
  <li>Executar o arquivo SQL responsável pela criação do banco de dados no banco de dados Mysqli (phpmyadmin, workbench, dbeaver ou qualquer outro)</li>
  <li>Copiar o projeto e extraí-lo para a pasta HTDOCS ou WWW do serviço web local</li>
  <li>Alterar o arquivo config.php dentro da pasta CONFIG para os dados de conexão com o banco de dados</li>
  <li>Acessar o endereço local do projeto ex: localhost/projeto-integrador-postosaude</li>
  <li>Realizar o primeiro cadastro no sistema logo na página inicial</li>
  <strong>OBS</strong>: por padrão, os usuários (pacientes) são cadastrados com o nível de acesso 1 (usuário padrão), para ter acesso a todo o sistema, é preciso alterar no banco de dados na tabela (pacientes) a coluna (nível acesso) para 2. Desse modo, o usuário terá acesso como Administrador e terá permissão para acessar todo o sistema. <br>
  <strong>OBS 2:</strong> o procedimento acima, somente é necessário para o primeiro cadastro do sistema, visto que, caso haja necessidade, o administrador do sistema poderá alterar o nível de acesso dos demais usuários dentro do próprio sistema.
</ol>
 
