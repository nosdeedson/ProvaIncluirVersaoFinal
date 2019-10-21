# ProvaIncluirVersaoFinal
Versão final do teste
Faça o download ou clone o projeto na sua máquina.

Na raiz do sue projeto abra um terminal rode o comando "docker-compose up";

Na raiz do sue projeto abra outro terminal rode o comando "composer install";

Depois rode o comando "vendor/bin/doctrine-migrations migrations:migrate";

OBSERVAÇÃO
Caso exista um banco de dados com o nome "provaincluir2019" e o mesmo tenha as 
tabelas " bolsa_familia, doctrine_migration_versions, licitacao, municipio "
exclua as tabelas para fazer as migrations.

Rode o comando "php config/data-fixtures.php" dentro de um container php na raiz do projeto.
O banco de dados será persistidos com dados do site transparência.

Utilize o curl abaixo para verificar se os dados estão sendo retornados pela API

curl -X GET "http://localhost:8888/municipio/3132404/licitacoes?data_inicial=01/01/2016&data_final=31/12/2018" | jq
