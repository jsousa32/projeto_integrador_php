<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
          
# Sistema de Posto de Saúde

### Descrição do projeto

Esse projeto se refere a disciplina de projeto integrador ministrada no curso de Sistemas de Informação do Centro Universitário de Itajubá.
O objetivo deste projeto é a criação de um sistema online onde é possível o gerenciamento e o controle dos serviços disponibilizados pelos postos de saúde locais (Itajubá-MG), facilitando assim, o acesso tanto da população local como dos funcionários das unidades de saúde.

### Ferramentas e tecnologias utilizadas


<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg" width="40" height="40"/> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="40" height="40"/> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" width="40" height="40"/> <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" width="40" height="40"/>

### Funcionalidades do sistema
<ul>
     <li>Cadastrar, alterar, listar, pesquisar e excluir pacientes</li>
     <li>Cadastrar, alterar, listar, pesquisar e excluir médicos</li>
     <li>Cadastrar, alterar, listar, pesquisar e excluir medicamentos</li>
     <li>Adicionar e remover medicamentos do sistema (estoque)</li>
     <li>Cadastrar, alterar, listar e excluir agendamentos de consultas</li>
     <li>Geração de comprovante de agendamento de consulta (em PDF)</li>
     <li>Validação e restrição de acesso</li>
     <li>Permissões e funcionalidades definidas por nível de acesso (administrador/usuário padrão)</li>
     <li>Solicitação online de medicamentos por parte do paciente (em desenvolvimento)</li>
</ul>

### Como fazer funcionar

<ol>
  <li>Baixar o projeto</li>
  <li>Executar o arquivo SQL responsável pela criação do banco de dados no SGDB (tem que ser MySql) (phpmyadmin, workbench, dbeaver ou qualquer outro)</li>
  <li>Copiar o projeto e extraí-lo para a pasta HTDOCS ou WWW do serviço web local</li>
  <li>Renomear a pasta para postosaude</li>
  <li>Alterar o arquivo config.php dentro da pasta CONFIG para os dados de conexão com o banco de dados</li>
  <li>Acessar o endereço local do projeto ex: localhost/postosaude</li>
  <li>Realizar o primeiro cadastro no sistema logo na página inicial</li>
  <strong>OBS</strong>: por padrão, os usuários (pacientes) são cadastrados com o nível de acesso 1 (usuário padrão), para ter acesso a todo o sistema, é preciso alterar no banco de dados na tabela (pacientes) a coluna (nível acesso) para 2. Desse modo, o usuário terá acesso como Administrador e terá permissão para acessar todo o sistema. <br>
  <strong>OBS 2:</strong> o procedimento acima, somente é necessário para o primeiro cadastro do sistema, visto que, caso haja necessidade, o administrador do sistema poderá alterar o nível de acesso dos demais usuários dentro do próprio sistema (Listar Pacientes > Editar).
</ol>
 
