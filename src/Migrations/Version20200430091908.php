<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200430091908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE typology_mi ADD system_information_id INT NOT NULL, CHANGE description description VARCHAR(1500) DEFAULT NULL');
        $this->addSql('ALTER TABLE typology_mi ADD CONSTRAINT FK_DD0435C3AEEBF485 FOREIGN KEY (system_information_id) REFERENCES system_information (id)');
        $this->addSql('CREATE INDEX IDX_DD0435C3AEEBF485 ON typology_mi (system_information_id)');
        $this->addSql('ALTER TABLE system_information CHANGE description description VARCHAR(1500) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE system_information CHANGE description description VARCHAR(1500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE typology_mi DROP FOREIGN KEY FK_DD0435C3AEEBF485');
        $this->addSql('DROP INDEX IDX_DD0435C3AEEBF485 ON typology_mi');
        $this->addSql('ALTER TABLE typology_mi DROP system_information_id, CHANGE description description VARCHAR(1500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
