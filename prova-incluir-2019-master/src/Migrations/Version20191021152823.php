<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191021152823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE licitacao (id INT AUTO_INCREMENT NOT NULL, municipio_id INT DEFAULT NULL, data_referencia DATE NOT NULL, nome_orgao VARCHAR(255) NOT NULL, codigo_orgao INT NOT NULL, data_publicacao DATE NOT NULL, data_resultado_compra DATE NOT NULL, objeto_licitacao VARCHAR(1500) NOT NULL, numero_licitacao VARCHAR(255) NOT NULL, responsavel_contato VARCHAR(255) NOT NULL, INDEX IDX_62ED505B58BC1BE0 (municipio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE licitacao ADD CONSTRAINT FK_62ED505B58BC1BE0 FOREIGN KEY (municipio_id) REFERENCES municipio (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE licitacao');
    }
}
