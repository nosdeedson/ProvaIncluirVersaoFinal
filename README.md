# ProvaIncluirVersaoFinal
Versão final do teste
Para rodar a aplicação siga os passos abaixo. (PRESTE ATENÇAO AS OBSERVAÇÕES, SE O TUDO OCORRER BEM OS PASSOS DA OBSERVAÇÃO NÃO SÃO NECESSÁRIOS).

Para usar este projeto é necessário instalar o docker.

Faça o download ou clone o projeto na sua máquina.

Na raiz do seu projeto abra um terminal rode o comando "docker-compose up";

Rode o comando "docker exec -it incluir2019-php bash" em um outro terminal
para ter acesso ao container do php;

Rode o comando "composer install";

Depois rode o comando "vendor/bin/doctrine-migrations migrations:migrate" para 
criar as tabelas no banco de dados.

OBSERVAÇÃO ( Siga os passos abaixo caso haja erro na criação das tabelas no banco de dados)

Caso exista um banco de dados com o nome "provaincluir2019" e o mesmo tenha as 
tabelas " bolsa_familia, doctrine_migration_versions, licitacao, municipio " o comando retornará
que não existem "migrations to execute", isto ocorre porque as tabelas já existem.
exclua as tabelas para fazer as migrations.

Para acessar o container do mysql use o comando "docker exec -it incluir2019-sql bash"
depois: "mysql -u provaincluir2019 -p provaincluir2019" 
depois: "provaincluir2019";

Para excluir as tabelas use o comando: "DROP TABLE bolsa_familia, doctrine_migration_versions, 
licitacao, municipio;";


Após a criação das tabelas use o comando " SHOW CREATE TABLE licitacao; ".
Verifique se a segunda coluna está nomeada como "municipio_id", caso esteja com outro
nome vai dar erro na hora de persistir os dados do site transparência no banco de dados.

Para corrigir isto use os comandos abaixo:

"ALTER TABLE licitacao DROP FOREIGN KEY nome_da_constraint;" ( caso exista) 
para ver o nome da CONSTRAINT uso comando:  "SHOW CREATE TABLE licitacao;";

Depois: "ALTER TABLE licitacao DROP nome_atributo_criado; ";

Depois: "ALTER TABLE licitacao ADD municipio_id INT  NOT NULL AFTER id";

Depois: ALTER TABLE licitacao ADD FOREIGN KEY(municipio_id) REFERENCES municipio(id);

FIM OBSEVAÇÕES

Rode o comando "php config/data-fixtures.php" dentro de um container php na raiz do projeto.
O banco de dados será persistidos com dados do site transparência.

Se tudo ocorreu corretamente utilize os curl abaixo, em outro terminal, para verificar se os dados estão sendo retornados pela API

curl -X GET "http://localhost:8888/municipio/3132404/licitacoes?data_inicial=01/01/2016&data_final=31/12/2018" | jq

curl -X GET "http://localhost:8888/municipio" | jq

curl -X GET "http://localhost:8888/municipio/3132404/bolsa-familia?data_inicial=06/04/2016&data_final=01/08/2016" | jq



